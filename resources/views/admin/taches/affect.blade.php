@extends('master')
@section("main")

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-4" style="color: #401F71; font-family: Verdana;">Affecter les tâches sélectionnées</h3>

                    <form action="{{ route('process.affect.task') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="selected_tasks">Tâches sélectionnées :</label>
                            <ul style="list-style-type: none">
                                @foreach($selectedTasks as $task)
                                    <li>{{ $task->title }}</li>
                                    <input type="hidden" name="selected_tasks[]" value="{{ $task->id }}">
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="users">Utilisateurs :</label>
                            <div class="form-group">
        
                                <input type="text" id="search" name="search" class="form-control" placeholder="Nom de l'utilisateur">
                            </div>
                            <ul id="user-list" style="list-style-type: none;">
                                @foreach($users as $user)
                                    <li class="user-item" data-name="{{ $user->name }}">
                                        <input type="checkbox" name="selected_users[]" value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="submit" class="btn btn-success" style="background-color: #7743DB;">Affecter </button>
                        <!-- Lien pour revenir en arrière -->
                        <a href="javascript:history.back()" class="btn btn-warning" style="background-color: #F59D2A;">précédent</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fonction de filtrage des utilisateurs en fonction de la recherche
    document.getElementById('search').addEventListener('input', function() {
        var searchValue = this.value.toLowerCase();
        var users = document.querySelectorAll('.user-item');
        
        users.forEach(function(user) {
            var userName = user.dataset.name.toLowerCase();
            if (userName.includes(searchValue)) {
                user.style.display = 'block';
            } else {
                user.style.display = 'none';
            }
        });
    });
</script>

@endsection
