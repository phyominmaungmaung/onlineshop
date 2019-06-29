<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="frontend/css/owl.carousel.css">
    <link rel="stylesheet" href="frontend/css/style.css">
    <link rel="stylesheet" href="frontend/css/responsive.css">


</head>
<body>
@include('layouts.front.nav_bar')

@yield('content')

@include('layouts.front.front_footer')
<!-- Latest jQuery form server -->
<script src="frontend/js/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="frontend/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="frontend/js/owl.carousel.min.js"></script>
<script src="frontend/js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="frontend/js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="frontend/js/main.js"></script>
</body>
</html>