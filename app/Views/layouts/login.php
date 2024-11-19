<!DOCTYPE>
<html>

    <head>
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=UTF-8" />
        <META name="viewport" content="width=device-width, initial-scale=1.0" />
        <META http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
        <META http-equiv=Cache-Control content=no-Cache />
        <META NAME="Generator" CONTENT="" />
        <META NAME="Author" CONTENT="สิบเอกจักรพันธ์ สัตยธรรมกุล" />
        <META NAME="Description" CONTENT=" " />
        <title>TG Saving</title>
        <!-- Theme style -->
        <link href="<?php echo ASSETS_URL ?>/login/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo ASSETS_URL ?>/login/admin.css" rel="stylesheet" type="text/css" />

        <!-- All Icon  CSS -->
        <link href="<?php echo ASSETS_URL ?>/login/font-icons/font-awesome/css/font-awesome.min.css" rel="stylesheet"
            type="text/css" />
        <link rel="stylesheet" href="<?php echo ASSETS_URL ?>/login/font-icons/entypo/css/entypo.css">
        <!-- Data Table  CSS -->
        <link href="<?php echo ASSETS_URL ?>/login/plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url(); ?>asset/js/html5shiv.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>asset/js/respond.min.js" type="text/javascript"></script>
        <![endif]-->
        <script src="<?php echo ASSETS_URL ?>/login/jquery-1.10.2.min.js" charset="UTF-8"></script>
        <!--<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-1.8.0.min.js"  charset="UTF-8"></script>-->

        <script src="<?php echo ASSETS_URL ?>/login/jquery.autocomplete.js" charset="UTF-8"></script>
        <link href="<?php echo ASSETS_URL ?>/login/jquery.autocomplete.css" rel="stylesheet" type="text/css" />


        <!-- ALl Custom Scripts
        <script src="<?php echo ASSETS_URL ?>/login/admin.js"></script>-->

        <link href="<?php echo ASSETS_URL ?>/login/animation.css" rel="stylesheet">
        <style>
        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        @media (max-width: 768px) {

            html,
            body {}
        }

        .login-box-body,
        .register-box-body {
            position: relative;
            background: -webkit-gradient(linear, left top, left bottom, from(rgb(255 255 255 / 64%)), to(rgba(0, 0, 0, 0.6)));
            background: linear-gradient(to bottom, rgb(221 103 219 / 52%) 0%, rgb(115 81 117 / 49%) 100%);
            -webkit-transition: opacity 0.1s, -webkit-transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
            transition: opacity 0.1s, -webkit-transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
            transition: opacity 0.1s, transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
            transition: opacity 0.1s, transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25), -webkit-transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
            -webkit-transform: scale(1);
            transform: scale(1);
            padding: 20px;
            border-top: 0;
        }
        </style>

    </head>


    <body class="login-page" style="
			background-image: url('<?php echo ASSETS_URL ?>/login/images/bg-main.png');
			background-position: center;
			background-repeat: no-repeat;
			background-size: 100%;
		">
        <?php
//$error = $this->session->flashdata('error');

/*if (!empty($error)) {
    ?>
        <div class="alert alert-danger"><?php
        //echo $error;
        echo $this->session->flashdata('error');
        ?></div>
        <?php }
//$this->session->unset_userdata('error');
*/
?>

        <br><br><br><br><br>
        <div class="login-box">
            <div class="login-box-body  animated fadeInUp" data-animation="fadeInUp">
                <div class="login-logo">
                    <a href="<?php echo  base_url(); ?>"><b>
                            <img src="<?php echo  ASSETS_URL ?>/login/images/tgsaving.png"></b></a>
                </div>
                <h4><b>
                        <p class="login-box-msg">
                            ระบบทะเบียนสมาชิกและหุ้น
                        </p>
                    </b>
                </h4>
                <?php $attributes = array('class' => 'email', 'id' => 'myform', 'method' => 'post');
		echo form_open('users/loginauthen', $attributes); ?>



                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="u_email" placeholder="Username" required="required" />
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="u_password" autocomplete="off"
                        placeholder="Password" required="required" />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <!--<button type="submit" class="btn bg-orange btn-block btn-flat">Login</button> -->
                    <div class="row">
                        <div class="col-xs-2"></div>
                        <div class="col-xs-6">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn bg-orange btn-block btn-flat"> Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <?php form_close(); ?>
                </div>


                <div class="row">

                    <div class="col-xs-12">

                    </div><!-- /.col -->
                </div>



                <!--   <a href="<?php echo base_url()?>forget_password">I forgot my password</a><br> -->

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->
        </div>
        </div>

    </body>

</html>