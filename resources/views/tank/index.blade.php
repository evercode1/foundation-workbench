@extends('layouts.master')

@section('title')

    <title>Tanks</title>

    @endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Tanks</li>
    </ol>

    <h2>Tanks</h2>

    <hr/>

    <tank-grid></tank-grid>

    <div> <a href="tank/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button></a>
    </div>


    @endsection