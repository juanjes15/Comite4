<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SolicitudxAprendiz extends Model
{
    protected $table = 'solicitud_aprendiz';
    protected $fillable = [
        'id',
        'sol_id',
        'apr_id',

    ];
    public function aprendizs(): BelongsToMany
    {
        return $this->belongsToMany(Aprendiz::class, 'solicitud_aprendiz', 'sol_id', 'apr_id')->as('SolicitudxAprendiz');
    }
    public function solicitudComites(): BelongsToMany
    {
        return $this->belongsToMany(SolicitudComite::class, 'solicitud_aprendiz', 'apr_id', 'sol_id')->as('SolicitudxAprendiz');
    }

}
