<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>My Store - Furniture Ecommerce | @yield('title')</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('/assets/img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/core-style.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/style.css')}}">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="{{ asset('/assets/img/core-img/search.png')}}" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">
        @include('layouts.partials.app-header')
        @yield('content')

    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    @include('layouts.partials.app-footer')

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{ asset('/assets/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{ asset('/assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('/assets/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{ asset('/assets/js/active.js')}}"></script>

</body>

</html>