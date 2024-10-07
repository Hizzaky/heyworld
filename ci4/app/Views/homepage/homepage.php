<?= $this->extend('layout/homepage/main') ?>
<?= $this->section('konten') ?>
<div class="mrg-home">

    <div class="row">
        <?= $this->include ('komponen/sidebarHomepage'); ?>
        <div class="col-12 col-sm-9" >
            <h1><?= $konten ?></h1>
            
        </div>
    </div>
</div>
<?= $this->endSection() ?>