<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Efemerides extends Model
{
    use HasFactory;
    protected $table = 'efemerides';

    protected $fillable = ['id','nombre', 'fecha']; 
    protected $casts = ['fecha' => 'date'];

    public function items()
    {
        return $this->hasMany(EfemeridesItems::class, 'efemeride_id');
    }
}
