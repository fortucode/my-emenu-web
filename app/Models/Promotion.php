<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Promotion
 * 
 * @property int $id_prom
 * @property string $nom_prom
 * @property string $desc_prom
 * @property Carbon $date_deb
 * @property Carbon $date_fin
 * @property int $id_restaurant
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Promotion extends Model
{
	protected $table = 'promotion';
	protected $primaryKey = 'id_prom';

	protected $casts = [
		'date_deb' => 'datetime',
		'date_fin' => 'datetime',
		'id_restaurant' => 'int'
	];

	protected $fillable = [
		'nom_prom',
		'desc_prom',
		'date_deb',
		'date_fin',
		'id_restaurant'
	];
}
