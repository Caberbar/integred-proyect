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
        $query->where('curso', 'like', '%' . $value . '%')
            ->orWhere('especialidad', 'like', '%' . $value . '%')
            ->orWhere('denominacion', 'like', '%' . $value . '%')
            ->orWhere('siglas', 'like', '%' . $value . '%')
            ->orWhere('horas', 'like', '%' . $value . '%');
    }
}
