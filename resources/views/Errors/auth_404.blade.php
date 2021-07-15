@extends('Layouts.member', ['title' => '404 - Not Found'])

@section('title', '404 - Not Found')



@section('content')

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col">
                <div class="alert alert-info text-center">Something went wrong!</div>
                <div class="mt-5 text-center">
                    <a href="{{ url('member/profile') }}" class="btn" style="background-color: #05ff91; font-weight: 600; color: #ffffff; padding: 5px 75px;">Go to Profile</a>
                </div>
            </div>
        </div>
    </div>

    <div class="my-5"></div>

@endsection


