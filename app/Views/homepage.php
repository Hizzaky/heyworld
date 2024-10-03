<?= $this->extend('layout/layout_home') ?>
<?= $this->section('konten') ?>
<div class="mrg-home">

    <div class="row">
        <?= $this->include ('komponen/sidebar'); ?>
        <div class="col-12 col-sm-9" >
            <h1><?= $content ?></h1>
            
        </div> 
    </div>
</div>
<?= $this->endSection() ?>
 
