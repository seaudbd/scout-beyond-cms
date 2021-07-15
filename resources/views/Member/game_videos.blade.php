@extends('Layouts.member')

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
                                <div class="text-secondary mb-2">Sort By</div>
                                <div class="form-check">
                                    <input class="form-check-input sort_by_for_search" type="radio" name="sort_by" id="newest" value="desc" style="border-color: #0995f6;" checked>
                                    <label class="form-check-label" for="newest">
                                        Newest
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input sort_by_for_search" type="radio" name="sort_by" id="top_rated" value="Top Rated" style="border-color: #0995f6;">
                                    <label class="form-check-label" for="top_rated">
                                        Top Rated
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input sort_by_for_search" type="radio" name="sort_by" id="oldest" value="asc" style="border-color: #0995f6;">
                                    <label class="form-check-label" for="oldest">
                                        Oldest
                                    </label>
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
                            <div id="game_video_list_container">

                            </div>
                        </div>
                    </div>









                    <div class="mt-5"></div>


                </div>
            </div>

        </div>

    </section>



    <style type="text/css">
        .video_wrapper {
            position: relative; width: 100%; padding-top: 56.25%; overflow: hidden;
            background: black;
        }

        .video_wrapper iframe {
            position: absolute; top: 0; right: 0; bottom: 0; left: 0; width: 100%; height: 100%;
        }

    </style>





    <script type="text/javascript">


        
        function loadGameVideos(url) {
            $.ajax({
                method: 'get',
                url: url,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('#game_video_list_container').empty();
                    if (result.gameVideos.length > 0) {
                        $.each(result.gameVideos, function (key, gameVideo) {

                            let favoriteGameVideo = result.favoriteGameVideos.find(o => o.item_id === gameVideo.id);
                            let favoriteElement;
                            if (favoriteGameVideo !== undefined) {
                                favoriteElement = '<a href="javascript:void(0)" class="favorite favorite_selected text-decoration-none shadow-sm" data-id="' + gameVideo.id + '" style="background-color: #ffffff; padding: 10px 30px; border-radius: 5px; font-weight: 600; font-size: 14px; color: #ff4747;"><i class="fas fa-heart" style="color: #ff4747;"></i> Added to Favorite</a>';
                            } else {
                                favoriteElement = '<a href="javascript:void(0)" class="favorite favorite_not_selected text-decoration-none shadow-sm" data-id="' + gameVideo.id + '" style="background-color: #ffffff; padding: 10px 30px; border-radius: 5px; font-weight: 600; font-size: 14px; color: #ff4747;"><i class="far fa-heart" style="color: #ff4747;"></i> Add to Favorite</a>';
                            }

                            let likeCount = 0;
                            if (gameVideo.game_video_preferences.length > 0) {
                                $.each(gameVideo.game_video_preferences, function (prefKey, prefValue) {
                                    if (prefValue.preference_type === 'Like') {
                                        likeCount++;
                                    }
                                });
                            }

                            $('#game_video_list_container').append(
                                `<div class="card border-0 shadow-sm mb-4 py-4 px-4">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4 col-xxl-4">
                                            <div class="video_wrapper"><iframe frameborder="0" allowFullScreen src="` + gameVideo.video_thumbnail_url + `"></iframe></div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8 col-xxl-8">
                                            <div class="card-body pt-0">
                                                <h5 class="card-title text-dark">` + gameVideo.title + `</h5>
                                                <p class="card-text">` + gameVideo.team1_formation_name + ` vs ` + gameVideo.team2_formation_name + `</p>
                                                <p class="card-text">
                                                    <div class="d-inline-block me-3" style="padding: 8px 20px; background-color: rgba(236,239,255,255); border-radius: 30px; font-size: 13px;"><i class="fas fa-calendar-alt" style="color: #a85500;"></i> ` + $.datepicker.formatDate('MM dd, yy', new Date(gameVideo.created_at)) + `</div>
                                                    <div class="d-inline-block me-3" style="padding: 8px 20px; background-color: rgba(236,239,255,255); border-radius: 30px; font-size: 13px;"><i class="fas fa-thumbs-up" style="color: #28669e;"></i> <span class="ms-3 fw-bold">` + likeCount + `</span></div>
                                                    <div class="d-inline-block" style="padding: 8px 20px; background-color: rgba(236,239,255,255); border-radius: 30px; font-size: 13px;">Suggested Top Player</div>
                                                </p>
                                                <div class="mt-4">
                                                    <div class="small mb-3">Quick Actions</div>
                                                    <a href="javascript:void(0)" class="go_details text-decoration-none me-3" data-id="` + gameVideo.id + `" style="background-color: #0995f6; padding: 10px 30px; border-radius: 5px; font-weight: 600; font-size: 14px; color: #ffffff;"><i class="fas fa-play text-white"></i> Watch Video Now</a>` + favoriteElement + `
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`
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
                        $('#game_video_list_container').append('<div class="alert alert-info">No Game Videos Found!</div>')
                    }

                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        }

        $(document).ready(function () {
            loadGameVideos('{{ url('member/game/videos/get/records/desc/null') }}');
        });

        $(document).on('click', '.sort_by_for_search', function () {
            let sortBy = $(this).val();
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            loadGameVideos('{{ url('member/game/videos/get/records') }}/' + sortBy + '/' + searchKey);
        });

        $(document).on('keyup', '#search_key', function () {
            if ($(this).val() === '') {
                let sortBy = $('.sort_by_for_search:checked').val();
                loadGameVideos('{{ url('member/game/videos/get/records') }}/' + sortBy + '/null');
            }
        });

        $(document).on('click', '#search_button', function () {
            let sortBy = $('.sort_by_for_search:checked').val();
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            loadGameVideos('{{ url('member/game/videos/get/records') }}/' + sortBy + '/' + searchKey);
        });

        $(document).on('click', '.go_details', function () {
            let gameVideoId = $(this).data('id');
            location = '{{ url('member/game/videos') }}/' + gameVideoId;
        });


        $(document).on('click', '.favorite', function () {
            let url;
            if ($(this).hasClass('favorite_not_selected')) {
                $(this).removeClass('favorite_not_selected');
                $(this).addClass('favorite_selected');
                $(this).find('.far').addClass('fas').removeClass('far');
                url = '{{ url('member/game/video/add/to/favorite') }}';
            } else {
                $(this).removeClass('favorite_selected');
                $(this).addClass('favorite_not_selected');
                $(this).find('.fas').addClass('far').removeClass('fas');
                url = '{{ url('member/game/video/remove/from/favorite') }}';
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
