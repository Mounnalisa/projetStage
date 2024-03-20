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
    <div class="container mt-5"> <!-- Centrer le contenu -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Ajouter un Collaborateur</h3> <!-- Centrer le titre -->
                        <form method="POST" action="{{ route('store.user') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="role">Rôle</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="collaborateur">Collaborateur</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success"> 
                                    Enregistrer
                                </button>
                                <a href="{{ route('index.user') }}" class="btn btn-danger">Annuler</a>                            </div>
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
