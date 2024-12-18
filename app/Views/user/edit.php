<?= $this->extend('layout/user/index') ?>

<?= $this->section('content') ?>

<h3 class="mb-3"><?= $title ?></h3>
<div class="card">
    <div class="card-body">
        <?php echo form_open('user/update/' . $getData->id) ?>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control <?= isset($validation['name']) ? 'is-invalid' : '' ?>" name="name" value="<?= old('name', $getData->name) ?>">
                <?php if (isset($validation['name'])): ?>
                    <div class="invalid-feedback"><?= $validation['name'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control <?= isset($validation['username']) ? 'is-invalid' : '' ?>" name="username" value="<?= old('username', $getData->username) ?>">
                <?php if (isset($validation['username'])): ?>
                    <div class="invalid-feedback"><?= $validation['username'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Nomor Hp</label>
                <input type="text" class="form-control <?= isset($validation['phone']) ? 'is-invalid' : '' ?>" name="phone" value="<?= old('phone', $getData->phone) ?>">
                <?php if (isset($validation['phone'])): ?>
                    <div class="invalid-feedback"><?= $validation['phone'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control <?= isset($validation['email']) ? 'is-invalid' : '' ?>" name="email" value="<?= old('email', $getData->email) ?>">
                <?php if (isset($validation['email'])): ?>
                    <div class="invalid-feedback"><?= $validation['email'] ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Role</label>
                <select class="form-select <?= isset($validation['role']) ? 'is-invalid' : '' ?>" name="role">
                    <option value="admin" <?= old('role', $getData->role) == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="user" <?= old('role', $getData->role) == 'user' ? 'selected' : '' ?>>User</option>
                </select>
                <?php if (isset($validation['role'])): ?>
                    <div class="invalid-feedback"><?= $validation['role'] ?></div>
                <?php endif; ?>
            </div>
            <div class="my-3 d-flex justify-content-end">
                <a href="<?php echo site_url('user') ?>" class="btn btn-danger me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>

<?= $this->endSection() ?>