@extends('layouts.master-admin')

@section('title')

    <title>The Admin Page</title>

@endsection

@section('content')


    <div>

        @include('admin.grid')

    </div>


@endsection