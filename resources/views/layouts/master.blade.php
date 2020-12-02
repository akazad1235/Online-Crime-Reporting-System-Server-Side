<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/ubold/layouts/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2020 14:10:00 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Crime Management Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Plugins css -->
        <link href="{{asset('admin/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />

          <!-- Bootstrap Tables css -->
          <link href="{{asset('admin/libs/bootstrap-table/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper" class="mt-0">

            <!-- Topbar Start -->
                @include('layouts.topbar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
                @include('layouts.leftSidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                <!-- start page title -->
                 @include('layouts.pageTitle')   
                <!-- end page title --> 
                    <!-- Start Content-->
                  @yield('content')

                </div> <!-- content -->

                <!-- Footer Start -->
                @include('layouts.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="{{asset('admin/js/vendor.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{asset('admin/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('admin/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <script src="{{asset('admin/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('admin/libs/flot-charts/jquery.flot.js')}}"></script>
        <script src="{{asset('admin/libs/flot-charts/jquery.flot.time.js')}}"></script>
        <script src="{{asset('admin/libs/flot-charts/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{asset('admin/libs/flot-charts/jquery.flot.selection.js')}}"></script>
        <script src="{{asset('admin/libs/flot-charts/jquery.flot.crosshair.js')}}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{asset('admin/js/pages/dashboard-1.init.js')}}"></script>

         <!-- Bootstrap Tables js -->
         <script src="{{asset('admin/libs/bootstrap-table/bootstrap-table.min.js')}}"></script>

        <!-- Init js -->
        <script src="{{asset('admin/js/pages/bootstrap-tables.init.js')}}"></script>

        <!-- App js-->
        <script src="{{asset('admin/js/app.min.js')}}"></script>
        
    </body>

<!-- Mirrored from coderthemes.com/ubold/layouts/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Jan 2020 14:10:35 GMT -->
</html>