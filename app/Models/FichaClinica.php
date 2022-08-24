<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaClinica extends Model
{
    use HasFactory;
    protected $table = 'ficha_clinicas';
    protected $fillable = ['peso','talla','imc','quirurgicos','alergias','tratamientos','otras','contacto1','fono1','contacto2','fono2'];

    public function usuario(){
        return $this->belongsTo(Usuario::class,'usuario_id','id');
    }
}
