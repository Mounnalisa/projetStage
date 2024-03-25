@extends('master')
@section('main')

<div class="py-12">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="text-center mb-4" >Liste de Collaborateurs</h3> 
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table  class="table table-bordered">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Rôle</th>
                                    <th scope="col">Détails</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('details.user', $user->id) }}" class="btn btn-dark" style="background-color: #7743DB;">plus</a>
                                        <a href="{{ route('tasks.user', $user->id) }}" class="btn btn-warning" style="background-color: #F59D2A;">Tâches</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
