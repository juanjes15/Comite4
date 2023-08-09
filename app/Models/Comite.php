<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comite extends Model
{
    protected $fillable = [
        'com_acta',
        'com_estado',
        'com_fecha',
        'com_recomendacion',
        'sol_id',
    ];

    /**
     * Get the solicitudComite that owns the Comite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function solicitudComite(): BelongsTo
    {
        return $this->belongsTo(SolicitudComite::class, 'sol_id');
    }
}