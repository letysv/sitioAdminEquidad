<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesRealizadas extends Model
{
    use HasFactory;
    protected $table = 'actividades_realizadas';

    protected $fillable = ['id','fecha','lugar','descripcion', 'ejercicio_id','periodo_id','actividad_id','activo']; 
    protected $casts = ['fecha' => 'date'];

    public function items()
    {
        return $this->hasMany(ActividadesRealizadasItems::class, 'actividad_id');
    }
    // public function ejercicio()
    // {
    //     return $this->belongsTo(Ejercicio::class, 'ejercicio_id');
    // }
    // public function periodo()
    // {
    //     return $this->belongsTo(Periodos::class, 'periodo_id');
    // }
    public function evento()
    {
        return $this->belongsTo(Eventos::class, 'evento_id');
    }
}
