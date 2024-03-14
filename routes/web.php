<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/tasks/index', [TaskController::class, 'index'])->name('admin.taches.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('admin.taches.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('admin.taches.store');

    // Route pour afficher la liste des collaborateurs
    Route::get('/collaborateurs', [UserController::class, 'index'])->name('admin.collaborateurs.index');
    // Route pour afficher le formulaire d'ajout d'un collaborateur
    Route::get('/collaborateurs/create', [UserController::class, 'create'])->name('admin.collaborateurs.create');
    // Route pour traiter l'ajout d'un collaborateur
    Route::post('/collaborateurs', [UserController::class, 'store'])->name('admin.collaborateurs.store');

    // Route pour afficher le formulaire d'édition d'un collaborateur
    Route::get('/collaborateurs/{id}/edit', [UserController::class, 'edit'])->name('edit.collaborator');

    // Route pour mettre à jour les informations d'un collaborateur
    Route::put('/collaborateurs/{id}', [UserController::class, 'update'])->name('update.collaborator');

    // Route pour supprimer un collaborateur
    Route::delete('/collaborateurs/{id}', [UserController::class, 'destroy'])->name('delete.collaborator');

    Route::post('/tasks', [TaskController::class, 'store'])->name('admin.taches.store');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('edit.task');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('update.task');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('delete.task');
});

require __DIR__ . '/auth.php';
