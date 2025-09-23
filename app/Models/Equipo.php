<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipo';

    protected $fillable = ['id','nombre','puesto','telefono','extension','correo']; 

    public function items()
    {
        return $this->hasMany(EquipoItems::class, 'equipo_id');
    }
}
