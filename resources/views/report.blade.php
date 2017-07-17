<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ empty($report_month) ? " " : date("F", mktime(0, 0, 0, $report_month, 1)) }}-{{ empty($title) ? "" : $title}}</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="starter-template.css" rel="stylesheet"> -->

    @yield('css')
</head>

<body>

    <div class="container">
        @yield('header')
        @yield('content')
    </div><!-- /.container -->

    @yield('scripts')
</body>
</html>
