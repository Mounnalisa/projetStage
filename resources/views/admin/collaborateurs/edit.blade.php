@extends('master')
@section('main')

<div class="container mt-5"> <!-- Centrer le contenu -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-4"  style="color: #401F71; font-family: Verdana; ">Modifier un Collaborateur</h3> <!-- Centrer le titre -->
                    <form method="POST" action="{{ route('update.user', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="role">Rôle</label>
                            <select name="role" id="role" class="form-control">
                                <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                                <option value="collaborateur" @if ($user->role == 'collaborateur') selected @endif>Collaborateur</option>
                            </select>
                        </div>

                        <div class="form-group">
                             <!-- Lien pour revenir en arrière -->
                             <button type="submit" class="btn btn-dark" style="background-color: #7743DB;">  
                                Enregistrer
                            </button>
                            <a href="javascript:history.back()" class="btn btn-warning" style="background-color: #F59D2A;">Annuler</a>
                           
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
