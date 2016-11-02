@extends('layouts.master')

@section('title')
    <title></title>
@endsection

@section('content')

    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
    </ol>

    <div
            class="fb-like"
            data-share="true"
            data-width="450"
            data-show-faces="true">
    </div>

    <example></example>


    <br><br>
    <!-- Main jumbotron for a primary marketing message or call to action -->

    <div class="jumbotron">

        <h1>You are Logged in.</h1>

        <p>This is the user dash.  After the user logs in or joins, they land here.
        </p>

    </div>

@endsection