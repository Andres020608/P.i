<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PdfController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/categoria',CategoriaController::class);
    Route::resource('/producto',ProductoController::class);

    Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');

    //pdf
    Route::get('/pdfproductos', [PdfController::class, 'pdfProductos'])->name('pdf.productos');
});

require __DIR__.'/auth.php';
