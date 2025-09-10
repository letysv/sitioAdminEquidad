<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicacionesItems extends Model
{
    use HasFactory;
    protected $table = 'publicaciones_items';
    protected $fillable = ['id', 'publicacion_id', 'archivo', 'activo'];

    public function publicacion()
    {
        return $this->belongsTo(Publicaciones::class, 'publicacion_id');
    }
}
