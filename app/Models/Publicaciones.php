<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    use HasFactory;
    protected $table = 'publicaciones';

    protected $fillable = ['id','titulo', 'apartado_id']; 

    public function items()
    {
        return $this->hasMany(PublicacionesItems::class, 'publicacion_id');
    }

     public function apartado()
    {
        return $this->belongsTo(Apartado::class, 'apartado_id');
    }
}
