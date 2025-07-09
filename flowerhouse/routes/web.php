<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\EntregaController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');


Route::middleware(['auth', 'auth.admin'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboards.admin'))->name('dashboard');
    Route::resource('fornecedores', FornecedorController::class);
    Route::resource('entregas', EntregaController::class);
    Route::post('entregas/{entrega}/confirmar', [EntregaController::class, 'confirmar'])->name('entregas.confirmar');
    Route::post('entregas/{entrega}/problema', [EntregaController::class, 'relatarProblema'])->name('entregas.problema');
    Route::get('/vendas/relatorio/pdf', [VendaController::class, 'gerarRelatorioPDF'])->name('vendas.relatorio.pdf');

});

Route::middleware(['auth', 'auth.funcionario'])->group(function () {
    Route::get('/dashboard-funcionario', fn() => view('dashboards.funcionario'))->name('dashboard-funcionario');
    Route::resource('entregas', EntregaController::class)->only(['index', 'create', 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('produtos', ProdutoController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('vendas', VendaController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('entregas', EntregaController::class);
}); 
Route::middleware(['auth', 'auth.entregador'])->group(function () {
    Route::get('/dashboard-entregador', fn() => view('dashboards.entregador'))->name('dashboard-entregador');
    Route::post('entregas/{entrega}/confirmar', [EntregaController::class, 'confirmar'])->name('entregas.confirmar');
    Route::post('entregas/{entrega}/problema', [EntregaController::class, 'relatarProblema'])->name('entregas.problema');
    Route::get('entregas/{entrega}/problema', [EntregaController::class, 'formRelatarProblema'])->name('entregas.problema.form'); // ← nova rota

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
