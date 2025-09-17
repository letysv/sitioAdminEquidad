<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EfemeridesItems extends Model
{
    use HasFactory;
    protected $table = 'efemerides_items';
    protected $fillable = ['id', 'efemeride_id', 'archivo'];

    public function efemeride()
    {
        return $this->belongsTo(Efemerides::class, 'efemeride_id');
    }
}
