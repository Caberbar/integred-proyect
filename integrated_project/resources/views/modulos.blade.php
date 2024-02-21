@extends('layout.app')

@section('title', 'Modulos')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Teachers
                        </h1>
                        <div class="page-header-subtitle">The "teachers" table shows information about teachers.</div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @livewire('modulo-table')
</main>
@endsection