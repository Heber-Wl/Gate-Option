<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'home'])->name('index');
Route::get('/cadastre-se', [LoginController::class, 'cadastroLogin'])->name('cadastroLogin');
Route::post('/cadastar-usuario', [LoginController::class, 'cadastrarUsuario'])->name('cadastrarUsuario');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-envio', [LoginController::class, 'verificarLogin'])->name('verificarLogin');

Route::middleware('auth')->group(function () {
    Route::get('/pagina-inicial', [LoginController::class, 'pgInicial'])->name('pagina-inicial');
    Route::post('/depositar', [LoginController::class, 'depositar'])->name('depositar');
    Route::get('/mercado-empresas', [LoginController::class, 'mercado'])->name('mercado');
    Route::get('/transacoes', [LoginController::class, 'transacoes'])->name('transacoes');
    Route::get('/investir', [LoginController::class, 'investir'])->name('investir');
    Route::post('/investir-empresa', [LoginController::class, 'investirEmpresa'])->name('investirEmpresa');
});
