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
                    <h6 class="modal-title">Game Video Information</h6>
                    <button type="button" class="close create_modal_close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body px-4 pb-5">
                    <div id="create_form_message" class="text-center text-danger">

                    </div>
                    <form id="create_form">
                        <input name="id" type="hidden" id="id">


                        <div class="row">


                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" type="text" class="form-control" id="title" placeholder="Title">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="team_id1">Team 1</label>
                                    <select name="team_id1" class="form-control" id="team_id1">
                                        <option value="">Select Team</option>
                                        @foreach($teams as $key => $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="team_id2">Team 2</label>
                                    <select name="team_id2" class="form-control" id="team_id2">
                                        <option value="">Select Team</option>
                                        @foreach($teams as $key => $team)
                                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="top_player_id">Top Player</label>
                                    <select name="top_player_id" class="form-control" id="top_player_id">
                                        <option value="">Select Top Player</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="man_of_the_match_id">Man of the Match</label>
                                    <select name="man_of_the_match_id" class="form-control" id="man_of_the_match_id">
                                        <option value="">Select Man of the Match</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="team1_formation_name">Team 1 Formation Type</label>
                                    <input type="text" name="team1_formation_name" class="form-control" id="team1_formation_name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="team1_formation_url">Team 1 Formation Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="team1_formation_url" id="team1_formation_url" onchange="loadTeam1FormationImageFile(event)">
                                        <label class="custom-file-label" for="team1_formation_url">Choose File</label>
                                    </div>
                                </div>
                                <div class="spinner-border text-info d-none" role="status" id="team1_formation_image_preview_loading">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <img src="" id="team1_formation_image_preview" class="img-fluid d-none py-2">
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="team2_formation_name">Team 2 Formation Type</label>
                                    <input type="text" name="team2_formation_name" class="form-control" id="team2_formation_name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="team2_formation_url">Team 2 Formation Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="team2_formation_url" id="team2_formation_url" onchange="loadTeam2FormationImageFile(event)">
                                        <label class="custom-file-label" for="team2_formation_url">Choose File</label>
                                    </div>
                                </div>
                                <div class="spinner-border text-info d-none" role="status" id="team2_formation_image_preview_loading">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <img src="" id="team2_formation_image_preview" class="img-fluid d-none py-2">
                            </div>


                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="video_thumbnail_url">Highlight Video</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="video_thumbnail_url" id="video_thumbnail_url" onchange="loadHighlightVideoFile(event)">
                                        <label class="custom-file-label" for="video_thumbnail_url">Choose Highlight Video</label>
                                    </div>
                                </div>
                                <div class="spinner-border text-info d-none" role="status" id="highlight_video_preview_loading">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <video width="100%" height="240" controls id="highlight_video_preview" class="d-none">
                                    <source src="" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <iframe src="" height="240" width="100%" id="highlight_video_preview_iframe" frameborder="0" class="d-none"></iframe>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="video_url">Game Video</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="video_url" id="video_url" onchange="loadVideoFile(event)">
                                        <label class="custom-file-label" for="video_url">Choose Game Video</label>
                                    </div>
                                </div>
                                <div class="spinner-border text-info d-none" role="status" id="video_preview_loading">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <video width="100%" height="240" controls id="video_preview" class="d-none">
                                    <source src="" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <iframe src="" height="240" width="100%" id="video_preview_iframe" frameborder="0" class="d-none"></iframe>
                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="report_url">Game Report</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="report_url" id="report_url" onchange="loadReportFile(event)">
                                        <label class="custom-file-label" for="report_url">Choose Game Report</label>
                                    </div>
                                </div>
                                <div class="spinner-border text-info d-none" role="status" id="report_preview_loading">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <div id="report_preview_container"></div>

                            </div>

                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" placeholder="Description" rows="5"></textarea>
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

        let loadVideoFile = function(event) {
            $('#video_preview').prop('src', '').addClass('d-none');
            $('#video_preview_iframe').prop('src', '').addClass('d-none');
            $("#video_preview_loading").removeClass('d-none');
            let reader = new FileReader();
            reader.onload = function(){
                let output = document.getElementById('video_preview');
                output.src = reader.result;
                $('#video_preview_loading').addClass('d-none');
                $('#video_preview').removeClass('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        let loadReportFile = function(event) {

            $('#report_preview_container').empty();
            $("#report_preview_loading").removeClass('d-none');
            let reader = new FileReader();
            reader.onload = function() {
                $('#report_preview_container').append('<object width="100%" height="240" data="' + reader.result + '"></object>');
                $('#report_preview_loading').addClass('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        };


        let loadHighlightVideoFile = function(event) {
            $('#highlight_video_preview').prop('src', '').addClass('d-none');
            $('#highlight_video_preview_iframe').prop('src', '').addClass('d-none');
            $("#highlight_video_preview_loading").removeClass('d-none');
            let reader = new FileReader();
            reader.onload = function(){
                let output = document.getElementById('highlight_video_preview');
                output.src = reader.result;
                $('#highlight_video_preview_loading').addClass('d-none');
                $('#highlight_video_preview').removeClass('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        };


        let loadTeam1FormationImageFile = function(event) {
            $('#team1_formation_image_preview').addClass('d-none');
            $("#team1_formation_image_preview_loading").removeClass('d-none');
            let reader = new FileReader();
            reader.onload = function(){
                let output = document.getElementById('team1_formation_image_preview');
                output.src = reader.result;
                $('#team1_formation_image_preview_loading').addClass('d-none');
                $('#team1_formation_image_preview').removeClass('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        let loadTeam2FormationImageFile = function(event) {
            $('#team2_formation_image_preview').addClass('d-none');
            $("#team2_formation_image_preview_loading").removeClass('d-none');
            let reader = new FileReader();
            reader.onload = function(){
                let output = document.getElementById('team2_formation_image_preview');
                output.src = reader.result;
                $('#team2_formation_image_preview_loading').addClass('d-none');
                $('#team2_formation_image_preview').removeClass('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        };


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
                                let linkUrl = '{{ url('admin/game/videos/get/records') }}/' + teamId + '/' + searchKey + '/{{ $recordPerPage }}?page=' + i;
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
                            let statusColor = value.status === 'Active' ? '#00a500' : '#ff3421';

                            $('#records').append(
                                '<div class="card mb-4 py-4 px-5 game_video" data-id="' + value.id + '" style="cursor: pointer;">' +
                                '                        <div class="row">' +
                                '                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">' +
                                '                                <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="' + value.video_thumbnail_url + '"></iframe></div>' +
                                '                            </div>' +
                                '                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-8">' +
                                '                                <div class="card-body pt-0">' +
                                '                                    <h5 class="card-title">' + value.title + '</h5>' +
                                '                                    <p class="card-text" style="font-size: 14px;"><span style="background: ' + statusColor + '; color: #fff; font-weight: 700;padding: 5px 15px;border-radius: 30px;">' + value.status + '</span></p>\n' +
                                '                                    <div class="font-weight-bold mb-3">' + value.team1.name + ' vs ' + value.team2.name +  '</div>' +
                                '                                    <p class="card-text">' + value.description.slice(0, 200) + '...</p>' +
                                '                                    <p class="card-text"><small class="text-muted">Uploaded on ' + $.datepicker.formatDate('MM dd, yy', new Date(value.created_at)) + ' at ' + new Date(value.created_at).getHours() + ':' + new Date(value.created_at).getMinutes() + ':' + new Date(value.created_at).getSeconds() + '</small></p>' +
                                '                                    <div>' +
                                '                                        <i class="far fa-edit fa-2x mr-3 edit" data-id="' + value.id + '" style="color: green; cursor: pointer;"></i>' +

                                '                                    </div>' +
                                '                                </div>' +
                                '                            </div>' +
                                '                        </div>' +
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
            $('#search_key').val('');
            currentPageUrl = '{{ url('admin/game/videos/get/records') }}/null/null/{{ $recordPerPage }}';
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
            currentPageUrl = '{{ url('admin/game/videos/get/records') }}/' + teamId + '/' + searchKey + '/{{ $recordPerPage }}';
            gets(currentPageUrl);
        });


        $(document).on('submit', '#search_form', function (event) {
            event.preventDefault();
            let teamId = $('#team_id_for_search').val();
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('admin/game/videos/get/records') }}/' + teamId + '/' + searchKey + '/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.game_video', function () {
            location = '{{ url('admin/game/videos') }}/' + $(this).data('id');
        });


        $(document).on('change', '#team_id1', function () {
            let team1Id = $(this).val();
            let team2Id = $('#team_id2').val();
            if (team1Id !== '' && team2Id !== '' && team1Id === team2Id) {
                $.toast({
                    text : 'Same Team is not Assignable to a Game Video.',
                    showHideTransition : 'slide',
                    bgColor : 'red',
                    textColor : '#eee',
                    allowToastClose : true,
                    hideAfter : 5000,
                    stack : 5,
                    textAlign : 'left',
                    position : 'bottom-left'
                });
            } else {
                $.ajax({
                    method: 'get',
                    url: '{{ url('admin/game/videos/get/team/players') }}',
                    data: {
                        team_id1: team1Id,
                        team_id2: team2Id
                    },
                    cache: false,
                    success: function (result) {
                        console.log(result);
                        $('#top_player_id').empty().append('<option value="">Select Top Player</option>');
                        $('#man_of_the_match_id').empty().append('<option value="">Select Man of the Match</option>');
                        $.each(result, function (key, player) {
                            $('#top_player_id').append('<option value="' + player.id + '">' + player.first_name + ' ' + player.last_name + '</option>');
                            $('#man_of_the_match_id').append('<option value="' + player.id + '">' + player.first_name + ' ' + player.last_name + '</option>');
                        });

                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
            }

        });


        $(document).on('change', '#team_id2', function () {
            let team2Id = $(this).val();
            let team1Id = $('#team_id1').val();
            if (team1Id !== '' && team2Id !== '' && team1Id === team2Id) {
                $.toast({
                    text : 'Same Team is not Assignable to a Game Video.',
                    showHideTransition : 'slide',
                    bgColor : 'red',
                    textColor : '#eee',
                    allowToastClose : true,
                    hideAfter : 5000,
                    stack : 5,
                    textAlign : 'left',
                    position : 'bottom-left'
                });
            } else {
                $.ajax({
                    method: 'get',
                    url: '{{ url('admin/game/videos/get/team/players') }}',
                    data: {
                        team_id1: team1Id,
                        team_id2: team2Id
                    },
                    cache: false,
                    success: function (result) {
                        console.log(result);
                        $('#top_player_id').empty().append('<option value="">Select Top Player</option>');
                        $('#man_of_the_match_id').empty().append('<option value="">Select Man of the Match</option>');
                        $.each(result, function (key, player) {
                            $('#top_player_id').append('<option value="' + player.id + '">' + player.first_name + ' ' + player.last_name + '</option>');
                            $('#man_of_the_match_id').append('<option value="' + player.id + '">' + player.first_name + ' ' + player.last_name + '</option>');
                        });

                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
            }

        });



        function clearCreateForm() {
            $('#create_form').trigger('reset');
            $('#id').val('');

            $('#team1_formation_url').val('');
            $('#team2_formation_url').val('');

            $('#video_url').val('');
            $('#video_thumbnail_url').val('');

            $('#report_url').val('');
            $('#report_preview_container').empty();

            $('#video_preview').prop('src', '').addClass('d-none');
            $('#video_preview_iframe').prop('src', '').addClass('d-none');

            $('#highlight_video_preview').prop('src', '').addClass('d-none');
            $('#highlight_video_preview_iframe').prop('src', '').addClass('d-none');



            $('#team1_formation_image_preview').addClass('d-none');
            $('#team2_formation_image_preview').addClass('d-none');

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
                url: '{{ url('admin/game/videos/save/record') }}',
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
                url: '{{ url('admin/game/videos/get/record') }}',
                data: {
                    id: classId
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    clearCreateForm();
                    $('#id').val(result.id);
                    $('#title').val(result.title);

                    $('#team_id1').val(result.team_id1);
                    $('#team_id2').val(result.team_id2);

                    $('#team1_formation_name').val(result.team1_formation_name);
                    $('#team2_formation_name').val(result.team2_formation_name);


                    $('#team1_formation_image_preview').prop('src', '{{ asset('storage') }}/' + result.team1_formation_url).removeClass('d-none');
                    $('#team2_formation_image_preview').prop('src', '{{ asset('storage') }}/' + result.team2_formation_url).removeClass('d-none');

                    $('#video_preview_iframe').prop('src', result.video_url).removeClass('d-none');
                    $('#highlight_video_preview_iframe').prop('src', result.video_thumbnail_url).removeClass('d-none');

                    let reportUrl = '{{ asset('storage') }}/' + result.report_url;
                    $('#report_preview_container').append('<object width="100%" height="240" data="' + reportUrl + '"></object>');

                    $('#status').val(result.status);
                    $('#description').val(result.description);

                    $('#create_form_submit').text('Update');
                    $('#create_modal').modal('show').on('shown.bs.modal', function () {
                        $('#title').focus();
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
                url: '{{ url('admin/game/videos/delete/record') }}',
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
