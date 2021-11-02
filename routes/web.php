<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, 'index']);

Route::get('/login', [AccountController::class, 'index']);
Route::post('/login', [AccountController::class, 'authenticate']);
Route::get('/logout', [AccountController::class, 'logout']);

Route::get('/customers', [CustomerController::class, 'customers']); // Exibe todos os Clientes

Route::get('/cliente', [CustomerController::class, 'criar_cliente']); // Cadastro de novo cliente.
Route::post('/cliente', [CustomerController::class, 'criar_cliente_action']); // Cadastro de novo cliente.

Route::get('/cliente_edit/{id}', [CustomerController::class, 'editar_cliete']); // Edição de um cliente já existente.
Route::post('/cliente_edit', [CustomerController::class, 'editar_cliete_acton']); // Edição de um cliente já existente.

Route::get('/cliente_delete/{id}', [CustomerController::class, 'remover_cliente']); // Remoção de um cliente existente.

Route::get('/cliente_perfil/{id}', [CustomerController::class, 'consultar_cliente']); // Consulta de dados de um cliente.

Route::get('/search', [CustomerController::class, 'consultar_placa']); // Consulta de todos os clientes cadastrados na base, onde o último número da placa do carro é igual ao informado.

require __DIR__.'/auth.php';
