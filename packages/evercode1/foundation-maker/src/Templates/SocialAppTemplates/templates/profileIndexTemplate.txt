@extends('layouts.master-admin')

@section('title')

    <title>Profiles</title>

@endsection

@section('content')

<div class="row">
    <div class="col-sm-offset-4 col-sm-8">

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Profiles</li>
    </ol>

    <h2>Profiles</h2>

    <hr/>

    @if($profiles->count() > 0)

        <table class="table table-hover table-bordered table-striped">

            <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Birthdate</th>
            </thead>

            <tbody>

            @foreach($profiles as $profile)

                <tr>
                    <td>{{ $profile->id }}</td>
                    <td><a href="/profile/{{ $profile->id }}">{{ $profile->fullName() }}</a></td>
                    <td>{{ $profile->showGender($profile->gender) }}</td>
                    <td>{{ $profile->birthdate->format('m-d-Y') }}</td>

                </tr>

            @endforeach

            </tbody>

        </table>



    @else

        <div>Sorry, no profiles</div>

    @endif

    {{ $profiles->links() }}

</div>
</div>

@endsection