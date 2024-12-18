<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Antrian</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/assets/images/logos/logo.png" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" style="background-image: url('<?= base_url() ?>/assets/images/backgrounds/bengkel.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <?= $this->renderSection('content') ?>
    </div>
  </div>
  <script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>