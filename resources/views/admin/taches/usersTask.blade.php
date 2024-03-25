@extends('master')

@section("main")
<div class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Les Collaborateurs de {{ $task->title }}</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                @foreach ($task->users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('remove.collaborator', ['taskId' => $task->id, 'userId' => $user->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-dark" style="background-color: #7743DB;">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <a href="javascript:history.back()"  class="btn btn-warning mt-3" style="background-color: #F59D2A; ">Retour</a>
            </div>
        </div>
    </div>
</div>
@endsection
