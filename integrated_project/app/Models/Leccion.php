<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leccion extends Model
{
    use HasFactory;

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
}
