<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('frontEndAsset') }}/images/favicon.png" type="">
    <title>@yield('title')</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEndAsset') }}/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="{{ asset('frontEndAsset') }}/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('frontEndAsset') }}/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('frontEndAsset') }}/css/responsive.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
            integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>


    <!-- starts header section  -->
    @include('frontEnd.include.header')
    <!-- end header section -->



    <!-- main section start -->
    @yield('content')
    <!-- main section end -->


    <!-- footer start -->
    @include('frontEnd.include.footer')
    <!-- footer end -->


{{--    this will do the magic--}}
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
<!-- jQery -->
<script src="{{ asset('frontEndAsset') }}/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="{{ asset('frontEndAsset') }}/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="{{ asset('frontEndAsset') }}/js/bootstrap.js"></script>
<!-- custom js -->
<script src="{{ asset('frontEndAsset') }}/js/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
