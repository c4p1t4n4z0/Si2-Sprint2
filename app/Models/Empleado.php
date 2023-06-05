<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user(){
        ///metodo para recibir la foreing key
    return $this->belongsTo(User::class);
    }

    public function area(){
        ///metodo para recibir la foreing key
    return $this->belongsTo(Area::class);
    }

     public function procesos(){
        //hasMany{tien mucho} //metodo para dar la primari key
    return $this->hasMany(ProcesoCrediticio::class);
    }
}
