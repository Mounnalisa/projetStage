<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Récupérer toutes les tâches
        $users = User::all();

        // Passer les tâches à la vue
        return view('admin.collaborateurs.index', compact('users'));
    }


    public function create()
    {
        return view('admin.collaborateurs.create');
    }

    public function store(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|max:255',
            'role' => 'required|in:admin,collaborateur', // Assurez-vous que cette liste correspond à vos rôles possibles
        ]);

        // Créer une nouvelle collaborateur
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);
        // Rediriger 
        return redirect()->route('admin.collaborateurs.index');
    }

    public function edit($id)
    {
        // Récupérer le collaborateur à modifier
        $user = User::findOrFail($id);
        
        // Passer le collaborateur à la vue de modification
        return view('admin.collaborateurs.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données de la requête
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|max:255',
            'role' => 'required|in:admin,collaborateur', // Assurez-vous que cette liste correspond à vos rôles possibles
        ]);

        // Récupérer le collaborateur à mettre à jour
        $user = User::findOrFail($id);

        // Mettre à jour les données du collaborateur
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->role = $request->role;
        $user->save();

        // Rediriger 
        return redirect()->route('admin.collaborateurs.index');
    }

    public function destroy($id)
    {
        // Trouver le collaborateur à supprimer
        $user = User::findOrFail($id);

        // Supprimer le collaborateur
        $user->delete();

        // Rediriger 
        return redirect()->route('admin.collaborateurs.index');
    }
}
