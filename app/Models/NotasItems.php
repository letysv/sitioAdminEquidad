<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotasItems extends Model
{
    use HasFactory;
    protected $table = 'notas_items';
    protected $fillable = ['id', 'nombre', 'archivo','activo', 'nota_id'];

    public function nota()
    {
        return $this->belongsTo(Notas::class, 'nota_id');
    }
}
