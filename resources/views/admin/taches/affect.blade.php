@extends('master')
@section("main")

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-4">Affecter les tâches sélectionnées</h3>

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
                            <label for="users">Sélectionner les utilisateurs :</label>
                            <ul style="list-style-type: none;">
                                @foreach($users as $user)
                                    <li>
                                        <input type="checkbox" name="selected_users[]" value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <button type="submit" class="btn btn-success">Affecter </button>
                        <!-- Lien pour revenir en arrière -->
                        <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
