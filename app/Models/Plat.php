<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Plat
 * 
 * @property int $id_plat
 * @property string $nom_plat
 * @property string $desc_plat
 * @property float $prix
 * @property string $photo_plat
 * @property int $id_restaurant
 * @property int $id_cat
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Plat extends Model
{

	protected $table = 'plat';
	protected $primaryKey = 'id_plat';

	protected $casts = [
		'prix' => 'float',
		'id_restaurant' => 'int',
		'id_cat' => 'int'
	];

	protected $fillable = [
		'nom_plat',
		'desc_plat',
		'prix',
		'photo_plat',
		'id_restaurant',
		'id_cat'
	];
		public function category()
	{
    	return $this->belongsTo(Category::class, 'id_cat', 'id_cat');
	}
}
