@extends('layout.app')

@section('title', 'Education')

@section('content')
<section class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">{{ trans('integrated.formations_page.formations')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewire('formacion-table')
    </div>
</section>
@endsection