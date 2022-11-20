<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergenciaCia extends Model
{
    use HasFactory;
    protected $table = 'emergencia_cia';
    protected $fillable = ['emergencia_id','cia_id'];

    public function emergencia(){
        return $this->belongsTo(Emergencia::class,'emergencia_id','id');
    }
    public function cia(){
        return $this->belongsTo(Cia::class,'cia_id','id');
    }

    
}
