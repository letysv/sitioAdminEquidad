<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LactanciaItems extends Model
{
    use HasFactory;
    protected $table = 'lactancia_items';
    protected $fillable = ['id', 'archivo', 'lactancia_id'];

    public function lactancia()
    {
        return $this->belongsTo(Lactancia::class, 'lactancia_id');
    }
}
