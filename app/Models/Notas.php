<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;
    protected $table = 'notas';

    protected $fillable = ['id','nombre', 'descripcion', 'activo']; 

    public function items()
    {
        return $this->hasMany(NotasItems::class, 'nota_id');
    }
}
