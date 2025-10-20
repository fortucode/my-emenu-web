<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valider extends Model
{
    use HasFactory;
     protected $table = 'valider';

    protected $fillable = [
        'id_com',
        'id_plat',
        'id_combo',
        'quantite',
        'precision'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'id_com');
    }

    public function plat()
    {
        return $this->belongsTo(Plat::class, 'id_plat');
    }

    public function combo()
    {
        return $this->belongsTo(Combo::class, 'id_combo');
    }

}
