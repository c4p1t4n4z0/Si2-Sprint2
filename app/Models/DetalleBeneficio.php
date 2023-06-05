<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleBeneficio extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function plan(){
    return $this->belongsTo(Plan::class);
    }

    public function beneficio(){
        return $this->belongsTo(Beneficio::class);
        }
}
