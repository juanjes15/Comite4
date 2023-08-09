<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Aprendiz extends Model
{
    protected $fillable = [
        'apr_identificacion',
        'apr_nombres',
        'apr_apellidos',
        'apr_email',
        'apr_telefono',
        'apr_direccion',
        'apr_fechaNacimiento',
        'fic_id',
    ];

    /**
     * Get the ficha that owns the Aprendiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ficha(): BelongsTo
    {
        return $this->belongsTo(Ficha::class, 'fic_id');
    }

    /**
     * The solicitudComites that belong to the Aprendiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function solicitudComites(): BelongsToMany
    {
        return $this->belongsToMany(SolicitudComite::class, 'SolicitudxAprendiz', 'apr_id', 'sol_id')->as('SolicitudxAprendiz');
    }
}