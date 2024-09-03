<?php
namespace Fanky\Admin\Models;

use App\Classes\SiteHelper;
use App\Traits\HasFile;
use App\Traits\HasH1;
use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Fanky\Admin\Models\Vacancy
 *
 * @property int $id
 * @property string $name
 * @property string|null $text
 * @property string|null $schedule
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $salary
 * @property int $order
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static Builder|Vacancy whereCreatedAt($value)
 * @method static Builder|Vacancy whereId($value)
 * @method static Builder|Vacancy whereOrder($value)
 * @method static Builder|Vacancy whereText($value)
 * @method static Builder|Vacancy whereType($value)
 * @method static Builder|Vacancy whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static Builder|Vacancy newModelQuery()
 * @method static Builder|Vacancy newQuery()
 * @method static Builder|Vacancy query()
 */
class Vacancy extends Model
{
    use HasH1;

    protected $table = 'vacancies';

    protected $guarded = ['id'];

    public function scopePublic($query)
    {
        return $query->where('published', 1);
    }
}
