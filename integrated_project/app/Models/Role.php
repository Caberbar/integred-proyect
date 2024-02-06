<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Asignar un rol a un usuario:
     * 1. Obtienes el rol:
     *      $admin = Role::whereName('Admin')->first();
     * 2. Obtienes el usuario:
     *      $usuario = User::whereName('Mario')->first();
     * 3. Usas attach() para asignarle el rol:
     *      $usuario->roles()->attach($admin);
     */
    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
}
