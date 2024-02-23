<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profesor extends Model
{
    use HasFactory;


    protected $fillable = [
        'use_seneca',
        'nombre',
        'apellido1',
        'apellido2',
        'especialidad',
    ];

    public function lecciones(): HasMany
    {
        return $this->hasMany(Leccion::class);
    }

    public function scopeSearch($query, $value){
        $query->where('nombre', 'like', '%' . $value . '%')
            ->orWhere('apellido1', 'like', '%' . $value . '%')
            ->orWhere('apellido2', 'like', '%' . $value . '%')
            ->orWhere('usu_seneca', 'like', '%' . $value . '%')
            ->orWhere('especialidad', 'like', '%' . $value . '%');
    }
}
