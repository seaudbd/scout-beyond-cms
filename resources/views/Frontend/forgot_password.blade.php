
@extends('Layouts.frontend', ['title' => $title])

@section('title', $title)



@section('content')

<div class="form">

    <div class="form-panel one">
        <div class="form-header" style="margin-bottom: 10px;">
            <h1>Forgotten Password Retrieval</h1>
        </div>
        <div id="forgot_password_form_message" class="text-center text-danger mb-3" style="height: 30px;"></div>
        <div class="form-content">

            <form id="forgot_password_form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
                </div>

                <div class="form-group">
                    <button type="submit" id="forgot_password_form_submit_button">
                        <span id="forgot_password_form_submit_text">Send Reset Code</span>
                        <span id="forgot_password_form_submit_processing" class="d-none"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span> Processing...</span>
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>



<script type="text/javascript">

    $(document).on('submit', '#forgot_password_form', function (event) {
        event.preventDefault();
        $('#forgot_password_form_submit_button').addClass('disabled');
        $('#forgot_password_form_submit_text').addClass('d-none');
        $('#forgot_password_form_submit_processing').removeClass('d-none');
        $('#forgot_password_form_message').empty();
        let formData = new FormData(this);
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            method: 'post',
            url: '{{ url('forgot/password/send/reset/code') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                console.log(result);
                $('#forgot_password_form_submit_button').removeClass('disabled');
                $('#forgot_password_form_submit_text').removeClass('d-none');
                $('#forgot_password_form_submit_processing').addClass('d-none');
                if (result.success === true) {
                    location = '{{ url('password/reset/code') }}/' + btoa(btoa(btoa(btoa(btoa(result.data.id)))));
                } else {
                    $('#forgot_password_form_message').text(result.message);
                }
            },
            error: function (xhr) {
                console.log(xhr);
                $('#forgot_password_form_submit_button').removeClass('disabled');
                $('#forgot_password_form_submit_text').removeClass('d-none');
                $('#forgot_password_form_submit_processing').addClass('d-none');
                if (xhr.responseJSON.hasOwnProperty('errors')) {
                    if (xhr.responseJSON.errors.hasOwnProperty('email')) {
                        $('#forgot_password_form_message').text('Unrecognized Email Address!');
                    }
                }
            }
        });
    });




</script>
@endsection







