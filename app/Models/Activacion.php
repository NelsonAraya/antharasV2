<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activacion extends Model
{
    use HasFactory;
    protected $table = 'activacions';
    protected $fillable = ['usuario_id','vehiculo_id','estado','usuario_cambio_id','tipo_activacion'];

    public function horaActivacion(){
    	return date('d-m-Y H:i:s',strtotime($this->created_at)); 
    }
    public function vehiculo(){
        return $this->belongsTo(Vehiculo::class,'vehiculo_id','id');
    }
    
    public function usuario(){
        return $this->belongsTo(Usuario::class,'usuario_id','id');
    }
    public function usuarioCambio(){
        return $this->belongsTo(Usuario::class,'usuario_cambio_id','id');
    }
}
