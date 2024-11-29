<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', // Campo rellenable
    ];

    // Relación inversa con User
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
