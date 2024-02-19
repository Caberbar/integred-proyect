@extends('layout.app')

<body class="nav-fixed">

    <!-- Incluir el navbar -->
    @include('nav_bar')

    <!-- Contenido de la página de inicio -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <!-- Sidenav Heading (Addons)-->
                        <div class="sidenav-menu-heading"></div>
                        <!-- Sidenav Link (Charts)-->
                        <a class="nav-link " href="{{ route('home') }}">
                            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                            Dashboard
                        </a>
                        <!-- Sidenav Link (Tables)-->
                        <a class="nav-link" href="">
                            <div class="nav-link-icon"><i data-feather="filter"></i></div>
                            Tables
                        </a>
                        <!-- Sidenav Menu Heading (Core)-->
                        <div class="sidenav-menu-heading">Database</div>
                        <!-- Sidenav Accordion (Dashboard)-->
                        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Tables
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                <a class="nav-link" href="{{ route('profesor') }}">
                                    Teachers
                                    <span class="badge bg-primary-soft text-primary ms-auto">Updated</span>
                                </a>
                                <a class="nav-link active" href="{{ route('formaciones') }}">Education / Formation</a>
                                <a class="nav-link" href="{{ route('modulos') }}">Module</a>
                                <a class="nav-link" href="{{ route('grupos') }}">Group</a>
                                <a class="nav-link" href="{{ route('lecciones') }}">Leson</a>
                            </nav>
                        </div>

                    </div>
                </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">Usuario</div>
            </div>
        </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container-xl px-4">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="filter"></i></div>
                                    Tables
                                </h1>
                                <div class="page-header-subtitle">An extension of the Simple DataTables library, customized for SB Admin Pro</div>
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