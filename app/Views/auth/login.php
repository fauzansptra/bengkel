<?= $this->extend('layout/public/index') ?>

<?= $this->section('content') ?>

<div class="d-flex align-items-center justify-content-center w-100">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
                <div class="card-body">
                    <a href="<?= base_url() ?>" class="text-nowrap logo-img text-center d-block py-3 w-100">
                        <img src="<?= base_url() ?>/assets/images/logos/logo.png" width="180" alt="">
                    </a>
                    <p class="text-center">Bengkel Ojan</p>
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

                    <?php echo form_open('auth/authenticate') ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control <?= isset($validation['username']) ? 'is-invalid' : '' ?>" name="username" value="<?= old('username') ?>">
                        <?php if (isset($validation['username'])): ?>
                            <div class="invalid-feedback"><?= $validation['username'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control <?= isset($validation['password']) ? 'is-invalid' : '' ?>" name="password">
                        <?php if (isset($validation['password'])): ?>
                            <div class="invalid-feedback"><?= $validation['password'] ?></div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login</button>
                    <div class="d-flex align-items-center justify-content-center">
                        <p class="fs-4 mb-0 fw-bold">Belum Daftar?</p>
                        <a class="text-primary fw-bold ms-2" href="<?= site_url('auth/register') ?>">Daftar</a>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>