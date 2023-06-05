<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    use HasFactory;

    public function tipo_creditos(){
        return $this->belongsToMany(TipoCredito::class);
    }
}
