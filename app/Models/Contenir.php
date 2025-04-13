<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Contenir
 * 
 * @property int $id
 * @property int $id_combo
 * @property int $id_plat
 * @property int $quantite
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Contenir extends Model
{
	protected $table = 'contenir';

	protected $casts = [
		'id_combo' => 'int',
		'id_plat' => 'int',
		'quantite' => 'int'
	];

	protected $fillable = [
		'id_combo',
		'id_plat',
		'quantite'
	];
}
