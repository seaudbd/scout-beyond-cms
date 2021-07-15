@extends('Layouts.frontend', ['title' => $title])

@section('title', $title)



@section('content')

<div class="form">

    <div class="form-panel one">
        <div class="form-header" style="margin-bottom: 10px;">
            <h1>Invalid Login</h1>
        </div>
        <div class="text-secondary small">Sorry, but you have not bought/renewed your membership yet. Please head back to our site and purchase a membership plan.</div>

    </div>

</div>


@endsection







