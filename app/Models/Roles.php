<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

// class Roles extends Model
class Roles extends SpatieRole
{
    use HasFactory;
    protected $fillable = ['name', 'guard_name'];
}
