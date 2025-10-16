<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lactancia extends Model
{
    use HasFactory;
    protected $table = 'lactancia';

    protected $fillable = ['id','descripcion']; 

    public function items()
    {
        return $this->hasMany(LactanciaItems::class, 'lactancia_id');
    }
}
