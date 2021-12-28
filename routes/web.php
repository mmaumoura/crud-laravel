<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\ObservacoesController;


// Rotas funcionários
Route::get('/funcionarios', [FuncionariosController::class, 'index'])->name('funcionarios');
Route::post('/add-funcionarios', [FuncionariosController::class, 'store'])->name('add_funcionarios');
Route::post('/delete-funcionarios/{id}', [FuncionariosController::class, 'destroy'])->name('funcionarios.destroy');
Route::post('/update-funcionarios/{id}', [FuncionariosController::class, 'update'])->name('funcionarios.update');


// Rotas cargos
Route::get('/cargos', [CargosController::class, 'index'])->name('cargos');
Route::post('/add-cargos', [CargosController::class, 'store'])->name('cargos.add');
Route::post('/update-cargos/{id}', [CargosController::class, 'update'])->name('cargos.update');
Route::post('/delete-cargos/{id}', [CargosController::class, 'destroy'])->name('cargos.destroy');
Route::get('/funcionarios-cargo/{id}', [CargosController::class, 'funcionariosCargo'])->name('cargos.funcionarios');


// Rotas observações
Route::get('/observacoes', [ObservacoesController::class, 'index'])->name('observacoes');
Route::post('/add-observacoes', [ObservacoesController::class, 'store'])->name('obs.add');
Route::post('/update-observacoes/{id}', [ObservacoesController::class, 'update'])->name('obs.update');
Route::post('/delete-observacoes/{id}', [ObservacoesController::class, 'destroy'])->name('obs.destroy');

//Rotas Funcionários/Cargo


