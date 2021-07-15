@extends('Layouts.frontend', ['title' => $title])

@section('title', $title)



@section('content')

<div class="form">

    <div class="form-panel one">
        <div class="form-header" style="margin-bottom: 10px;">
            <h1>Forgotten Password Retrieval</h1>
        </div>
        <div>We’ve sent a password reset code to your email. Please type the code below to reset your password.</div>
        <div id="password_reset_code_form_message" class="text-center text-danger mb-3" style="height: 30px;"></div>
        <div class="form-content">

            <form id="password_reset_code_form">
                <div class="form-group">
                    <label for="password_reset_code">Reset Code</label>
                    <input type="text" id="password_reset_code" name="password_reset_code">
                </div>

                <div class="form-group">
                    <button type="submit" id="password_reset_code_form_submit_button">
                        <span id="password_reset_code_form_submit_text">Proceed</span>
                        <span id="password_reset_code_form_submit_processing" class="d-none"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span> Processing...</span>
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>



<script type="text/javascript">

    $(document).on('submit', '#password_reset_code_form', function (event) {
        event.preventDefault();
        $('#password_reset_code_form_submit_button').addClass('disabled');
        $('#password_reset_code_form_submit_text').addClass('d-none');
        $('#password_reset_code_form_submit_processing').removeClass('d-none');
        $('#password_reset_code_form_message').empty();
        let formData = new FormData(this);
        formData.append('user_id', '{{ $userId }}');
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            method: 'post',
            url: '{{ url('forgot/password/verify/reset/code') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                console.log(result);
                $('#password_reset_code_form_submit_button').removeClass('disabled');
                $('#password_reset_code_form_submit_text').removeClass('d-none');
                $('#password_reset_code_form_submit_processing').addClass('d-none');
                if (result.success === true) {
                    location = '{{ url('reset/password') }}/' + result.data.user_id + '/' + btoa(btoa(btoa(btoa(btoa(result.data.password_reset_code)))));
                } else {
                    $('#password_reset_code_form_message').text(result.message);
                }
            },
            error: function (xhr) {
                console.log(xhr);
                $('#password_reset_code_form_submit_button').removeClass('disabled');
                $('#password_reset_code_form_submit_text').removeClass('d-none');
                $('#password_reset_code_form_submit_processing').addClass('d-none');
                if (xhr.responseJSON.hasOwnProperty('errors')) {
                    if (xhr.responseJSON.errors.hasOwnProperty('password_reset_code') || xhr.responseJSON.errors.hasOwnProperty('user_id')) {
                        $('#password_reset_code_form_message').text('Invalid Reset Code!');
                    }
                }
            }
        });
    });




</script>
@endsection







