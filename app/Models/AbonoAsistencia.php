<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonoAsistencia extends Model
{
    use HasFactory;
    protected $table = 'abono_asistencias';
    protected $fillable = ['cantidad','anio'];
}
