<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCredito extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'interes',
        'monto_maximo',
        'monto_minimo',
        'estado'
    ];

    public function procesos(){
        //hasMany{tien mucho} //metodo para dar la primari key
    return $this->hasMany(ProcesoCrediticio::class);
    }

    public function detalles(){
        return $this->hasMany(DetalleRequisito::class);
    }

}
