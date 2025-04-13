<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Profil
 * 
 * @property int $id_profil
 * @property string $type_cuisine
 * @property array $horaire
 * @property string $photo
 * @property string $description
 * @property int $id_restaurant
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Profil extends Model
{
	protected $table = 'profil';
	protected $primaryKey = 'id_profil';

	protected $casts = [
		'horaire' => 'json',
		'id_restaurant' => 'int'
	];

	protected $fillable = [
		'type_cuisine',
		'horaire',
		'photo',
		'description',
		'id_restaurant'
	];
}
