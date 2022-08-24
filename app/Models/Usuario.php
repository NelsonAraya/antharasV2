<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rol','nombres','apellidop','apellidom','telefono','direccion','cia_id','cargo_id','email','fecha_nacimiento','fecha_licencia','estado','fecha_ingreso','operativo','sanguineo_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function nombreSimple(){

        $this->nombres=explode(' ',$this->nombres)[0];

        return ucwords($this->nombres.' '.$this->apellidop.' '.$this->apellidom);
    }
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function runCompleto() {
        return number_format($this->id, 0,'.','.') . '-' . $this->dv;
    }
    public function cia(){
        return $this->belongsTo(Cia::class,'cia_id','id');
    }
    public function cargo(){
        return $this->belongsTo(Cargo::class,'cargo_id','id');
    }
    public function vehiculos(){
        return $this->belongsToMany(Vehiculo::class)->withTimestamps();
    }
    public function especialidades(){
        return $this->belongsToMany(Especialidad::class)->withTimestamps();
    }
    public function enfermedades(){
        return $this->belongsToMany(Enfermedad::class)->withTimestamps();
    }
    public function grupoSanguineo(){
        return $this->belongsTo(GrupoSanguineo::class,'sanguineo_id','id');
    }
    public function edad() {
        list($Y,$m,$d) = explode("-",$this->fecha_nacimiento);
        return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
    }
    public function fichaClinica() {
        return $this->hasOne(FichaClinica::class,'usuario_id','id');
    }

}
