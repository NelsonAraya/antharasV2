<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaveEmergencia extends Model
{
    use HasFactory;
    protected $table = 'clave_emergencias';
    protected $fillable = ['clave','descripcion','estado','tipo'];
}
