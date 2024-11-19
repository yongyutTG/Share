    <!-- Navbar -->
    <?php $uri = current_url(true);?>
    <div id="logo" class="header-light"><img src="<?php echo ASSETS_URL; ?>/img/logo_coop_png.png" loading="lazy"
            class="img-fluid" /></div>
    <section id="header-light">
        <div class="system_name">
            <h1>สหกรณ์ออมทรัพย์พนักงานบริษัทการบินไทย จำกัด</h1>
            <div class="slogan_text">เป็นสหกรณ์ออมทรัพย์ที่มั่นคง โปร่งใส ก้าวไกลด้วยเทคโนโลยี
                เอื้ออาทรต่อสมาชิกและสังคม</div>
        </div>

        <ul id="loginInfo" class="navbar-nav">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <?php //echo date_th(date('Y-m-d H:i:s'),3); ?>
                <div id="divDetail"></div>
            </li>
            <li class="nav-item separated">

            </li>
            <li class="nav-item dropdown marginBottomMinus15">
                <a class="nav-link text-right" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i> นิติกร เร่งรัดหนี้
                    <div class="user_division"><small>นิติกรชำนวญการ</small></div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?php echo ASSETS_URL; ?>/img/user1-128x128.jpg" alt="User Avatar"
                                class="img-size-50 mr-3 img-circle" />
                            <div class="media-body">
                                <div class="dropdown-item-title">
                                    <i class="fas fa-caret-right"></i>
                                    โปรไฟล์
                                    <p class="text-sm"></p>
                                    <div class="dropdown-divider mt-1"></div>
                                    <!-- <p class="text-sm text-muted mt-1"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</p> -->
                                </div>
                            </div>
                            <!-- Message End -->
                    </a>
                </div>
            </li>
        </ul>
    </section>
    <?php

if ($uri->getSegment(1) == 'systemControl') {
    
    //include 'navmenu.php';
    include 'navmenu_inside.php';
} else {
    //include 'navmenu.php';
    include 'navmenu_inside.php';
    //echo $uri->getSegment(1);

}
?>

    <!-- /.navbar -->