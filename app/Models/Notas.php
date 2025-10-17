<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;
    protected $table = 'notas';

    protected $fillable = ['id', 'fecha', 'nombre', 'descripcion', 'activo']; 
    protected $casts = ['fecha' => 'date'];

    public function items()
    {
        return $this->hasMany(NotasItems::class, 'nota_id');
    }
}
