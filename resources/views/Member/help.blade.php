@extends('Layouts.member', ['title' => $title])

@section('title', $title)



@section('content')



    <section style="background-color: #ededed;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">

                    <div class="row mt-4">
                        <div class="col-12 col-sm-12 col-md-5 col-lg-6 col-xl-7">

                            <div style="margin-top: 150px;">
                                <div class="h2 text-secondary mt-5">Need Help?</div>
                                <div class="h4 text-secondary mt-4">We are here for you!</div>
                                <div class="mt-4"><i class="far fa-envelope" style="color: #816400;"></i> info@scoutbeyond.com</div>
                            </div>

                        </div>
                        <div class="col-12 col-sm-12 col-md-7 col-lg-6 col-xl-5">


                            <div class="card border-0 p-5 mt-5 shadow-sm bg-light">
                                <div class="text-secondary h5">Leave us a message</div>
                                <form id="help_form">
                                    <div class="form-floating mt-4">
                                        <input type="text" class="form-control border-0 border-bottom shadow-none" name="name" id="name" placeholder="Name">
                                        <label for="name">Name</label>
                                    </div>

                                    <div class="form-floating mt-4">
                                        <input type="text" class="form-control border-0 border-bottom shadow-none" name="subject" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>

                                    <div class="form-floating mt-4">
                                        <textarea class="form-control border-0 border-bottom shadow-none" name="message" id="message" placeholder="Tell us how we can help you"></textarea>
                                        <label for="message">Tell us how we can help you</label>
                                    </div>

                                    <div class="mt-4 text-end">
                                        <button type="submit" class="btn shadow-none" id="help_form_submit_button" style="background-color: #816400; font-weight: 600; color: #ffffff; padding: 8px 50px;">
                                            <span id="help_form_submit_text">Submit</span>
                                            <span id="help_form_submit_processing" class="d-none"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span> Processing...</span>
                                        </button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>

                    <div class="mt-4"></div>



                </div>
            </div>
        </div>
    </section>







    <script type="text/javascript">

        $(document).ready(function () {

        });




        $(document).on('submit', '#help_form', function () {
            event.preventDefault();
            $('#help_form_submit_button').addClass('disabled');
            $('#help_form_submit_text').addClass('d-none');
            $('#help_form_submit_processing').removeClass('d-none');

            $('#help_form').find('.is-invalid').removeClass('is-invalid');
            $('#help_form').find('.invalid-feedback').remove();


            let formData = new FormData(this);

            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('member/help/send/message') }}',
                data: formData,
                contentType: false,
                processData: false,
                global: false,
                success: function (result) {
                    console.log(result);
                    $('#help_form_submit_button').removeClass('disabled');
                    $('#help_form_submit_text').removeClass('d-none');
                    $('#help_form_submit_processing').addClass('d-none');

                    $('#help_form').trigger('reset');

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
                    $('#help_form_submit_button').removeClass('disabled');
                    $('#help_form_submit_text').removeClass('d-none');
                    $('#help_form_submit_processing').addClass('d-none');

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
