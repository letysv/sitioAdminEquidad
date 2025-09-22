<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesRealizadasItems extends Model
{
    use HasFactory;
    protected $table = 'actividades_realizadas_items';
    protected $fillable = ['id', 'archivo','actividad_id'];

    public function actividadRealizada()
    {
        return $this->belongsTo(ActividadesRealizadas::class, 'actividad_id');
    }
}
