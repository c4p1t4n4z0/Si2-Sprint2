<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guard =[];

    public function empleados(){
        //hasMany{tien mucho} //metodo para dar la primari key
    return $this->hasMany(Empleado::class);
    }
}
