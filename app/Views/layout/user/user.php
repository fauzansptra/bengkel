<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bengkel Ojan</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/assets/images/logos/logo.png" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/styles.min.css" />
</head>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Navbar -->
        <header class="">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand text-nowrap logo-img" href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>/assets/images/logos/logo.png" width="180" alt="Logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end d-flex align-items-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos(uri_string(), 'home') !== false) ? 'active' : '' ?>" href="<?= site_url('/') ?>">
                                <i class="ti ti-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos(uri_string(), 'service') !== false) ? 'active' : '' ?>" href="<?= site_url('service') ?>">
                                <i class="ti ti-settings"></i> Service Requests
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= base_url() ?>/assets/images/profile/default.png" alt="User Profile" width="20" height="20" class="rounded-circle">
                                <?= session()->get('nama') ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">

                                <li>
                                    <a class="dropdown-item text-danger" href="<?= site_url('auth/logout') ?>">
                                        <i class="ti ti-power"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Content Start -->
        <div class="container-fluid py-4">
            <?= $this->renderSection('content') ?>
        </div>
        <!-- Content End -->
    </div>

    <!-- Scripts -->
    <script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/app.min.js"></script>
</body>

</html>