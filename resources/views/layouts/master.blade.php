<?php

    $website = \App\Webs::get();
    foreach ($website as $xasi);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ $xasi->nama }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico ') }}">

        <!-- jvectormap -->
        <link href="{{ asset('assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet') }}" />

        <!-- DataTables -->
        <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
        
        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
        .error{
            color: rgb(238, 34, 34);
            }
        </style>
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

        

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            
                            <span class="pro-user-name ml-1">
                                  {{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h6 class="m-0">
                                    Welcome !
                                </h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="dripicons-user"></i>
                                <span>My Account</span>
                            </a>

                         

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a href="{{ url('/logout') }}" class="dropdown-item notify-item">
                                <i class="dripicons-power"></i>
                                <span>Logout</span>
                            </a>

                        </div>
                    </li>

                 
                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled menu-left mb-0">
                    <li class="float-left">
                        <a href="index.html" class="logo">
                            <span class="logo-lg">
                                <img src="{{ asset('foto/'.$xasi->logo) }}" alt="" height="22">
                            </span>
                            <span class="logo-sm">
                                <img src="{{ asset('foto/'.$xasi->logo) }}" alt="" height="24">
                            </span>
                        </a>
                    </li>
                    <li class="float-left">
                        <a class="button-menu-mobile navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </li>
                    <li class="app-search d-none d-md-block">
                        <form>
                            <input type="text" placeholder="Search..." class="form-control">
                            <button type="submit" class="sr-only"></button>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{ url('/dashboard') }}">
                                    <i class="dripicons-meter"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i class=" icon-briefcase"></i>
                                    <span> Management Data </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                     
                                    
                                    @if(Auth::user()->role === 'admin')
                                    <li>
                                        <a href="{{ url('/user') }}">Management User</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ url('/brita') }}">Management Berita</a>
                                    </li>   
                                  
                                </ul>
                            </li>
                             <li>
                                <a href="javascript: void(0);">
                                    <i class=" icon-bag"></i>
                                    <span> Data Desa</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ url('/structur') }}">Management Struktur</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/potensi') }}">Management Potensi</a>
                                    </li>   
                                    <li>
                                        <a href="{{ url('/grafik') }}">Management Grafik</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/keuangan') }}">Keuangan</a>
                                    </li>
                                     <li>
                                        <a href="{{ url('/pemasukan') }}">Pemasukan</a>
                                    </li>
                                     <li>
                                        <a href="{{ url('/pengeluaran') }}">Pengeluaran</a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="javascript: void(0);">
                                    <i class="icon-wrench"></i>
                                    <span> Web Settings </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="{{ url('/webseting') }}">Klola Web</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/slider') }}">Slidshow</a>
                                    </li>   
                                    <li>
                                        <a href="{{ url('/sejarahs') }}">Sejarah Desa</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/galery') }}">Management Galery</a>
                                    </li>
                                     <li>
                                        <a href="{{ url('/quetes') }}">Kata-kata</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}">
                                    <i class="dripicons-power"></i> <span> Logout </span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                     @yield('content')

                    </div> <!-- container -->

                </div> <!-- content -->
                <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h5 class="m-0 text-white">Settings</h5>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 414px;"><div class="slimscroll-menu" style="overflow: hidden; width: auto; height: 414px;">
                <!-- User box -->
                <div class="user-box">
                   
                    <h5><a href="javascript: void(0);"> {{ Auth::user()->name }}</a> </h5>
                    <p class="text-muted mb-0"><small> {{ Auth::user()->role }}</small></p>
                </div>

                <form action="{{ url('/suser') }}" method="post" id="setings">
                   @csrf
                   <div class="alert alert-primary" id="pesan-user" role="alert"></div>
                   <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="nama" required name="nama" placeholder="Masukan Nama" value="{{ Auth::user()->name }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="username" name="username" placeholder="Masukan Username" value="{{ Auth::user()->username }}"  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control " id="password" name="password" placeholder="Ubah Passowrd / kalo tidak di kosongin" value=""  >
                        </div>
                    </div>


                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>

                </form>

  
            </div><div class="slimScrollBar" style="background: rgb(158, 165, 171) none repeat scroll 0% 0%; width: 8px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 188.141px;"></div><div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div> <!-- end slimscroll-menu-->
        </div>
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-center">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>  <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">{{ $xasi->cp }}</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- KNOB JS -->
        <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- Chart JS -->
        <script src="{{ asset('assets/libs/chart-js/Chart.bundle.min.js') }}"></script>

        <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
        <!-- Jvector map -->
        <script src="{{ asset('assets/libs/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jqvmap/jquery.vmap.usa.js') }}"></script>
        
        <!-- Datatable js -->
        <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
        
        <!-- Dashboard Init JS -->
        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
        
        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        @yield('script')

    </body>
    <script type="text/javascript">
  $('#pesan-user').hide()
  
  $(function () {

     

      $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

    });

    


    

        if ($("#setings").length > 0) {
            $("#setings").validate({

                submitHandler: function(form) {

                    var actionType = $('#btn-save').val();
                    $('#btn-save').html('Sending..');

                           $.ajax({

                    data: $('#setings').serialize(),

                    url: "{{ url('suser') }}",

                    type: "POST",

                    dataType: 'json',

                    success: function (data) {

                


                        if(data.status == 'sukses'){
                        $('#pesan-user').html(data.pesan).fadeIn().delay(10000).fadeOut()
                        
                        }else{
                        $('#pesan-error').html(data.pesan).show()
                        }

                    },

                    error: function (data) {

                        console.log('Error:', data);

                        $('#saveBtn').html('Save Changes');

                    }

                });


                }
            })
        }

    


    
    $('body').on('click', '.deleteData', function () {

     

        var data_id = $(this).data("id");

        confirm("Are You sure want to delete !");

      

        $.ajax({

            type: "DELETE",

            url: "{{ route('user.store') }}"+'/'+data_id,

            success: function (data) {
                $('#pesan-sukses').html(data.pesan).fadeIn().delay(10000).fadeOut()
                table.draw();

            },

            error: function (data) {

                console.log('Error:', data);

            }

        });

    });

     

  });

</script>
</html>