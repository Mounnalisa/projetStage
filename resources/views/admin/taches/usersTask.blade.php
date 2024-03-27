@extends('master')

@section("main")
<div class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Les Collaborateurs de {{ $task->title }}</h2>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('removeCollaborators.task', ['taskId' => $task->id]) }}">
                            @csrf
                            @method('DELETE')
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sélectionner</th>
                                            <th>Nom du Collaborateur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($task->users as $user)
                                        <tr>
                                            
                                            <td>
                                                <input type="checkbox" name="selected_users[]" value="{{ $user->id }}">
                                            </td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-dark mt-3" style="background-color: #7743DB;">Supprimer </button>
                        </form>
                        <a href="javascript:history.back()" class="btn btn-light mt-3">précédent</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
