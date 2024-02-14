@extends('layout.app')

@section('title', 'Home')


@section('body')
    <h1>Index Page</h1>

    <a href="{{route('profesor')}}">Profesores</a>
@endsection
