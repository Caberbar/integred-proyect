@extends('layout.app')

@section('title','Create a new Teacher')

@section('body')
    <form action="{{route('teacher.insert')}}">
        @csrf

    </form>
@endsection
