<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Админка - @if(isset($globals['title'])) {{ $globals['title'] }}@endif</title>
    <link rel="icon" type="image/x-icon" href=""/>
    <link href="{{ asset('panel/assets/css/loader.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('panel/assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('panel/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('panel/assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('panel/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('panel/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" href="{{ asset('panel/plugins/notification/snackbar/snackbar.min.css') }}">

    @stack('styles')
    @stack('head-scripts')
</head>
<body class="sidebar-noneoverflow">
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->


<!--  BEGIN NAVBAR  -->
@include('admin.partials.navbar')
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
@include('admin.partials.sidebar')
<!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        @include('admin.partials.breadcrumb')
    @yield('content')
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('panel/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('panel/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('panel/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('panel/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('panel/assets/js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>
<script src="{{ asset('panel/assets/js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script type="text/javascript">
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
    });
</script>
<script src="{{ asset('panel/plugins/notification/snackbar/snackbar.min.js') }}"></script>
<script src="{{ asset('js/notification.js') }}"></script>
@stack('scripts')
@stack('after-scripts')
</body>
</html>

