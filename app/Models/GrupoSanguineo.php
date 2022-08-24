<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoSanguineo extends Model
{
    use HasFactory;
    protected $table = 'grupo_sanguineos';
    protected $fillable = ['id','nombre'];

    public function usuarios(){
        return $this->hasMany(Usuario::class,'sanguineo_id','id');
    }
}
