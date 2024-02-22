<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Modulo extends Model
{
    use HasFactory;

    public function lecciones(): HasMany
    {
        return $this->hasMany(Leccion::class);
    }

    public function formacion(): BelongsTo
    {
        return $this->belongsTo(Formacion::class);
    }

    public function scopeSearch($query, $value){
        return $query->where('modulos.curso', 'like', '%' . $value . '%')
            ->orWhere('modulos.especialidad', 'like', '%' . $value . '%')
            ->orWhere('modulos.denominacion', 'like', '%' . $value . '%')
            ->orWhere('modulos.siglas', 'like', '%' . $value . '%')
            ->orWhere('modulos.horas', 'like', '%' . $value . '%')
            ->orWhereHas('formacion', function ($query) use ($value) {
                $query->where('formacions.siglas', 'like', '%' . $value . '%');
            });
    }
}
