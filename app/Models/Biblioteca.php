<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    use HasFactory;
    protected $table = 'bliblioteca';

    protected $fillable = ['id','titulo']; 

    public function items()
    {
        return $this->hasMany(BibliotecaItems::class, 'bliblioteca_id');
    }
}
