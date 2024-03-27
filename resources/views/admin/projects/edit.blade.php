@extends('master')

@section('main')
<div class="container">
    <h1>Modifier le projet</h1>
    <form method="POST" action="{{ route('update.project',$project->id) }}">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="{{$project->name}}" style="width: 60%;">
        </div>
        <div class="form-group">
            <label for="start_date">Date de début:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Date de début" value="{{$project->start_date}}" style="width: 60%;">
        </div>
        <div class="form-group">
            <label for="end_date">Date de fin:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Date de fin" value="{{$project->end_date}}" style="width: 60%;">
        </div>
        <div class="form-group">
            <label for="name">Type:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="{{$project->type}}" style="width: 60%;">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
    <a href="javascript:history.back()" class="btn btn-light">précédent</a>
</div>
@endsection
