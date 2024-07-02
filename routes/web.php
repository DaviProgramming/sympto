<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\CookieController;


Route::get('/', [PaginaController::class, 'home'])->name('pagina.home');
Route::get('/login', [PaginaController::class, 'login'])->name('pagina.login');
Route::get('/nova-consulta', [PaginaController::class, 'novaConsulta'])->name('pagina.nova-consulta');
Route::get('/historico-consulta',[PaginaController::class, 'consultasAgendadas'])->name('pagina.consultasAgendadas');

Route::post('/evento/login', [EventoController::class, 'login'])->name('evento.login');
Route::post('/evento/logout', [EventoController::class, 'logout'])->name('evento.logout');
Route::post('/evento/cadastro', [EventoController::class, 'cadastro'])->name('evento.cadastro');

Route::post('/evento/nova-consulta', [ConsultaController::class, 'novaConsulta'])->name('evento.nova-consulta');

Route::post('/cookie/tempo-pagina', [CookieController::class, 'tempoPagina'])->name('cookie.tempo-pagina');