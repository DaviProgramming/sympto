<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas';

    protected $fillable = [
        'id_medico',
        'id_paciente',
        'status_exames',
        'status_consulta',
        'sintomas',
        'exames',
    ];

}
