<nav class="sb-topnav navbar navbar-expand navbar-dark bg-secondary">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?= base_url();?>Dashboard/dashboard_admin">
        <img src="<?= base_url() ?>assets/img/uigm.png" width="80px" alt="">
         </a>
        
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url();?>Settings/profile_admin_utama">Settings</a></li>
                    <li><a class="dropdown-item" href="<?= base_url();?>Login/log_out">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>