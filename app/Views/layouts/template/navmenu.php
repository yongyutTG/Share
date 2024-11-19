<nav class="main-header-light navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav mainmenu">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo BASE_URL; ?>" class="nav-link"><i class="fa fa-home"></i> หน้าหลัก</a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link"><i class="fas fa-laptop-code"></i> โปรแกรม</a>
                    </li> -->
        <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle"><i class="fas fa-print"></i> ประจำวัน</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                style="left: 0px; right: inherit;">
                <li><a href="/member/" class="dropdown-item">สมัครสมาชิกใหม่ (ปกติ)</a></li>
                <li><a href="#" class="dropdown-item">สมัครสมาชิกใหม่ (สมทบ)</a></li>
                <li><a href="#" class="dropdown-item">บันทึกบุคคลภายนอก</a></li>
                <li class="dropdown-divider"></li>
                <li><a href="#" class="dropdown-item">co-op Pay</a></li>
                <li><a href="#" class="dropdown-item">เปลี่ยนแปลงการส่งค่าหุ้น</a></li>
                <li><a href="#" class="dropdown-item">เปลี่ยนแปลงประวัติสมาชิก</a></li>
                <li class="dropdown-divider"></li>
                <li><a href="#" class="dropdown-item">ขอพ้นสภาพ</a></li>
                <li><a href="#" class="dropdown-item">รายงานการเข้าประชุมเพื่ออนุมัติพ้นสภาพ</a></li>
                <li><a href="#" class="dropdown-item">อนุมัติพ้นสภาพ</a></li>
                <li><a href="#" class="dropdown-item">โอนหุ้นและชำระหนี้</a></li>
                <li><a href="#" class="dropdown-item">ส่งจ่าย(โอนหุ้นและชำระหนี้)</a></li>
                <li><a href="#" class="dropdown-item">แก้ไขการพ้นสภาพ</a></li>
                <li class="dropdown-divider"></li>
                <li><a href="#" class="dropdown-item">ย้ายแผนก(รายบุคคล)</a></li>
                <li class="dropdown-divider"></li>
                <li><a href="#" class="dropdown-item">เปลี่ยนแปลงผู้รับผลประโยชน์</a></li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-hover has-submenu">
                    <a id="dropdownSubMenu2" href="#" role="button" aria-haspopup="true" aria-expanded="true"
                        class="dropdown-item dropdown-toggle">แก้ไข</a>
                    <div class="megasubmenu dropdown-menu">

                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                            <li>
                                <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                            </li>

                            <li class="dropdown-submenu">
                                <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"
                                    class="dropdown-item dropdown-toggle">level 2</a>

                                <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                    <li><a href="#" class="dropdown-item">3rd level</a></li>
                                    <li><a href="#" class="dropdown-item">3rd level</a></li>
                                </ul>

                            </li>
                            <li><a href="#" class="dropdown-item">level 2</a></li>
                            <li><a href="#" class="dropdown-item">level 2</a></li>
                        </ul>
                    </div>

                </li>

            </ul>
        </li>
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="signout" href="#" role="button">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>