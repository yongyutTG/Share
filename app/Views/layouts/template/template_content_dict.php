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
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/adminlte.css" />
        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/custom.css" />


        <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/plugins/DataTables_master/dataTables.css" />


        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />



        <!-- jQuery -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo ASSETS_URL; ?>/js/adminlte.min.js"></script>
        <script src="<?php echo ASSETS_URL; ?>/sweetalert2/sweetalert2.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo ASSETS_URL; ?>/js/demo.js"></script>
        <script src="<?php echo ASSETS_URL; ?>/js/custom.js"></script>
        <!-- AdminLTE for datatables purposes -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/DataTables_master/dataTables.js"></script>


        <style>
        .pt-5,
        .py-5 {
            padding-top: 1.5rem !important;
        }
        </style>
    </head>

    <body class="hold-transition sidebar-mini layout-navbar-fixed">
        <div class="wrapper">
            <?php echo $header; ?>
            <!-- Content Wrapper. Contains page content -->
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

        $('#divDetail').html("<?php echo date_th(date('Y-m-d H:i:s'),3); ?>");

        //setTimeout("Real()", 1000);
        // $.ajax({
        //     url: "Home/realtime",
        //     async: false,
        //     cache: false,
        //     global: false,
        //     type: "GET",
        //     data: "",
        //     success: function(result) {
        //         $('#divDetail').html(result);
        //         setTimeout("Real();", 1000);
        //     }
        // });

    }

    function Real() {
        // alert('sdfsdfsdf')
        //$('#divDetail').html("<?php echo date('Y-m-d H:i:s'); ?>");
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
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</html>