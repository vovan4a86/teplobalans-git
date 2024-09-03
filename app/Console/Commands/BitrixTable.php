<?php

namespace App\Console\Commands;

use Fanky\Admin\Models\Catalog;
use Fanky\Admin\Models\Product;
use Fanky\Admin\Text;
use Illuminate\Console\Command;

class BitrixTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitrix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //89 - Мачты освещения 2
        //546 - Опоры освещения и светильники из алюминия 0
        //415 - Опоры контактной сети 4
        //504 - Кронштейны 3
        //88 - Опоры освещения 35
        //505 - МАФ (малые архитектурные формы), объекты городской среды 5

        $main_cat = \DB::table('b_iblock_section')->where('ID','505')->first();
        $main_catalog = $this->getCatalogByName($main_cat->NAME, 0, $main_cat->ID);
        if(!$main_catalog->text) {
            $main_catalog->update(['text' => $main_cat->DESCRIPTION]);
        }

        $sections = \DB::table('b_iblock_section')->where('IBLOCK_SECTION_ID',$main_cat->ID)->get();

        if(count($sections)) {
            foreach ($sections as $s) {
                $catalog = $this->getCatalogByName($s->NAME, $main_catalog->id, $s->ID);
                if(!$catalog->text) {
                    $catalog->update(['text' => $s->DESCRIPTION]);
                }
                $inner_sections = \DB::table('b_iblock_section')->where('IBLOCK_SECTION_ID',$s->ID)->get();

                if(!count($inner_sections)) {
                    $products_ids =  \DB::table('b_iblock_section_element')->where('IBLOCK_SECTION_ID',$s->ID)->pluck('IBLOCK_ELEMENT_ID');
                    $this->createProducts($products_ids, $catalog);
                } else {
                    foreach ($inner_sections as $more) {
                        $sub_catalog = $this->getCatalogByName($more->NAME, $catalog->id, $more->ID);
                        $more_sections = \DB::table('b_iblock_section')->where('IBLOCK_SECTION_ID',$more->ID)->get();

                        if(!count($more_sections)) {
                            $products_ids =  \DB::table('b_iblock_section_element')->where('IBLOCK_SECTION_ID',$more->ID)->pluck('IBLOCK_ELEMENT_ID');
                            $this->createProducts($products_ids, $sub_catalog);
                        }
                    }
                }
            }
        }
    }

    public function createProducts($ids, $catalog) {
        foreach ($ids as $id) {
            $donor = \DB::table('b_iblock_element')->where('ID', $id)->first();

            if($donor) {
                $product = Product::where('iblock_element_id', $donor->ID)->first();
                if (!$product) {
                    $order = Product::where('catalog_id', $catalog->id)->max('order') + 1;
                    Product::create([
                        'catalog_id' => $catalog->id,
                        'iblock_element_id' => $donor->ID,
                        'name' => $donor->NAME,
                        'h1' => $donor->NAME,
                        'alias' => Text::translit($donor->NAME),
                        'text' => $donor->DETAIL_TEXT,
                        'order' => $order,
                    ]);
                    $this->info('+ ' . 'Новый товар: ' . $donor->NAME);
                }
            }

        }
    }

    private function getCatalogByName(string $categoryName, int $parentId, int $iblock_id): Catalog
    {
        $catalog = Catalog::whereName($categoryName)->where('parent_id', $parentId)->first();
        if (!$catalog) {
            $catalog = Catalog::create(
                [
                    'name' => $categoryName,
                    'title' => $categoryName,
                    'h1' => $categoryName,
                    'parent_id' => $parentId,
                    'iblock_section_id' => $iblock_id,
                    'alias' => Text::translit($categoryName),
                    'slug' => Text::translit($categoryName),
                    'order' => Catalog::whereParentId($parentId)->max('order') + 1,
                    'published' => 1,
                ]
            );
            $this->info('+++ ' . ' Новый раздел: ' . $categoryName);
        }
        return $catalog;
    }
}
