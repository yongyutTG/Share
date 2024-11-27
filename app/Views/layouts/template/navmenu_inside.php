<nav class="main-header-light navbar navbar-expand-lg navbar-white navbar-light menu_page_inside">
    <!-- Left navbar links -->
    <h6 class="systemName">ระบบเร่งรัดหนี้</h6>

    <!-- Right navbar links -->
    <div class="ml-auto d-flex align-items-center">
        <ul class="navbar-nav mainmenu mr-3">
            <li class="nav-item">
                <a href="<?php echo BASE_URL; ?>" class="nav-link">
                    <i class="fa fa-home"></i> หน้าหลัก
                </a>
            </li>
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                    <i class="fas fa-solid fa-user-tie"></i> งานนิติกร
                </a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu dropdown-menu-right border-0 shadow">
                    <li><a href="<?php echo BASE_URL; ?>Debtor" class="dropdown-item">ลูกหนี้นิติกร</a></li>
                    <li><a href="<?php echo BASE_URL; ?>Debtor_invest" class="dropdown-item">สืบทรัพย์</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
                    <i class="fas fa-solid fa-user-tie"></i> งานตรวจค่าใช้จ่าย
                </a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu dropdown-menu-right border-0 shadow">
                    <li><a href="<?php echo BASE_URL; ?>Expenseinspec" class="dropdown-item">ตรวจเบิก</a></li>
                </ul>
            </li>
        </ul>

        <!-- Notifications Dropdown Menu -->
        <ul class="navbar-nav">
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
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="signout" href="#" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
