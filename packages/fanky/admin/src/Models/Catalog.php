<?php

namespace Fanky\Admin\Models;

use App\Traits\HasFile;
use App\Traits\HasH1;
use App\Traits\HasImage;
use App\Traits\HasSeo;
use App\Traits\HasSeoOptimization;
use App\Traits\OgGenerate;
use Cache;
use Carbon\Carbon;
use Fanky\Admin\Settings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Self_;
use SiteHelper;
use URL;

/**
 * @property HasMany|Collection $public_children
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $h1
 * @property string $keywords
 * @property string $description
 * @property string $og_title
 * @property string $og_description
 * @property string $image
 * @property string $icon_image
 * @property string $section_image
 * @property string $announce
 * @property string $text
 * @property string $chars
 * @property string $alias
 * @property string $slug
 * @property string $title
 * @property bool $is_action
 * @property string $action_text
 * @property string $product_description_template
 * @property string $product_title_template
 * @property string $product_text_template
 * @property int $order
 * @property bool $published
 * @property bool $on_main
 * @property bool $on_menu
 * @property bool $on_main_list
 * @property bool $on_footer_menu
 * @property bool $on_drop_down
 * @property mixed $children
 * @property mixed $filters_list
 * @property mixed features
 * @property mixed benefits
 * @mixin \Eloquent
 * @method static whereId(int|mixed $id)
 * @method static whereName($value)
 * @method static whereParentId(int|mixed $id)
 */
class Catalog extends Model
{
    use HasImage, HasFile, OgGenerate, HasH1, HasSeo, HasSeoOptimization;

    protected $table = 'catalogs';
    protected $_parents = [];
    protected $_has_children = null;
    private $_url;
    private $_disableEventUpdateSlug;
    private $_disableEventUpdatePublished;
    protected $guarded = ['id'];

    protected $casts = [
        'settings' => 'array',
        'children_ids' => 'array',
    ];

    const UPLOAD_URL = '/uploads/catalogs/';
    const FILE_IMAGE = '/adminlte/document_small.png';

    public static $thumbs = [
        1 => '100x100|fit', //admin
        2 => '675x390', //card
    ];

    public static function boot()
    {
        parent::boot();

        self::saved(
            function (self $category) {
                if ($category->isDirty('alias') || $category->isDirty('parent_id')) {
                    if (!$category->_disableEventUpdateSlug) {
                        self::updateUrlRecurse($category);
                    }
                }
                if ($category->isDirty('published') && $category->published == 0) {
                    if (!$category->_disableEventUpdatePublished) {
                        self::updateDisablePublishedRecurse($category);
                    }
                }
            }
        );
    }

    public static function getCatalogList($parent_id = 0, $lvl = 0)
    {
        $result = [];
        foreach (self::whereParentId($parent_id)->orderBy('order')->get() as $item) {
            $result[$item->id] = str_repeat('&nbsp;', $lvl * 3) . $item->name;
            $result = $result + self::getCatalogList($item->id, $lvl + 1);
        }

        return $result;
    }

    public static function getCatalogs()
    {
        $catalogs = Cache::get('catalogs', []);
        if (!$catalogs) {
            $catalog_arr = Catalog::all(['id', 'parent_id', 'name', 'alias', 'published']);
            foreach ($catalog_arr as $item) {
                $catalogs[$item->id] = $item;
            }
            Cache::add('catalogs', $catalogs, 1);
        }

        return $catalogs;
    }

    public static function getByPath($path): ?Catalog
    {
        if (is_array($path)) {
            $path = implode('/', $path);
        }

        return self::query()->public()->whereSlug($path)->first();
    }

    public static function getRecurseCategory($parent_id)
    {
        $categories = Catalog::whereParentId($parent_id)->pluck('id')->all();
        if (!count($categories)) {
            return [];
        }
        $result = $categories;
        foreach ($categories as $id) {
            $children = self::getRecurseCategory($id);
            if (count($children)) {
                $result = array_merge($result, $children);
            }
        }

        return $result;
    }

