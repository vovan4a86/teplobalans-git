<?php namespace Fanky\Admin\Controllers;

use Fanky\Admin\Models\GalleryItem;
use Fanky\Admin\Models\NewsCat;
use Fanky\Admin\Models\NewsTag;
use Fanky\Admin\Models\Product;
use Fanky\Admin\Models\ProductImage;
use Fanky\Admin\Models\Project;
use Fanky\Admin\Models\ProjectCat;
use Fanky\Admin\Models\ProjectImage;
use Fanky\Admin\Settings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Request;
use Validator;
use Text;
use Thumb;
use Image;
use Fanky\Admin\Models\News;

class AdminProjectController extends AdminController {

    public function getIndex() {
        $projects = Project::orderBy('order')->get();

        return view('admin::projects.main', ['projects' => $projects]);
    }

    public function getEdit($id = null) {
        if (!$id || !($project = Project::find($id))) {
            $project = new Project;
            $project->published = 1;
            $project->order = Project::max('order') + 1;
        }

        return view('admin::projects.edit', compact('project'));
    }

    public function postSave() {
        $id = Request::input('id');
        $data = Request::only(['date', 'name', 'announce', 'text', 'published', 'proj_cat_id',
            'alias', 'title', 'keywords', 'description', 'client', 'year',
            'place', 'cost', 'vk', 'telegram', 'whatsapp', 'on_main']);
        $image = Request::file('image');

        if (!array_get($data, 'alias')) $data['alias'] = Text::translit($data['name']);
        if (!array_get($data, 'title')) $data['title'] = $data['name'];
        if (!array_get($data, 'on_main')) $data['on_main'] = 0;
        if (!array_get($data, 'published')) $data['published'] = 0;

        // валидация данных
        $validator = Validator::make(
            $data, [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return ['errors' => $validator->messages()];
        }

        // Загружаем изображение
        if ($image) {
            $file_name = Project::uploadImage($image);
            $data['image'] = $file_name;
        }

        // сохраняем страницу
        $project = Project::find($id);
        $redirect = false;
        if (!$project) {
            $data['order'] = Project::max('order') + 1;
            $project = Project::create($data);
            $redirect = true;
        } else {
            if ($project->image && isset($data['image'])) {
                $project->deleteImage();
            }
            if (!$project->alias) $redirect = true;
            $project->update($data);
        }

        if ($redirect) {
            return ['redirect' => route('admin.projects.edit', [$project->id])];
        } else {
            return ['msg' => 'Изменения сохранены.'];
        }

    }

    public function postDelete($id) {
        $project = Project::find($id);
        $project->delete();

        return ['success' => true];
    }

    public function postDeleteImage($id) {
        $projects = Project::find($id);
        if (!$projects) return ['success' => false];

        $projects->deleteImage();
        $projects->update(['image' => null]);

        return ['success' => true];
    }

    public function postReorder() {
        $sorted = Request::input('sorted', []);
        foreach ($sorted as $order => $id) {
            DB::table('projects')
                ->where('id', $id)
                ->update(array('order' => $order));
        }
        return ['success' => true];
    }

    public function postProductImageUpload($product_id): array {
        $images = Request::file('images');
        $items = [];
        if ($images) foreach ($images as $image) {
            $file_name = ProjectImage::uploadImage($image);
            $order = ProjectImage::where('project_id', $product_id)->max('order') + 1;
            $item = ProjectImage::create(['project_id' => $product_id, 'image' => $file_name, 'order' => $order]);
            $items[] = $item;
        }

        $html = '';
        foreach ($items as $item) {
            $html .= view('admin::projects.image', ['image' => $item]);
        }

        return ['html' => $html];
    }

    public function postImageEdit($id) {
        $image = ProjectImage::findOrFail($id);
        return view('admin::projects.image_edit', ['image' => $image]);
    }

    public function postImageDataSave($id) {
        $image = ProjectImage::findOrFail($id);
        $data = Request::only('name');
        $image->name = $data['name'];
        $image->save();
        return ['success' => true];
    }

    public function postGalleryImageOrder(): array {
        $sorted = Request::input('sorted', []);
        foreach ($sorted as $order => $id) {
            DB::table('project_images')
                ->where('id', $id)
                ->update(array('order' => $order));
        }
        return ['success' => true];
    }

    /**
     * @throws Exception
     */
    public function postProductImageDelete($id): array {
        /** @var ProductImage $item */
        $item = ProductImage::findOrFail($id);
        $item->deleteImage();
        $item->delete();

        return ['success' => true];
    }

    public function postUpdateOrder($id): array {
        $order = Request::get('order');
        Project::whereId($id)->update(['order' => $order]);

        return ['success' => true];
    }

    public function postAddImg($project_id): array {
        $project = Project::findOrFail($project_id);
        $data = Request::except('image');
        $images = Request::file('image');

        $items = [];
        if ($images) foreach ($images as $image) {
            $file_name = ProjectImage::uploadImage($image);
            $order = ProjectImage::where('project_id', $project_id)->max('order') + 1;
            $item = ProjectImage::create(['project_id' => $project_id, 'image' => $file_name, 'order' => $order]);
            $items[] = $item;
        }

        $html = '';
        foreach ($items as $item) {
            $html .= view('admin::catalog.product_image', ['image' => $item, 'active' => '']);
        }

        return ['html' => $html];

//        $valid = Validator::make($data, [
//            'name' => 'required',
//        ]);
//
//        if ($image) {
//            $file_name = ProjectImage::uploadImage($image);
//            $data['image'] = $file_name;
//        }
//
//        if ($valid->fails()) {
//            return ['errors' => $valid->messages()];
//        } else {
//            $data = array_map('trim', $data);
//            $data['project_id'] = $project->id;
//            $data['order'] = ProjectImage::where('project_id', $project_id)->max('order') + 1;
//            $img = ProjectImage::create($data);
//            $row = view('admin::projects.add_img_row', compact('img'))->render();
//
//            return ['row' => $row];
//        }
    }

    public function postDelImg($img_id): array {
        $img = ProjectImage::findOrFail($img_id);
        $img->delete();

        return ['success' => true];
    }

}
