@extends('layout.app')

@section('title', 'Modulos')

@section('content')
<section class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">{{ trans('integrated.lessons_page.lessons')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewire('leccion-table')
    </div>
</section>
@endsection