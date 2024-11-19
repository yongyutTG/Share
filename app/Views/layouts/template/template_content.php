<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>สหกรณ์ออมทรัพย์พนักงานบริษัทการบินไทย จำกัด</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/plugins/fontawesome-free/css/all.min.css" />
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/plugins/sweetalert2/sweetalert2.min.css" />
        <!-- Toastr -->
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/plugins/toastr/toastr.min.css" />
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/sweetalert2/sweetalert2.min.css" />

        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/plugins/summernote/summernote-bs4.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/adminlte.css" />
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/custom.css" />
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />


        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/plugins/DataTables_master/dataTables.css" />
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/plugins/datatables-buttons/css/buttons.bootstrap4.css" />


        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css" />






        <style>



        </style>
    </head>

    <body class="hold-transition sidebar-mini layout-navbar-fixed">
        <!-- jQuery -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!--  App -->
        <script src="<?php echo ASSETS_URL; ?>/js/adminlte.min.js"></script>
        <script src="<?php echo ASSETS_URL; ?>/sweetalert2/sweetalert2.min.js"></script>
        <!--  for demo purposes -->
        <script src="<?php echo ASSETS_URL; ?>/js/demo.js"></script>
        <script src="<?php echo ASSETS_URL; ?>/js/custom.js"></script>

        <!--  datatables purposes -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/DataTables_master/dataTables.js"></script>
        <!-- <script src="<?php echo ASSETS_URL; ?>/plugins/datatables-buttons/js/buttons.bootstrap4.js"></script> -->


        <!-- Bootstrap 4 -->
        <!-- <script src="<?php echo ASSETS_URL; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
        <!-- ChartJS -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo ASSETS_URL; ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/moment/moment.min.js"></script>
        <script src="<?php echo ASSETS_URL; ?>/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
        </script>
        <!-- Summernote -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

        <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>

        <!-- DataTables JS -->
        <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/DataTables_master/dataTables.js"></script>

        <!-- Buttons Extension JS -->
        <!-- <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.flash.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->


        <div class=" wrapper">
            <?php echo $header; ?>
            <!-- Content Wrapper. Contains page content container-xl container-fluid-->
            <div class="container-fluid pt-5 pb-5 mt-8">
                <?php echo $contents; ?>
                <?php echo $footer; ?>
            </div>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>




        <?php if (isset($myscript)): ?>
        <?php
if (is_array($myscript) == true) {
    foreach ($myscript as $_js) {
        echo script_tag($_js);
    }
} else {
    echo script_tag($myscript);
}
?>
        <?php endif;?>
    </body>

    <script>
    function Realtime() {
        $.ajax({
            url: "Home/realtime",
            async: false,
            cache: false,
            global: false,
            type: "GET",
            data: "",
            success: function(result) {
                $('#divDetail').html(result);
                setTimeout("Real();", 1000);
            }
        });
    }

    function Real() {
        Realtime();
    }
    // $(document).ready(function() {
    //     Realtime()
    // });
    </script>
    <div class="modal modal-backdrop" id="modal_overlay" style=" background: rgb(255,255,255,1) ">
        <div class="preloader" style=" position: fixed;
                       width: 100%;
                       height: 100%;
                       top: 0;
                       left: 0;
                       z-index: 100000;
                       backface-visibility: hidden;
                       background: #ffffff;
                       ">
            <div class="preloader_img" style="width: 200px;
                   height: 200px;
                   position: absolute;
                   left: 48%;
                   top: 48%;
                   background-position: center;
                 z-index: 999999
            ">
                <img src="<?php echo base_url() ?>img/loader.gif" style=" width: 40px;" alt="loading...">
                <!-- <span class="fa fa-spinner fa-spin fa-3x purple-spinner"></span> -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</html>