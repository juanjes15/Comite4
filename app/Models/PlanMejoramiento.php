<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanMejoramiento extends Model
{
    use HasFactory;

    protected $table = 'plan_mejoramiento'; 

    protected $fillable = [
        'descripcion',
        'url_documento',
        'email',
        'Area', // Agrega estos campos al $fillable
        'Fecha_inicial',
        'Fecha_final',
        'Instructor_responsable',
        'Objetivo_del_plan',
        'Indicadores_de_desempeno',
    ];
}
