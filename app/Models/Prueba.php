<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prueba extends Model
{
    protected $fillable = [
        'pru_tipo',
        'pru_descripcion',
        'pru_url',
        'sol_id',
    ];

    /**
     * Get the solicitudComite that owns the Prueba
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function solicitudComite(): BelongsTo
    {
        return $this->belongsTo(SolicitudComite::class, 'sol_id');
    }
}