<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCredito extends Model
{
    use HasFactory;

    // protected $table = 'TipoCreditos';
    // protected $fillable = [
    //     'nombre',
    //     'descripcion',
    // ];

    //que ahce esto
    // public function requisitos(){
    //     return $this->hasMany('App\Models\requisitos', 'id_TipoCredito', 'id');
    // }

    public function procesos(){
        //hasMany{tien mucho} //metodo para dar la primari key
    return $this->hasMany(ProcesoCrediticio::class);
    }

    //un tipo de credito tiene muchos requisitos
    public function requisitos(){
        return $this->belongsToMany(Requisito::class);
    }

}
