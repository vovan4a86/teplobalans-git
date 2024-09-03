<?php namespace Fanky\Admin\Models;

use App\Traits\HasImage;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Fanky\Admin\Models\Certificate
 *
 * @property int        $id
 * @property string     $image
 * @property string     $name
 * @property int        $order
 * @property-read mixed $src
 * @method static Builder|Certificate whereId($value)
 * @method static Builder|Certificate whereImage($value)
 * @method static Builder|Certificate whereOrder($value)
 * @mixin Eloquent
 * @property-read mixed $image_src
 * @method static Builder|Certificate newModelQuery()
 * @method static Builder|Certificate newQuery()
 * @method static Builder|Certificate query()
 */
class Certificate extends Model {

	use HasImage;

	protected $table = 'certificates';

	protected $guarded = ['id'];

	public $timestamps = false;

	const UPLOAD_URL = '/uploads/certificates/';

	public static $thumbs = [
		1 => '100x200', //admin
		2 => '300x400|fit', //slider
	];

    public function getImageSrcAttribute(): ?string
    {
        return $this->image ? self::UPLOAD_URL . $this->image : null;
    }
}
