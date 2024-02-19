@extends('layout.app')

@section('title', 'Home')


@section('body')
    <h1>Index Page</h1>

    <a href="{{route('profesor')}}">Profesores</a>
    <a href="{{route('modulos')}}">Modulos</a>
    <a href="{{route('lecciones')}}">Lecciones</a>
    <a href="{{route('formaciones')}}">Formacion</a>
    <a href="{{route('grupos')}}">Grupos</a>
@endsection
