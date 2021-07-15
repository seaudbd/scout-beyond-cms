@extends('Layouts.frontend', ['title' => $title])

@section('title', $title)



@section('content')

<div class="form">

    <div class="form-panel one">
        <div class="form-header" style="margin-bottom: 10px;">
            <h1>Forgotten Password Retrieval</h1>
        </div>

        <div id="reset_password_form_message" class="text-center text-danger mb-3" style="height: 30px;"></div>
        <div class="form-content">

            <form id="reset_password_form">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Retype Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>

                <div class="form-group">
                    <button type="submit" id="reset_password_form_submit_button">
                        <span id="reset_password_form_submit_text">Reset Password</span>
                        <span id="reset_password_form_submit_processing" class="d-none"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span> Processing...</span>
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>



<script type="text/javascript">

    $(document).on('submit', '#reset_password_form', function (event) {
        event.preventDefault();
        $('#reset_password_form_submit_button').addClass('disabled');
        $('#reset_password_form_submit_text').addClass('d-none');
        $('#reset_password_form_submit_processing').removeClass('d-none');
        $('#reset_password_form_message').empty();

        $('#reset_password_form').find('.is-invalid').removeClass('is-invalid');
        $('#reset_password_form').find('.invalid-feedback').remove();

        let formData = new FormData(this);
        formData.append('user_id', '{{ $userId }}');
        formData.append('password_reset_code', '{{ $passwordResetCode }}');
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            method: 'post',
            url: '{{ url('reset/password') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                console.log(result);
                $('#reset_password_form_submit_button').removeClass('disabled');
                $('#reset_password_form_submit_text').removeClass('d-none');
                $('#reset_password_form_submit_processing').addClass('d-none');
                if (result.success === true) {
                    location = '{{ url('/') }}';
                } else {
                    $('#reset_password_form_message').text(result.message);
                }
            },
            error: function (xhr) {
                console.log(xhr);
                $('#reset_password_form_submit_button').removeClass('disabled');
                $('#reset_password_form_submit_text').removeClass('d-none');
                $('#reset_password_form_submit_processing').addClass('d-none');
                if (xhr.responseJSON.hasOwnProperty('errors')) {

                    $.each(xhr.responseJSON.errors, function (key, value) {
                        if (key === 'user_id' || key === 'password_reset_code') {
                            $('#reset_password_form_message').text('Something went wrong!');
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




</script>
@endsection








