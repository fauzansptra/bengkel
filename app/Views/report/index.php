<?= $this->extend('layout/user/index') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <h3 class="mb-0"><?= $title ?></h3>
    <!-- <a href="<?php echo site_url('antrian/create') ?>" class="btn btn-primary ms-auto">
        <i class="ti ti-plus me-2"></i>Tambah Laporan</a> -->
</div>

<!-- Menampilkan pesan flashdata jika ada -->
<div>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
</div>

<div class="card">
    <div class="card-body">
        <?= form_open('laporan/generatePdf') ?>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" name="start_date" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" name="end_date" required>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Generate PDF</button>
        </div>
        <?= form_close() ?>
    </div>
</div>

<?= $this->endSection() ?>