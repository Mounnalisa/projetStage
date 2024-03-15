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

    public function create()
    {
        $users = User::all(); // Récupérer tous les utilisateurs disponibles
        return view('admin.taches.create', compact('users'));
    
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:à faire,en cours,à valider,validé',
            'user_id' => 'required|exists:users,id' // Assurez-vous que l'utilisateur sélectionné existe
        ]);
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => $request->user_id // Stocker l'ID de l'utilisateur sélectionné avec la tâche
        ]);

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
        // Valider les données de la requête
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:à faire,en cours,à valider,validé',
        ]);

        // Récupérer la tâche à modifier
        $task = Task::findOrFail($id);

        // Mettre à jour les données de la tâche
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

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
