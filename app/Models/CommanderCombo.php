<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CommanderCombo
 * 
 * @property int $id
 * @property int $id_com
 * @property int $id_combo
 * @property int $quantite
 * @property string|null $precision
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class CommanderCombo extends Model
{
	protected $table = 'commander_combo';

	protected $casts = [
		'id_com' => 'int',
		'id_combo' => 'int',
		'quantite' => 'int'
	];

	protected $fillable = [
		'id_com',
		'id_combo',
		'quantite',
		'precision'
	];
}
