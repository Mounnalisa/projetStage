@extends('master')
@section("main")

<div class="container mt-5"> <!-- Centrer le contenu -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-4">Détails de la tâche</h3> <!-- Centrer le titre -->
                    <p><strong>Titre :</strong> {{ $task->title }}</p>
                    <p><strong>Description :</strong> {{ $task->description }}</p>
                    <p><strong>Statut :</strong> {{ $task->status }}</p>
                    
            
                    
                    <!-- Boutons Modifier et Supprimer -->
                    <div class="d-flex">
                        <!-- Lien pour revenir en arrière -->
                        <a href="{{ route('edit.task', $task->id) }}" class="btn btn-success mr-2">Modifier</a>
                        <form action="{{ route('delete.task', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button> 
                        </form>
                        
                        
                    </div>
                    <a href="javascript:history.back()" class="btn btn-light">Router</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
