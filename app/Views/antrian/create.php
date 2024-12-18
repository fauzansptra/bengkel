<?= $this->extend('layout/user/index') ?>

<?= $this->section('content') ?>

<h3 class="mb-3"><?= $title ?></h3>
<div class="card">
    <div class="card-body">
        <?php echo form_open('antrian/store') ?>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama</label>
                <select class="form-select <?= isset($validation['user_id']) ? 'is-invalid' : '' ?>" name="user_id">
                    <option value="" disabled>Pilih Pengguna</option>
                    <?php foreach ($dataPengguna as $user) : ?>
                        <option value="<?= $user->id ?>" <?= old('user_id') == $user->id ? 'selected' : '' ?>><?= $user->name ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($validation['user_id'])): ?>
                    <div class="invalid-feedback"><?= $validation['user_id'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Status</label>
                <select class="form-select <?= isset($validation['status']) ? 'is-invalid' : '' ?>" name="status">
                    <option value="menunggu" <?= old('status') == 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                </select>
                <?php if (isset($validation['status'])): ?>
                    <div class="invalid-feedback"><?= $validation['status'] ?></div>
                <?php endif; ?>
            </div>
            <div class="my-3 d-flex justify-content-end">
                <a href="<?php echo site_url('antrian') ?>" class="btn btn-danger me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>

<?= $this->endSection() ?>