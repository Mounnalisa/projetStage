<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\kanbanController;

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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/myTask', [TaskController::class, 'myTask'])->name('myTask.task');

});

Route::middleware(['auth', 'admin'])->group(function () {
    // Routes pour la gestion des collaborateurs
    Route::get('/collaborateurs', [UserController::class, 'index'])->name('index.user');
    Route::get('/collaborateurcreate', [UserController::class, 'create'])->name('create.user');
    Route::post('/collaborateurs', [UserController::class, 'store'])->name('store.user');
    Route::get('/collaborateurs{id}edit', [UserController::class, 'edit'])->name('edit.user');
    Route::put('/collaborateurs{id}', [UserController::class, 'update'])->name('update.user');
    Route::delete('/collaborateurs{id}', [UserController::class, 'destroy'])->name('delete.user');
    Route::get('/collaborateur{id}details', [UserController::class, 'details'])->name('details.user');
    Route::get('/user{id}Tasks', [UserController::class, 'showTasks'])->name('tasks.user');


    // Routes pour la gestion des tâches
    Route::post('/tasks', [TaskController::class, 'store'])->name('store.task');
    Route::get('/task{id}edit', [TaskController::class, 'edit'])->name('edit.task');
    Route::put('/tasks{id}', [TaskController::class, 'update'])->name('update.task');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('delete.task');
    Route::get('/indexTask', [TaskController::class, 'index'])->name('index.task');
    Route::get('/createTask', [TaskController::class, 'create'])->name('create.task');
    Route::get('/task{id}details', [TaskController::class, 'details'])->name('details.task');
    // Route pour afficher la vue d'affectation des tâches
    Route::post('/tasksAffect', [TaskController::class, 'showAffectForm'])->name('affect.task');
    Route::delete('/supprimer-affectation/{taskId}/{userId}' , [TaskController::class, 'suppAffect'])->name('suppAffect.task');
    
    // Route pour traiter l'affectation des tâches
    Route::post('/tasksProcessAffect', [TaskController::class, 'affect'])->name('process.affect.task');
    Route::get('/tasks{id}Users', [TaskController::class, 'showUsers'])->name('users.task');

    Route::delete('/task{taskId}user{userId}', [TaskController::class, 'removeCollaborator'])->name('remove.collaborator');
 
    
});


require __DIR__ . '/auth.php';
