<?= $this->extend('layout/homepage/main') ?>

<?= $this->section('konten') ?>

<div class="row">
    <!-- <div class="col-12 col-sm-3"> </div> -->
    <?= $this->include('komponen/sidebarDaftar'); ?>

    <div class="card col-12 col-sm-6 col-md-6 mrg-login">
        <?php if (isset($register)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $register ?>
                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span -->
                        <!-- aria-hidden="true">&times;</span></button> -->
            </div>
        <?php endif; ?>
    </div>

</div>

<?= $this->endSection() ?>