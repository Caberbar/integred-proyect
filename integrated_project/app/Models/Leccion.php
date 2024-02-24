<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'horas',
        'profesor_id',
        'modulo_id',
        'grupo_id'
    ];

    public function profesor(): BelongsTo
    {
        return $this->belongsTo(Profesor::class);
    }

    public function Modulo(): BelongsTo
    {
        return $this->belongsTo(Modulo::class);
    }

    public function grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo::class);
    }

    public function scopeSearch($query, $value){
        return $query->where('leccions.horas', 'like', '%' . $value . '%')
            ->orWhereHas('profesor', function ($query) use ($value) {
                $query->where('profesors.nombre', 'like', '%' . $value . '%');
            })
            ->orWhereHas('modulo', function ($query) use ($value) {
                $query->where('modulos.denominacion', 'like', '%' . $value . '%');
            })
            ->orWhereHas('grupo', function ($query) use ($value) {
                $query->where('grupos.denominacion', 'like', '%' . $value . '%');
            });
    }
}
