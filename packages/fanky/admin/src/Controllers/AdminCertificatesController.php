<?php namespace Fanky\Admin\Controllers;

use Fanky\Admin\Models\Certificate;
use Request;
use Settings;
use Thumb;
use Image;

class AdminCertificatesController extends AdminController {

    public function getIndex()
    {
        $items = Certificate::orderBy('order')->get();
        return view('admin::certificates.main', ['items' => $items]);
    }

	public function postImageUpload(): array
    {
		$images = Request::file('images');
		$items = [];
		if ($images) foreach ($images as $image) {
			$file_name = md5(uniqid(rand(), true)) . '.' . $image->getClientOriginalExtension();
			$image->move(public_path() . Certificate::UPLOAD_URL, $file_name);
			Image::make(public_path() . Certificate::UPLOAD_URL . $file_name)
				->resize(1920, 1080, function ($constraint) {
				    $constraint->aspectRatio();
				    $constraint->upsize();
				})
				->save(null, Settings::get('image_quality', 100));
			$item = Certificate::create(['image' => $file_name]);

			Thumb::make(Certificate::UPLOAD_URL . $file_name, Certificate::$thumbs);
			$items[] = $item;
		}

		$html = '';
		foreach ($items as $item) {
			$html .= view('admin::certificates.item', ['item' => $item]);
		}

		return ['html' => $html];
	}

	public function postImageEdit($id)
	{
		$item = Certificate::findOrFail($id);
		return view('admin::certificates.item_edit', ['item' => $item]);
	}

	public function postImageDataSave($id): array
    {
		$item = Certificate::findOrFail($id);
		$name = Request::get('name');
		$item->update(['name' => $name]);

		return ['success' => true];
	}

	public function postImageDelete($id): array
    {
		$item = Certificate::findOrFail($id);
		@unlink(public_path() . $item::UPLOAD_URL . $item->image);
		foreach (Certificate::$thumbs as $key => $value) {
			@unlink(public_path() . Thumb::url(Certificate::UPLOAD_URL . $item->image, $key));
		}
		$item->delete();

		return ['success' => true];
	}

	public function postImageOrder(): array
    {
		$sorted = Request::get('sorted', []);
		foreach ($sorted as $key => $item){
			Certificate::whereId($item)->update(['order' => $key]);
		}

        return ['success' => true];
	}
}
