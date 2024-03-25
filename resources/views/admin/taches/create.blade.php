<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une tâche</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @extends('master')
    @section('main')
    <div class="container mt-5"> 
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4" style="color: #401F71; font-family: Verdana;">Ajouter une tache</h3> 
                        <form method="POST" action="{{ route('store.task') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                            </div>

                            {{-- <div class="form-group">
                                <label for="status">Statut</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="à faire">À faire</option>
                                </select>
                            </div> --}}

                            {{-- <div class="form-group">
                                <label for="user">Collaborateur</label>
                                <select name="user_id" id="user" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark " style="background-color: #7743DB;"> Enregistrer</button>
                                <a href="{{ route('index.task') }}" class="btn btn-warning" style="background-color: #F59D2A;">Annuler</a> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
