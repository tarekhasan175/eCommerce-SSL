<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords"
        content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- SITE TITLE -->
    <title>Shopwise - @yield('title')</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/css/owl.theme.default.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106310707-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-106310707-1', {
            'anonymize_ip': true
        });
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G6MPNF0KNC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-G6MPNF0KNC');
    </script>


    <!-- Hotjar Tracking Code for bestwebcreator.com -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 2073024,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>

    <!-- Start of StatCounter Code -->
    <script>
        <!--
        var sc_project = 11921154;
        var sc_security = "6c07f98b";
        var scJsHost = (("https:" == document.location.protocol) ?
            "https://secure." : "http://www.");
        //
        -->
        document.write("
    <sc"+"ript src='" +scJsHost +"statcounter.com/counter/counter.js'>
        </"+"script>");
    </script>
    <!-- End of StatCounter Code -->

</head>

<body>

    <!-- LOADER -->
    <div class="preloader">
        <div class="lds-ellipsis">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- END LOADER -->

    <!-- @include('frontend.home.home-popup') -->

    @include('frontend.home.header')

    @yield('content')

    @include('frontend.home.footer')

    <a href="index.html#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

    <!-- Latest jQuery -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- popper min js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- Latest compiled and minified Bootstrap -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- owl-carousel min js  -->
    <script src="{{ asset('assets/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <!-- magnific-popup min js  -->
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <!-- waypoints min js  -->
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <!-- parallax js  -->
    <script src="{{ asset('assets/js/parallax.js') }}"></script>
    <!-- countdown js  -->
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <!-- imagesloaded js -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- isotope min js -->
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <!-- jquery.dd.min js -->
    <script src="{{ asset('assets/js/jquery.dd.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- elevatezoom js -->
    <script src="{{ asset('assets/js/jquery.elevatezoom.js') }}"></script>
    <!-- scripts js -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>

</html>
