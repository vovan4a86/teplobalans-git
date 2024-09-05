<?php namespace Fanky\Admin\Models;

use App\Classes\SiteHelper;
use App\Traits\HasH1;
use App\Traits\HasImage;
use App\Traits\HasSeo;
use App\Traits\OgGenerate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Thumb;
use Carbon\Carbon;

/**
 * @property int|mixed $order
 * @property int|mixed $published
 */
class PriceSectionTable extends Model {

	protected $guarded = ['id'];

    public function section(): BelongsTo
    {
        return $this->belongsTo(PriceSection::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(PriceSectionItem::class)->orderBy('order');
    }

}
