<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'id_plan',
    ];

    //recibo la primary key de plan
      public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
