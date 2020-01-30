<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Crud Turmas da Bússola</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <meta name="theme-color" content="blue">
    @yield('css-view')
</head>

<body>
@include('templates.header')

@yield('content')

@include('templates.footer')
</body>

</html>
