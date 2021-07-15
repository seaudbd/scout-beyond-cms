@extends('Layouts.frontend', ['title' => $title])

@section('title', $title)



@section('content')

    <style type="text/css">
        #avatar {
            background-image: url('https://melsystech.io/scoutbeyond/cms/storage/images/application/avatar.png');
            background-size: cover;
            background-position: center;
            height: 150px;
            width: 150px;
            border: 1px solid #bbb;
            border-radius: 50%;
        }
        .text-secondary{
            font-size: 13px;
            font-family: sans-serif;
            padding: 20px;
            background: #4285f4;
            font-weight: 600;
            color: #fff !important;
        }
        #profile_pic_container{
            justify-content: center;
        }
        .form-panel{
            padding: 60px 30px !important;
        }
        #continue_to_login_button{
            margin-top: 10px;
            background: #816400;
            margin: 10px 30px;
        }
        #continue_to_login_button:hover{
            background: #523f00;
        }
    </style>

    <div>
        <div class="form row" style="width: 32%; margin-top: 30px !important">
            <div class="col-12 form-panel one" style="padding: 0 !important;padding-bottom: 30px !important;">
                <div class="form-content">
                    <form id="registration_form">
                        {{--<div class="row mb-4" id="profile_pic_container">--}}
                        {{--<div class="col-3">--}}
                        {{--<div id="avatar" style="height: 100px; width: 100px;">--}}
                        {{--<input type="file" name="avatar" onchange="loadAvatar(event)" style="width:150px; height:150px; opacity:0;" title="Click To Upload Your Profile Photo">--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row mb-4">--}}
                        {{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">--}}
                        {{--<div class="form-floating">--}}
                        {{--<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">--}}
                        {{--<label for="first_name">First Name</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">--}}
                        {{--<div class="form-floating">--}}
                        {{--<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">--}}
                        {{--<label for="last_name">Last Name</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row mb-4">--}}
                        {{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">--}}
                        {{--<div class="form-floating">--}}
                        {{--<input type="text" class="form-control" name="dob" id="dob" placeholder="Date of Birth" autocomplete="off">--}}
                        {{--<label for="dob">Date of Birth</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">--}}
                        {{--<div class="form-floating">--}}
                        {{--<select name="gender" class="form-select" id="gender" style="font-size: 14px; color: #636363;">--}}
                        {{--<option value="">Select Gender</option>--}}
                        {{--<option value="Male">Male</option>--}}
                        {{--<option value="Female">Female</option>--}}
                        {{--</select>--}}
                        {{--<label for="gender">Gender</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row mb-4">--}}
                        {{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">--}}
                        {{--<div class="form-floating">--}}
                        {{--<select class="form-select" name="type" id="type" style="font-size: 14px; color: #636363;">--}}
                        {{--<option value="">Select Account Type</option>--}}
                        {{--<option value="Scout">Scout</option>--}}
                        {{--<option value="Club">Club</option>--}}
                        {{--<option value="Agency">Agency</option>--}}
                        {{--</select>--}}
                        {{--<label for="type">Account Type</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">--}}
                        {{--<div class="form-floating">--}}
                        {{--<select name="country" class="form-select" id="country" style="font-size: 14px; color: #636363;">--}}
                        {{--<option value="">Select Country</option>--}}
                        {{--@foreach($countries as $key => $country)--}}
                        {{--<option value="{{ $country->country }}">{{ $country->country }}</option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<label for="country">Country</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row mb-4">--}}
                        {{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">--}}
                        {{--<div class="form-floating">--}}
                        {{--<input type="text" class="form-control" name="email" id="email" placeholder="Email" @if ($email !== 'null') value="{{ $email }} @endif">--}}
                        {{--<label for="email">Email</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">--}}
                        {{--<div class="form-floating">--}}
                        {{--<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">--}}
                        {{--<label for="phone">Phone</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}


                        {{--<div class="form-floating mb-4">--}}
                        {{--@if ($email !== 'null' && $email !== null && !empty($email) && $email !== '')--}}
                        {{--<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ $email }}" disabled="disabled">--}}
                        {{--@else--}}
                        {{--<input type="text" class="form-control" name="email" id="email" placeholder="Email">--}}
                        {{--@endif--}}
                        {{--<label for="email">Email</label>--}}
                        {{--</div>--}}


                        {{--<div class="row mb-4">--}}
                        {{--<div class="col-12">--}}
                        {{--<div class="form-floating mb-4">--}}
                        {{--<input type="password" class="form-control" name="password" id="password" placeholder="Password">--}}
                        {{--<label for="password">Password</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-12">--}}
                        {{--<div class="form-floating">--}}
                        {{--<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">--}}
                        {{--<label for="password_confirmation">Confirm Password</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}


                        {{--<div class="form-group">--}}
                        {{--<button type="submit" id="registration_form_submit_button">--}}
                        {{--<span id="registration_form_submit_text">Register</span>--}}
                        {{--<span id="registration_form_submit_processing" class="d-none"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span> Processing...</span>--}}
                        {{--</button>--}}
                        {{--</div>--}}

                        <div class="form-group" style="text-align: center;align-items: center;">
                            <div style="width: 100%;">
                                <div style="background: #816400;">
                                    <img src="https://melsystech.io/scoutbeyond/wp-content/uploads/2021/03/Untitled-3.png" style="width: 120px; padding: 30px 0px "/>
                                    <h3 style="color: #fff;;padding-bottom: 20px;">Congratulations!</h3>
                                </div>
                                <p style="padding: 30px; font-size: 16px; line-height: 2; color: #816400; padding-bottom: 5px;">Your account has been successfully entitled with the requested membership plan.</p>
                                <p style="padding: 0 30px; font-size: 14px; line-height: 2; color: black; padding-top: 15px;"> You can now access our system to enjoy full-length videos, game highlights, filter between the top team and players from Africa! You are one click away from all these amazing features!</p>
                            </div>
                            <button type="button" id="continue_to_login_button">
                                <span id="continue_to_login_text">Continue to System</span>
                                <span id="redirecting_text" class="d-none"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span> Redirecting...</span>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>







        <div class="modal" tabindex="-1" id="registration_success_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Congratulations!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Thank you for signing up with us. Please check your email to verify and access your profile.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">

        // function loadAvatar(event) {
        //     $('#avatar').css('background-image', 'url(' + URL.createObjectURL(event.target.files[0]) + ')');
        // }

        // $('#dob').datepicker({
        //     dateFormat: 'MM dd, yy',
        //     changeMonth: true,
        //     changeYear: true
        // });

        $(document).on('click', '#continue_to_login_button', function () {
            $('#continue_to_login_button').addClass('disabled');
            $('#continue_to_login_text').addClass('d-none');
            $('#redirecting_text').removeClass('d-none');

            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('id', '{{ $user->id }}');
            $.ajax({
                method: 'post',
                url: '{{ url('register') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    console.log(result);
                    $('#continue_to_login_button').removeClass('disabled');
                    $('#continue_to_login_text').removeClass('d-none');
                    $('#redirecting_text').addClass('d-none');
                    location = '{{ url('member/game/videos') }}';


                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#continue_to_login_button').removeClass('disabled');
                    $('#continue_to_login_text').removeClass('d-none');
                    $('#redirecting_text').addClass('d-none');

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


        {{--$(document).on('submit', '#registration_form', function(event) {--}}



            {{--event.preventDefault();--}}


            {{--$('#registration_form_submit_button').addClass('disabled');--}}
            {{--$('#registration_form_submit_text').addClass('d-none');--}}
            {{--$('#registration_form_submit_processing').removeClass('d-none');--}}


            {{--$('#registration_form').find('.is-invalid').removeClass('is-invalid');--}}
            {{--$('#registration_form').find('.invalid-feedback').remove();--}}

            {{--let formData = new FormData($('#registration_form')[0]);--}}
            {{--formData.append('_token', '{{ csrf_token() }}');--}}
            {{--formData.append('exp', '{{ $exp }}');--}}
            {{--formData.append('email', '{{ $email }}');--}}
            {{--formData.append('first_name', '{{ $firstName }}');--}}
            {{--formData.append('last_name', '{{ $lastName }}');--}}
            {{--formData.append('country', '{{ $country }}');--}}
            {{--formData.append('password', '{{ $password }}');--}}

            {{--$.ajax({--}}
                {{--method: 'post',--}}
                {{--url: '{{ url('register') }}',--}}
                {{--data: formData,--}}
                {{--contentType: false,--}}
                {{--processData: false,--}}
                {{--success: function (result) {--}}
                    {{--console.log(result);--}}
                    {{--$('#registration_form_submit_button').removeClass('disabled');--}}
                    {{--$('#registration_form_submit_text').removeClass('d-none');--}}
                    {{--$('#registration_form_submit_processing').addClass('d-none');--}}

                    {{--if (result.success === true) {--}}
                        {{--$('#registration_form').trigger('reset');--}}
                        {{--let defaultAvatar = '{{ asset('storage/images/application/avatar.png') }}';--}}
                        {{--$('#avatar').css('background-image', 'url(' + defaultAvatar + ')');--}}
                        {{--$('#registration_success_modal').modal('show');--}}
                    {{--}--}}
                {{--},--}}
                {{--error: function (xhr) {--}}
                    {{--console.log(xhr);--}}
                    {{--$('#registration_form_submit_button').removeClass('disabled');--}}
                    {{--$('#registration_form_submit_text').removeClass('d-none');--}}
                    {{--$('#registration_form_submit_processing').addClass('d-none');--}}

                    {{--if (xhr.responseJSON.hasOwnProperty('errors')) {--}}
                        {{--$.each(xhr.responseJSON.errors, function (key, value) {--}}
                            {{--$('#' + key).after('<div class="invalid-feedback"></div>');--}}
                            {{--$('#' + key).addClass('is-invalid');--}}
                            {{--$.each(value, function (k, v) {--}}
                                {{--$('#' + key).parent().find('.invalid-feedback').append('<div>' + v + '</div>');--}}
                            {{--});--}}
                        {{--});--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}

        {{--});--}}
    </script>



@endsection
