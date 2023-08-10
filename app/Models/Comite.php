<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Comite extends Model
{
    protected $fillable = [
        'com_acta',
        'com_estado',
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

    /**
     * The users that belong to the Comite
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'comite_user', 'com_id', 'use_id')->as('ComitexUser');
    }
}