@extends('Layouts.member')

@section('title', $title)



@section('content')

    <section style="background-color: #ededed;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">
                    {{--<div class="shadow-sm mb-2 py-4 px-3 bg-body">--}}
                        {{--Players | <span class="fw-bold">Player Profile</span>--}}
                    {{--</div>--}}

                    <div class="shadow-sm py-5 px-3 mb-2 bg-body mt-4">



                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3 col-xxl-3">
                                <img src="{{ asset('storage/' . $player->avatar) }}" class="img-fluid" alt="Avatar">
                            </div>
                            <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-9 col-xxl-9 ps-xxl-5 ps-xl-5 ps-lg-5 ps-md-5 ps-sm-3 ps-3 pt-xxl-5 pt-xl-5 pt-lg-5 pt-md-5 pt-sm-4 pt-4">
                                <div class="fw-bold">{{ $player->userProfile->first_name }} {{ $player->userProfile->last_name }}</div>
                                <div class="small text-secondary fw-bold mt-2">{{ $player->userProfile->position }}</div>
                                <div class="small mt-2">
                                    <i class="fas fa-star-half-alt" style="color: #816400;"></i>
                                    <i class="fas fa-star-half-alt" style="color: #816400;"></i>
                                    <i class="fas fa-star-half-alt" style="color: #816400;"></i>
                                    <i class="fas fa-star-half-alt" style="color: #816400;"></i>
                                    <i class="fas fa-star-half-alt" style="color: #816400;"></i>
                                </div>
                                {{--<div class="mt-2 text-secondary" style="font-size: 12px;">--}}
                                    {{--{{ substr($player->userProfile->user_story, 0, 200) }}...--}}
                                {{--</div>--}}
                                <div class="mt-2">
                                    <i class="fas fa-map-marker-alt" style="color: #816400;"></i> {{ $player->userProfile->city }}, {{ $player->userProfile->country }}
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn me-3" id="contact_player" style="background-color: #ff4600; font-weight: 600; color: #ffffff; padding: 8px 50px;">Contact Club</button>
                                    @if($isFavorite)
                                        <button type="button" class="btn" id="remove_from_favorite" style="background-color: #81272c; font-weight: 600; color: #ffffff; padding: 8px 50px;">Remove from Favorite</button>
                                    @else
                                        <button type="button" class="btn" id="add_to_favorite" style="background-color: #816400; font-weight: 600; color: #ffffff; padding: 8px 50px;">Add to Favorite</button>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <div class="row mt-5">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                <div class="d-flex"><span class="fw-bold">Personal Information</span> <hr style="margin-left:10px; width: 100px; color: #816400; margin-top: 12px;"></div>
                                <div class="row mt-2">
                                    <div class="col-12 col-sm-8 col-md-7 col-lg-12 col-xl-12 col-xxl-12">
                                        <table class="table table-hover table-borderless" style="font-size: 14px;">
                                            <tbody>

                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Date of Birth</td>
                                                <td class="text-secondary">{{ date('F d, Y', strtotime($player->userProfile->dob)) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Gender</td>
                                                <td class="text-secondary">{{ $player->userProfile->gender }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Country of Nationality</td>
                                                <td class="text-secondary">{{ $player->userProfile->country }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">City</td>
                                                <td class="text-secondary">{{ $player->userProfile->city }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Spoken Language</td>
                                                <td class="text-secondary">{{ $player->userProfile->spoken_language }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                <div class="d-flex"><span class="fw-bold">Professional Information</span> <hr style="margin-left:10px; width: 100px; color: #816400; margin-top: 12px;"></div>
                                <div class="row mt-2">
                                    <div class="col-12 col-sm-8 col-md-7 col-lg-12 col-xl-12 col-xxl-12">
                                        <table class="table table-borderless table-hover" style="font-size: 14px;">
                                            <tbody>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Club Name</td>
                                                <td class="text-secondary">{{ $player->userProfile->club_name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Strong Leg</td>
                                                <td class="text-secondary">{{ $player->userProfile->strong_leg }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Position</td>
                                                <td class="text-secondary">{{ $player->userProfile->position }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Height</td>
                                                <td class="text-secondary">{{ $player->userProfile->height }} Centimeter</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Weight</td>
                                                <td class="text-secondary">{{ $player->userProfile->weight }} KG</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                <div class="d-flex"><span class="fw-bold">Club/Academy Information</span> <hr style="margin-left:10px; width: 100px; color: #816400; margin-top: 12px;"></div>
                                <div class="row mt-2">
                                    <div class="col-12 col-sm-8 col-md-7 col-lg-12 col-xl-12 col-xxl-12">
                                        <table class="table table-borderless table-hover" style="font-size: 14px;">
                                            <tbody>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Club/Company Name</td>
                                                <td class="text-secondary">{{ $player->userProfile->club_name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Contact Name</td>
                                                <td class="text-secondary">{{ $player->userProfile->club_contact_name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Phone</td>
                                                <td class="text-secondary">{{ $player->userProfile->club_phone }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold" style="padding-left: 0;">Email</td>
                                                <td class="text-secondary">{{ $player->userProfile->club_email }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <div class="d-flex"><span class="fw-bold">Attachment Information</span> <hr style="margin-left:10px; width: 200px; color: #816400; margin-top: 12px;"></div>
                                <div class="row mt-4">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 col-xxl-4">
                                        <div class="row">
                                            <div class="col-3">
                                                <div style="border-radius: 50%; background-color: #ead8c4; width: 75px; height: 75px;"><i class="fas fa-passport" style="line-height: 75px; margin-left: 28px; font-size: 24px; color: #a85500;"></i></div>
                                            </div>
                                            <div class="col-9">
                                                <div style="padding-top: 15px; cursor: pointer;" id="download_passport">
                                                    <div class="fw-bold">Passport</div>
                                                    <div class="text-secondary">{{ $player->userProfile->passport_country }}</div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 col-xxl-4 pt-3 pt-sm-3 pt-md-0">

                                        <div class="row">
                                            <div class="col-3">
                                                <div style="border-radius: 50%; background-color: #c8fee4; width: 75px; height: 75px;"><i class="fab fa-yandex-international" style="line-height: 75px; margin-left: 28px; font-size: 24px; color: #30ea99;"></i></div>
                                            </div>
                                            <div class="col-9">
                                                <div style="padding-top: 15px;">
                                                    <div class="fw-bold">National Experience</div>
                                                    <div class="text-secondary">{{ $player->userProfile->national_experience }}</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>








                    <div class="row mt-4">
                        <div class="col">

                            <div class="fw-bold mb-2">Game Videos of {{ $player->userProfile->first_name }}</div>
                            @foreach($gameVideos as $key => $gameVideo)
                                <div class="card mb-4 py-3 px-5 border-0 shadow-sm">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="{{ $gameVideo->video_thumbnail_url }}"></iframe></div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $gameVideo->title }}</h5>
                                                <p class="card-text">{{ substr($gameVideo->description, 0, 200) }}...</p>
                                                <p class="card-text"><small class="text-muted">Uploaded on {{ date('F d, Y', strtotime($gameVideo->created_at)) }} at {{ date('H:i:s', strtotime($gameVideo->created_at)) }}</small></p>
                                                <div>
                                                    <a class="btn go_details" data-id="{{ $gameVideo->id }}" style="background-color: #816400; font-weight: 600; color: #ffffff; width: 200px;" href="javascript:void(0)">Game Video</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach




                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>








    <div class="modal" tabindex="-1" id="contact_player_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-danger text-center" style="height: 30px;"></div>
                    <form id="contact_player_form">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                            <label for="subject">Subject</label>
                        </div>
                        <div class="form-floating mb-4">
                            <textarea class="form-control" name="message" id="message" placeholder="Subject"></textarea>
                            <label for="message">Message</label>
                        </div>

                        <div class="row">
                            <div class="col text-end">
                                <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="contact_player_form_submit_button">
                                    <span id="contact_player_form_submit_text">Send Message</span>
                                    <span id="contact_player_form_submit_processing" class="d-none"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span> Processing...</span>
                                </button>
                            </div>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>



    <script type="text/javascript">


        $('#dob').datepicker({
            'dateFormat': 'MM dd, yy',
            'changeMonth': true,
            'changeYear': true,
        });

        $('#contact_player').on('mouseover', function () {
            $(this).css({
                'background-color': '#abc',
                'color': '#ff4600'
            });
        });

        $('#contact_player').on('mouseout', function () {
            $(this).css({
                'background-color': '#ff4600',
                'color': '#ffffff'
            });
        });


        $('.go_details').on('mouseover', function () {
            $(this).css({
                'background-color': '#abc',
                'color': '#816400'
            });
        });

        $('.go_details').on('mouseout', function () {
            $(this).css({
                'background-color': '#816400',
                'color': '#ffffff'
            });
        });


        $(document).on('submit', '#contact_player_form', function (event) {
            event.preventDefault();
            $('#contact_player_form_submit_button').addClass('disabled');
            $('#contact_player_form_submit_text').addClass('d-none');
            $('#contact_player_form_submit_processing').removeClass('d-none');
            $('#contact_player_form_message').empty();

            $('#contact_player_form').find('.is-invalid').removeClass('is-invalid');
            $('#contact_player_form').find('.invalid-feedback').remove();

            let formData = new FormData(this);
            formData.append('club_email', '{{ $player->userProfile->club_email }}');
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('member/player/send/message') }}',
                data: formData,
                contentType: false,
                processData: false,
                global: false,
                success: function (result) {
                    console.log(result);
                    $('#contact_player_form_submit_button').removeClass('disabled');
                    $('#contact_player_form_submit_text').removeClass('d-none');
                    $('#contact_player_form_submit_processing').addClass('d-none');
                    $('#contact_player_form').trigger('reset');
                    $('#contact_player_modal .btn-close').click();
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
                    $('#contact_player_form_submit_button').removeClass('disabled');
                    $('#contact_player_form_submit_text').removeClass('d-none');
                    $('#contact_player_form_submit_processing').addClass('d-none');
                    if (xhr.responseJSON.hasOwnProperty('errors')) {

                        $.each(xhr.responseJSON.errors, function (key, value) {
                            if (key === 'club_email') {
                                $('#contact_player_form_message').text('Something went wrong!');
                            } else {
                                $('#' + key).after('<div class="invalid-feedback"></div>');
                                $('#' + key).addClass('is-invalid');
                                $.each(value, function (k, v) {
                                    $('#' + key).parent().find('.invalid-feedback').append('<div>' + v + '</div>');
                                });
                            }

                        });

                    }
                }
            });
        });


        $(document).on('click', '#contact_player', function () {
            $('#contact_player_modal').modal('show');
        });




        $(document).on('click', '.go_details', function () {
            let gameVideoId = $(this).data('id');
            location = '{{ url('member/game/videos') }}/' + gameVideoId;
        });


        $(document).on('click', '#download_passport', function () {
            let filePath = '{{ asset('storage/' . $player->userProfile->passport_url) }}';
            window.open(filePath, '_blank');
            // let a = document.createElement('a');
            // a.href = filePath;
            // a.download = filePath.substr(filePath.lastIndexOf('/') + 1);
            // document.body.appendChild(a);
            // a.click();
            // document.body.removeChild(a);
        });



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



        $(document).on('click', '#add_to_favorite', function () {
            let formData = new FormData();
            formData.append('item_id', '{{ $player->id }}');
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('member/player/add/to/favorite') }}',
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
            formData.append('item_id', '{{ $player->id }}');
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('member/player/remove/from/favorite') }}',
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
