<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informes extends Model
{
    use HasFactory;
    protected $table = 'informes_legislativos';

    protected $fillable = ['id','titulo', 'ejercicio_id','periodo_id','activo']; 

    public function items()
    {
        return $this->hasMany(InformesItems::class, 'informe_id');
    }

    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class, 'ejercicio_id');
    }
    
    public function periodo()
    {
        return $this->belongsTo(Periodos::class, 'periodo_id');
    }
}
