@extends('master')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@section('main')

<form method="POST" action="{{ route('admin.collaborateurs.store') }}">
    @csrf

    <div>
        <label for="name" class="form-label">Nom</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>

    <div>
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div>
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <div >
        <label for="role" class="form-label">Rôle</label>
        <select name="role" id="role" class="form-select">
            <option value="admin">Admin</option>
            <option value="collaborateur">Collaborateur</option>
        </select>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">
            Ajouter l'utilisateur
        </button>
    </div>
</form>

@endsection

