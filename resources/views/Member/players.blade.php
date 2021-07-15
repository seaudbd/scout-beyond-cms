@extends('Layouts.member', ['title' => $title])

@section('title', $title)



@section('content')

    <style type="text/css">
        #search_key:focus {
            border-color: #ced4da;
            outline: none !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
        }
        #search_key::-webkit-input-placeholder {
            font-size: 14px !important;
        }


    </style>


    <section style="background-color: #ededed;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">

                    <div class="row mt-4">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
                            <div class="card border-0 shadow-sm mb-4 py-3 px-3">
                                <div class="form-floating">
                                    <select class="form-select" id="position_for_search" style="font-size: 14px;">
                                        <option value="null">All Position</option>
                                        @foreach($positions as $key => $position)
                                            <option value="{{ $position }}">{{ $position }}</option>
                                        @endforeach
                                    </select>
                                    <label for="position_for_search">Position</label>
                                </div>

                            </div>

                            <div class="card border-0 shadow-sm mb-4 py-3 px-3">
                                <div class="text-secondary mb-2">Search By</div>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="search_key" placeholder="Type your query here">
                                    <label for="search_key">Type your query here</label>
                                </div>
                                <button type="button" id="search_button" class="border-0 mt-3" style="background-color: #0995f6; padding: 10px 30px; border-radius: 5px; font-weight: 600; font-size: 14px; color: #ffffff;">Search Now</button>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">
                            <div id="player_list_container">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>




    </section>





    <script type="text/javascript">


        function loadPlayers(url) {
            $.ajax({
                method: 'get',
                url: url,
                cache: false,
                success: function (result) {
                    console.log(result);

                    $('#player_list_container').empty();
                    if (result.players.length > 0) {
                        $.each(result.players, function (key, player) {
                            let favoritePlayer = result.favoritePlayers.find(o => o.item_id === player.id);
                            let favoriteElement;
                            if (favoritePlayer !== undefined) {
                                favoriteElement = '<a href="javascript:void(0)" class="favorite favorite_selected text-decoration-none shadow-sm" data-id="' + player.id + '" style="background-color: #ffffff; padding: 10px 30px; border-radius: 5px; font-weight: 600; font-size: 14px; color: #ff4747;"><i class="fas fa-heart" style="color: #ff4747;"></i> Added to Favorite</a>';
                            } else {
                                favoriteElement = '<a href="javascript:void(0)" class="favorite favorite_not_selected text-decoration-none shadow-sm" data-id="' + player.id + '" style="background-color: #ffffff; padding: 10px 30px; border-radius: 5px; font-weight: 600; font-size: 14px; color: #ff4747;"><i class="far fa-heart" style="color: #ff4747;"></i> Add to Favorite</a>';
                            }
                            let avatar = '{{ asset('storage') }}/' + player.avatar;
                            $('#player_list_container').append('<div class="card mb-4 py-3 px-3 border-0 shadow-sm">\n' +
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
                                '                                        <a href="javascript:void(0)" class="view_profile text-decoration-none me-3" data-id="' + player.id + '" style="background-color: #0995f6; padding: 10px 30px; border-radius: 5px; font-weight: 600; font-size: 14px; color: #ffffff;"><i class="far fa-address-card text-white"></i> View Profile</a>' + favoriteElement + '\n' +
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

                        $('.favorite').on('mouseover', function () {
                            $(this).css({
                                'background-color': '#abc',
                                'color': '#816400'
                            });
                        });

                        $('.favorite').on('mouseout', function () {
                            $(this).css({
                                'background-color': '#ffffff',
                                'color': '#ff4747'
                            });
                        });
                    } else {
                        $('#player_list_container').append('<div class="alert alert-info">No Players Found!</div>')
                    }

                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        }

        $(document).ready(function () {
            loadPlayers('{{ url('member/players/get/records/null/null') }}');
        });

        $(document).on('change', '#position_for_search', function () {
            let position = $(this).val();
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            loadPlayers('{{ url('member/players/get/records') }}/' + position + '/' + searchKey);
        });

        $(document).on('keyup', '#search_key', function () {
            if ($(this).val() === '') {
                let position = $('#position_for_search').val();
                loadPlayers('{{ url('member/players/get/records') }}/' + position + '/null');
            }
        });

        $(document).on('click', '#search_button', function () {
            let position = $('#position_for_search').val();
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            loadPlayers('{{ url('member/players/get/records') }}/' + position + '/' + searchKey);
        });


        $(document).on('click', '.view_profile', function () {
            let playerId = $(this).data('id');
            location = '{{ url('member/players') }}/' + playerId + '/profile';
        });

        $(document).on('click', '.favorite', function () {
            let url;
            if ($(this).hasClass('favorite_not_selected')) {
                $(this).removeClass('favorite_not_selected');
                $(this).addClass('favorite_selected');
                $(this).find('.far').addClass('fas').removeClass('far');
                url = '{{ url('member/player/add/to/favorite') }}';
            } else {
                $(this).removeClass('favorite_selected');
                $(this).addClass('favorite_not_selected');
                $(this).find('.fas').addClass('far').removeClass('fas');
                url = '{{ url('member/player/remove/from/favorite') }}';
            }


            let formData = new FormData();
            formData.append('item_id', $(this).data('id'));
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                global: false,
                success: function (result) {
                    console.log(result);



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
    </script>


@endsection
