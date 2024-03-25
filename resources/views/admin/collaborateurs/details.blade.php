@extends('master')
@section("main")

<div class="container mt-5"> <!-- Centrer le contenu -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-4" style="color: #401F71; font-family: Verdana;">Détails De Collaborateur</h3> <!-- Centrer le titre -->
                    <p><strong>Nom :</strong> {{ $user->name }}</p>
                    <p><strong>Email :</strong> {{ $user->email }}</p>
                    <p><strong>Role :</strong> {{ $user->role }}</p>
                    
                    
                    <!-- Boutons Modifier et Supprimer -->
                    <div class="d-flex">
                        <!-- Lien pour revenir en arrière -->
                        <a href="{{ route('edit.user', $user->id) }}" class="btn btn-dark mr-2" style="background-color: #7743DB;">Modifier</a>
                        <form action="{{ route('delete.user', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning" style="background-color: #F59D2A;">Supprimer</button> 
                        </form>
                        
                    </div>
                    <a href="javascript:history.back()" class="btn btn-light">Router</a>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
