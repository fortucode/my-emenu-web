<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

// use Carbon\Carbon;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;


/**
 * Class Restaurant
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Restaurant extends Authenticatable
{

	use Notifiable;
	
	protected $table = 'restaurant';

	protected $casts = [
		'email_verified_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function profil()
	{
    	return $this->hasOne(\App\Models\Profil::class, 'id_restaurant', 'id');
	}
	
	public function promotions()
	{
    return $this->hasMany(Promotion::class, 'id_restaurant');
	}

	public function plats()
	{
    return $this->hasMany(Plat::class, 'id_restaurant');
	}

	public function combos()
	{
    return $this->hasMany(Combo::class, 'id_restaurant');
	}



}
