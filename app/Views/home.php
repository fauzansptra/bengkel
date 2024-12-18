<?= $this->extend('layout/public/index') ?>

<?= $this->section('content') ?>

<div class="card my-4">
    <!-- Kolom Konten -->
    <div class="card-body d-flex flex-column justify-content-evenly h-100" >
        <div>
            <h3 class="card-title fw-semibold mb-4 text-center">Antrian Saat Ini</h3>
            <?php if (!empty($getData)): ?>
                <?php $currentQueue = $getData[0]; ?>
                <?php if ($currentQueue->status != 'selesai' && $currentQueue->status != 'dibatalkan'): ?>
                    <h5 class="card-title">Nomor Antrian: <?= $currentQueue->queue_number ?></h5>
                    <p class="card-text">Status: <?= ucfirst($currentQueue->status) ?></p>
                    <p class="card-text">Jumlah Antrian Menunggu: <?= count(array_filter($getData, fn($queue) => $queue->status == 'menunggu')) ?></p>
                <?php else: ?>
                    <h5 class="card-title text-center text-muted">Tidak ada antrian saat ini.</h5>
                <?php endif; ?>
            <?php else: ?>
                <h5 class="card-title text-center text-muted">Tidak ada antrian saat ini.</h5>
            <?php endif; ?>
        </div>
        <hr class="">
        <div>
            <?php if (!session()->get('logged_in')): ?>
                <h3 class="card-title fw-semibold mb-4 text-center">Ambil Antrian</h3>
                <div class="d-flex flex-column gap-2 align-items-center">
                    <p class="text-center text-muted mb-0">Silahkan login terlebih dahulu </br> untuk mengambil antrian.</h5>
                        <a href="<?= site_url('auth/login') ?>" class="btn btn-primary w-50 mt-2">Login</a>
                </div>
            <?php else: ?>
                <?php $userQueue = array_filter($getData, fn($queue) => $queue->user_id == session()->get('id') && $queue->status != 'selesai' && $queue->status != 'dibatalkan'); ?>
                <?php if (!empty($userQueue)): ?>
                    <?php $userQueue = array_values($userQueue)[0]; ?>
                    <h3 class="card-title fw-semibold mb-4 text-center">Antrian Anda</h3>
                    <h5 class="card-title">Nomor Antrian: <?= $userQueue->queue_number ?></h5>
                    <p class="card-text">Status: <?= ucfirst($userQueue->status) ?></p>
                    <p class="card-text">Jumlah Antrian Sebelum Anda: <?= count(array_filter($getData, fn($queue) => $queue->id < $userQueue->id && $queue->status == 'menunggu')) ?></p>
                <?php else: ?>
                    <div class="d-flex flex-column gap-2 align-items-center">
                        <h3 class="card-title fw-semibold mb-4 text-center">Ambil Antrian</h3>
                        <p class="text-center text-muted mb-0">Silahkan ambil antrian anda </br>
                            dengan menekan tombol di bawah ini.</h5>
                            <?= form_open('antrian/store') ?>
                            <input type="hidden" name="user_id" value="<?= session()->get('id') ?>">
                            <button type="submit" class="btn btn-primary w-100">Ambil Antrian</button>
                            <?= form_close() ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>