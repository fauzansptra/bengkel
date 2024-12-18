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
                Apakah Anda yakin ingin menghapus pengguna ini?
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
    <a href="<?php echo site_url('user/create') ?>" class="btn btn-primary ms-auto">
        <i class="ti ti-plus me-2"></i>Tambah Pengguna</a>
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
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($getData as $row) { ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row->name ?></td>
                        <td><?php echo $row->username ?></td>
                        <td>
                            <?php if ($row->role == 'admin'): ?>
                                <span class="badge bg-primary">Admin</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">User</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('user/edit/' . $row->id) ?>" class="btn btn-warning btn-sm me-2">
                                <i class="ti ti-edit fs-4"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $row->id ?>">
                                <i class="ti ti-trash fs-4"></i>
                            </button>
                        </td>
                    </tr>
                <?php $i++;
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
        let userId = button.getAttribute('data-id');
        let confirmDelete = document.getElementById('confirmDelete');
        confirmDelete.href = '<?= site_url('user/delete/') ?>' + userId;
    });
</script>

<?= $this->endSection() ?>