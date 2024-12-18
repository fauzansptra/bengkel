<?= $this->extend('layout/user/index') ?>

<?= $this->section('content') ?>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Konfirmasi Penghapusan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus antrian ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDelete" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between mb-3">
    <h3 class="mb-0"><?= $title ?></h3>
    <a href="<?php echo site_url('antrian/create') ?>" class="btn btn-primary ms-auto">
        <i class="ti ti-plus me-2"></i>Tambah Antrian</a>
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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Antrian</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($getData)) { ?>
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data antrian</td>
                    </tr>
                    <?php } else {
                    $i = 1;
                    foreach ($getData as $row) { ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row->queue_number ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo $row->status ?></td>
                            <td>
                                <a href="<?php echo site_url('antrian/edit/' . $row->id) ?>" class="btn btn-warning btn-sm me-2">
                                    <i class="ti ti-edit fs-4"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $row->id ?>">
                                    <i class="ti ti-trash fs-4"></i>
                                </button>
                            </td>
                        </tr>
                <?php $i++;
                    }
                } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Script untuk mengatur URL penghapusan pada modal
    let deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function(event) {
        let button = event.relatedTarget;
        let antrianId = button.getAttribute('data-id');
        let confirmDelete = document.getElementById('confirmDelete');
        confirmDelete.href = '<?= site_url('antrian/delete/') ?>' + antrianId;
    });
</script>

<?= $this->endSection() ?>