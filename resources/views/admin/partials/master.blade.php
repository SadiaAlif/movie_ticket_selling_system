<!DOCTYPE html>
<html
        lang="en"
        class="light-style layout-menu-fixed"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="{{ asset('backend') }}/"
        data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    @yield('page-title')

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/img/favicon/micon.png') }}"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('backend/vendor/fonts/boxicons.css') }}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('backend/vendor/css/core.css') }}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{ asset('backend/vendor/css/theme-default.css') }}"
          class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{ asset('backend/css/demo.css') }}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>

    <link rel="stylesheet" href="{{ asset('backend/vendor/libs/apex-charts/apex-charts.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/dash.css') }}"/>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('backend/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('backend/js/config.js') }}"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar back">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme ">

            <div class="app-brand demo">
                <a href="{{route('admin.dashboard')}}" class="app-brand-link">
                    <img src="{{ asset('frontend/img/logos/ad.png') }}" alt class="w-px-40 h-auto rounded-circle"/>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase text-dark">Admin</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow "></div>

            <ul class="menu-inner py-1 ">
                <!-- Dashboard -->
                <li class="menu-item active">
                    <a href="{{route('admin.dashboard')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home text-dark "></i>
                        <div data-i18n="Analytics" class="text-dark">Dashboard</div>
                    </a>
                </li>

                <!-- Category -->
                <li class="menu-item active">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-category text-dark "></i>
                        <div data-i18n="Layouts" class="text-dark">Genre</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item active">
                            <a href="{{ route('admin.category.index') }}" class="menu-link">
                                <div data-i18n="Without menu" class="text-dark">All Genre</div>
                            </a>
                        </li>
                        <li class="menu-item active">
                            <a href="{{ route('admin.category.create') }}" class="menu-link">
                                <div data-i18n="Without navbar" class="text-dark">Add Genre</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Branch -->
                <li class="menu-item active">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon fa-solid fa-video text-dark "></i>
                        <div data-i18n="Layouts" class="text-dark">Branch</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item active">
                            <a href="{{ route('admin.branch.index') }}" class="menu-link">
                                <div data-i18n="Without menu" class="text-dark">All Branch</div>
                            </a>
                        </li>
                        <li class="menu-item active">
                            <a href="{{ route('admin.branch.create') }}" class="menu-link">
                                <div data-i18n="Without navbar" class="text-dark">Add Branch</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Movie -->
                <li class="menu-item active">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-film text-dark "></i>
                        <div data-i18n="Layouts" class="text-dark">Movie</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item active">
                            <a href="{{ route('admin.movie.index') }}" class="menu-link">
                                <div data-i18n="Without menu" class="text-dark">All Movie</div>
                            </a>
                        </li>
                        <li class="menu-item active">
                            <a href="{{ route('admin.movie.create') }}" class="menu-link">
                                <div data-i18n="Without navbar" class="text-dark">Add Movie</div>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- User -->
                <li class="menu-item active">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-user text-dark "></i>
                        <div data-i18n="Layouts" class="text-dark"> User</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item active">
                            <a href="{{ route('admin.user.list') }}" class="menu-link">
                                <div data-i18n="Without menu" class="text-dark">All User</div>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="menu-item active">
                    <a href="{{route('admin.ticket_list')}}" class="menu-link">
                        <i class="menu-icon fa-solid fa-ticket text-dark "></i>
                        <div data-i18n="Analytics" class="text-dark">Ticket Booked List</div>
                    </a>
                </li>

                <li class="menu-item active">
                    <a href="{{route('admin.contact_list')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-message text-dark "></i>
                        <div data-i18n="Analytics" class="text-dark">Contact List</div>
                    </a>
                </li>


            </ul>
        </aside>

        <!-- /  -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav
                    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme sideber"
                    id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none ">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="header text fw-semibold d-block mb-1 text-dark">Welcome to Admin Panel</h3>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                    <ul class="navbar-nav flex-row align-items-center ms-auto">

                        <!-- Admin -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown ">
                            <a class="nav-link dropdown-toggle hide-arrow " href="javascript:void(0);"
                               data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('backend/img/avatars/ad.png') }}" alt
                                         class="w-px-40 h-auto rounded-circle"/>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('backend/img/avatars/ad.png') }}" alt
                                                         class="w-px-40 h-auto rounded-circle"/>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route ('admin.profile')}}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route ('home')}}">
                                        <i class="bx bx-home me-2"></i>
                                        <span class="align-middle">Home Page</span>
                                    </a>
                                </li>

                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route ('logout')}}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ Admin-->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                @yield('page-content')

                <!-- / Content -->

                {{-- <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                    <div class="mb-2 mb-md-0">
                    </div>
                  </div>
                </footer>
                <!-- / Footer --> --}}

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('backend/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('backend/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('backend/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('backend/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('backend/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('backend/js/dashboards-analytics.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
@stack('js')
</body>
</html>
