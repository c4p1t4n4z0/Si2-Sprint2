<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
    ];


    public function planes(){
        ///metodo para recibir la foreing key
    return $this->hasMany(DetalleBenefio::class);
    }


}
