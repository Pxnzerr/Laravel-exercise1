<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;

// Página inicial (redireciona para login/dash)
Route::get('/', function() {
    return redirect()->route('login');
});

// Rotas de autenticação - recomendamos instalar Breeze (ou outro scaffolding)
// Exemplo: composer require laravel/breeze --dev && php artisan breeze:install

// Rotas protegidas por autenticação
Route::middleware(['auth'])->group(function() {
    Route::resource('products', ProductController::class);
    // Relatórios simples
    Route::get('reports/low-stock', [ReportController::class, 'lowStock'])->name('reports.lowstock');
});

// Caso não haja scaffold de autenticação, remova o middleware 'auth' temporariamente para testar.
