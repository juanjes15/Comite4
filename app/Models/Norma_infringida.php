<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Norma_Infringida extends Model
{
    protected $table = 'norma_infringida';
    protected $fillable = [
        'id',
        'sol_id',
        'num_id',

    ];


}
