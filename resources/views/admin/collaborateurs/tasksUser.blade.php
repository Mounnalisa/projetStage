@extends('master')
@section("main")

<div class="py-12">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Les Tâches de "{{ $user->name }}"</h2>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                       
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Titre de la Tâche</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>
                                            <span class="badge bg-info text-white">{{ $task->status }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>

            </div>
        </div>
    </div>
</div>

@endsection
