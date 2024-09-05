<?php
namespace Fanky\Admin\Controllers;

use Carbon\Carbon;
use Fanky\Admin\Models\PriceSection;
use Fanky\Admin\Models\PriceSectionItem;
use Request;
use Text;
use Validator;
use DB;
use Fanky\Admin\Models\Review;

class AdminPricesController extends AdminController
{

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
        $id = Request::input('id');
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
        $section = PriceSection::find($id);
        if (!$section) {
            $data['order'] = PriceSection::max('order') + 1;
            $section = PriceSection::create($data);
//			return ['success' => true, 'redirect' => route('admin.prices.edit', [$section->id])];
        } else {
            $section->update($data);
        }
        return [
            'success' => true,
            'url' => route('admin.prices', ['id' => $section->id])
        ];
    }

    public function postDelete($id)
    {
        $section = PriceSection::find($id);
        $section->delete();

        return ['success' => true];
    }

    public function postSaveTable()
    {
        $id = Request::get('id');

        $param_data = Request::get('params', []);
        $param_ids = array_get($param_data, 'id', []);
        $param_names = array_get($param_data, 'name', []);
        $param_values = array_get($param_data, 'value', []);
        $params = [];
        foreach ($param_ids as $key => $param_id) {
            $params[] = [
                'id'	=> $param_id,
                'name'	=> trim(array_get($param_names, $key)),
                'price'	=> trim(array_get($param_values, $key)),
            ];
        }
        array_pop($params);

        $start_update = Carbon::now();
        foreach ($params as $key => $param) {
            $p = PriceSectionItem::findOrNew(array_get($param, 'id'));
            if(!$p->id) $redirect = false;
            $param['price_section_id'] = $id;
            $param['order'] = $key;
            $param['updated_at'] = $start_update;
            $p->fill($param)->save();
        }
        PriceSectionItem::where('price_section_id', $id)
            ->where('updated_at', '<', $start_update)
            ->delete();

        return ['success' => true];
    }
}
