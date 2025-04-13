<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CommanderPlat
 * 
 * @property int $id
 * @property int $id_com
 * @property int $id_plat
 * @property int $quantite
 * @property string|null $precision
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class CommanderPlat extends Model
{
	protected $table = 'commander_plat';

	protected $casts = [
		'id_com' => 'int',
		'id_plat' => 'int',
		'quantite' => 'int'
	];

	protected $fillable = [
		'id_com',
		'id_plat',
		'quantite',
		'precision'
	];
}
