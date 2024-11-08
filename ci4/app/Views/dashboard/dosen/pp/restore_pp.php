<?= $this->extend('layout/default/main') ?>
<?= $this->section('konten') ?>

<section class="section">
    <div class="section-header">
        <h1><?= $header_title ?></h1>
    </div>
    <div class="section-body">
        <!-- Notif -->
        <?= view_cell('\App\Libraries\Data::alert', ['sukses' => $sukses, 'fail' => $fail]) ?>
        <!--  -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <?php if (isset($alert)): ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <?= $alert ?>
                    </div>
                <?php else: ?>
                    <?= $table->generate($taxbloom) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>