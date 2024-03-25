@extends('master')
@section("main")

<div class="py-12">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center mb-4">Liste de Tâches</h3> 

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form action="{{ route('affect.task') }}" method="POST">
                            @csrf
                            <table id="taskTable" class="table table-bordered">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col">Sélectionner</th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Détails</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                    <tr data-id="{{ $task->id }}" >
                                        <td><input type="checkbox" name="selected_tasks[]" value="{{ $task->id }}" class="task-checkbox" data-task-id="{{ $task->id }}"></td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->status }}</td>
                                        <td>
                                            <a href="{{ route('details.task', $task->id) }}" class="btn btn-warning">plus</a>
                                            <a href="{{ route('users.task', $task->id) }}" class="btn btn-dark" style="background-color: #7743DB;">collaborateurs</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-secondary" >Affecter les tâches sélectionnées</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
