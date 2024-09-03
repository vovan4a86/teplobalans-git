<?php namespace App\Traits;
use Illuminate\Support\Str;
use Image;
use Settings;
use SiteHelper;
use Thumb;

/**
 * Created by PhpStorm.
 * User: aleks
 * Date: 19.12.2017
 * Time: 11:09
 */

trait HasImage{
	public $image_field = 'image';
	public $icon_field = 'icon';

	public function deleteImage($thumbs = null, $upload_url = null) {
		if(!$this->{$this->image_field}) return;
		if(!$thumbs){
			$thumbs = self::$thumbs;
		}
		if(!$upload_url){
			$upload_url = self::UPLOAD_URL;
		}

		foreach ($thumbs as $thumb => $size){
			$t = Thumb::url($upload_url . $this->{$this->image_field}, $thumb);
			@unlink(public_path($t));
		}
		@unlink(public_path($upload_url . $this->{$this->image_field}));
	}

	public function deleteIcon() {
		if(!$this->{$this->image_field}) return;

		@unlink(public_path(self::UPLOAD_URL . $this->{$this->icon_field}));
	}

	public function getImageSrcAttribute() {
		return $this->{$this->image_field} ? url(self::UPLOAD_URL . $this->{$this->image_field}) : null;
	}

	public function getIconSrcAttribute() {
		return $this->{$this->icon_field} ? url(self::UPLOAD_URL . $this->{$this->icon_field}) : null;
	}

	public function thumb($thumb) {
		$withWaterMark =  !!(property_exists($this, 'withWaterMark') && $this->withWaterMark);
		if (!$this->{$this->image_field}) {
			return null;
		} else {
			$file = public_path(self::UPLOAD_URL . $this->{$this->image_field});
			$file = str_replace(['\\\\', '//'], DIRECTORY_SEPARATOR, $file);
			$file = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $file);

			if (!is_file(public_path(Thumb::url(self::UPLOAD_URL . $this->{$this->image_field}, $thumb)))) {
				if (!is_file($file))
					return null; //нет исходного файла
				//создание миниатюры
				Thumb::make(self::UPLOAD_URL . $this->{$this->image_field}, self::$thumbs, null, null, $withWaterMark);

			}
			return url(Thumb::url(self::UPLOAD_URL . $this->{$this->image_field}, $thumb));
		}
	}

	/**
	 * @param \Illuminate\Http\UploadedFile $image
	 * @return string
	 */
	public static function uploadImage($image, $is_last = null): string
    {
		$file_name = md5(uniqid(rand(), true)) . '_' . time() . '.' . Str::lower($image->getClientOriginalExtension());

        if(!$is_last) {
            copy($image, public_path(self::UPLOAD_URL . $file_name));
        } else {
            $image->move(public_path(self::UPLOAD_URL), $file_name);
        }

		$newImage = Image::make(public_path(self::UPLOAD_URL . $file_name))
            ->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        $addWatermarkOnUpload =  !!(property_exists(__CLASS__, 'addWatermarkOnUpload') && self::$addWatermarkOnUpload);
        $newSelf = new self();
        $withWaterMark =  !!(property_exists($newSelf, 'withWaterMark') && $newSelf->withWaterMark);
        if($addWatermarkOnUpload){
            $newImage = SiteHelper::addWaterMark($newImage);
        }
        $newImage->save(null, Settings::get('image_quality', 100));
		Thumb::make(self::UPLOAD_URL . $file_name, self::$thumbs, null, null, $withWaterMark);
		return $file_name;
	}

	public static function uploadIcon($image): string
    {
		$file_name = md5(uniqid(rand(), true)) . '_' . time() . '.' . Str::lower($image->getClientOriginalExtension());

        $image->move(public_path(self::UPLOAD_URL), $file_name);

		return $file_name;
	}
}
