<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table = 'vehiculos';
    protected $fillable = ['patente','clave','modelo','marca','anio','cia_id','estado','orden'];

    public function cia(){
        return $this->belongsTo(Cia::class,'cia_id','id');
    }
    public function usuarios(){
        return $this->belongsToMany(Usuario::class)->withTimestamps();
    }
    public function activaciones(){
        return $this->hasMany(Activacion::class,'vehiculo_id','id');
    }
    public function lastActivacion(){

    return $this->activaciones()->where('vehiculo_id',$this->id)->latest('id')->first();

    }
    public function uniActiva(){
      
        if($this->estado=='A'){
            return true;
        }else{
            return false;
        }
    }
}
