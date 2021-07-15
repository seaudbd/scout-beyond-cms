<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Scout Beyond</title>
    <link rel="icon" href="{{ asset('storage/images/application/siteicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/jquery.toast.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('js/jquery.toast.min.js') }}"></script>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    <style type="text/css">

        body {
            color: #636363;
            font-family: Roboto;
        }
        .nav_active .nav-link {
            color: #cea745 !important;
        }
        .nav-item:hover{
            background-color: rgba(226,242,255,255);
        }

        label {
            font-size: small;
        }

        .form-control {
            font-size: small;
        }

        .form-control > option {
            font-size: small;
        }

        .col-xxl-12 {
            max-width: 1400px;
        }

        #dropdown_notification::after {
            border-right: none;
            border-bottom: 0;
            border-left: none;
        }


</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff; padding-top: 0; padding-bottom: 0;">
    <div class="container" style="max-width: 1400px; padding: 0 35px;">
        <a class="navbar-brand me-5" href="{{ url('member/game/videos') }}">
            <img src="{{ asset('storage/images/application/logo.png') }}" width="auto" height="55">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item fw-bold {{ $title === 'Game Videos' || $title === 'Game Video' ? 'nav_active' : '' }}" style="padding: 28px 10px 10px 10px; min-width: 120px; text-align: center">
                    <a class="nav-link text-secondary" aria-current="page" href="{{ url('member/game/videos') }}">Video Gallery</a>
                </li>
                <li class="nav-item fw-bold {{ $title === 'Players' || $title === 'Player Profile' ? 'nav_active' : '' }}" style="padding: 28px 10px 10px 10px;min-width: 120px; text-align: center">
                    <a class="nav-link text-secondary" href="{{ url('member/players') }}">Players</a>
                </li>
                <li class="nav-item fw-bold {{ $title === 'Favorites' ? 'nav_active' : '' }}" style="padding: 28px 10px 10px 10px;min-width: 120px; text-align: center">
                    <a class="nav-link text-secondary" href="{{ url('member/favorites') }}">Favorites</a>
                </li>
                <li class="nav-item fw-bold {{ $title === 'Help' ? 'nav_active' : '' }}" style="padding: 28px 10px 10 10px;min-width: 120px; text-align: center">
                    <a class="nav-link text-secondary" href="{{ url('member/help') }}">Help</a>
                </li>

            </ul>

            <div class="d-flex">
                <a href="{{ url('member/profile') }}" type="button" class="me-3 text-decoration-none" style="background-color: rgba(226,242,255,255); padding: 8px 40px; border: none; color: #636363; font-weight: 600; border-radius: 5px;">Visit Profile</a>
                <a href="{{ url('logout') }}" type="button" class="text-decoration-none" style="background-color: #ff4747; padding: 8px 40px; border: none; color: #ffffff; font-weight: 600; border-radius: 5px;"><i class="fas fa-sign-out-alt"></i> Log out</a>
                {{--<div class="dropdown" style="margin-top: 15px;">--}}
                    {{--<i class="fas fa-bell dropdown-toggle" id="dropdown_notification" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 24px; color: #ffffff; cursor: pointer;"></i>--}}
                    {{--<span class="badge bg-danger" style="margin-left: -8px; padding: .25em .5em;">{{ count(auth()->user()->notifications->where('is_dismissed', 0)) }}</span>--}}
                    {{--<ul class="dropdown-menu dropdown-menu-end" style="padding: 0; border: 0;" aria-labelledby="dropdown_notification">--}}
                        {{--@foreach(auth()->user()->notifications as $notification)--}}
                            {{--@if($notification->is_dismissed === 0)--}}
                                {{--<li class="list-group-item" style="font-size: 14px;"><a class="dropdown-item" href="{{ url('member/profile') }}">{{ $notification->notification }}</a></li>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="mx-4" style="height: 50px; border: 1px solid #fff;"></div>--}}
                {{--<div style="padding: 5px; border-radius: 50%; border: 1px solid #ffffff;"><img src="{{ asset('storage/' . auth()->user()->avatar) }}" style="height: 40px; border-radius: 50%;"></div>--}}
                {{--<div class="dropdown" style="margin-top: 5px;">--}}
                    {{--<button class="btn btn-secondary dropdown-toggle" style="border-color: transparent; background-color: transparent;" type="button" id="dropdown_user" data-bs-toggle="dropdown" aria-expanded="false">--}}
                        {{--{{ auth()->user()->userProfile->first_name }}--}}
                    {{--</button>--}}
                    {{--<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown_user">--}}
                        {{--<li style="font-size: 14px;"><a class="dropdown-item" href="{{ url('member/profile') }}">Profile</a></li>--}}
                        {{--<li style="font-size: 14px;"><a class="dropdown-item" href="{{ url('logout') }}">Sign out</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer" style="background-color: #ffffff;">
    <div class="container">
        <div class="row">
            <div class="col text-center text-light py-3">
                <div>
                    <a class="navbar-brand me-5" href="{{ url('member/game/videos') }}">
                        <img src="{{ asset('storage/images/application/logo.png') }}" width="auto" height="45">
                    </a>
                </div>
                <div class="mt-3 text-secondary" style="font-size: 12px;">{{ date('Y') }} &copy; Rights Reserved to Scout Beyond</div>
            </div>
        </div>
    </div>
</footer>

<style type="text/css">
    #toTopBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 98;
        padding: 15px;
    }

</style>

<span id="toTopBtn">
  <img src="{{ asset('storage/images/application/back_to_top.png') }}" alt="Back to Top" title="Back to Top" style="height: 40px; width: 40px; cursor: pointer;">
</span>

<script type="text/javascript">
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 20) {
                $('#toTopBtn').fadeIn();
            } else {
                $('#toTopBtn').fadeOut();
            }
        });

        $('#toTopBtn').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 100);
            return false;
        });
    });
</script>



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
