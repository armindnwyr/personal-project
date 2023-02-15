<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\ArmindController;
use App\Http\Controllers\GridController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes([
    'register' => false,
]);

Route::middleware(['auth'])->group(function () {
    route::resource('post', PostController::class);
    Route::get('post/{post}', [PostController::class,'publish'])->name('post.publish');
    Route::resource('docente',ArmindController::class);
    Route::get('docente/{docente}', [ArmindController::class, 'imprimir'])->name('docente.imprimir');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', HomeController::class);

Route::get('curso', [CursoController::class, 'index'])->name('curso.index');

Route::get('curso/create', [CursoController::class, 'create'])->name('curso.create');

Route::get('curso/{curso}', [CursoController::class, 'show'])->name('curso.show');



// Route::get('docente',[ArmindController::class,'index'])->name('docente.index');

// Route::get('docente/create',[ArmindController::class,'create'])->name('docente.create');

// Route::post('docente',[ArmindController::class,'store'])->name('docente.store');

// Route::get('docente/{docente}', [CursoController::class, 'show'])->name('docente.show');

// Route::get('docente/{docente}/edit',[ArmindController::class,'edit'])->name('docente.edit');

// Route::put('docente/{docente}',[ArmindController::class,'update'])->name('docente.update');

// Route::delete('docente/{docente}',[ArmindController::class,'destroy'])->name('docente.destroy');

Route::get('users/{id}', function ($id) {
    
});

Route::resource('grids', GridController::class);

Route::get('/search', [ArmindController::class, 'search'])->name('search');

