<?php

use App\Http\Controllers\AluguelLivrosController;
use App\Http\Controllers\ApiSeriesController;
use App\Http\Controllers\LivrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//persons / users
Route::get('/persons', [ApiSeriesController::class, 'index'])->name('persons');

Route::post('/persons', [ApiSeriesController::class, 'create'])->name('persons');

Route::put('/persons/{id}', [ApiSeriesController::class, 'update'])->name('persons');

Route::delete('/persons/{id}', [ApiSeriesController::class, 'destroy'])->name('persons');

// livros
Route::get('/livros', [LivrosController::class, 'index'])->name('livros');

Route::post('/livros', [LivrosController::class, 'store'])->name('livros');

Route::put('/livros/{id}', [LivrosController::class, 'update'])->name('livros');

Route::delete('/livros/{id}', [LivrosController::class, 'destroy'])->name('livros');

// aluguel livros
Route::get('/aluguel-livros', [AluguelLivrosController::class, 'index'])->name('aluguel-livros');

Route::post('/aluguel-livros', [AluguelLivrosController::class, 'store'])->name('aluguel-livros');

Route::put('/aluguel-livros/{id}', [AluguelLivrosController::class, 'update'])->name('aluguel-livros');

Route::delete('/aluguel-livros/{id}', [AluguelLivrosController::class, 'destroy'])->name('aluguel-livros');