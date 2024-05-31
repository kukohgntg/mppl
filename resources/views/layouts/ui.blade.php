@yield('php')
<?php

    $website = \App\Webs::get();
    foreach ($website as $xasi);
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('judul')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="assetz/site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="assetz/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assetz/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetz/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetz/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assetz/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetz/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assetz/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assetz/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assetz/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('assetz/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assetz/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assetz/css/style.css') }}">
    <!-- <link rel="stylesheet" href="assetz/css/responsive.css') }}"> -->
</head>
<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="assetz/https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="{{ $xasi->fb }}">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-envelope"></i> {{$xasi->email }}</a></li>
                                    <li><a href="#"> <i class="fa fa-phone"></i> {{ $xasi->tlp }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-lg-5">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('foto/'.$xasi->logo) }}" width="50" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ url('/berita') }}">Berita</a></li>

                                        <li><a href="#">Statistik <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="{{ url('/jenisklamin') }}">Statistik Jumlah Penduduk</a>
                                                </li>
                                                <li><a href="{{ url('/pekerjaan') }}">Statistik Mata Pencaharian</a>
                                                </li>
                                                <li><a href="{{ url('/agama') }}">Statistik Agama</a></li>
                                                <li><a href="{{ url('/pendidikan') }}">Statistik Pendidikan</a></li>


                                            </ul>
                                        </li>
                                        <li><a href="#">Tentang Desa<i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="{{ url('/visi') }}">Visi-Misi</a></li>
                                                <li><a href="{{ url('/sejarah') }}">Sejarah</a></li>
                                                <li><a href="{{ url('/struktur') }}">Struktur</a></li>
                                                <li><a href="{{ url('/potensidesa') }}">Potensi</a></li>
                                                <li><a href="{{ url('/galerys') }}">Galery</a></li>


                                            </ul>
                                        </li>
                                        <li><a href="{{ url('/peta') }}">Peta Wilayah</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-none d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                    <a href="{{ url('/login') }}" class="">Login</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
    @yield('content')
    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img  src="{{ asset('foto/'.$xasi->logo) }}" width="50">
                                </a>
                            </div>
                            <p>
                                Mediasosial Kami
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="{{ $xasi->fb }}">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $xasi->twiter }}">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $xasi->ig }}">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                <!-- Departments -->
                            </h3>
                            <ul>

                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Useful Links
                            </h3>
                            <ul >
                                <li><a class="active" href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('/berita') }}">Berita</a></li>


                                <li><a href="{{ url('/jenisklamin') }}">Statistik Jumlah Penduduk</a></li>
                                <li><a href="{{ url('/pekerjaan') }}">Statistik Mata Pencaharian</a></li>

                                <li><a href="{{ url('/peta') }}">Peta Wilayah</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Alamat
                            </h3>
                            <p>
                                {{ $xasi->alamat }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy; {{ $xasi->cp }}
                            <script>document.write(new Date().getFullYear());</script>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end  -->

    <script src="{{ asset('assetz/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assetz/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assetz/js/popper.min.js') }}"></script>
    <script src="{{ asset('assetz/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetz/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assetz/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assetz/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assetz/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assetz/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assetz/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assetz/js/scrollIt.js') }}"></script>
    <script src="{{ asset('assetz/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assetz/js/wow.min.js') }}"></script>
    <script src="{{ asset('assetz/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assetz/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('assetz/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assetz/js/plugins.js') }}"></script>
    <script src="{{ asset('assetz/js/gijgo.min.js') }}"></script>
    <!--contact js-->
    <script src="{{ asset('assetz/js/contact.js') }}"></script>
    <script src="{{ asset('assetz/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assetz/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assetz/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assetz/js/mail-script.js') }}"></script>

    <script src="{{ asset('assetz/js/main.js') }}"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
    @yield('js')
</body>

</html>