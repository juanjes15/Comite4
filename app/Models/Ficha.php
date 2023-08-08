<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ficha extends Model
{
    protected $fillable = [
        'fic_codigo',
        'fic_inicioLectiva',
        'fic_finLectiva',
        'fic_inicioProductiva',
        'fic_finProductiva',
        'fic_modalidad',
        'fic_jornada',
        'apr_idVocero',
        'pro_id',
        'ins_id',
    ];

    /**
     * Get the programa that owns the Ficha
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function programa(): BelongsTo
    {
        return $this->belongsTo(Programa::class, 'pro_id');
    }

    /**
     * Get all of the aprendizs for the Ficha
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aprendizs(): HasMany
    {
        return $this->hasMany(Aprendiz::class, 'fic_id');
    }

    /**
     * Get the instructor that owns the Ficha
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'ins_id');
    }
}