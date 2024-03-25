@extends('master')
@section("main")

<div class="container mt-5"> <!-- Centrer le contenu -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-4">Modifier la tâche</h3> <!-- Centrer le titre -->
                    <form action="{{ route('update.task', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Statut :</label>
                            <select class="form-control" id="status" name="status">
                                <option value="en cours" {{ $task->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                                <option value="terminée" {{ $task->status == 'terminée' ? 'selected' : '' }}>Terminée</option>
                                <option value="en attente" {{ $task->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-success" style="background-color: #7743DB;">Enregistrer</button>
                        <a href="{{ route('index.task', $task->id) }}" class="btn btn-warning" style="background-color: #F59D2A;">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
