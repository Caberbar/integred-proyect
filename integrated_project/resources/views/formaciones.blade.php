@extends('layout.app')

@section('title', 'Education')

<body class="nav-fixed">

    <!-- Incluir el navbar -->
    @include('nav_bar')

    
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="user"></i></div>
                                    Education
                                </h1>
                                <div class="page-header-subtitle">The "Formation" table shows information about education.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            @livewire('formacion-table')
        </main>

        <!-- Incluir el footer -->
        @include('footer')