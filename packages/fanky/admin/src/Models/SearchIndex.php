<?php namespace Fanky\Admin\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Fanky\Admin\Models\SearchIndex
 *
 * @property string $name
 * @property string|null $text
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $announce
 * @method static \Illuminate\Database\Eloquent\Builder|\Fanky\Admin\Models\SearchIndex newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Fanky\Admin\Models\SearchIndex newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Fanky\Admin\Models\SearchIndex query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Fanky\Admin\Models\SearchIndex whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Fanky\Admin\Models\SearchIndex whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Fanky\Admin\Models\SearchIndex whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Fanky\Admin\Models\SearchIndex whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Fanky\Admin\Models\SearchIndex whereUrl($value)
 * @mixin \Eloquent
 */
class SearchIndex extends Model {

	protected $primaryKey = null;
	protected $fillable = ['product_id', 'name', 'article', 'text', 'url'];
	public $incrementing = false;

    public function getAnnounce($search) {
		$text = strip_tags($this->text);
		$text = str_replace(["\n", "\r", "\t"], '', $text);
		$pos = mb_stripos(Str::lower($text), Str::lower($search));
		if($pos === false){
			return $this->announce;
		} else {
			$start = max(0, $pos - 150);
			$length = Str::length($search) + 250;
			$substr = Str::substr($text, $start, $pos-$start) . '<b>';
			$substr .= Str::substr($text, $pos, Str::length($search)) . '</b>';
			$substr .= Str::substr($text, $pos + Str::length($search), 50);

			$substr = trim($substr);

			if($start > 0) $substr = '..' . $substr;
			if($pos + $length < Str::length($text)) $substr .= '..';
			return $substr;
		}
	}

	public static function update_index() {
		//clear_all;
		$item = new self();
		$table = $item->getTable();

		try{
			DB::beginTransaction();

			DB::table($table)->delete();

			$catalogs = Catalog::wherePublished(1)->get();
			foreach ($catalogs as $catalog){
				foreach ($catalog->products()->public()->get() as $product){
					self::create([
						'product_id'	=> $product->id,
						'name'	=> $product->name,
						'url' 	=> $product->url
					]);
				}
			}

			DB::commit();

		} catch (\Exception $e){
			DB::rollBack();
		}

	}

	public function getAnnounceAttribute(): string
    {
		$text = strip_tags($this->text);

		return Str::words($text, 50);
	}
}
