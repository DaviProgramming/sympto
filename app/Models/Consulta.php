<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'sintomas';

    protected $fillable = [
        'id_medico',
        'id_paciente',
        'status_exame',
        'status_consulta',
        'sintomas',
        'exames',
    ];

}
