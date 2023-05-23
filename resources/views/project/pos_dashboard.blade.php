<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="{{ asset('dashboard/images/favicon_1.ico') }}">
        <title>Inventrory Management System</title>

        <!-- Base Css Files -->
        <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{ asset('dashboard/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dashboard/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('dashboard/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{ asset('dashboard/css/animate.css') }}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{ asset('dashboard/css/waves-effect.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">

        <!-- Custom Files -->
        <link href="{{ asset('dashboard/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet" type="text/css" />

        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
            {{-- FONTAWESOME  --}}
            <script src="https://kit.fontawesome.com/8aec358fa7.js" crossorigin="anonymous"></script>
            
            <script src="{{ asset('dashboard/js/modernizr.min.js') }}"></script>
            <!-- DataTables -->
            <link href="{{ asset('dashboard/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
        
    </head>



    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
                @include('project.body.topbar')
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
                @include('project.body.leftbar')
            <!-- Left Sidebar End --> 


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
                @yield('main')
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            @include('project.body.rightbar')
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('dashboard/js/jquery.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/waves.js') }}"></script>
        <script src="{{ asset('dashboard/js/wow.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset('dashboard/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/chat/moment-2.2.1.js') }}"></script>
        <script src="{{ asset('dashboard/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ asset('dashboard/assets/fastclick/fastclick.j') }}s"></script>
        <script src="{{ asset('dashboard/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('dashboard/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

 

        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>

        <!-- flot Chart -->
        {{-- <script src="{{ asset('dashboard/assets/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ asset('dashboard/assets/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('dashboard/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('dashboard/assets/flot-chart/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('dashboard/assets/flot-chart/jquery.flot.selection.js') }}"></script>
        <script src="{{ asset('dashboard/assets/flot-chart/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('dashboard/assets/flot-chart/jquery.flot.crosshair.js') }}"></script> --}}

        <!-- Counter-up -->
        <script src="{{ asset('dashboard/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('dashboard/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="{{ asset('dashboard/js/jquery.app.js') }}"></script>

        <!-- Dashboard -->
        <script src="{{ asset('dashboard/js/jquery.dashboard.js') }}"></script>

        

        {{-- <!-- Chat -->
        <script src="{{ asset('dashboard/js/jquery.chat.js') }}"></script>

        <!-- Todo -->
        <script src="{{ asset('dashboard/js/jquery.todo.js') }}"></script> --}}
         <!-- Datatable  -->
        <script src="{{ asset('dashboard/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/datatables/dataTables.bootstrap.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>


        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

        <!-- Toaster  -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
        }
        @endif 
        </script>
        @yield('script')
   
    </body>
</html>