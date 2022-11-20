<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergencia extends Model
{
    use HasFactory;
    protected $table = 'emergencias';
    protected $fillable = ['fecha_emergencia','hora_emergencia','direccion','usuario_id','clave_id','comuna'];

    public function clave(){
        return $this->belongsTo(ClaveEmergencia::class,'clave_id','id');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class,'usuario_id','id');
    }
    
    public function cias(){
        return $this->hasMany(EmergenciaCia::class,'emergencia_id','id');
    }
    public function unidades(){
        return $this->hasMany(EmergenciaUnidad::class,'emergencia_id','id');
    }
    
}
