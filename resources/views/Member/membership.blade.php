@extends('Layouts.member')

@section('title', $title)



@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">
                <div class="shadow-sm mb-2 py-4 px-3 bg-body">
                    Membership | <span class="fw-bold">General Information</span>
                </div>



                <div class="row mt-4">
                    <div class="col px-5">
                        <div class="card border-0">
                            <div class="card-header rounded py-5">
                                <div class="fw-bold px-5 pt-3">Your Purchased<br>Membership On</div>
                                <div class="px-5"><hr style="width: 100%; color: #816400;"></div>
                                <div class="card-title px-5 pb-3">{{ date('F d, Y', strtotime($membership->start_date)) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col px-5">
                        <div class="card border-0">
                            <div class="card-header rounded py-5">
                                <div class="fw-bold px-5 pt-3">Your Membership<br>Period</div>
                                <div class="px-5"><hr style="width: 100%; color: #816400;"></div>
                                <div class="card-title px-5 pb-3">{{ $membership->total_period }} Months</div>
                            </div>
                        </div>
                    </div>
                    <div class="col px-5">
                        <div class="card border-0">
                            <div class="card-header rounded py-5">
                                <div class="fw-bold px-5 pt-3">Your Membership<br>Ends On</div>
                                <div class="px-5"><hr style="width: 100%; color: #816400;"></div>
                                <div class="card-title px-5 pb-3">{{ date('F d, Y', strtotime($membership->end_date)) }}</div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col">
                        <div class="fw-bold px-5">
                            Your membership will end after {{ $membership->total_period }} months. Till the time, you can enjoy all benefits of our platform.
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col px-5">
                        <button type="button" class="btn me-3" id="cancel_membership" style="background-color: #ff4600; font-weight: 600; color: #ffffff; padding: 8px 50px;">Cancel Membership</button>
                        <button type="button" class="btn" id="renew_membership" style="background-color: #fff; border: 1px solid #ff4600; font-weight: 600; color: #747474; padding: 8px 30px;">Upgrade/Renew Membership</button>
                    </div>

                </div>






            </div>
        </div>
    </div>

    <div class="mt-5"></div>




    <script type="text/javascript">

        $('#cancel_membership').on('mouseover', function () {
            $(this).css({
                'background-color': '#abc',
                'color': '#ff4600'
            });
        });

        $('#cancel_membership').on('mouseout', function () {
            $(this).css({
                'background-color': '#ff4600',
                'color': '#ffffff'
            });
        });

        $('#renew_membership').on('mouseover', function () {
            $(this).css({
                'background-color': '#abc',
                'color': '#ff4600'
            });
        });

        $('#renew_membership').on('mouseout', function () {
            $(this).css({
                'background-color': '#ffffff',
                'color': '#747474'
            });
        });

    </script>


@endsection
