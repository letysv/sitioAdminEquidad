<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformesItems extends Model
{
    use HasFactory;
    protected $table = 'informes_legislativos_items';
    protected $fillable = ['id', 'archivo','informe_id'];

    public function informe()
    {
        return $this->belongsTo(Informes::class, 'informe_id');
    }
}
