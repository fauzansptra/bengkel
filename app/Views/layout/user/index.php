<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Antrian</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/assets/images/logos/logo.png" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="<?= base_url() ?>" class="text-nowrap logo-img">
                        <img src="<?= base_url() ?>/assets/images/logos/logo.png" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">DATA</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= (strpos(uri_string(), 'user') !== false) ? 'active' : '' ?>" href="<?php echo site_url('user') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">Pengguna</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= (strpos(uri_string(), 'antrian') !== false) ? 'active' : '' ?>" href="<?php echo site_url('antrian') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-stack-2"></i>
                                </span>
                                <span class="hide-menu">Antrian</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link <?= (strpos(uri_string(), 'laporan') !== false) ? 'active' : '' ?>" href="<?php echo site_url('laporan') ?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Laporan</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <div class="d-flex align-items-center gap-1" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="d-flex flex-column text-end">
                                        <span class="me-2"><?= session()->get('nama') ?></span>
                                        <span class="me-2"><?= session()->get('role') ?></span>
                                    </div>
                                    <a class="nav-link nav-icon-hover">
                                        <img src="<?= base_url() ?>/assets/images/profile/default.png" alt="" width="40" height="40" class="rounded-circle">
                                    </a>
                                </div>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="<?php echo site_url('auth/logout') ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->

            <!--  Content Start -->
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
            </div>
            <!--  Content End -->
        </div>
    </div>
    <script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/sidebarmenu.js"></script>
    <script src="<?= base_url() ?>/assets/js/app.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>