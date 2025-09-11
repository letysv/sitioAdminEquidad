<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    use HasFactory;
    protected $table = 'biblioteca';

    protected $fillable = ['id','titulo', 'categoria_id']; 

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }

    public function items()
    {
        return $this->hasMany(BibliotecaItems::class, 'biblioteca_id');
    }
}
