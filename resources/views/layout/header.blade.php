<?php

function page_url()
{
    return sprintf('%s://%s%s', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME'], $_SERVER['REQUEST_URI']);
}
?>
<!doctype html>
<html lang="en">

<head>
    {{-- <link rel="stylesheet" type="text/css" href="./public/css/app.css"/> --}}
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/fullcalendar/css/main.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/datetimepicker/css/classic.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/datetimepicker/css/classic.time.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/plugins/datetimepicker/css/classic.date.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}">
    <!-- loader-->
    <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin/js/pace.min.js') }}"></script>
     <script src="public\js\app.js"></script> 

    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/semi-dark.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/css/header-colors.css') }}" />
    <title>Staff Attendance</title>
</head>

<body>

    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="wrapper">
      
            <!--start header wrapper-->
            <div class="header-wrapper">
                <!--start header -->
                <header>
                    <div class="topbar d-flex align-items-center">
                        <nav class="navbar navbar-expand">
                            <div class="topbar-logo-header">
                                <div class="">
                                    <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                                </div>
                                <div class="">
                                    {{-- <h4 class="logo-text">Rocker</h4> --}}
                                </div>
                            </div>
                            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
                            {{-- <div class="search-bar flex-grow-1">
                                <div class="position-relative search-bar-box">
                                    <input type="text" class="form-control search-control"
                                        placeholder="Type to search..."> <span
                                        class="position-absolute top-50 search-show translate-middle-y"><i
                                            class='bx bx-search'></i></span>
                                    <span class="position-absolute top-50 search-close translate-middle-y"><i
                                            class='bx bx-x'></i></span>
                                </div>
                            </div> --}}
                            <div class="top-menu ms-auto">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item mobile-search-icon">
                                        <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="user-box dropdown">
                                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{-- <img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar"> --}}
                                    <div class="user-info ps-3">
                                        <p class="user-name mb-0 text_capitalize">{{ Auth::user()->name }}</p>
                                        <p class="designattion mb-0 text_capitalize">{{ Auth::user()->role }}</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ url('profile') }}"><i
                                                class="bx bx-user"></i><span>Profile</span></a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ url('settings') }}"><i
                                                class="bx bx-cog"></i><span>Settings</span></a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider mb-0"></div>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="logout_btn">
                                            @csrf

                                            <a href="route('logout')" class="dropdown-item"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                <i class=" bx bx-log-out-circle"></i>
                                                {{ __('Log Out') }}
                                            </a>
                                        </form>


                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </header>
                <div class="nav-container primary-menu">
                    <div class="mobile-topbar-header">
                        <div>
                            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                        </div>
                        <div>
                            <h4 class="logo-text">Rocker</h4>
                        </div>
                        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-xl w-100">
                        <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">

                            <li <?php if (str_contains(page_url(), 'dashboard')) {
                                echo 'class="mm-active"';
                            } ?>>
                                <a href="{{ url('dashboard') }}" class="nav-link">
                                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                                    </div>
                                    <div class="menu-title">Dashboard</div>
                                </a>
                            </li>

                            <li <?php if (str_contains(page_url(), 'staff')) {
                                echo 'class="mm-active"';
                            } ?>>

                                <a href="{{ url('staff') }}" class="nav-link">
                                    <div class="parent-icon"><i class='bx bx-user'></i>
                                    </div>
                                    <div class="menu-title">Staff</div>
                                </a>

                            </li>
                            <li <?php if (str_contains(page_url(), 'attendance')) {
                                echo 'class="mm-active"';
                            } ?>>
                                <a href="{{ url('attendance') }}" class="nav-link">
                                    <div class="parent-icon"><i class='bx bx-spreadsheet'></i>
                                    </div>
                                    <div class="menu-title">Attendance</div>
                                </a>

                            </li>
                            <li <?php if (str_contains(page_url(), 'calendar')) {
                                echo 'class="mm-active"';
                            } ?>>
                                <a href="{{ url('calendar') }}" class="nav-link">
                                    <div class="parent-icon"><i class='bx bx-calendar-week'></i>
                                    </div>
                                    <div class="menu-title">Calendar</div>
                                </a>

                            </li>
                            <li <?php if (str_contains(page_url(), 'report')) {
                                echo 'class="mm-active"';
                            } ?>>
                                <a href="{{ url('report') }}" class="nav-link">
                                    <div class="parent-icon"><i class='bx bx-clipboard'></i>
                                    </div>
                                    <div class="menu-title">Report</div>
                                </a>

                            </li>
                        </ul>
                    </nav>
                </div>
                <!--end navigation-->
            </div>
        </div>
    </div>
    <!--end header -->

    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2024. All right reserved.</p>
    </footer>


    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }} "></script>
    <!--plugins-->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('admin/js/index.js') }}"></script>
    <script src="{{ asset('https://unpkg.com/feather-icons') }}"></script>
    <script src="{{ asset('admin/plugins/fullcalendar/js/main.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--app JS-->
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script>
        function page_url() {
            return sprintf(
                "%s://%s%s",
                isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
                $_SERVER['SERVER_NAME'],
                $_SERVER['REQUEST_URI']
            );
        }
    </script>
    <script>
        // new PerfectScrollbar(".app-container")
        $(function() {

            var hour = (new Date).getHours();
            var m = (new Date).getMinutes();



            console.log(Date);
            console.log(typeof(hour));
            if (hour > 18) {
                if ($(".dark-mode-icon i").attr("class") == 'bx bx-sun') {
                    $(".dark-mode-icon i").attr("class", "bx bx-moon");
                    $("html").attr("class", "light-theme")
                } else {
                    $(".dark-mode-icon i").attr("class", "bx bx-sun");
                    $("html").attr("class", "dark-theme")
                }

                console.log(typeof(hour));

            }

        });
    </script>
</body>

</html>
