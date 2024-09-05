<?php namespace Fanky\Admin\Controllers;

use Fanky\Admin\Models\PriceSection;
use Request;
use Text;
use Validator;
use DB;
use Fanky\Admin\Models\Review;

class AdminPricesController extends AdminController {

	public function getIndex()
	{
        $id = Request::get('id');
        $section = PriceSection::findOrNew($id);
		$sections = PriceSection::orderBy('order')->get();

		return view('admin::prices.main', [
            'section' => $section,
            'sections' => $sections
        ]);
	}

	public function getEdit($id = null)
	{
		if (!$id || !($section = PriceSection::findOrFail($id))) {
            $section = new PriceSection;
            $section->published = 1;
            $section->order = PriceSection::query()->max('order') + 1;
		}

		return view('admin::prices.edit', ['section' => $section]);
	}

	public function postSave()
	{
//		$id = Request::input('id');
		$data = Request::only(['name']);
        
//        if (!array_get($data, 'published')) $data['published'] = 0;

        $rules = [
            'name' => 'required'
        ];

		// валидация данных
		$validator = Validator::make(
		    $data,
		    $rules
		);
		if ($validator->fails()) {
			return ['errors' => $validator->messages()];
		}

		// сохраняем страницу
//        $section = PriceSection::find($id);
//		if (!$section) {
//			$data['order'] = PriceSection::max('order') + 1;
//            $section = PriceSection::create($data);
//			return ['success' => true, 'redirect' => route('admin.prices.edit', [$section->id])];
//		} else {
//			$section->update($data);
//		}
        $section = PriceSection::create([
            'name' => $data['name'],
            'order' => PriceSection::query()->max('order') + 1,
        ]);

		return [
            'success' => true,
            'url' => route('admin.prices', ['id' => $section->id])
        ];
	}

	public function postReorder()
	{
		$sorted = Request::input('sorted', []);
		foreach ($sorted as $order => $id) {
			DB::section('price_sections')->where('id', $id)->update(array('order' => $order));
		}
		return ['success' => true];
	}

	public function postDelete($id)
	{
		$section = PriceSection::find($id);
		$section->delete();

		return ['success' => true];
	}
}
