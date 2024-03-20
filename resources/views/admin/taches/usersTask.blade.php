@extends('master')
@section("main")

<div class="py-12">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h2>Collaborateurs affectés à la tâche "{{ $task->title }}"</h2>
                        <ul>
                            @foreach ($task->users as $user)
                            <li>{{ $user->name }} </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
