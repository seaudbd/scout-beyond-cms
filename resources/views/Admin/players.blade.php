@extends('Layouts.admin')
@section('title', $title)
@section('content')


    <div class="row">
        <div class="col">



            <div class="row">
                <div class="col-12 col-sm-12 col-md-2">
                    <div>{{ $activeMenu }}</div>
                    <div class="mt-3"><button type="button" class="btn btn-sm btn-primary" id="create">Create</button></div>
                </div>
                <div class="col-12 col-sm-12 col-md-10" id="search_section">
                    <form id="search_form">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="team_id_for_search">Team</label>
                                    <select class="form-control" id="team_id_for_search">
                                        <option value="null">All</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="search_key">Search Key</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search..." id="search_key">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="padding: .15rem .75rem; !important;">
                                                <button type="submit" style="border: 0;">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="row sr-only mt-3" id="record_section">
                <div class="col" id="records">


                </div>
            </div>

            <div class="row sr-only" id="no_record_section">
                <div class="col text-center mt-3">
                    No Record Found
                </div>
            </div>

            <div class="row sr-only" style="margin-top: 15px; margin-bottom: 50px;">
                <div class="sr-only" id="pagination_section">
                    <ul class="pagination" role="navigation" id="pagination_links">

                    </ul>
                </div>
                <div class="text-right pt-2" id="record_count_section">

                </div>
            </div>


        </div>
    </div>


    <div class="modal" tabindex="-1" id="create_modal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header px-4">
                    <h6 class="modal-title">Player Information</h6>
                    <button type="button" class="close create_modal_close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body px-4 pb-5">
                    <div id="create_form_message" class="text-center text-danger">

                    </div>
                    <form id="create_form">
                        <input name="id" type="hidden" id="id">

                        <div class="font-weight-bold border-bottom pb-2 mt-3">Personal Information</div>

                        <div class="row mt-3">

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input name="first_name" type="text" class="form-control" id="first_name" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input name="dob" type="text" class="form-control" id="dob" placeholder="Date of Birth">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="form-control" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select name="country" class="form-control" id="country">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $key => $country)
                                            <option value="{{ $country->country }}">{{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input name="city" type="text" class="form-control" id="city" placeholder="City">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="spoken_language">Spoken Language</label>
                                    <input name="spoken_language" type="text" class="form-control" id="spoken_language" placeholder="Spoken Language">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="passport_country">Passport Country</label>
                                    <select name="passport_country" class="form-control" id="passport_country">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $key => $country)
                                            <option value="{{ $country->country }}">{{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="avatar" id="avatar" onchange="loadAvatarFile(event)">
                                        <label class="custom-file-label" for="avatar">Choose Avatar File</label>
                                    </div>
                                </div>
                                <div class="spinner-border text-info d-none" role="status" id="avatar_preview_loading">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <img src="" id="avatar_preview" class="img-fluid d-none py-3">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="passport_url">Passport Photo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="passport_url" id="passport_url" onchange="loadPassportFile(event)">
                                        <label class="custom-file-label" for="passport_url">Choose Passport File</label>
                                    </div>
                                </div>
                                <div class="spinner-border text-info d-none" role="status" id="passport_preview_loading">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <img src="" id="passport_preview" class="img-fluid d-none py-3">
                            </div>
                        </div>



                        <div class="font-weight-bold border-bottom pb-2 mt-3">Professional Information</div>


                        <div class="row mt-3">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="strong_leg">Strong Leg</label>
                                    <input name="strong_leg" type="text" class="form-control" id="strong_leg" placeholder="Strong Leg">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="position">Position</label>
                                    <select name="position" class="form-control" id="position">
                                        <option value="">Select Position</option>
                                        @foreach($positions as $key => $position)
                                            <option value="{{ $key }}">{{ $position }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="height">Height</label>
                                    <input name="height" type="text" class="form-control" id="height" placeholder="Height">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="weight">Weight</label>
                                    <input name="weight" type="text" class="form-control" id="weight" placeholder="Weight">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="national_experience">National Experience</label>
                                    <input name="national_experience" type="text" class="form-control" id="national_experience" placeholder="National Experience">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="user_story">Player Story</label>
                                    <textarea name="user_story" class="form-control" id="user_story" placeholder="Player Story"></textarea>
                                </div>

                            </div>
                        </div>


                        <div class="font-weight-bold border-bottom pb-2 mt-3">Club/Academy Information</div>

                        <div class="row mt-3">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="club_name">Club Name</label>
                                    <input name="club_name" type="text" class="form-control" id="club_name" placeholder="Club Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="club_contact_name">Club Contact Name</label>
                                    <input name="club_contact_name" type="text" class="form-control" id="club_contact_name" placeholder="Club Contact Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="club_phone">Club Phone</label>
                                    <input name="club_phone" type="text" class="form-control" id="club_phone" placeholder="Club Phone">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="form-group">
                                    <label for="club_email">Club Email</label>
                                    <input name="club_email" type="text" class="form-control" id="club_email" placeholder="Club Email">
                                </div>
                            </div>
                        </div>



                        <div class="row mt-3">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="font-weight-bold border-bottom pb-2 mt-3">Team Assignment</div>
                                <div class="form-group mt-3">
                                    <label for="team_id">Team</label>
                                    <select name="team_id" class="form-control" id="team_id">
                                        <option value="">Select Team</option>
                                        @foreach($teams as $key => $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="font-weight-bold border-bottom pb-2 mt-3">Status Control</div>
                                <div class="form-group mt-3">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-4">
                            <div class="col text-right">
                                <button type="button" class="btn btn-secondary btn-sm create_modal_close" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm ml-3" id="create_form_submit_button">
                                    <span id="create_form_submit_text">Submit</span>
                                    <span id="create_form_submit_processing" class="sr-only">
                                        <span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span>
                                        Processing...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script language="JavaScript">






        let loadPassportFile = function(event) {
            $('#passport_preview').addClass('d-none');
            $("#passport_preview_loading").removeClass('d-none');
            let reader = new FileReader();
            reader.onload = function(){
                let output = document.getElementById('passport_preview');
                output.src = reader.result;
                $('#passport_preview_loading').addClass('d-none');
                $('#passport_preview').removeClass('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        let loadAvatarFile = function(event) {
            $('#avatar_preview').addClass('d-none');
            $("#avatar_preview_loading").removeClass('d-none');
            let reader = new FileReader();
            reader.onload = function(){
                let output = document.getElementById('avatar_preview');
                output.src = reader.result;
                $('#avatar_preview_loading').addClass('d-none');
                $('#avatar_preview').removeClass('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        };



        $('#dob').datepicker({
            dateFormat: 'MM dd, yy',
            changeMonth: true,
            changeYear: true
        });



        function setPageDefaults() {
            $('#record_section').addClass('sr-only');
            $('#records').empty();
            $('#no_record_section').addClass('sr-only');
            $('#record_count_section').removeClass('col-sm-12 col-sm-2');
            $('#pagination_section').removeClass('col-sm-10');
            $('#pagination_section').parent().addClass('sr-only');
            $('#pagination_section').addClass('sr-only');
            $('#pagination_links').empty();
            $('#record_count_section').empty();
        }

        function gets(url) {
            setPageDefaults();
            $.ajax({
                method: 'get',
                url: url,
                success: function (result) {
                    console.log(result);
                    totalRecord = result.total;
                    lastPageUrl = result.last_page_url;
                    lastPageNumber = result.last_page;
                    let firstItem = result.current_page - 4;
                    let lastItem = result.current_page + 4;
                    if (result.total > 0) {
                        $('#record_count_section').append('Record: ' + result.from + ' ~ ' + result.to + ' of ' + result.total);
                        if (result.total > '{{ $recordPerPage }}') {

                            let teamId = $('#team_id_for_search').val();
                            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                            let link = [];
                            for (let i=1; i<=result.last_page; i++) {
                                let linkUrl = '{{ url('admin/players/get/records') }}/' + teamId + '/' + searchKey + '/{{ $recordPerPage }}?page=' + i;
                                if (result.current_page === i) {
                                    link[i] = '<a href="#" class="page-link pagination_active" data-url="' + linkUrl + '">' + i + '</a>';
                                } else {
                                    link[i] = '<a href="#" class="page-link primary_btn_default" data-url="' + linkUrl + '">' + i + '</a>';
                                }
                            }
                            if (result.last_page <= 9) {
                                for (let i = 1; i<=result.last_page; i++){
                                    $('#pagination_links').append('<li class="page-item">' + link[i] + '<li>');
                                }
                            } else {
                                if (result.current_page <= 5) {
                                    firstItem = 1;
                                } else if (lastItem >= lastPageNumber) {
                                    firstItem = lastPageNumber - 8;
                                }
                                for (let i=0; i<9; i++) {
                                    $('#pagination_links').append('<li class="page-item">' + link[firstItem+i] + '<li>');
                                }
                                let jumpOver = '<div class="form-inline ml-3"><label for="jump_pagination">Go To</label><input type="text" pattern="\d+" class="form-control form-control-sm mx-2" id="jump_pagination"><label for="jump_pagination">Page</label></div>';
                                $('#pagination_links').append(jumpOver);
                            }
                            $('#record_count_section').addClass('col-sm-2');
                            $('#pagination_section').addClass('col-sm-10');
                            $('#pagination_section').removeClass('sr-only');
                        } else {
                            $('#record_count_section').addClass('col-sm-12');
                        }
                        let sl = [];
                        for (let j = result.from; j <= result.to; j++) {
                            sl.push(j);
                        }

                        $.each(result.data, function (key, value) {

                            let avatar = value.avatar !== null ? '{{ asset('storage') }}/' + value.avatar : '{{ asset('storage/images/application/avatar.png') }}';
                            let statusColor = value.status === 'Active' ? '#00a500' : '#ff3421';
                            let userStory = value.user_profile.user_story !== null ? value.user_profile.user_story.length > 200 ? value.user_profile.user_story.slice(0, 200) + '...' : value.user_profile.user_story : '---';

                            $('#records').append(
                                '<div class="card mb-4 py-3 px-5">\n' +
                                '                        <div class="row">\n' +
                                '                            <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">\n' +
                                '                                <img src="' + avatar + '" class="img-fluid rounded">\n' +
                                '                            </div>\n' +
                                '                            <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">\n' +
                                '                                <div class="card-body">\n' +
                                '                                    <h5 class="card-title">' + value.user_profile.first_name + ' ' + value.user_profile.last_name + '</h5>\n' +
                                '                                    <p class="card-text" style="font-size: 14px;"><span style="background: ' + statusColor + '; color: #fff; font-weight: 700;padding: 5px 15px;border-radius: 30px;">' + value.status + '</span></p>\n' +
                                '                                    <p class="card-text">From <span class="fw-bold">' + value.user_profile.club_name + '</span> Club</p>\n' +
                                '                                    <p class="card-text"><small class="text-muted">Member since ' + $.datepicker.formatDate('MM dd, yy', new Date(value.created_at)) + '</small></p>\n' +
                                '                                    <p class="card-text" style="font-size: 14px;">' + userStory + '</p>\n' +
                                '                                    <div>\n' +
                                '                                        <i class="far fa-edit fa-2x mr-3 edit" data-id="' + value.id + '" style="color: green; cursor: pointer;"></i>\n' +
                                '                                    </div>\n' +
                                '                                </div>\n' +
                                '                            </div>\n' +
                                '                        </div>\n' +
                                '                    </div>'
                            );
                        });
                        $('#record_section').removeClass('sr-only');
                        $('#pagination_section').parent().removeClass('sr-only');
                    } else {
                        $('#no_record_section').removeClass('sr-only');
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return true;
        }

        var currentPageUrl = '';
        var lastPageUrl = '';
        var totalRecord = 0;

        $(document).ready(function () {
            $('#team_id_for_search').val('null');
            $('#formation_id_for_search').val('null');
            $('#search_key').val('');
            currentPageUrl = '{{ url('admin/players/get/records') }}/null/null/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.page-link', function () {
            currentPageUrl = $(this).data('url');
            gets(currentPageUrl);
            return false;
        });


        $(document).on('change', '#team_id_for_search', function () {
            let teamId = $(this).val();
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('admin/players/get/records') }}/' + teamId + '/' + searchKey + '/{{ $recordPerPage }}';
            gets(currentPageUrl);
        });

        $(document).on('submit', '#search_form', function (event) {
            event.preventDefault();
            let teamId = $('#team_id_for_search').val();
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('admin/players/get/records') }}/' + teamId + '/' + searchKey + '/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });








        function clearCreateForm() {
            $('#create_form').trigger('reset');
            $('#id').val('');
            $('#avatar').val('');
            $('#passport_url').val('');
            $('#avatar_preview').addClass('d-none');
            $('#passport_preview').addClass('d-none');
            $('#create_form_message').addClass('d-none').empty();
            $('#create_form').find('.is-invalid').removeClass('is-invalid');
            $('#create_form').find('.invalid-feedback').remove();
            return true;
        }

        $(document).on('submit', '#create_form', function () {
            event.preventDefault();

            $('#create_form_message').addClass('d-none').empty();
            $('#create_form_submit_button').addClass('disabled');
            $('#create_form_submit_text').addClass('sr-only');
            $('#create_form_submit_processing').removeClass('sr-only');

            $('#create_form').find('.is-invalid').removeClass('is-invalid');
            $('#create_form').find('.invalid-feedback').remove();
            let data = new FormData(this);


            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/players/save/record') }}',
                data: data,
                processData: false,
                contentType: false,
                global: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('#create_form_submit_button').removeClass('disabled');
                    $('#create_form_submit_text').removeClass('sr-only');
                    $('#create_form_submit_processing').addClass('sr-only');
                    $('.create_modal_close').trigger('click');
                    if ($('#id').val() === '') {
                        let landingPageUrl;
                        if (totalRecord !== 0 && (totalRecord % '{{ $recordPerPage }}') === 0) {
                            landingPageUrl = lastPageUrl.split('=')[0] + '=' + (parseInt(lastPageUrl.split('=')[1]) + 1);
                        } else {
                            landingPageUrl = lastPageUrl;
                        }
                        currentPageUrl = landingPageUrl;
                        gets(landingPageUrl);
                    } else {
                        gets(currentPageUrl);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#create_form_submit_button').removeClass('disabled');
                    $('#create_form_submit_text').removeClass('sr-only');
                    $('#create_form_submit_processing').addClass('sr-only');
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'id') {
                                    $('#' + key).after('<div class="invalid-feedback"></div>');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().find('.invalid-feedback').addClass('text-danger').append('<div>' + v + '</div>');
                                    });
                                } else {
                                    $.each(value, function (k, v) {
                                        $('#create_form_message').removeClass('d-none').append('<p style="margin: 0;">' + v + '</p>');
                                    });
                                }
                            });
                        }
                    }
                }
            });
        });

        $(document).on('click', '#create', function () {
            clearCreateForm();
            $('#create_form_submit').text('Save');
            $('#create_modal').modal('show').on('shown.bs.modal', function () {
            });
            return false;
        });



        $(document).on('click', '.edit', function () {
            let classId = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('admin/players/get/record') }}',
                data: {
                    id: classId
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    clearCreateForm();
                    $('#id').val(result.user.id);

                    $('#avatar_preview').prop('src', '{{ asset('storage') }}/' + result.user.avatar).removeClass('d-none');
                    $('#email').val(result.user.email);
                    $('#first_name').val(result.user.user_profile.first_name);
                    $('#last_name').val(result.user.user_profile.last_name);
                    $('#dob').val($.datepicker.formatDate('MM dd, yy', new Date(result.user.user_profile.dob)));
                    $('#gender').val(result.user.user_profile.gender);
                    $('#country').val(result.user.user_profile.country);
                    $('#city').val(result.user.user_profile.city);
                    $('#phone').val(result.user.user_profile.phone);
                    $('#spoken_language').val(result.user.user_profile.spoken_language);
                    $('#club_name').val(result.user.user_profile.club_name);
                    $('#club_contact_name').val(result.user.user_profile.club_contact_name);
                    $('#club_phone').val(result.user.user_profile.club_phone);
                    $('#club_email').val(result.user.user_profile.club_email);
                    $('#strong_leg').val(result.user.user_profile.strong_leg);
                    $('#position').val(result.user.user_profile.position);
                    $('#height').val(result.user.user_profile.height);
                    $('#weight').val(result.user.user_profile.weight);
                    $('#passport_country').val(result.user.user_profile.passport_country);

                    $('#passport_preview').prop('src', '{{ asset('storage') }}/' + result.user.user_profile.passport_url).removeClass('d-none');
                    $('#national_experience').val(result.user.user_profile.national_experience);
                    $('#user_story').val(result.user.user_profile.user_story);

                    if (result.team !== null) {
                        $('#team_id').val(result.team.id);
                    }

                    $('#status').val(result.user.status);

                    $('#create_form_submit').text('Update');
                    $('#create_modal').modal('show').on('shown.bs.modal', function () {
                        $('#first_name').focus();
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });



        $(document).on('click', '.delete', function () {
            let id = $(this).data('id');
            let data = new FormData();
            data.append('id', id);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/players/delete/record') }}',
                data: data,
                contentType: false,
                processData: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    gets(currentPageUrl);
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });



        $(document).on('change', '#jump_pagination', function () {
            let pageNumber = parseInt($('#jump_pagination').val());
            console.log(pageNumber);
            if (Number.isInteger(pageNumber) && pageNumber <= lastPageNumber) {
                let divisionId = $('#division_id_for_search').val() === '' ? 'null' : $('#division_id_for_search').val();
                let districtId = $('#district_id_for_search').val() === '' ? 'null' : $('#district_id_for_search').val();
                let jailId = $('#jail_id_for_search').val() === '' ? 'null' : $('#jail_id_for_search').val();
                let rankId = $('#rank_id_for_search').val() === '' ? 'null' : $('#rank_id_for_search').val();
                let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                currentPageUrl = '{{ url('control/panel/operation/id/card/get/records') }}/' + divisionId + '/' + districtId + '/' + jailId + '/' + rankId + '/' + searchKey + '/{{ $recordPerPage }}?page=' + pageNumber;
                gets(currentPageUrl);
            } else {
                $.toaster({ title: 'Warning', priority : 'danger', message : 'Invalid Page Number!' });
            }
            return false;
        });
    </script>


@endsection
