<?php namespace Fanky\Admin\Models;

use App\Classes\SiteHelper;
use App\Traits\HasH1;
use App\Traits\HasImage;
use App\Traits\HasSeo;
use App\Traits\OgGenerate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Thumb;
use Carbon\Carbon;

/**
 * Fanky\Admin\Models\Service
 *
 * @property int                 $id
 * @property int                 $published
 * @property string              $name
 * @property string|null         $text
 * @property string|null         $h1
 * @property string              $image
 * @property string              $alias
 * @property string              $slug
 * @property string|null         $title
 * @property string|null         $keywords
 * @property string|null         $description
 * @property string|null         $og_title
 * @property string|null         $og_description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null         $deleted_at
 * @property-read mixed          $image_src
 * @property-read mixed          $url
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|Service onlyTrashed()
 * @method static Builder|Service public ()
 * @method static bool|null restore()
 * @method static Builder|Service whereAlias($value)
 * @method static Builder|Service whereCreatedAt($value)
 * @method static Builder|Service whereDate($value)
 * @method static Builder|Service whereDeletedAt($value)
 * @method static Builder|Service whereDescription($value)
 * @method static Builder|Service whereId($value)
 * @method static Builder|Service whereImage($value)
 * @method static Builder|Service whereKeywords($value)
 * @method static Builder|Service whereName($value)
 * @method static Builder|Service wherePublished($value)
 * @method static Builder|Service whereText($value)
 * @method static Builder|Service whereTitle($value)
 * @method static Builder|Service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Service withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Service withoutTrashed()
 * @mixin \Eloquent
 * @method static Builder|Service newModelQuery()
 * @method static Builder|Service newQuery()
 * @method static Builder|Service query()
 * @method static Builder|Service whereH1($value)
 * @method static Builder|Service whereOgDescription($value)
 * @method static Builder|Service whereOgTitle($value)
 */
class Service extends Model {

	use HasImage, HasH1, HasSeo, OgGenerate;

	protected $table = 'services';

	protected $guarded = ['id'];

	const UPLOAD_URL = '/uploads/services/';

	public static $thumbs = [
		1 => '100x200|fit', //admin
		2 => '220x380|fit', //list
	];

	public function scopePublic($query) {
		return $query->where('published', 1);
	}
}
