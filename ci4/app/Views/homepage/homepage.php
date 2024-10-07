<?= $this->extend('layout/homepage/main') ?>
<?= $this->section('konten') ?>
<div class="mrg-konten">

    <div class="row">
        <?= $this->include ('komponen/sidebar/homepage'); ?>
        <div class="col-12 col-sm-9" >
            <h1><?= $konten ?></h1>
            
        </div>
    </div>
</div>
<?= $this->endSection() ?>