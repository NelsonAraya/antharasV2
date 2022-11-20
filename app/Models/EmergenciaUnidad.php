<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergenciaUnidad extends Model
{
    use HasFactory;
    protected $table = 'emergencia_unidad';
    protected $fillable = ['emergencia_id','vehiculo_id'];

    public function emergencia(){
        return $this->belongsTo(Emergencia::class,'emergencia_id','id');
    }

    public function vehiculo(){
        return $this->belongsTo(Vehiculo::class,'vehiculo_id','id');
    }
}
