<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    public function proceso(){
        //hasMany{tien mucho} //metodo para dar la primari key
    return $this->belongsTo(ProcesoCrediticio::class);
    }

}
