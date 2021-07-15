@extends('Layouts.member')

@section('title', $title)



@section('content')

    @php
        $lastPaidDate = new DateTime(auth()->user()->membership->last_paid_date);
        $endDate = new DateTime(auth()->user()->membership->end_date);
        $membershipPeriod = $lastPaidDate->diff($endDate)->m + ($lastPaidDate->diff($endDate)->y * 12);
    @endphp

    <section style="background-color: #ededed;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">


                    {{--<div class="shadow-sm mb-2 py-4 px-3 bg-body">--}}
                        {{--Profile | <span class="fw-bold">My Profile</span>--}}
                    {{--</div>--}}

                    <div class="shadow-sm mb-2 py-4 px-3 bg-body mt-4" style="border-radius: 5px;">
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-xxl-2">
                                <div style="position: relative;">
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-fluid">
                                    <div style="height: 30px; width: 30px; border-radius: 50%; background-color: #816400; position: absolute; bottom: -10px;right: -10px; cursor: pointer;" id="profile_photo">
                                        <i class="fas fa-camera" style="color: #ffffff; margin-left: 7px; margin-top: 6px;"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-8 col-md-7 col-lg-6 col-xl-4 col-xxl-4 ps-5 pt-xxl-4 pt-xl-3 pt-lg-3 pt-md-4 pt-sm-4">
                                <div class="fw-bold" style="font-size: 18px;">{{ auth()->user()->userProfile->first_name }} {{ auth()->user()->userProfile->last_name }}</div>
                                <div class="text-secondary mt-2" style="font-size: 12px;">Country: <span style="font-weight: 600">{{ auth()->user()->userProfile->country }}</span></div>
                                <div class="text-secondary mt-1" style="font-size: 12px;">Club/Company: <span style="font-weight: 600;">{{ auth()->user()->userProfile->club_name }}</span></div>
                                <div class="mt-2"><i class="fas fa-phone" style="color: #816400;"></i> {{ auth()->user()->userProfile->phone }}</div>
                            </div>
                        </div>

                        <div class="mt-5 d-flex"><span class="fw-bold">Profile Information</span> <hr style="margin-left:10px; width: 200px; color: #816400; margin-top: 12px;"></div>

                        <form id="profile_form">
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-md-4">
                                    <div class="shadow-sm bg-light p-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ auth()->user()->userProfile->first_name }}">
                                            <label for="first_name">First Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4">
                                    <div class="shadow-sm bg-light p-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ auth()->user()->userProfile->last_name }}">
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4">
                                    <div class="shadow-sm bg-light p-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="club_name" id="club_name" placeholder="Club/Company Name" value="{{ auth()->user()->userProfile->club_name }}">
                                            <label for="club_name">Club/Company Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4">
                                    <div class="shadow-sm bg-light p-3">
                                        <div class="form-floating">
                                            <select class="form-select" name="country" id="country">
                                                <option value="">Select Country</option>
                                                @foreach($countries as $key => $country)
                                                    @if($country->country === auth()->user()->userProfile->country)
                                                        <option value="{{ $country->country }}" selected>{{ $country->country }}</option>
                                                    @else
                                                        <option value="{{ $country->country }}">{{ $country->country }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <label for="country">Country</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-4">
                                    <div class="shadow-sm bg-light p-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ auth()->user()->userProfile->phone }}">
                                            <label for="phone">Phone</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <button type="submit" class="btn" id="profile_form_submit_button" style="background-color: #05ff91; font-weight: 600; color: #ffffff; padding: 8px 70px;">
                                        <span id="profile_form_submit_text">Update</span>
                                        <span id="profile_form_submit_processing" class="sr-only"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span>Processing...</span>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="mt-5 d-flex"><span class="fw-bold">Membership Information</span> <hr style="margin-left:10px; width: 200px; color: #816400; margin-top: 12px;"></div>

                        <div class="row mt-4">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <div class="card border-0">
                                            <div class="card-header rounded py-4">
                                                <div class="fw-bold pt-3">Your Purchased<br>Membership On</div>
                                                <div class=""><hr style="width: 100%; color: #816400;"></div>
                                                <div class="card-title pb-3">{{ date('F d, Y', strtotime(auth()->user()->membership->start_date)) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <div class="card border-0">
                                            <div class="card-header rounded py-4">
                                                <div class="fw-bold pt-3">Membership Last<br>Renewed On</div>
                                                <div class=""><hr style="width: 100%; color: #816400;"></div>
                                                <div class="card-title pb-3">
                                                    {{ date('F d, Y', strtotime(auth()->user()->membership->last_paid_date)) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4">
                                        <div class="card border-0">
                                            <div class="card-header rounded py-4">
                                                <div class="fw-bold pt-3">Your Membership<br>Ends On</div>
                                                <div class=""><hr style="width: 100%; color: #816400;"></div>
                                                <div class="card-title pb-3">{{ date('F d, Y', strtotime(auth()->user()->membership->end_date)) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="fw-bold">
                                            Your membership will end after {{ $membershipPeriod }} months. Till the time, you can enjoy all benefits of our platform.
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <style type="text/css">
                                #renew_membership {


                                    background-color: #093365;
                                    border: none;
                                    border-radius: 4px;
                                    color: #ccc;
                                    font-size: 1.2rem;


                                }



                                /*#renew_membership {*/
                                    /*top: 50%;*/
                                    /*transform: translate3d(-50%, -50%, 0);*/
                                /*}*/

                                #renew_membership {
                                    display: block;
                                    padding: 10px 10px;
                                    cursor: pointer;
                                    transition: box-shadow 0.1s linear;
                                }
                                #renew_membership:hover {
                                    box-shadow: 0 10px 0 rgba(0, 0, 0, 0.2);
                                }
                            </style>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 pt-5">
                                <div class="text-center mt-3">
                                    <a href="{{ env('BASE_SITE_URL') }}/our-pricing/#table" class="btn" id="renew_membership">Upgrade/Renew Membership</a>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="mb-4"></div>




                    <div class="modal" tabindex="-1" id="profile_photo_modal">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Profile Photo</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mx-auto">
                                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-fluid" id="profile_photo_preview">
                                            <div class="spinner-border text-info d-none" role="status" id="profile_photo_preview_loading">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div>
                                                <div id="profile_photo_form_message" class="text-center text-danger"></div>
                                                <form id="profile_photo_form">
                                                    <div class="mb-3">
                                                        <label for="avatar" class="form-label">Profile Photo [Dimensions: Max Width - 500, Max Height - 500, Ratio - 1:1]</label>
                                                        <input class="form-control" type="file" id="avatar" name="avatar" onchange="loadProfilePhotoFile(event)">
                                                    </div>


                                                    <div class="mt-3 text-end">
                                                        <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="profile_photo_form_submit_button">
                                                            <span id="profile_photo_form_submit_text">Submit</span>
                                                            <span id="profile_photo_form_submit_processing" class="sr-only"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span>Processing...</span>
                                                        </button>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>





































    <script type="text/javascript">


        $(document).on('click', '#profile_photo', function () {
            $('#profile_photo_modal').modal('show');
        });

        let loadProfilePhotoFile = function(event) {
            $('#profile_photo_preview').addClass('d-none');
            $("#profile_photo_preview_loading").removeClass('d-none');
            let reader = new FileReader();
            reader.onload = function(){
                let output = document.getElementById('profile_photo_preview');
                output.src = reader.result;
                $('#profile_photo_preview_loading').addClass('d-none');
                $('#profile_photo_preview').removeClass('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        };




        $(document).on('submit', '#profile_photo_form', function(event) {



            event.preventDefault();

            $('#profile_photo_form_message').addClass('d-none').empty();
            $('#profile_photo_form_submit_button').addClass('disabled');
            $('#profile_photo_form_submit_text').addClass('sr-only');
            $('#profile_photo_form_submit_processing').removeClass('sr-only');


            $('#profile_photo_form').find('.is-invalid').removeClass('is-invalid');
            $('#profile_photo_form').find('.invalid-feedback').remove();

            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                method: 'post',
                url: '{{ url('member/profile/save/profile/photo') }}',
                data: formData,
                contentType: false,
                processData: false,
                global: false,
                success: function (result) {
                    console.log(result);
                    $('#profile_photo_form_submit_button').removeClass('disabled');
                    $('#profile_photo_form_submit_text').removeClass('sr-only');
                    $('#profile_photo_form_submit_processing').addClass('sr-only');

                    if (result.success === true) {
                        location.reload();
                    } else {
                        $('#profile_photo_form_message').removeClass('d-none').text(result.message);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#profile_photo_form_submit_button').removeClass('disabled');
                    $('#profile_photo_form_submit_text').removeClass('sr-only');
                    $('#profile_photo_form_submit_processing').addClass('sr-only');
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                $('#' + key).after('<div class="invalid-feedback"></div>');
                                $('#' + key).addClass('is-invalid');
                                $.each(value, function (k, v) {
                                    $('#' + key).parent().find('.invalid-feedback').addClass('text-danger').append('<div>' + v + '</div>');
                                });
                            });
                        }
                    }
                }
            });

        });




        $('#profile_form_submit_button').on('mouseover', function () {
            $(this).css({
                'background-color': '#abc',
                'color': '#05ff91'
            });
        });

        $('#profile_form_submit_button').on('mouseout', function () {
            $(this).css({
                'background-color': '#05ff91',
                'color': '#ffffff'
            });
        });


        // $('#cancel_membership').on('mouseover', function () {
        //     $(this).css({
        //         'background-color': '#abc',
        //         'color': '#ff4600'
        //     });
        // });
        //
        // $('#cancel_membership').on('mouseout', function () {
        //     $(this).css({
        //         'background-color': '#ff4600',
        //         'color': '#ffffff'
        //     });
        // });

        // $('#renew_membership').on('mouseover', function () {
        //     $(this).css({
        //         'background-color': '#abc',
        //         'color': '#ff4600'
        //     });
        // });
        //
        // $('#renew_membership').on('mouseout', function () {
        //     $(this).css({
        //         'background-color': '#ff4600',
        //         'color': '#ffffff'
        //     });
        // });


        // $('#dob').datepicker({
        //     'dateFormat': 'MM dd, yy',
        //     'changeMonth': true,
        //     'changeYear': true,
        // });

        $(document).on('submit', '#profile_form', function(event) {



            event.preventDefault();


            $('#profile_form_submit_button').addClass('disabled');
            $('#profile_form_submit_text').addClass('d-none');
            $('#profile_form_submit_processing').removeClass('d-none');


            $('#profile_form').find('.is-invalid').removeClass('is-invalid');
            $('#profile_form').find('.invalid-feedback').remove();

            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                method: 'post',
                url: '{{ url('member/profile/save') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    console.log(result);
                    $('#profile_form_submit_button').removeClass('disabled');
                    $('#profile_form_submit_text').removeClass('d-none');
                    $('#profile_form_submit_processing').addClass('d-none');

                    location.reload();

                    // $('#dropdown_user').text(result.data.first_name);
                    // $.toast({
                    //     text : result.message,
                    //     showHideTransition : 'slide',
                    //     bgColor : result.success === true ? 'green' : 'red',
                    //     textColor : '#eee',
                    //     allowToastClose : true,
                    //     hideAfter : 5000,
                    //     stack : 5,
                    //     textAlign : 'left',
                    //     position : 'bottom-left'
                    // });
                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#profile_form_submit_button').removeClass('disabled');
                    $('#profile_form_submit_text').removeClass('d-none');
                    $('#profile_form_submit_processing').addClass('d-none');

                    if (xhr.responseJSON.hasOwnProperty('errors')) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('#' + key).after('<div class="invalid-feedback"></div>');
                            $('#' + key).addClass('is-invalid');
                            $.each(value, function (k, v) {
                                $('#' + key).parent().find('.invalid-feedback').append('<div>' + v + '</div>');
                            });
                        });
                    }
                }
            });

        });
    </script>


@endsection
