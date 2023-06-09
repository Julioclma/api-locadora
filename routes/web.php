<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('livros/livros');
})->name('home');

Route::get('/pessoas', function () {
    return view('pessoas/pessoas');
})->name('pessoas');

Route::get('/livros', function () {
    return view('livros/livros');
})->name('livros');

Route::get('/alugar-livro', function () {
    return view('livros/alugar-livro');
})->name('alugar-livro');

Route::get('/livros-atrasados', function () {
    return view('livros/livros-atrasados');
})->name('livros-atrasados');

Route::get('/livros-devolvidos', function () {
    return view('livros/livros-devolvidos');
})->name('livros-devolvidos');

Route::get('/cadastrar-livro', function () {
    return view('livros/cadastrar-livro');
})->name('cadastrar-livro');

Route::get('/registrar-retirada', function () {
    return view('livros/registrar-retirada');
})->name('registrar-retirada');

Route::get('/cadastro-pessoas', function () {
    return view('pessoas/cadastro-pessoas');
})->name('cadastro-pessoas');