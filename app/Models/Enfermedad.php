<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    use HasFactory;
    protected $table = 'enfermedades';
    protected $fillable = ['id','nombre'];

    public function usuarios(){
        return $this->belongsToMany(Usuario::class)->withTimestamps();
    }
}
