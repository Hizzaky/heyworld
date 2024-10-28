<?= $this->extend('layout/default/main') ?>
<?= $this->section('konten') ?>

<section class="section">
    <div class="section-header">
        <h1><?= $header_title ?></h1>
    </div>
    <div class="section-body">

        <div class="card-body p-0">
            <div class="table-responsive">
                
                <?= $table->generate($taxbloom) ?>

            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>