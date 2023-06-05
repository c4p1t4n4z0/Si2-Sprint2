<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    //asignacion masiva
    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo_plan',
        'precio',
        'estado',
        'caracteristicas',
    ];

    //foy mi primary key
    public function empresas()
    {
        return $this->hasMany(Tenant::class);
    }

    public function beneficios()
    {
        return $this->hasToMany(DetalleBenefio::class);
    }


}
