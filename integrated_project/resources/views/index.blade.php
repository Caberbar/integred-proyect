@extends('layout.app')

@section('title', 'Seneca')

@section('content')
<!-- [ Main Content ] start -->

<section class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">{{ trans('integrated.index_page.home') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewire('index-table')
    </div>
</section>

<!-- [ Main Content ] end -->
<footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        <div class="row">
            <div class="col my-1">
                <p class="m-0">Able Pro © crafted by Aleksander Trujillo, Heriberto Amezcua, Carlos Bernal, Mario, Rúben</p>
            </div>
            <div class="col-auto my-1">
                <ul class="list-inline footer-link mb-0">
                    <li class="list-inline-item"><a href="../index.html">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="../index.html" target="_blank">Cookies policy</a></li>
                    <li class="list-inline-item"><a href="../index.html" target="_blank">Terms and Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

@endsection