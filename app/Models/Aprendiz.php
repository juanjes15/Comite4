<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'apr_pruImpugnacion',
        'apr_fechaImpugnacion',
        'apr_motivoImpugnacion',

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
        return $this->belongsToMany(SolicitudComite::class, 'solicitud_aprendiz', 'apr_id', 'sol_id')->as('SolicitudxAprendiz');
    }

    /**
     * Get the user associated with the Aprendiz
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'apr_id');
    }
}
