<?= $this->extend('layout/user/user') ?>

<?= $this->section('content') ?>

<div class="container py-5">
    <div class="text-center">
        <h1 class="display-4">Selamat Datang di Bengkel Kami</h1>
        <p class="lead">Solusi terpercaya untuk semua kebutuhan perbaikan kendaraan Anda!</p>
        <a href="/service-request" class="btn btn-primary btn-lg mt-3">Ajukan Permintaan Servis</a>
    </div>

    <hr class="my-5">

    <div class="row text-center">
        <div class="col-md-4">
            <!-- <img src="/assets/images/fast_service.png" alt="Layanan Cepat" class="img-fluid mb-3" style="height: 150px;"> -->
            <h3>Layanan Cepat</h3>
            <p>Kami memastikan kendaraan Anda diperbaiki dengan cepat dan efisien.</p>
        </div>
        <div class="col-md-4">
            <!-- <img src="/assets/images/experienced_technician.png" alt="Teknisi Berpengalaman" class="img-fluid mb-3" style="height: 150px;"> -->
            <h3>Teknisi Berpengalaman</h3>
            <p>Tim teknisi profesional siap menangani segala jenis perbaikan.</p>
        </div>
        <div class="col-md-4">
            <!-- <img src="/assets/images/quality_service.png" alt="Kualitas Terjamin" class="img-fluid mb-3" style="height: 150px;"> -->
            <h3>Kualitas Terjamin</h3>
            <p>Gunakan suku cadang asli dan layanan terbaik untuk kendaraan Anda.</p>
        </div>
    </div>

    <hr class="my-5">

    <div class="text-center">
        <h2 class="mb-4">Mengapa Memilih Kami?</h2>
        <p class="mb-5">
            Bengkel kami menyediakan layanan perbaikan kendaraan yang lengkap, mulai dari servis ringan hingga perbaikan besar.
            Kami mengutamakan kepuasan pelanggan dengan memberikan layanan berkualitas tinggi dan garansi.
        </p>
        <a href="#" class="btn btn-outline-secondary btn-lg">Hubungi Kami</a>
    </div>
</div>

<?= $this->endSection() ?>