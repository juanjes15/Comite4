<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Numeral extends Model
{
    protected $fillable = [
        'num_descripcion',
        'num_tipoFalta',
        'num_calificacion',
        'art_id',
    ];

    /**
     * Get the articulo that owns the Numeral
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function articulo(): BelongsTo
    {
        return $this->belongsTo(Articulo::class, 'art_id');
    }

    /**
     * The solicitudComites that belong to the Numeral
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function solicitudComites(): BelongsToMany
    {
        return $this->belongsToMany(SolicitudComite::class, 'NormaInfringida', 'num_id', 'sol_id')->as('NormaInfringida');
    }
}