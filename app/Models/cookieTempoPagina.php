<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cookieTempoPagina extends Model
{
    use HasFactory;

    protected $table = 'cookie_pagina';

    protected $fillable = [
        'ip_address',
        'user_id',
        'pagina',
        'tempo_pagina',
    ];
}
