<?php namespace Fanky\Admin\Models;

use App\Traits\HasImage;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Thumb;

/**
 * Fanky\Admin\Models\ProjectImage
 *
 * @property int        $id
 * @property int        $product_id
 * @property string     $image
 * @property int        $order
 * @property-read mixed $src
 * @method static Builder|ProjectImage whereId($value)
 * @method static Builder|ProjectImage whereImage($value)
 * @method static Builder|ProjectImage whereOrder($value)
 * @method static Builder|ProjectImage whereProductId($value)
 * @mixin Eloquent
 * @property-read mixed $image_src
 * @method static Builder|ProjectImage newModelQuery()
 * @method static Builder|ProjectImage newQuery()
 * @method static Builder|ProjectImage query()
 */
class ProjectImage extends Model {

	use HasImage;
	protected $table = 'project_images';

	protected $guarded = ['id'];

	public $timestamps = false;

	const UPLOAD_URL = '/uploads/projects_images/';

	public static $thumbs = [
		1 => '200x100|fit', //admin
		2 => '513x368|fit', //slider
	];

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }
}
