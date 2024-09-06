<?php namespace App\Http\Controllers;

use Fanky\Admin\Models\Page;
use Fanky\Admin\Models\Review;
use Fanky\Admin\Models\Vacancy;
use Fanky\Auth\Auth;
use Settings;
use View;

class VacanciesController extends Controller {
	public $bread = [];
	protected $vacancies_page;

	public function __construct() {
		$this->vacancies_page = Page::whereAlias('vacancies')
			->get()
			->first();
		$this->bread[] = [
			'url'  => route('vacancies'),
			'name' => $this->vacancies_page['name']
		];
	}

	public function index() {
		$page = $this->vacancies_page;
		if (!$page)
			abort(404, 'Страница не найдена');
		$bread = $this->bread;

        $items = Vacancy::public()
            ->orderBy('order')
            ->paginate(Settings::get('vacancies_per_page', 9));

        if (count(request()->query())) {
            View::share('canonical', route('vacancies'));
        }

        return view('vacancies.index', [
            'bread' => $bread,
            'h1'    => $page->getH1(),
            'items' => $items
        ]);
	}

	public function item($alias) {
		$item = Review::whereAlias($alias)->public()->first();
        if (!$item) abort(404);

        $bread = $this->bread;
        $bread[] = [
            'url' => $item->url,
            'name' => $item->name
        ];

        Auth::init();
        if (Auth::user() && Auth::user()->isAdmin) {
            View::share('admin_edit_link', route('admin.reviews.edit', [$item->id]));
        }

		return view('news.item', [
			'article'        => $item,
            'h1'          => $item->getH1(),
			'text'        => $item->text,
            'bread' => $bread
        ]);
	}
}
