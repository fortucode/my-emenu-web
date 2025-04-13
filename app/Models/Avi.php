<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Avi
 * 
 * @property int $id_avis
 * @property string $contenu
 * @property int $id_restaurant
 * @property int $id_client
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Avi extends Model
{
	protected $table = 'avis';
	protected $primaryKey = 'id_avis';

	protected $casts = [
		'id_restaurant' => 'int',
		'id_client' => 'int'
	];

	protected $fillable = [
		'contenu',
		'id_restaurant',
		'id_client'
	];
}
