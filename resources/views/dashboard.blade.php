
{{-- Si l'utilisateur est un administrateur --}}
@if(auth()->user()->role === 'admin')
@extends('master')
@section('content')
    
@endsection
@endif
