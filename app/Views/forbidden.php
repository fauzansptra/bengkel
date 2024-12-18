<?= $this->extend('layout/public/index') ?>

<?= $this->section('content') ?>

<div class="container text-center position-relative">
    <h1>403</h1>
    <h3>Forbidden</h3>
    <p>Anda tidak memiliki akses ke halaman ini.</p>
    <a href="<?= site_url('') ?>" class="btn btn-primary" style="z-index: 1000;">Kembali ke Beranda</a>
</div>

<?= $this->endSection() ?>