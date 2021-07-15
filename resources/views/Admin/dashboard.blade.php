@extends('Layouts.admin')
@section('title', $title)
@section('content')




    <div class="row">


        {{--<div class="col-12 col-sm-6 mb-4">--}}
            {{--<div class="card border-left-primary shadow h-100 py-2">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="row no-gutters align-items-center">--}}
                        {{--<div class="col mr-2">--}}
                            {{--<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Center</div>--}}
                            {{--<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $centers->count() }}</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-auto">--}}
                            {{--<i class="fas fa-calendar fa-2x text-gray-300"></i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="col-12 col-sm-6 mb-4">--}}
            {{--<div class="card border-left-primary shadow h-100 py-2">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="row no-gutters align-items-center">--}}
                        {{--<div class="col mr-2">--}}
                            {{--<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total GI Form Submissions</div>--}}
                            {{--<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalGIFormSubmissions->count() }}</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-auto">--}}
                            {{--<i class="fas fa-calendar fa-2x text-gray-300"></i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="col-12 col-sm-6 mb-4">--}}
            {{--<div class="card border-left-secondary shadow h-100 py-2">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="row no-gutters align-items-center">--}}
                        {{--<div class="col mr-2">--}}
                            {{--<div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Students</div>--}}
                            {{--<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $students->count() }}</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-auto">--}}
                            {{--<i class="fas fa-users fa-2x text-gray-300"></i>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}



        {{--<div class="col-12 col-sm-6 mb-4">--}}
            {{--<div class="card border-left-success shadow h-100 py-2">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="row no-gutters align-items-center">--}}
                        {{--<div class="col mr-2">--}}
                            {{--<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Full Paid Students</div>--}}
                            {{--<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $fullPaidStudents }}</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-auto">--}}
                            {{--<i class="fas fa-money-bill-wave-alt fa-2x text-gray-300"></i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        {{--<div class="col-12 col-sm-6 mb-4">--}}
            {{--<div class="card border-left-warning shadow h-100 py-2">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="row no-gutters align-items-center">--}}
                        {{--<div class="col mr-2">--}}
                            {{--<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Partial Paid Students</div>--}}
                            {{--<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $partialPaidStudents }}</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-auto">--}}
                            {{--<i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-12 col-sm-6 mb-4">--}}
            {{--<div class="card border-left-danger shadow h-100 py-2">--}}
                {{--<div class="card-body">--}}
                    {{--<div class="row no-gutters align-items-center">--}}
                        {{--<div class="col mr-2">--}}
                            {{--<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Due Amount</div>--}}
                            {{--<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDueAmount }}</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-auto">--}}
                            {{--<i class="fas fa-funnel-dollar fa-2x text-gray-300"></i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>


@endsection
