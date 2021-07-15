<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('storage/images/application/siteicon.png') }}">
    <title>@yield('title')</title>



    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" >
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/jquery.toast.min.css') }}">
    <script src="{{ asset('js/jquery.toast.min.js') }}"></script>

    <style type="text/css">
        body {
            font-family: Roboto !Important;
            font-size: 14px;
        }

        label {
            font-size: 14px;
        }

        .form-control {
            font-size: 14px;
            height: calc(2.25em + .75rem + 2px);
        }

        .form-control:focus {
            border-color: #d1d3e2;
            box-shadow: none;
            outline: none;
        }

        .table {
            font-size: 14px;
        }
        .pagination_active {
            color: darkblue;
            background: cornflowerblue;
        }

        .page-link {
            border-radius: 0 !important;
        }

        .active > .nav-link{
            color: #12e197 !important;
        }

        button:focus {
            outline: none;
        }
    </style>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/game/videos') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3" style="text-transform: initial;">Scout Beyond</div>
        </a>


        <hr class="sidebar-divider my-0">


        {{--<li class="nav-item @if($activeMenu === 'Dashboard') active @endif">--}}
            {{--<a class="nav-link" href="{{ url('admin/dashboard') }}">--}}
                {{--<i class="fas fa-fw fa-tachometer-alt"></i>--}}
                {{--<span>Dashboard</span></a>--}}
        {{--</li>--}}

        <!-- Divider -->
        {{--<hr class="sidebar-divider">--}}



        <li class="nav-item @if($activeMenu === 'Game Videos' || $activeMenu === 'Game Video') active @endif">
            <a class="nav-link" href="{{ url('admin/game/videos') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Game Videos</span></a>
        </li>

        <li class="nav-item @if($activeMenu === 'Players') active @endif">
            <a class="nav-link" href="{{ url('admin/players') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Players</span></a>
        </li>

        <li class="nav-item @if($activeMenu === 'Teams') active @endif">
            <a class="nav-link" href="{{ url('admin/teams') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Teams</span></a>
        </li>



    </ul>

    <div id="content-wrapper" class="d-flex flex-column">


        <div id="content">


            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>




                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>



                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->userProfile->first_name }}</span>
                            <img class="img-profile rounded-circle"
                                 src="{{ asset('storage/' . auth()->user()->avatar) }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('logout') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>

            <div class="container-fluid">

                @yield('content')


            </div>


        </div>

        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Scout Beyond {{ date('Y') }}</span>
                </div>
            </div>
        </footer>


    </div>


</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<style type="text/css">
    #ajax_loading{
        position: fixed;
        top: 0;
        z-index: 100;
        width: 100%;
        height:100%;
        display: none;
        background: rgba(0,0,0,0.6);
    }
    .ajax_loading_spinner {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .loading_spinner {
        width: 40px;
        height: 40px;
        border: 4px #ddd solid;
        border-top: 4px #2e93e6 solid;
        border-radius: 50%;
        animation: sp-anime 0.8s infinite linear;
    }
    @keyframes sp-anime {
        100% {
            transform: rotate(360deg);
        }
    }
</style>

<div id="ajax_loading">
    <div class="ajax_loading_spinner">
        <span class="loading_spinner"></span>
    </div>
</div>


<script type="text/javascript">
    $(document).ajaxStart(function() {
        $("#ajax_loading").fadeIn(0);
    });

    $(document).ajaxStop(function () {
        $("#ajax_loading").fadeOut(300);
    });

</script>





</body>

</html>
