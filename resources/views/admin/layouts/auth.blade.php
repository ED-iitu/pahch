<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Админка</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('panel/assets/img/favicon.ico') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('panel/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('panel/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('panel/assets/css/authentication/form-1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/assets/css/forms/switches.css') }}">
</head>
<body class="form">
@yield('content')
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('panel/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('panel/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('panel/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('panel/assets/js/authentication/form-1.js') }}"></script>
<script src="//code-eu1.jivosite.com/widget/DXfWFpherM" async></script>
</body>
</html>
