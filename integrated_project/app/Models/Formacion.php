<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Formacion extends Model
{
    use HasFactory;


    protected $fillable = [
        'siglas',
        'denominacion'
    ];

    public function modulos(): HasMany
    {
        return $this->hasMany(Modulo::class);
    }

    public function grupos(): HasMany
    {
        return $this->hasMany(Grupo::class);
    }

    public function scopeSearch($query, $value){
        $query->where('siglas', 'like', '%' . $value . '%')
            ->orWhere('denominacion', 'like', '%' . $value . '%');
    }
}
