<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="description" content="BussolaSocial">
<title>Crud Turmas da Bússola</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='{{asset('assets/packages/core/main.css')}}' rel='stylesheet' />
    <link href='{{asset('assets/packages/daygrid/main.css')}}' rel='stylesheet' />
    <link href='{{asset('assets/packages/timegrid/main.css')}}' rel='stylesheet' />
    <link href='{{asset('assets/packages/list/main.css')}}' rel='stylesheet' />

    <link href='{{asset('assets/css/bootstrap.min.css')}}' rel='stylesheet' />
    <link href='{{asset('assets/css/style.css')}}' rel='stylesheet' />

    <meta name="theme-color" content="blue">
    @yield('css-view')
</head>

<body>
@include('templates.header')

@yield('content')

@include('templates.footer')







{{--<script>let objCalendar;</script>--}}

</body>

</html>
