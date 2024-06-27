<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoutLog extends Model
{
    use HasFactory;

    protected $table = 'logout_log';

    protected $fillable = [
        'user_id',
        'ip_address',
        'logout_at',
        'device'
    ];
}
