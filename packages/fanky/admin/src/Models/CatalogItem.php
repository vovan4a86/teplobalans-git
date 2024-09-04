<?php namespace Fanky\Admin\Models;

use App\Traits\HasImage;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Thumb;

/**
 * Fanky\Admin\Models\CatalogItem
 *
 * @property int        $id
 * @property int        $catalog_id
 * @property string     $icon
 * @property string     $title
 * @property string     $list
 * @property int        $order
 * @property-read mixed $src
 * @method static Builder|CatalogItem whereId($value)
 * @method static Builder|CatalogItem whereIcon($value)
 * @method static Builder|CatalogItem whereOrder($value)
 * @method static Builder|CatalogItem whereCatalogId($value)
 * @mixin Eloquent
 * @property-read mixed $image_src
 * @method static Builder|CatalogItem newModelQuery()
 * @method static Builder|CatalogItem newQuery()
 * @method static Builder|CatalogItem query()
 */
class CatalogItem extends Model {

	use HasImage;
	protected $table = 'catalog_items';

	protected $guarded = ['id'];

	public $timestamps = false;

	const UPLOAD_URL = '/uploads/services/items/';

    public function catalog(): BelongsTo
    {
        return $this->belongsTo(Catalog::class)->withDefault();
    }
}
