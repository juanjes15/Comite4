<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Articulo extends Model
{
    protected $fillable = [
        'art_numero',
        'art_descripcion',
        'cap_id',
    ];

    /**
     * Get all of the numerals for the Articulo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function numerals(): HasMany
    {
        return $this->hasMany(Numeral::class, 'art_id');
    }

    /**
     * Get the capitulo that owns the Articulo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function capitulo(): BelongsTo
    {
        return $this->belongsTo(Capitulo::class, 'cap_id');
    }
}