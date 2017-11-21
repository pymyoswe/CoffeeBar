<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coffee Lover | @yield('title')</title>
    <link href="{{asset('bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('jquery-datatable//css/style.css')}}" rel="stylesheet">
    <link href="{{asset('fontAwesome/css/font-awesome.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('jquery-datatable/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('print/jQueryPrintPage.js')}}" type="text/javascript"></script>
</head>
<body>
        @include('partial/navBar')
        @yield('content')
        <div class="row">
        </div>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.js')}}" type="text/javascript"></script>
        <script src="{{asset('jquery-datatable/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('print/jQueryPrintPage.js')}}" type="text/javascript"></script>
</body>
</html>