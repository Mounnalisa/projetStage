<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

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
        return view('admin.taches.create');
    }

    public function store(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:à faire,en cours,à valider,validé',
        ]);

        // Créer une nouvelle tâche
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('admin.taches.index')->with('success', 'La tâche a été ajoutée avec succès.');
    }

    public function edit($id)
    {
        // Récupérer la tâche à modifier
        $task = Task::findOrFail($id);

        // Retourner la vue avec la tâche à modifier
        return view('admin.taches.edit', compact('task'));
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
