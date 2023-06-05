<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesoCrediticio extends Model
{
    use HasFactory;

    public function empleado(){
     return $this->belongsTo(Empleado::class);
    }

    public function cliente(){
    return $this->belongsTo(Cliente::class);
    }

    public function tipo_credito(){
    return $this->belongsTo(TipoCredito::class);
    }

    public function documentos(){
        //hasMany{tien mucho} //metodo para dar la primari key
    return $this->hasMany(Documento::class);
    }
}
