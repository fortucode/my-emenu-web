<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;

/**
 * Class Combo
 * 
 * @property int $id_combo
 * @property string $nom_combo
 * @property string $desc_combo
 * @property float $prix_special
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Combo extends Model
{
	protected $table = 'combo';
	protected $primaryKey = 'id_combo';
	public $incrementing = true;
    protected $keyType = 'int';

	protected $casts = [
		'prix_special' => 'float'
	];

	protected $fillable = [
		'nom_combo',
		'desc_combo',
		'prix_special',
		'id_restaurant'
	];

	public function plats()
	{
    	return $this->belongsToMany(Plat::class, 'contenir', 'id_combo', 'id_plat')
                ->withPivot('quantite')
                ->withTimestamps();
	}

}
