<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id_cat
 * @property string $libelle
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'category';
	protected $primaryKey = 'id_cat';

	protected $fillable = [
		'libelle'
	];
}
