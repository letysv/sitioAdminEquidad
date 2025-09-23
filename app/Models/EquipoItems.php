<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoItems extends Model
{
    use HasFactory;
    protected $table = 'equipo_items';
    protected $fillable = ['id','archivo','equipo_id'];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
}
