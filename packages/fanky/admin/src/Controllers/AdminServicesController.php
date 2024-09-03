<?php
namespace Fanky\Admin\Controllers;

use DB;
use Fanky\Admin\Models\Service;
use Request;
use Validator;
use Text;

class AdminServicesController extends AdminController
{

    public function getIndex()
    {
        $services = Service::orderBy('order')->get();

        return view('admin::services.main', ['services' => $services]);
	}

    public function getEdit($id = null)
    {
        if (!$id || !($service = Service::find($id))) {
            $service = new Service;
            $service->published = 1;
        }

        return view('admin::services.edit', ['service' => $service]);
    }

    public function postSave(): array
    {
        $id = Request::input('id');
        $data = Request::except(['id']);
        $image = Request::file('image');

        if (!array_get($data, 'alias')) {
            $data['alias'] = Text::translit($data['name']);
        }
        if (!array_get($data, 'title')) {
            $data['title'] = $data['name'];
        }
        if (!array_get($data, 'published')) {
            $data['published'] = 0;
        }

        // валидация данных
        $validator = Validator::make(
            $data,
            [
                'name' => 'required'
            ]
        );
        if ($validator->fails()) {
            return ['errors' => $validator->messages()];
        }

        // Загружаем изображение
        if ($image) {
            $file_name = Service::uploadImage($image);
            $data['image'] = $file_name;
        }

        // сохраняем страницу
        $service = Service::find($id);
        $redirect = false;
        if (!$service) {
            $service = Service::create($data);
            $redirect = true;
        } else {
            if ($service->image && isset($data['image'])) {
                $service->deleteImage();
            }
            $service->update($data);
        }

        if ($redirect) {
            return ['redirect' => route('admin.services.edit', [$service->id])];
        } else {
            return ['msg' => 'Изменения сохранены.'];
        }
    }

    public function postDelete($id): array
    {
        $service = Service::find($id);

        if($service->image) {
            $this->postDeleteImage($id);
        }
        $service->delete();

        return ['success' => true];
    }

    public function postDeleteImage($id): array
    {
        $service = Service::find($id);
        if (!$service) {
            return ['success' => false];
        }

        $service->deleteImage();
        $service->update(['image' => null]);

        return ['success' => true];
    }

    public function postReorder(): array
    {
        $sorted = Request::input('sorted', []);
        foreach ($sorted as $order => $id) {
            DB::table('services')
                ->where('id', $id)
                ->update(array('order' => $order));
        }
        return ['success' => true];
    }

}
