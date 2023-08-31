<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Programa extends Model
{
    protected $fillable = [
        'pro_codigo',
        'pro_nombre',
        'pro_nivelFormacion',
    ];

    /**
     * Get all of the fichas for the Programa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fichas(): HasMany
    {
        return $this->hasMany(Ficha::class, 'pro_id');
    }
}
