<?php namespace Fanky\Admin\Controllers;

use Fanky\Admin\Models\Vacancy;
use Request;
use Text;
use Validator;
use DB;
use Fanky\Admin\Models\Review;

class AdminVacanciesController extends AdminController {

	public function getIndex()
	{
		$vacancies = Vacancy::orderBy('order')->get();

		return view('admin::vacancies.main', ['vacancies' => $vacancies]);
	}

	public function getEdit($id = null)
	{
		if (!$id || !($vacancy = Vacancy::findOrFail($id))) {
			$vacancy = new Vacancy;
			$vacancy->published = 1;
		}

		return view('admin::vacancies.edit', ['vacancy' => $vacancy]);
	}

	public function postSave()
	{
		$id = Request::input('id');
		$data = Request::except(['id', 'image']);
        $image = Request::file('image');

        if (!array_get($data, 'published')) $data['published'] = 0;

        $rules = [
            'title' => 'required',
        ];

		// валидация данных
		$validator = Validator::make(
		    $data,
		    $rules
		);
		if ($validator->fails()) {
			return ['errors' => $validator->messages()];
		}

        // Загружаем изображение
        if ($image) {
            $file_name = Vacancy::uploadImage($image);
            $data['image'] = $file_name;
        }

		// сохраняем страницу
		$vacancy = Vacancy::find($id);
		if (!$vacancy) {
			$data['order'] = Vacancy::max('order') + 1;
			$vacancy = Vacancy::create($data);

			return ['redirect' => route('admin.vacancies.edit', [$vacancy->id])];
		} else {
            if ($vacancy->image && isset($data['image'])) {
                $vacancy->deleteImage();
            }
			$vacancy->update($data);
		}

		return ['success' => true, 'msg' => 'Изменения сохранены.'];
	}

	public function postReorder()
	{
		$sorted = Request::input('sorted', []);
		foreach ($sorted as $order => $id) {
			DB::table('vacancies')->where('id', $id)->update(array('order' => $order));
		}
		return ['success' => true];
	}

	public function postDelete($id)
	{
		$vacancy = Vacancy::find($id);
        if(!$vacancy) return ['success' => false];

		$vacancy->delete();

		return ['success' => true];
	}

    public function postDeleteImage($id) {
        $vacancy = Vacancy::find($id);
        if(!$vacancy) return ['success' => false];

        $vacancy->deleteImage();
        $vacancy->update(['image' => null]);

        return ['success' => true];
    }
}
