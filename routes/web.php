<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sintoma;
use App\Models\Consulta;

use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaginaController;


Route::get('/', [PaginaController::class, 'home'])->name('pagina.home');
Route::get('/login', [PaginaController::class, 'login'])->name('pagina.login');
Route::get('/nova-consulta', [PaginaController::class, 'novaConsulta'])->name('pagina.nova-consulta');


Route::post('/evento/login', [EventoController::class, 'login'])->name('evento.login');
Route::post('/evento/logout', [EventoController::class, 'logout'])->name('evento.logout');
Route::post('/evento/nova-consulta', [EventoController::class, 'novaConsulta'])->name('evento.nova-consulta');