    public static function updateUrlRecurse(self $category)
    {
        $parents = $category->getParents(true, true);
        $slug_arr = [];
        foreach ($parents as $parent) {
            $slug_arr[] = $parent->alias;
        }
        //чтобы событие на обновление не сработало
        $category->_disableEventUpdateSlug = true;
        $category->update(['slug' => implode('/', $slug_arr)]);
        foreach ($category->children()->get() as $child) {
            self::updateUrlRecurse($child);
        }
    }

    public static function updateDisablePublishedRecurse(self $category)
    {
        //чтобы событие на обновление не сработало
        $category->_disableEventUpdatePublished = true;
        $category->update(['published' => 0]);
        foreach ($category->children()->get() as $child) {
            self::updateUrlRecurse($child);
        }
    }

    public function delete()
    {
        $this->deleteImage();
        foreach ($this->children as $product) {
            $product->delete();
        }
        foreach ($this->products as $product) {
            $product->delete();
        }

        parent::delete();
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Catalog::class, 'parent_id')->with(['parent']);
    }

    public function public_parent(): BelongsTo
    {
        return $this->parent()
            ->where('published', 1)
            ->orderBy('order');
    }

    public function children(): HasMany
    {
        return $this->hasMany('Fanky\Admin\Models\Catalog', 'parent_id')->orderBy('order');
    }

    public function public_children(): HasMany
    {
        return $this->children()
            ->where('published', 1)
            ->orderBy('order');
    }

    public function items(): HasMany
    {
        return $this->hasMany(CatalogItem::class, 'catalog_id')
            ->orderBy('order');
    }

    public function single_image(): HasOne
    {
        return $this->hasOne(CatalogItem::class)
            ->orderBy('order');
    }

    public function images(): HasMany
    {
        return $this->hasMany(CatalogItem::class)
            ->orderBy('order')
            ->with(['catalog']);
    }

    public function scopePublic($query)
    {
        return $query->where('published', 1);
    }

    public function scopeOnMain($query)
    {
        return $query->where('on_main', 1);
    }

    public function scopeMainMenu($query)
    {
        return $query->public()->where('parent_id', 0)->orderBy('order');
    }

    public function getUrlAttribute(): string
    {
        if ($this->_url) {
            return $this->_url;
        }
        $path = 'services/' . $this->alias;

        $this->_url = route('default', ['alias' => $path]);

        return $this->_url;
    }

    public function getIsActiveAttribute(): bool
    {
        //берем или весь или часть адреса, для родительских страниц
        $url = substr(URL::current(), 0, strlen($this->getUrlAttribute()));

        return ($url == $this->getUrlAttribute());
    }

    public function siblings()
    {
        return self::whereParentId($this->parent_id);
    }

    public function getParents($with_self = false, $reverse = false): array
    {
        $p = $this;
        $parents = [];
        if ($with_self) {
            $parents[] = $p;
        }
        if (!count($this->_parents) && $this->parent_id > 0) {
            $catalogs = self::getCatalogs();
            while ($p && $p->parent_id > 0) {
                $p = @$catalogs[$p->parent_id];
                $this->_parents[] = $p;
            }
        }
        $parents = array_merge($parents, $this->_parents);
        if ($reverse) {
            $parents = array_reverse($parents);
        }

        return $parents;
    }

    public function findRootCategory($catalog_id = null)
    {
        if (!$catalog_id) {
            $catalog_id = $this->parent_id;
            if ($catalog_id == 0) {
                return $this;
            }
        }

        $this->cur_cat = Catalog::find($catalog_id);

        if ($this->cur_cat->parent_id !== 0) {
            $catalog_id = $this->cur_cat->parent_id;
            $this->findRootCategory($catalog_id);
        }
        return $this->cur_cat;
    }

    public function getBread(): array
    {
        $bread = [];
        $bread[] = [
            'name' => $this->name,
            'url' => $this->url,
        ];
        $catalog = $this;
        while ($catalog = $catalog->parent) {
            $bread[] = [
                'name' => $catalog->name,
                'url' => $catalog->url,
            ];
        }

        $path = '/catalog';
        $bread[] = [
            'name' => 'Каталог',
            'url' => url($path),
        ];
        return array_reverse($bread, true);
    }

    public function getRecurseChildrenIds(self $parent = null): array
    {
        if (!$parent) {
            $parent = $this;
        }
        $ids = Cache::get('ids_' . $this->id, []);
        if (!count($ids)) {
            $ids = self::query()->where('slug', 'like', $parent->slug . '%')
                ->pluck('id')->all();
            Cache::add('ids_' . $this->id, $ids, now()->addMinutes(60));
        }

        return $ids;
    }

    public function getRecurseChildrenIdsInner(self $parent = null): array
    {
        if (!$parent) {
            $parent = $this;
        }
        return self::query()->where('slug', 'like', $parent->slug)
            ->pluck('id')->all();
    }

    public function getRecurseProductsCount(): string
    {
        return Cache::remember(
            'product_count_' . $this->id,
            env('CACHE_TIME', 60),
            function () {
                $ids = $this->getRecurseChildrenIds();
                return Product::whereIn('catalog_id', $ids)->public()->count();
            }
        );
    }

    public function getRecurseProductsCountWithEnd(): string
    {
        $count = Cache::remember(
            'product_count_' . $this->id,
            env('CACHE_TIME', 60),
            function () {
                $ids = $this->getRecurseChildrenIds();
                return Product::whereIn('catalog_id', $ids)->public()->count();
            }
        );
        return $count . ' ' . SiteHelper::getNumEnding($count, ['товар', 'товара', 'товаров']);
    }

    public function getH1(): string
    {
        return $this->h1 ?: $this->name;
    }

    public function getHasChildrenAttribute(): bool
    {
        if ($this->_has_children === null) {
            $this->_has_children = ($this->children()->public()->count()) ? true : false;
        }

        return $this->_has_children;
    }

    public function updateProductCount()
    {
        $ids = $this->getRecurseChildrenIds();
        $count = Product::whereIn('catalog_id', $ids)->public()->count();
        $this->update(['product_count' => $count]);
    }

    public function generateTitle()
    {
        if (!$this->title || $this->title == $this->name) { //Если авто
            $this->title = "{$this->name} купить";
        }
    }

    public function generateDescription()
    {
        if (!$this->description) {
            $this->description = "Купить {$this->name}";
        }
    }

    public function getLastModified(): Carbon
    {
        /** @var Carbon $updated */
        $updated = $this->updated_at;
        $catalog_ids = self::getRecurseCategory($this->id);
        $catalog_ids[] = $this->id;
        $product_updated = Product::whereIn('catalog_id', $catalog_ids)->max('updated_at');
        if ($product_updated) {
            $product_updated = Carbon::createFromFormat("Y-m-d H:i:s", $product_updated, 'Asia/Yekaterinburg');
            return ($updated->gt($product_updated)) ? $updated : $product_updated;
        } else {
            return $updated;
        }
    }

    public function getProducts()
    {
        return $this->products()
            ->orderBy('order')
            ->with(['catalog', 'image'])
            ->get();
    }

    public function getRecurseProducts()
    {
        $ids = self::getRecurseChildrenIds();
        return Product::public()->whereIn('catalog_id', $ids)
            ->orderBy('order');
    }

    public function getImagePathAttribute(): string
    {
        return self::UPLOAD_URL . $this->alias . '/';
    }

    public function getImageSrcAttribute(): string
    {
        return self::UPLOAD_URL . $this->image;
    }

    public function getIconSrcAttribute(): string
    {
        return self::UPLOAD_URL . $this->icon;
    }

    public function getCatalogImage()
    {
        if ($this->single_image()->count()) {
            return $this->single_image->thumb(1);
        } elseif ($this->image) {
            return request()->getSchemeAndHttpHost() . $this->image_src;
        } else {
            return request()->getSchemeAndHttpHost() . self::NO_IMAGE;
        }
    }

    public function getIsLandingAttribute(): bool
    {
        return in_array($this->alias, Page::$landing_aliases);
    }
}
