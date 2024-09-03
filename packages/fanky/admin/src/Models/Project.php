<?php namespace Fanky\Admin\Models;

use App\Classes\SiteHelper;
use App\Traits\HasH1;
use App\Traits\HasImage;
use App\Traits\HasSeo;
use App\Traits\OgGenerate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Thumb;
use Carbon\Carbon;

/**
 * Fanky\Admin\Models\Project
 *
 * @property int                 $id
 * @property int                 $published
 * @property string              $h1
 * @property string              $name
 * @property string|null         $announce
 * @property string|null         $text
 * @property string              $image
 * @property string              $alias
 * @property string              $title
 * @property string              $keywords
 * @property string              $description
 * @property string              $og_description
 * @property string              $og_title
 * @property string              $place
 * @property int                 $on_main
 * @property int                 $order
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null         $deleted_at
 * @property-read mixed          $image_src
 * @property-read mixed          $url
 * @method static bool|null forceDelete()
 * @method static Builder|Project onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project public ()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAnnounce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static Builder|Project withTrashed()
 * @method static Builder|Project withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereH1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOgDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOgTitle($value)
 */
class Project extends Model {

    use HasImage, HasSeo, OgGenerate, HasH1;

    protected $table = 'projects';

    protected $guarded = ['id'];

    const UPLOAD_URL = '/uploads/projects/';

    public static $thumbs = [
        1 => '200x100', //admin
        2 => '635x456|fit', //projects list
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)
            ->orderBy('order');
    }

    public function scopePublic($query) {
        return $query->where('published', 1);
    }

    public function getUrlAttribute(): string
    {
        return route('projects.item', ['id' => $this->id]);
    }
}
