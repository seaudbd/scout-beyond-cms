@extends('Layouts.frontend', ['title' => $title])

@section('title', $title)



@section('content')

<div class="form">

    <div class="form-panel one">
        <div class="form-header" style="margin-bottom: 10px;">
            <h1>Account Login</h1>
        </div>
        @if($exp !== null && $email !== null)
            <div class="text-secondary small">Congratulations, your account has been successfully renewed for an additional {{ $exp }} months. Please login to continue.</div>
        @endif
        <div id="login_form_message" class="text-center text-danger mb-3" style="height: 30px;"></div>
        <div class="form-content">

            <form id="login_form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{ $email }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label class="form-remember">
                        <input type="checkbox" />Remember Me </label
                    ><a class="form-recovery" href="{{ url('forgot/password') }}">Forgot Password?</a>
                </div>
                <div class="form-group">
                    <button type="submit" id="login_form_submit_button">
                        <span id="login_form_submit_text">Log in</span>
                        <span id="login_form_submit_processing" class="d-none"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span> Processing...</span>
                    </button>
                </div>
                <div class="mt-3">
                    Are you new to Scout Beyond? Get <a href="https://melsystech.io/scoutbeyond/our-pricing/" style="color: #4285F4; text-decoration: none;">registered</a> now.
                </div>
            </form>
        </div>
    </div>

</div>



<script type="text/javascript">

    $(document).on('submit', '#login_form', function (event) {
        event.preventDefault();
        $('#login_form_submit_button').addClass('disabled');
        $('#login_form_submit_text').addClass('d-none');
        $('#login_form_submit_processing').removeClass('d-none');
        $('#login_form_message').empty();
        let formData = new FormData(this);
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            method: 'post',
            url: '{{ url('authenticate/login') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                console.log(result);
                $('#login_form_submit_button').removeClass('disabled');
                $('#login_form_submit_text').removeClass('d-none');
                $('#login_form_submit_processing').addClass('d-none');
                if (result.success === true) {
                    if (result.data.type === 'Admin') {
                        location = '{{ url('admin/dashboard') }}';
                    } else if (parseInt(result.data.is_member) === 1) {
                        location = '{{ url('member/game/videos') }}';
                    } else {
                        location = '{{ url('player/dashboard') }}';
                    }
                } else {
                    $('#login_form_message').text(result.message);
                }
            },
            error: function (xhr) {
                console.log(xhr);
                $('#login_form_submit_button').removeClass('disabled');
                $('#login_form_submit_text').removeClass('d-none');
                $('#login_form_submit_processing').addClass('d-none');
                if (xhr.responseJSON.hasOwnProperty('errors')) {
                    if (xhr.responseJSON.errors.hasOwnProperty('email') || xhr.responseJSON.errors.hasOwnProperty('password')) {
                        $('#login_form_message').text('Unauthorized Access!');
                    }
                }
            }
        });
    });


</script>

@endsection







