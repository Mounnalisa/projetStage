<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        // Récupérer toutes les tâches
        $tasks = Task::all();

        // Passer les tâches à la vue
        return view('admin.taches.index', compact('tasks'));
    }
    // public function tache_a_valider()
    // {
    //     // Récupérer toutes les tâches
    //     $tasks = Task::all();

    //     // Passer les tâches à la vue
    //     return view('admin.taches.tache_a_valider', compact('tasks'));
    // }

    public function create()
    {
        
        $users = User::all(); // Récupérer tous les utilisateurs disponibles
        return view('admin.taches.create', compact('users'));
        
    }

    public function store(Request $request)
     { 
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->user_id = $request->user_id;
        $task->save();
       

        return redirect()->route('admin.taches.index')->with('success', 'La tâche a été ajoutée avec succès.');
    }

    // Autres méthodes pour éditer et supprimer une tâche...
    

    public function edit($id)
    {
        // Récupérer la tâche à modifier
        $task = Task::findOrFail($id);
        $users = User::all(); // Récupérer tous les utilisateurs disponibles

        // Retourner la vue avec la tâche à modifier
        return view('admin.taches.edit', compact('task','users'));
    }

    public function update(Request $request, $id)
    {
        // Récupérer la tâche à modifier
        $task = Task::findOrFail($id);

        // Mettre à jour les données de la tâche
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = $request->user_id;
        $task->save();
       

        // Rediriger avec un message de succès
        return redirect()->route('admin.taches.index')->with('success', 'La tâche a été mise à jour avec succès.');
    }

    public function destroy($id)
    {
        // Récupérer la tâche à supprimer
        $task = Task::findOrFail($id);

        // Supprimer la tâche
        $task->delete();

        // Rediriger avec un message de succès
        return redirect()->route('admin.taches.index')->with('success', 'La tâche a été supprimée avec succès.');
    }
}
