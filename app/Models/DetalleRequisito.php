<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleRequisito extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_requisito',
        'id_tipo_credito',
    ];

    public function tipo_credito(){
        return $this->belongsTo(TipoCredito::class);
        }

        public function requisito(){
            return $this->belongsTo(Requisito::class);
            }
}
