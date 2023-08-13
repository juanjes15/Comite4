<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Capitulo extends Model
{
    protected $fillable = [
        'cap_numero',
        'cap_descripcion',
    ];

    /**
     * Get all of the articulos for the Capitulo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articulos(): HasMany
    {
        return $this->hasMany(Articulo::class, 'cap_id');
    }
}