@extends('layout.app')

@section('title', 'Seneca')

@section('content')
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">My Account</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="tab-content">
                    <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                        <div class="row">
                            <div class="col-lg-4 col-xxl-3">
                                <div class="card">
                                    <div class="card-body position-relative">
                                        <div class="position-absolute end-0 top-0 p-3">
                                            <span class="badge bg-primary">Pro</span>
                                        </div>
                                        <div class="text-center mt-3">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-70" src="{{ asset('images/user/avatar-5.jpg') }}" alt="User image">
                                            </div>
                                            <h5 class="mb-0">Anshan H.</h5>
                                            <p class="text-muted text-sm">Project Manager</p>
                                            <hr class="my-3 border border-secondary-subtle">
                                            <div class="row g-3">
                                                <div class="col-4">
                                                    <h5 class="mb-0">86</h5>
                                                    <small class="text-muted">Post</small>
                                                </div>
                                                <div class="col-4 border border-top-0 border-bottom-0">
                                                    <h5 class="mb-0">40</h5>
                                                    <small class="text-muted">Project</small>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="mb-0">4.5K</h5>
                                                    <small class="text-muted">Members</small>
                                                </div>
                                            </div>
                                            <hr class="my-3 border border-secondary-subtle">
                                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-mail me-2"></i>
                                                <p class="mb-0">anshan@gmail.com</p>
                                            </div>
                                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-phone me-2"></i>
                                                <p class="mb-0">(+1-876) 8654 239 581</p>
                                            </div>
                                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-map-pin me-2"></i>
                                                <p class="mb-0">New York</p>
                                            </div>
                                            <div class="d-inline-flex align-items-center justify-content-start w-100">
                                                <i class="ti ti-link me-2"></i>
                                                <a href="#" class="link-primary">
                                                    <p class="mb-0">https://anshan.dh.url</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Skills</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                <p class="mb-0">Junior</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 me-3">
                                                        <div class="progress progress-primary " style="height: 6px;">
                                                            <div class="progress-bar" style="width: 30%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <p class="mb-0 text-muted">30%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                <p class="mb-0">UX Researcher</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 me-3">
                                                        <div class="progress progress-primary " style="height: 6px;">
                                                            <div class="progress-bar" style="width: 80%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <p class="mb-0 text-muted">80%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                <p class="mb-0">Wordpress</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 me-3">
                                                        <div class="progress progress-primary " style="height: 6px;">
                                                            <div class="progress-bar" style="width: 90%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <p class="mb-0 text-muted">90%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                <p class="mb-0">HTML</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 me-3">
                                                        <div class="progress progress-primary " style="height: 6px;">
                                                            <div class="progress-bar" style="width: 30%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <p class="mb-0 text-muted">30%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center mb-3">
                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                <p class="mb-0">Graphic Design</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 me-3">
                                                        <div class="progress progress-primary " style="height: 6px;">
                                                            <div class="progress-bar" style="width: 95%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <p class="mb-0 text-muted">95%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-sm-6 mb-2 mb-sm-0">
                                                <p class="mb-0">Code Style</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 me-3">
                                                        <div class="progress progress-primary " style="height: 6px;">
                                                            <div class="progress-bar" style="width: 75%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <p class="mb-0 text-muted">75%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xxl-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Personal Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Full Name</p>
                                                        <p class="mb-0">Anshan Handgun</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Father Name</p>
                                                        <p class="mb-0">Mr. Deepen Handgun</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Phone</p>
                                                        <p class="mb-0">(+1-876) 8654 239 581</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Country</p>
                                                        <p class="mb-0">New York</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Email</p>
                                                        <p class="mb-0">anshan.dh81@gmail.com</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Zip Code</p>
                                                        <p class="mb-0">956 754</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pb-0">
                                                <p class="mb-1 text-muted">Address</p>
                                                <p class="mb-0">Street 110-B Kalians Bag, Dewan, M.P. New York</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Education</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Master Degree (Year)</p>
                                                        <p class="mb-0">2014-2017</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Institute</p>
                                                        <p class="mb-0">-</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Bachelor (Year)</p>
                                                        <p class="mb-0">2011-2013</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Institute</p>
                                                        <p class="mb-0">Imperial College London</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pb-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">School (Year)</p>
                                                        <p class="mb-0">2009-2011</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="mb-1 text-muted">Institute</p>
                                                        <p class="mb-0">School of London, England</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
<footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
        <div class="row">
            <div class="col my-1">
                <p class="m-0">Able Pro &#9829; crafted by Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank">Phoenixcoded</a></p>
            </div>
            <div class="col-auto my-1">
                <ul class="list-inline footer-link mb-0">
                    <li class="list-inline-item"><a href="../index.html">Home</a></li>
                    <li class="list-inline-item"><a href="https://codedthemes.gitbook.io/able-pro-bootstrap/" target="_blank">Documentation</a></li>
                    <li class="list-inline-item"><a href="https://phoenixcoded.authordesk.app/" target="_blank">Support</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

@endsection