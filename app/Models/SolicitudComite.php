<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SolicitudComite extends Model
{
    protected $fillable = [
        'sol_lugar',
        'sol_asunto',
        'sol_motivo',
        'sol_estado',
        'ins_id',
    ];

    /**
     * Get the instructor that owns the SolicitudComite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'ins_id');
    }

    /**
     * Get the comite associated with the SolicitudComite
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function comite(): HasOne
    {
        return $this->hasOne(Comite::class, 'sol_id');
    }

    /**
     * Get all of the pruebas for the SolicitudComite
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pruebas(): HasMany
    {
        return $this->hasMany(Prueba::class, 'sol_id');
    }

    /**
     * The aprendizs that belong to the SolicitudComite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function aprendizs(): BelongsToMany
    {
        return $this->belongsToMany(Aprendiz::class, 'solicitud_aprendiz', 'sol_id', 'apr_id')->as('SolicitudxAprendiz');
    }

    /**
     * The numerals that belong to the SolicitudComite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function numerals(): BelongsToMany
    {
        return $this->belongsToMany(Numeral::class, 'norma_infringida', 'sol_id', 'num_id')->as('NormaInfringida');
    }
}