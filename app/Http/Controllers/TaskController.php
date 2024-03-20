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
        $users = User::all();

        // Passer les tâches à la vue
        return view('admin.taches.index', compact('tasks', 'users'));
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


        return redirect()->route('index.task')->with('success', 'La tâche a été ajoutée avec succès.');
    }

    // Autres méthodes pour éditer et supprimer une tâche...

    public function details($id)
    {
        $task = Task::findOrFail($id);
        $users = User::all();
        return view('admin.taches.details', compact('task', 'users'));
    }
    public function showUsers($id)
    {
        $task = Task::findOrFail($id);
        $users = User::all();
        return view('admin.taches.usersTask', compact('task', 'users'));
    }

    public function edit($id)
    {
        // Récupérer la tâche à modifier
        $task = Task::findOrFail($id);
        $users = User::all(); // Récupérer tous les utilisateurs disponibles

        // Retourner la vue avec la tâche à modifier
        return view('admin.taches.edit', compact('task', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Récupérer la tâche à modifier
        $task = Task::findOrFail($id);

        // Mettre à jour les données de la tâche
        $task->title = $request->title;
        $task->description = $request->description;
        $task->user_id = $request->user;
        $task->save();


        // Rediriger avec un message de succès
        return redirect()->route('index.task')->with('success', 'La tâche a été mise à jour avec succès.');
    }

    public function destroy($id)
    {
        // Récupérer la tâche à supprimer
        $task = Task::findOrFail($id);

        // Supprimer la tâche
        $task->delete();

        // Rediriger avec un message de succès
        return redirect()->route('index.task')->with('success', 'La tâche a été supprimée avec succès.');
    }

    // Méthode pour afficher la vue d'affectation des tâches
    public function showAffectForm(Request $request)
    {
        $selectedTaskIds = $request->input('selected_tasks', []);

        // Vérifier si des tâches sont sélectionnées
        if (empty ($selectedTaskIds)) {
            // Aucune tâche sélectionnée, vous pouvez choisir de gérer cela ici
            // Par exemple, rediriger vers une autre page avec un message d'erreur
            return redirect()->route('index.task')->with('error', 'Veuillez sélectionner au moins une tâche.');
        }

        $selectedTasks = Task::whereIn('id', $selectedTaskIds)->get();
        $users = User::all();

        return view('admin.taches.affect', compact('selectedTasks', 'users'));
    }

    public function suppAffect($taskId, $userId)
    {
        // Recherche de la tâche et de l'utilisateur
        $task = Task::findOrFail($taskId);
        $user = User::findOrFail($userId);

        // Supprimer l'affectation de la tâche à l'utilisateur
        $task->user()->dissociate();
        $task->save();

        return redirect()->back()->with('success', 'Affectation supprimée avec succès.');
    }

    //Méthode pour traiter l'affectation des tâches aux utilisateurs sélectionnés
    public function affect(Request $request)
    {
        // Valider les données reçues du formulaire
        $request->validate([
            'selected_tasks' => 'required|array', // Au moins une tâche doit être sélectionnée
            'selected_users' => 'required|array', // Au moins un utilisateur doit être sélectionné
        ]);

        // Récupérer les IDs des tâches sélectionnées et des utilisateurs sélectionnés
        $taskIds = $request->input('selected_tasks');
        $userIds = $request->input('selected_users');

        // Charger les tâches et les utilisateurs à partir des IDs
        $tasks = Task::whereIn('id', $taskIds)->get();
        $users = User::whereIn('id', $userIds)->get();

        // Affecter chaque tâche à chaque utilisateur sélectionné
        foreach ($tasks as $task) {
            $existingUserIds = $task->users()->pluck('user_id')->toArray();

            // Filtrer les IDs des utilisateurs sélectionnés pour éviter les doublons
            $filteredUserIds = array_diff($userIds, $existingUserIds);

            // Attacher les utilisateurs restants à la tâche
            $task->users()->attach($filteredUserIds);
        }

        return redirect()->route('index.task');
    }
}
