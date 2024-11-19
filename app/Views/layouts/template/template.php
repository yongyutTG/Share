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


        <!-- Bootstrap 4 -->
        <script src="<?php echo ASSETS_URL; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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

        <style>
        .content-wrapper>.content {
            padding: 15px 0.5rem;
        }
        </style>
    </head>

    <body class="hold-transition sidebar-mini layout-navbar-fixed">
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
        <div class="wrapper">
            <?php echo $header; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper pt-5 pb-5 pattern_bg">
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
        //echo ' <script src="'.$_js.'"></script>';
    }
} else {
    echo script_tag($myscript);
    //echo ' <script src="'.$myscript.'"></script>';
}
?>
        <?php endif;?>
    </body>

</html>