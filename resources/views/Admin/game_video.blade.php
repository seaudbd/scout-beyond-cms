@extends('Layouts.admin')

@section('title', $title)



@section('content')

    <style type="text/css">
        #formation_1 {
            color: #816400; font-size: 25px;
        }
        #formation_1:hover {
            color: #636363;
        }

        #formation_2 {
            color: #816400; font-size: 25px;
        }
        #formation_2:hover {
            color: #636363;
        }

        #team_lineup_1 {
            color: #816400; font-size: 25px;
        }
        #team_lineup_1:hover {
            color: #636363;
        }

        #team_lineup_2 {
            color: #816400; font-size: 25px;
        }
        #team_lineup_2:hover {
            color: #636363;
        }




        .progress {
            width: 100px;
            height: 100px !important;
            float: left;
            line-height: 100px;
            background: none;
            margin: 10px;
            box-shadow: none;
            position: relative
        }

        .progress:after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 10px solid #fff;
            position: absolute;
            top: 0;
            left: 0
        }

        .progress>span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1
        }

        .progress .progress-left {
            left: 0
        }

        .progress .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 10px;
            border-style: solid;
            position: absolute;
            top: 0
        }

        .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 80px;
            border-bottom-right-radius: 80px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left
        }

        .progress .progress-right {
            right: 0
        }

        .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 80px;
            border-bottom-left-radius: 80px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
            animation: loading-1 1.8s linear forwards
        }

        .progress .progress-value {
            width: 90%;
            height: 90%;
            border-radius: 50%;
            background: #f8f8f8;
            font-size: 14px;
            color: #747474;
            line-height: 85px;
            text-align: center;
            position: absolute;
            top: 5%;
            left: 5%
        }

        .progress.blue .progress-bar {
            border-color: #ff9c10
        }

        .progress.blue .progress-left .progress-bar {
            animation: loading-2 1.5s linear forwards 1.8s
        }

        .progress.yellow .progress-bar {
            border-color: #ff9c10
        }

        .progress.yellow .progress-right .progress-bar {
            animation: loading-3 1.8s linear forwards
        }

        .progress.yellow .progress-left .progress-bar {
            animation: none
        }

        @keyframes loading-1 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg)
            }
        }

        @keyframes loading-2 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(144deg);
                transform: rotate(144deg)
            }
        }

        @keyframes loading-3 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }

            100% {
                -webkit-transform: rotate(135deg);
                transform: rotate(135deg)
            }
        }




    </style>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto">
                <div class="shadow-sm mb-4 py-4 px-3 bg-body">
                    Game Videos | <span class="fw-bold">Video Details</span>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                        <div style="font-size: 20px; color: #747474; font-weight: 700;">{{ $gameVideo->title }}</div>
                        <div class="mt-3">
                            <iframe width="100%" height="440" src="{{ $gameVideo->video_url }}" frameborder="0" allowfullscreen></iframe>
                        </div>
                        {{--<div class="mt-4">--}}
                            {{--@if($isFavorite)--}}
                                {{--<button type="button" class="btn" id="remove_from_favorite" style="background-color: #81272c; font-weight: 600; color: #ffffff; padding: 8px 50px;">Remove from Favorite</button>--}}
                            {{--@else--}}
                                {{--<button type="button" class="btn" id="add_to_favorite" style="background-color: #816400; font-weight: 600; color: #ffffff; padding: 8px 50px;">Add to Favorite</button>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        <div class="mt-4">
                            <div class="row">
                                <div class="col">
                                    <span class="me-3" style="font-size: 20px; color: #747474; font-weight: 700;">Game Insights</span>
                                </div>
                            </div>



                            <div class="row mt-4 mb-5">
                                <div class="col-12">
                                    <div style="background-color: #816400; border-radius: 15px; color: #fff; padding: 30px;">
                                        <div class="row">
                                            <div class="col-8">
                                                <div style="font-size: 18px; font-weight: 600;">Detailed Game Report</div>
                                                <div class="mt-4">Loved watching the game? We have a detailed report of the entire game. Get to know which player performed the best, who has the best dribbling skills, how was the pass accuracy and many more! Download the report now.</div>
                                                <div class="mt-4">
                                                    <button type="button" class="btn" id="download_report" style="background-color: #fff; color: #816400; font-size: 14px; font-weight: 600; padding: 10px 40px;"><i class="fas fa-download"></i> Download Report</button>
                                                </div>
                                            </div>
                                            <div class="col-4">

                                                <div class="progress blue"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                                                    <div class="progress-value">90%</div>
                                                </div>
                                                <div class="progress yellow"> <span class="progress-left"> <span class="progress-bar"></span> </span> <span class="progress-right"> <span class="progress-bar"></span> </span>
                                                    <div class="progress-value">37.5%</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                        <div class="row">
                            <div class="col-8">
                                <span class="me-3" style="font-size: 20px; color: #747474; font-weight: 700;" id="formation_name">{{ $gameVideo->team1_formation_name }}</span>

                            </div>
                            <div class="col-4 text-end">
                                <span style="border-radius: 50%; background-color: transparent; color: #ffffff; padding: 2px 9px; cursor: pointer;" class="me-3"><i class="fas fa-angle-left" id="formation_1"></i></span>
                                <span style="border-radius: 50%; background-color: transparent; color: #ffffff; padding: 2px 0 2px 9px; cursor: pointer;"><i class="fas fa-angle-right" id="formation_2"></i></span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <img src="{{ asset('storage') }}/{{ $gameVideo->team1_formation_url }}" id="formation_image" class="img-fluid" style="height: 440px; width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5" style="background-color: #ebebeb;">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto">
                <div class="row mt-3">
                    <div class="col">
                        <span class="me-3" style="font-size: 20px; color: #747474; font-weight: 700;">Team Line up: <span class="fw-bold" id="team_name">{{ $gameVideo->team1->name }}</span></span>
                        <span style="border-radius: 50%; background-color: transparent; color: #ffffff; padding: 2px 9px; cursor: pointer;" class="me-3"><i class="fas fa-angle-left" id="team_lineup_1"></i></span>
                        <span style="border-radius: 50%; background-color: transparent; color: #ffffff; padding: 2px 0 2px 9px; cursor: pointer;"><i class="fas fa-angle-right" id="team_lineup_2"></i></span>
                    </div>
                </div>
                <div id="team_lineup_records" class="mb-5">
                    <div class="row mt-4">
                        @foreach($team1Players as $key => $player)
                            <div class="col-12 col-sm-12 col-md-6 col-lg-3 pe-xxl-5 text-center">
                                <div style="border: 1px solid #cfcfcf; border-radius: 15px; padding: 30px 15px; background-color: #fff;">
                                    <div><img src="{{ asset('storage') }}/{{ $player->avatar }}" class="img-fluid" style="height: 200px;"></div>
                                    <div class="mt-3" style="color: #747474; font-size: 18px; font-weight: 600;">{{ $player->userProfile->first_name }} {{ $player->userProfile->last_name }}</div>
                                    <div class="mt-3"><button type="button" class="btn view_profile" data-id="{{ $player->id }}" style="background-color: #816400; font-weight: 600; color: #ffffff; padding: 8px 50px;">View Profile</button></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="mt-5"></div>

    <script type="text/javascript">

        $('#add_to_favorite').on('mouseover', function () {
            $(this).css({
                'background-color': '#abc',
                'color': '#816400'
            });
        });

        $('#add_to_favorite').on('mouseout', function () {
            $(this).css({
                'background-color': '#816400',
                'color': '#ffffff'
            });
        });

        $('#remove_from_favorite').on('mouseover', function () {
            $(this).css({
                'background-color': '#abc',
                'color': '#81272c'
            });
        });

        $('#remove_from_favorite').on('mouseout', function () {
            $(this).css({
                'background-color': '#81272c',
                'color': '#ffffff'
            });
        });


        $(document).on('click', '#formation_1', function () {
            let team1FormationName = '{{ $gameVideo->team1_formation_name }}';
            let team1FormationUrl = '{{ $gameVideo->team1_formation_url }}';
            $('#formation_name').text(team1FormationName);
            $('#formation_image').attr('src', '{{ asset('storage') }}/' + team1FormationUrl);
            let teamPlayers = JSON.parse('{!! $team1Players !!}');
            $('#team_name').text('{{ $gameVideo->team1->name }}');
            $('#team_lineup_records').empty();
            if (teamPlayers.length > 0) {
                let i = 0;
                $.each(teamPlayers, function (key, player) {
                    if (key % 4 === 0) {
                        i++;
                        $('#team_lineup_records').append('<div class="row mt-4" id="team_lineup_row_' + i + '"></div>');
                    }
                    let playerAvatar = '{{ asset('storage') }}/' + player.avatar;
                    $('#team_lineup_row_' + i).append('<div class="col-12 col-sm-12 col-md-6 col-lg-3 pe-xxl-5 text-center">\n' +
                        '                            <div style="border: 1px solid #cfcfcf; border-radius: 15px; padding: 30px 15px; background-color: #fff;">\n' +
                        '                                <div><img src="' + playerAvatar + '" class="img-fluid" style="height: 200px;"></div>\n' +
                        '                                <div class="mt-3" style="color: #747474; font-size: 18px; font-weight: 600;">' + player.user_profile.first_name + ' ' + player.user_profile.last_name + '</div>\n' +
                        '                                <div class="mt-3"><button type="button" class="btn view_profile" data-id="' + player.id + '" style="background-color: #816400; font-weight: 600; color: #ffffff; padding: 8px 50px;">View Profile</button></div>\n' +
                        '                            </div>\n' +
                        '                        </div>');
                });
                $('.view_profile').on('mouseover', function () {
                    $(this).css({
                        'background-color': '#abc',
                        'color': '#816400'
                    });
                });

                $('.view_profile').on('mouseout', function () {
                    $(this).css({
                        'background-color': '#816400',
                        'color': '#ffffff'
                    });
                });
            }
        });

        $(document).on('click', '#formation_2', function () {
            let team2FormationName = '{{ $gameVideo->team2_formation_name }}';
            let team2FormationUrl = '{{ $gameVideo->team2_formation_url }}';
            $('#formation_name').text(team2FormationName);
            $('#formation_image').attr('src', '{{ asset('storage') }}/' + team2FormationUrl);

            let teamPlayers = JSON.parse('{!! $team2Players !!}');
            $('#team_name').text('{{ $gameVideo->team2->name }}');
            $('#team_lineup_records').empty();
            if (teamPlayers.length > 0) {
                let i = 0;
                $.each(teamPlayers, function (key, player) {
                    if (key % 4 === 0) {
                        i++;
                        $('#team_lineup_records').append('<div class="row mt-4" id="team_lineup_row_' + i + '"></div>');
                    }
                    let playerAvatar = '{{ asset('storage') }}/' + player.avatar;
                    $('#team_lineup_row_' + i).append('<div class="col-12 col-sm-12 col-md-6 col-lg-3 pe-xxl-5 text-center">\n' +
                        '                            <div style="border: 1px solid #cfcfcf; border-radius: 15px; padding: 30px 15px; background-color: #fff;">\n' +
                        '                                <div><img src="' + playerAvatar + '" class="img-fluid" style="height: 200px;"></div>\n' +
                        '                                <div class="mt-3" style="color: #747474; font-size: 18px; font-weight: 600;">' + player.user_profile.first_name + ' ' + player.user_profile.last_name + '</div>\n' +
                        '                                <div class="mt-3"><button type="button" class="btn view_profile" data-id="' + player.id + '" style="background-color: #816400; font-weight: 600; color: #ffffff; padding: 8px 50px;">View Profile</button></div>\n' +
                        '                            </div>\n' +
                        '                        </div>');
                });
                $('.view_profile').on('mouseover', function () {
                    $(this).css({
                        'background-color': '#abc',
                        'color': '#816400'
                    });
                });

                $('.view_profile').on('mouseout', function () {
                    $(this).css({
                        'background-color': '#816400',
                        'color': '#ffffff'
                    });
                });
            }
        });



        $(document).on('click', '#team_lineup_1', function () {
            let team1FormationName = '{{ $gameVideo->team1_formation_name }}';
            let team1FormationUrl = '{{ $gameVideo->team1_formation_url }}';
            $('#formation_name').text(team1FormationName);
            $('#formation_image').attr('src', '{{ asset('storage') }}/' + team1FormationUrl);

            let teamPlayers = JSON.parse('{!! $team1Players !!}');
            $('#team_name').text('{{ $gameVideo->team1->name }}');
            $('#team_lineup_records').empty();
            if (teamPlayers.length > 0) {
                let i = 0;
                $.each(teamPlayers, function (key, player) {
                    if (key % 4 === 0) {
                        i++;
                        $('#team_lineup_records').append('<div class="row mt-4" id="team_lineup_row_' + i + '"></div>');
                    }
                    let playerAvatar = '{{ asset('storage') }}/' + player.avatar;
                    $('#team_lineup_row_' + i).append('<div class="col-12 col-sm-12 col-md-6 col-lg-3 pe-xxl-5 text-center">\n' +
                        '                            <div style="border: 1px solid #cfcfcf; border-radius: 15px; padding: 30px 15px; background-color: #fff;">\n' +
                        '                                <div><img src="' + playerAvatar + '" class="img-fluid" style="height: 200px;"></div>\n' +
                        '                                <div class="mt-3" style="color: #747474; font-size: 18px; font-weight: 600;">' + player.user_profile.first_name + ' ' + player.user_profile.last_name + '</div>\n' +
                        '                                <div class="mt-3"><button type="button" class="btn view_profile" data-id="' + player.id + '" style="background-color: #816400; font-weight: 600; color: #ffffff; padding: 8px 50px;">View Profile</button></div>\n' +
                        '                            </div>\n' +
                        '                        </div>');
                });
                $('.view_profile').on('mouseover', function () {
                    $(this).css({
                        'background-color': '#abc',
                        'color': '#816400'
                    });
                });

                $('.view_profile').on('mouseout', function () {
                    $(this).css({
                        'background-color': '#816400',
                        'color': '#ffffff'
                    });
                });
            }
        });

        $(document).on('click', '#team_lineup_2', function () {
            let team2FormationName = '{{ $gameVideo->team2_formation_name }}';
            let team2FormationUrl = '{{ $gameVideo->team2_formation_url }}';
            $('#formation_name').text(team2FormationName);
            $('#formation_image').attr('src', '{{ asset('storage') }}/' + team2FormationUrl);

            let teamPlayers = JSON.parse('{!! $team2Players !!}');
            $('#team_name').text('{{ $gameVideo->team2->name }}');
            $('#team_lineup_records').empty();
            if (teamPlayers.length > 0) {
                let i = 0;
                $.each(teamPlayers, function (key, player) {
                    if (key % 4 === 0) {
                        i++;
                        $('#team_lineup_records').append('<div class="row mt-4" id="team_lineup_row_' + i + '"></div>');
                    }
                    let playerAvatar = '{{ asset('storage') }}/' + player.avatar;
                    $('#team_lineup_row_' + i).append('<div class="col-12 col-sm-12 col-md-6 col-lg-3 pe-xxl-5 text-center">\n' +
                        '                            <div style="border: 1px solid #cfcfcf; border-radius: 15px; padding: 30px 15px; background-color: #fff;">\n' +
                        '                                <div><img src="' + playerAvatar + '" class="img-fluid" style="height: 200px;"></div>\n' +
                        '                                <div class="mt-3" style="color: #747474; font-size: 18px; font-weight: 600;">' + player.user_profile.first_name + ' ' + player.user_profile.last_name + '</div>\n' +
                        '                                <div class="mt-3"><button type="button" class="btn view_profile" data-id="' + player.id + '" style="background-color: #816400; font-weight: 600; color: #ffffff; padding: 8px 50px;">View Profile</button></div>\n' +
                        '                            </div>\n' +
                        '                        </div>');
                });
                $('.view_profile').on('mouseover', function () {
                    $(this).css({
                        'background-color': '#abc',
                        'color': '#816400'
                    });
                });

                $('.view_profile').on('mouseout', function () {
                    $(this).css({
                        'background-color': '#816400',
                        'color': '#ffffff'
                    });
                });
            }
        });


        $('.view_profile').on('mouseover', function () {
            $(this).css({
                'background-color': '#abc',
                'color': '#816400'
            });
        });

        $('.view_profile').on('mouseout', function () {
            $(this).css({
                'background-color': '#816400',
                'color': '#ffffff'
            });
        });

        $(document).on('click', '.view_profile', function () {
            let playerId = $(this).data('id');
            location = '{{ url('member/players') }}/' + playerId + '/profile';
        });


        $('#download_report').on('mouseover', function () {
            $(this).css({
                'background-color': '#abc',
                'color': '#ffffff'
            });
        });

        $('#download_report').on('mouseout', function () {
            $(this).css({
                'background-color': '#ffffff',
                'color': '#816400'
            });
        });

        $(document).on('click', '#download_report', function () {
            let filePath = '{{ asset('storage/' . $gameVideo->report_url) }}';
            let a = document.createElement('a');
            a.href = filePath;
            a.download = filePath.substr(filePath.lastIndexOf('/') + 1);
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });


        $(document).on('click', '#add_to_favorite', function () {
            let formData = new FormData();
            formData.append('item_id', '{{ $gameVideo->id }}');
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('member/game/video/add/to/favorite') }}',
                data: formData,
                contentType: false,
                processData: false,
                global: false,
                success: function (result) {
                    console.log(result);

                    $('#add_to_favorite').parent().append('<button type="button" class="btn" id="remove_from_favorite" style="background-color: #81272c; font-weight: 600; color: #ffffff; padding: 8px 50px;">Remove from Favorite</button>');
                    $('#add_to_favorite').remove();

                    $.toast({
                        text : result.message,
                        showHideTransition : 'slide',  // It can be plain, fade or slide
                        bgColor : 'green',              // Background color for toast
                        textColor : '#eee',            // text color
                        allowToastClose : true,       // Show the close button or not
                        hideAfter : 5000,              // `false` to make it sticky or time in miliseconds to hide after
                        stack : 5,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
                        textAlign : 'left',            // Alignment of text i.e. left, right, center
                        position : 'bottom-left'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
                    });
                },
                error: function (xhr) {
                    console.log(xhr);

                    if (xhr.responseJSON.hasOwnProperty('errors')) {

                        $.each(xhr.responseJSON.errors, function (key, value) {

                                $.each(value, function (k, v) {
                                    $.toast({
                                        text : v,
                                        showHideTransition : 'slide',  // It can be plain, fade or slide
                                        bgColor : 'green',              // Background color for toast
                                        textColor : '#eee',            // text color
                                        allowToastClose : true,       // Show the close button or not
                                        hideAfter : 5000,              // `false` to make it sticky or time in miliseconds to hide after
                                        stack : 5,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
                                        textAlign : 'left',            // Alignment of text i.e. left, right, center
                                        position : 'bottom-left'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
                                    });
                                });


                        });

                    }
                }
            });
        });

        $(document).on('click', '#remove_from_favorite', function () {
            let formData = new FormData();
            formData.append('item_id', '{{ $gameVideo->id }}');
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('member/game/video/remove/from/favorite') }}',
                data: formData,
                contentType: false,
                processData: false,
                global: false,
                success: function (result) {
                    console.log(result);

                    $('#remove_from_favorite').parent().append('<button type="button" class="btn" id="add_to_favorite" style="background-color: #816400; font-weight: 600; color: #ffffff; padding: 8px 50px;">Add to Favorite</button>');
                    $('#remove_from_favorite').remove();

                    $.toast({
                        text : result.message,
                        showHideTransition : 'slide',  // It can be plain, fade or slide
                        bgColor : 'green',              // Background color for toast
                        textColor : '#eee',            // text color
                        allowToastClose : true,       // Show the close button or not
                        hideAfter : 5000,              // `false` to make it sticky or time in miliseconds to hide after
                        stack : 5,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
                        textAlign : 'left',            // Alignment of text i.e. left, right, center
                        position : 'bottom-left'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
                    });
                },
                error: function (xhr) {
                    console.log(xhr);

                    if (xhr.responseJSON.hasOwnProperty('errors')) {

                        $.each(xhr.responseJSON.errors, function (key, value) {

                            $.each(value, function (k, v) {
                                $.toast({
                                    text : v,
                                    showHideTransition : 'slide',  // It can be plain, fade or slide
                                    bgColor : 'green',              // Background color for toast
                                    textColor : '#eee',            // text color
                                    allowToastClose : true,       // Show the close button or not
                                    hideAfter : 5000,              // `false` to make it sticky or time in miliseconds to hide after
                                    stack : 5,                     // `fakse` to show one stack at a time count showing the number of toasts that can be shown at once
                                    textAlign : 'left',            // Alignment of text i.e. left, right, center
                                    position : 'bottom-left'       // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values to position the toast on page
                                });
                            });


                        });

                    }
                }
            });
        });

    </script>



@endsection
