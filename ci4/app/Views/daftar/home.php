<?= $this->extend('layout/homepage/main') ?>

<?= $this->section('konten') ?>

<div class="row">
    <div class="col-12 col-sm-3 mrg-side">
        <?= $this->include('komponen/sidebar/daftar'); ?>
    </div>
    <div class="card col-12 col-sm-6 col-md-6 mrg-konten">
        <?php if (isset($register)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $register ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<?= $this->endSection() ?>