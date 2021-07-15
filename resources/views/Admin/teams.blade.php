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
                            {{--<div class="col-12 col-sm-12 col-md-6">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="team_id_for_search">Team</label>--}}
                                    {{--<select class="form-control" id="team_id_for_search">--}}
                                        {{--<option value="null">All</option>--}}
                                        {{--@foreach($teams as $team)--}}
                                            {{--<option value="{{ $team->id }}">{{ $team->name }}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="col-12">
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
        <div class="modal-dialog modal-dialog-centered modal-lg" id="create_modal_dialog">
            <div class="modal-content">
                <div class="modal-header px-4">
                    <h6 class="modal-title">Team Information</h6>
                    <button type="button" class="close create_modal_close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body px-4 pb-5">
                    <div id="create_form_message" class="text-center text-danger">

                    </div>
                    <form id="create_form">
                        <input name="id" type="hidden" id="id">



                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 col-md-12" id="team_information">

                                <div class="row">

                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="manager">Manager</label>
                                            <input name="manager" type="text" class="form-control" id="manager" placeholder="Manager">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="logo" id="logo" onchange="loadLogoFile(event)">
                                                <label class="custom-file-label" for="logo">Choose Logo File</label>
                                            </div>
                                        </div>
                                        <div class="spinner-border text-info d-none" role="status" id="logo_preview_loading">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <img src="" id="logo_preview" class="img-fluid d-none py-3">
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control" id="description" placeholder="Description" rows="5"></textarea>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="col-12 col-sm-12 col-md-12 d-none" id="team_players_information">



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






        let loadLogoFile = function(event) {
            $('#logo_preview').addClass('d-none');
            $("#logo_preview_loading").removeClass('d-none');
            let reader = new FileReader();
            reader.onload = function(){
                let output = document.getElementById('logo_preview');
                output.src = reader.result;
                $('#logo_preview_loading').addClass('d-none');
                $('#logo_preview').removeClass('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        };


        function calculateAge(birthday) { // birthday is a date
            var ageDifMs = Date.now() - birthday.getTime();
            var ageDate = new Date(ageDifMs); // miliseconds from epoch
            return Math.abs(ageDate.getUTCFullYear() - 1970);
        }




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

                            // let teamId = $('#team_id_for_search').val();
                            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                            let link = [];
                            for (let i=1; i<=result.last_page; i++) {
                                let linkUrl = '{{ url('admin/players/get/records') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + i;
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

                            let logo = '{{ asset('storage') }}/' + value.logo;
                            let statusColor = value.status === 'Active' ? '#00a500' : '#ff3421';

                            $('#records').append(
                                '<div class="card mb-4 py-3 px-5">\n' +
                                '                        <div class="row">\n' +
                                '                            <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">\n' +
                                '                                <img src="' + logo + '" class="img-fluid rounded">\n' +
                                '                            </div>\n' +
                                '                            <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">\n' +
                                '                                <div class="card-body">\n' +
                                '                                    <h5 class="card-title">' + value.name + '</h5>\n' +
                                '                                    <p class="card-text" style="font-size: 14px;"><span style="background: ' + statusColor + '; color: #fff; font-weight: 700;padding: 5px 15px;border-radius: 30px;">' + value.status + '</span></p>\n' +
                                '                                    <p class="card-text" style="font-size: 14px;">' + value.description + '</p>\n' +
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
            // $('#team_id_for_search').val('null');
            // $('#formation_id_for_search').val('null');
            $('#search_key').val('');
            currentPageUrl = '{{ url('admin/teams/get/records') }}/null/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.page-link', function () {
            currentPageUrl = $(this).data('url');
            gets(currentPageUrl);
            return false;
        });


        {{--$(document).on('change', '#team_id_for_search', function () {--}}
            {{--let teamId = $(this).val();--}}
            {{--let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();--}}
            {{--currentPageUrl = '{{ url('admin/players/get/records') }}/' + teamId + '/' + searchKey + '/{{ $recordPerPage }}';--}}
            {{--gets(currentPageUrl);--}}
        {{--});--}}

        $(document).on('submit', '#search_form', function (event) {
            event.preventDefault();
            // let teamId = $('#team_id_for_search').val();
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('admin/players/get/records') }}/' + searchKey + '/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });








        function clearCreateForm() {
            $('#create_form').trigger('reset');
            $('#id').val('');
            $('#logo').val('');
            $('#logo_preview').addClass('d-none');
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
                url: '{{ url('admin/teams/save/record') }}',
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
            $('#team_information').removeClass('col-lg-6');
            $('#team_players_information').removeClass('col-lg-6').addClass('d-none');
            $('#create_modal_dialog').removeClass('modal-xl').addClass('modal-lg');
            $('#create_form_submit_text').text('Submit');
            $('#create_modal').modal('show').on('shown.bs.modal', function () {
                $('#name').focus();
            });
            return false;
        });



        $(document).on('click', '.edit', function () {
            let teamId = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('admin/teams/get/record') }}',
                data: {
                    id: teamId
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    clearCreateForm();


                    $('#team_information').addClass('col-lg-6');
                    $('#team_players_information').addClass('col-lg-6').removeClass('d-none');
                    $('#create_modal_dialog').addClass('modal-xl').removeClass('modal-lg');


                    $('#id').val(result.team.id);
                    $('#logo_preview').prop('src', '{{ asset('storage') }}/' + result.team.logo).removeClass('d-none');
                    $('#name').val(result.team.name);
                    $('#manager').val(result.team.manager);
                    $('#status').val(result.team.status);
                    $('#description').val(result.team.description);



                    if (result.teamPlayers.length > 0) {
                        $('#team_players_information').empty().append('<div class="font-weight-bold border-bottom pb-2">Assigned Team Players</div>');
                        $.each(result.teamPlayers, function (key, teamPlayer) {
                            let avatar = '{{ asset('storage') }}/' + teamPlayer.avatar;
                            let age = calculateAge(new Date(teamPlayer.user_profile.dob));
                            $('#team_players_information').append('<div class="card mb-4 py-3 px-5">\n' +
                                '                        <div class="row">\n' +
                                '                            <div class="col-12 col-sm-12 col-md-4">\n' +
                                '                                <img src="' + avatar + '" class="img-fluid rounded">\n' +
                                '                            </div>\n' +
                                '                            <div class="col-12 col-sm-12 col-md-8">\n' +
                                '                                <div class="card-body">\n' +
                                '                                    <h5 class="card-title">' + teamPlayer.user_profile.first_name + ' ' + teamPlayer.user_profile.last_name + '</h5>\n' +
                                '                                    <p class="card-text" style="font-size: 14px;"><div class="row"><div class="col">' + age + ' Years Old</div><div class="col text-right"><i class="far fa-trash-alt fa-2x delete_team_player" data-user_id="' + teamPlayer.id + '" data-team_id="' + result.team.id + '" style="color: red; cursor: pointer;"></i></div></div></p>\n' +
                                '                                </div>\n' +
                                '                            </div>\n' +
                                '                        </div>\n' +
                                '                    </div>');

                        });
                        $('.delete_team_player').on('click', function () {

                            let userId = $(this).data('user_id');
                            let teamId = $(this).data('team_id');
                            let formData = new FormData();
                            formData.append('_token', '{{ csrf_token() }}');
                            formData.append('user_id', userId);
                            formData.append('team_id', teamId);
                            let $this = $(this);

                            $.ajax({
                                method: 'post',
                                url: '{{ url('admin/teams/delete/team/player') }}',
                                data: formData,
                                processData: false,
                                contentType: false,
                                global: false,
                                cache: false,
                                success: function (result) {
                                    console.log(result);
                                    $this.parent().parent().parent().parent().parent().parent().remove();
                                },
                                error: function (xhr) {
                                    console.log(xhr);

                                }

                            });
                        });
                    } else {
                        $('#team_players_information').empty().append('<div class="font-weight-bold border-bottom pb-2">Assigned Team Players</div><div class="alert alert-info text-center mt-4">No Team Players Assigned</div>');
                    }




                    $('#create_form_submit_text').text('Update');
                    $('#create_modal').modal('show').on('shown.bs.modal', function () {
                        $('#name').focus();
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
