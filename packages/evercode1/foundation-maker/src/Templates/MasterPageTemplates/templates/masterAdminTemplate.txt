<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.meta')

    @yield('title')

    @include('layouts.css')

    @yield('css')

</head>

<body role="document">

<div id="app">

    @include('layouts.nav')

    <div class="container theme-showcase" role="main">

        @include('layouts.left-nav')

        @yield('content')

        @include('layouts.bottom-admin')

    </div> <!-- /container -->

</div>

@include('layouts.scripts')

@yield('scripts')

</body>
</html>