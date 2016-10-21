@extends('layouts.master')

@section('title')

    <title>Edit Tank</title>

@endsection

@section('content')


    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/tank'>Tanks</a></li>
        <li><a href='/tank/{{$tank->id}}'>{{$tank->name}}</a></li>
        <li class='active'>Edit</li>
    </ol>

    <h1>Edit Tank</h1>

    <hr/>


    <form class="form" role="form" method="POST" action="{{ url('/tank/'. $tank->id)  }}">
        <input type="hidden" name="_method" value="patch">
    {{ csrf_field() }}

    <!-- widget_name Form Input -->
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label">Tank Name</label>

            <input type="text" class="form-control" name="name" value="{{ $tank->name }}">

            @if ($errors->has('name'))
                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                Edit
            </button>
        </div>

    </form>


@endsection