@extends('Layouts.member', ['title' => $title])

@section('title', $title)



@section('content')

    <style type="text/css">
        #search_input:focus {
            border-color: #ced4da;
            outline: none !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
        }
        #search_input::-webkit-input-placeholder {
            font-size: 14px !important;
        }

        .watch_matches {
            background-color: #ffffff; font-weight: 600; color: #816400; border: 2px solid #816400; border-radius: 50px; padding: 5px 40px;
        }

        .add_to_my_team {
            background-color: #ffffff; font-weight: 600; color: #816400; border: 2px solid #816400; border-radius: 50px; padding: 5px 40px;
        }

        .favorite_not_selected {
            background-color: #ffffff; font-weight: 600; color: #816400; border: 2px solid #816400; border-radius: 50px; padding: 5px 40px;
        }

        .favorite_selected {
            background-color: #ff4830; font-weight: 600; color: #ffffff; border: 0; border-radius: 50px; padding: 5px 40px;
        }

        .watch_matches:hover {
            color: #ffffff;
            background-color: #816400;
        }

        .add_to_my_team:hover {
            color: #ffffff;
            background-color: #816400;
        }

        .favorite:hover {
            color: #ffffff;
            background-color: #816400;
            border: 0;
        }

        .btn:focus {
            outline: none;
            box-shadow: none;
        }

    </style>

    <section style="background-color: #ededed;">
        {{--<div class="container-fluid">--}}
            {{--<div class="row">--}}
                {{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">--}}

                    {{--<div class="shadow-sm mb-4 py-4 px-3 bg-body">--}}
                        {{--Favorites | <span class="fw-bold">Favorite List</span>--}}
                    {{--</div>--}}


                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">

                    <div id="favorite_player_list_container">

                    </div>

                    <div id="favorite_game_video_list_container">

                    </div>

                    <div id="loading_spinner" class="text-center d-none py-5">
                        <div class="spinner-border text-info" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <script type="text/javascript">

        $(document).ready(function () {
            $.ajax({
                method: 'get',
                url: '{{ url('member/favorites/get/favorite/records') }}',
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('#favorite_player_list_container').append('<div class="fw-bold mt-4 mb-2">Favorite Players</div>');
                    $('#favorite_game_video_list_container').append('<div class="fw-bold mb-2">Favorite Game Videos</div>');
                    if (result.players.length > 0) {

                        $.each(result.players, function (key, player) {

                            let avatar = '{{ asset('storage') }}/' + player.avatar;

                            $('#favorite_player_list_container').append('<div class="card mb-4 py-3 px-3 border-0 shadow-sm">\n' +
                                '                        <div class="row">\n' +
                                '                            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-3">\n' +
                                '                                <img src="' + avatar + '" class="img-fluid rounded">\n' +
                                '                            </div>\n' +
                                '                            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-9">\n' +
                                '                                <div class="card-body">\n' +
                                '                                    <h5 class="card-title text-dark">' + player.user_profile.first_name + ' ' + player.user_profile.last_name + '</h5>\n' +
                                '                                    <p class="card-text">From <span class="fw-bold">' + player.user_profile.club_name + '</span> Club</p>\n' +
                                '                                    <p class="card-text"><small class="text-muted">Member since ' + $.datepicker.formatDate('MM dd, yy', new Date(player.created_at)) + '</small></p>\n' +


                                '                                    <div class="mt-4">' +
                                '<div class="small mb-3">Quick Actions</div>' +
                                '                                        <a href="javascript:void(0)" class="view_profile text-decoration-none me-3" data-id="' + player.id + '" style="background-color: #0995f6; padding: 10px 30px; border-radius: 5px; font-weight: 600; font-size: 14px; color: #ffffff;"><i class="far fa-address-card text-white"></i> View Profile</a>\n' +
                                    '<a href="javascript:void(0)" class="remove_from_favorite text-decoration-none shadow-sm" data-item_id="' + player.id + '" data-item_type="Player" style="background-color: #ffffff; padding: 10px 30px; border-radius: 5px; font-weight: 600; font-size: 14px; color: #ff4747;"><i class="fas fa-heart" style="color: #ff4747;"></i> Remove from Favorite</a>' +
                                '                                    </div>\n' +
                                '                                </div>\n' +
                                '                            </div>\n' +
                                '                        </div>\n' +
                                '                    </div>'
                            );
                        });

                        $('.view_profile').on('mouseover', function () {
                            $(this).css({
                                'background-color': '#abc',
                                'color': '#816400'
                            });
                        });

                        $('.view_profile').on('mouseout', function () {
                            $(this).css({
                                'background-color': '#0995f6',
                                'color': '#ffffff'
                            });
                        });

                        $('.remove_from_favorite').on('mouseover', function () {
                            $(this).css({
                                'background-color': '#abc',
                                'color': '#816400'
                            });
                        });

                        $('.remove_from_favorite').on('mouseout', function () {
                            $(this).css({
                                'background-color': '#ffffff',
                                'color': '#ff4747'
                            });
                        });

                    } else {
                        $('#favorite_player_list_container').append('<div class="alert alert-info">No Favorite Players Found!</div>');
                    }

                    if (result.gameVideos.length > 0) {
                        if (result.gameVideos.length > 0) {
                            $.each(result.gameVideos, function (key, gameVideo) {

                                // $('#favorite_game_video_list_container').append('<div class="card mb-4 py-3 px-5">\n' +
                                //     '                        <div class="row">\n' +
                                //     '                            <div class="col-md-3">\n' +
                                //     '                                <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="' + gameVideo.video_thumbnail_url + '"></iframe></div>\n' +
                                //     '                            </div>\n' +
                                //     '                            <div class="col-md-9">\n' +
                                //     '                                <div class="card-body">\n' +
                                //     '                                    <h5 class="card-title">' + gameVideo.title + '</h5>\n' +
                                //     '                                    <p class="card-text">' + gameVideo.description.slice(0, 200) + '...</p>\n' +
                                //     '                                    <p class="card-text"><small class="text-muted">Uploaded on ' + $.datepicker.formatDate('MM dd, yy', new Date(gameVideo.created_at)) + ' at ' + new Date(gameVideo.created_at).getHours() + ':' + new Date(gameVideo.created_at).getMinutes() + ':' + new Date(gameVideo.created_at).getSeconds() + '</small></p>\n' +
                                //     '                                    <div>\n' +
                                //     '                                        <a class="btn me-2 go_details" data-id="' + gameVideo.id + '" style="background-color: #816400; font-weight: 600; color: #ffffff; width: 200px;" href="javascript:void(0)">View Game Video</a>\n' +
                                //     '                                        <a class="btn remove_from_favorite" data-item_id="' + gameVideo.id + '" data-item_type="Video" style="background-color: #81272c; font-weight: 600; color: #ffffff; width: 200px;" href="javascript:void(0)">Remove from Favorite</a>\n' +
                                //     '                                    </div>\n' +
                                //     '                                </div>\n' +
                                //     '                            </div>\n' +
                                //     '                        </div>\n' +
                                //     '                    </div>'
                                // );

                                $('#favorite_game_video_list_container').append('<div class="card border-0 shadow-sm mb-4 py-3 px-3">\n' +
                                    '                        <div class="row">\n' +
                                    '                            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">\n' +
                                    '                                <iframe width="100%" height="240" frameborder="0" src="' + gameVideo.video_thumbnail_url + '"></iframe>\n' +
                                    '                            </div>\n' +
                                    '                            <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">\n' +
                                    '                                <div class="card-body">\n' +
                                    '                                    <h5 class="card-title text-dark">' + gameVideo.title + '</h5>\n' +
                                    '                                    <p class="card-text">' + gameVideo.team1_formation_name + ' vs ' + gameVideo.team2_formation_name + '</p>\n' +
                                    '                                    <p class="card-text"><div class="d-inline-block me-3" style="padding: 8px 20px; background-color: rgba(236,239,255,255); border-radius: 30px; font-size: 13px;"><i class="fas fa-calendar-alt" style="color: #a85500;"></i> ' + $.datepicker.formatDate('MM dd, yy', new Date(gameVideo.created_at)) + '</div><div class="d-inline-block me-3" style="padding: 8px 20px; background-color: rgba(236,239,255,255); border-radius: 30px; font-size: 13px;"><i class="fas fa-star" style="color: #28669e;"></i> 4.9 (523 Reviews)</div><div class="d-inline-block" style="padding: 8px 20px; background-color: rgba(236,239,255,255); border-radius: 30px; font-size: 13px;">Suggested Top Player</div></p>\n' +
                                    '                                    <div class="mt-4">' +
                                    '<div class="small mb-3">Quick Actions</div>' +
                                    '                                        <a href="javascript:void(0)" class="go_details text-decoration-none me-3" data-id="' + gameVideo.id + '" style="background-color: #0995f6; padding: 10px 30px; border-radius: 5px; font-weight: 600; font-size: 14px; color: #ffffff;"><i class="fas fa-play text-white"></i> Watch Video Now</a>\n' +
                                    '<a href="javascript:void(0)" class="remove_from_favorite text-decoration-none shadow-sm" data-item_id="' + gameVideo.id + '" data-item_type="Video" style="background-color: #ffffff; padding: 10px 30px; border-radius: 5px; font-weight: 600; font-size: 14px; color: #ff4747;"><i class="fas fa-heart" style="color: #ff4747;"></i> Remove from Favorite</a>' +
                                    '                                    </div>\n' +
                                    '                                </div>\n' +
                                    '                            </div>\n' +
                                    '                        </div>\n' +
                                    '                    </div>'
                                );


                            });
                            $('.go_details').on('mouseover', function () {
                                $(this).css({
                                    'background-color': '#abc',
                                    'color': '#816400'
                                });
                            });

                            $('.go_details').on('mouseout', function () {
                                $(this).css({
                                    'background-color': '#0995f6',
                                    'color': '#ffffff'
                                });
                            });

                            $('.remove_from_favorite').on('mouseover', function () {
                                $(this).css({
                                    'background-color': '#abc',
                                    'color': '#816400'
                                });
                            });

                            $('.remove_from_favorite').on('mouseout', function () {
                                $(this).css({
                                    'background-color': '#ffffff',
                                    'color': '#ff4747'
                                });
                            });
                        }
                    } else {
                        $('#favorite_game_video_list_container').append('<div class="alert alert-info">No Favorite Game Videos Found!</div>');
                    }

                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        });

        $(document).on('click', '.view_profile', function () {
            let playerId = $(this).data('id');
            location = '{{ url('member/players') }}/' + playerId + '/profile';
        });

        $(document).on('click', '.go_details', function () {
            let gameVideoId = $(this).data('id');
            location = '{{ url('member/game/videos') }}/' + gameVideoId;
        });


        $(document).on('click', '.remove_from_favorite', function () {
            console.log('he')
            let itemId = $(this).data('item_id');
            let itemType = $(this).data('item_type');

            let $this = $(this);

            let formData = new FormData();
            formData.append('item_id', itemId);
            formData.append('item_type', itemType);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('member/favorites/remove/from/favorite') }}',
                data: formData,
                contentType: false,
                processData: false,
                global: false,
                success: function (result) {
                    console.log(result);
                    $this.parent().parent().parent().parent().parent().remove();
                    $.toast({
                        text : result.message,
                        showHideTransition : 'slide',
                        bgColor : 'green',
                        textColor : '#eee',
                        allowToastClose : true,
                        hideAfter : 5000,
                        stack : 5,
                        textAlign : 'left',
                        position : 'bottom-left'
                    });
                },
                error: function (xhr) {
                    console.log(xhr);

                    if (xhr.responseJSON.hasOwnProperty('errors')) {

                        $.each(xhr.responseJSON.errors, function (key, value) {

                            $.each(value, function (k, v) {
                                $.toast({
                                    text : v,
                                    showHideTransition : 'slide',
                                    bgColor : 'red',
                                    textColor : '#eee',
                                    allowToastClose : true,
                                    hideAfter : 5000,
                                    stack : 5,
                                    textAlign : 'left',
                                    position : 'bottom-left'
                                });
                            });


                        });

                    }
                }
            });
        });




        $(document).on('click', '#search_button', function () {


            let height = $('#player_list_container').innerHeight();
            $('#player_list_container').addClass('d-none');
            $('#loading_spinner').css('height', height).removeClass('d-none');
            setTimeout(function () {
                $('#loading_spinner').removeAttr('style').addClass('d-none');
                $('#player_list_container').removeClass('d-none');

            }, 3000);
        });


    </script>


@endsection
