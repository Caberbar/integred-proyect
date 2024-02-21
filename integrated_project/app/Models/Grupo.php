<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grupo extends Model
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
        $query->where('denominacion', 'like', '%' . $value . '%')
            ->orWhere('turno', 'like', '%' . $value . '%')
            ->orWhere('curso_escolar', 'like', '%' . $value . '%')
            ->orWhere('curso', 'like', '%' . $value . '%');
    }

    public function scopeSearchFormation($query, $value){
        $query->where('siglas', 'like', '%' . $value . '%');
    }
}
