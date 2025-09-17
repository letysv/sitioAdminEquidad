<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibliotecaItems extends Model
{
    use HasFactory;
    protected $table = 'biblioteca_items';
    protected $fillable = ['id','archivo', 'archivoImage', 'activo', 'biblioteca_id'];

    public function biblioteca()
    {
        return $this->belongsTo(Biblioteca::class, 'biblioteca_id');
    }
}
