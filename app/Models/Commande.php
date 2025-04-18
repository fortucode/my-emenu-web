<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Commande
 * 
 * @property int $id_com
 * @property Carbon $date
 * @property string $statut
 * @property int $id_client
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Commande extends Model
{
	protected $table = 'commande';
	protected $primaryKey = 'id_com';

	protected $casts = [
		'date' => 'datetime',
		'id_client' => 'int'
	];

	protected $fillable = [
		'date',
		'statut',
		'id_client'
	];
}
