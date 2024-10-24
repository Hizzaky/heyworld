<?= $this->extend('layout/prodi/main') ?>

<?= $this->section('konten') ?>

<div class="row">
    <div class="col-12 col-sm-3 mrg-side">

        <?= $this->include('komponen/sidebar/cpl_taxbloom'); ?>
    </div>
    <div class="card col-12 col-sm-6 col-md-6 mrg-konten">
        <h3 class="card-header ">
            <?= $header_title ?>
        </h3>
        <div class="card-body">
            <?php
            $dataSesi = session();
            $sukses = $dataSesi->getTempdata('sukses');
            $fail = $dataSesi->getTempdata('fail');

            if (isset($sukses)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $sukses ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
            <?php endif;

            if (isset($fail)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $fail ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
            <?php endif; ?>
            <?php if (isset($validasi)): ?>
                <div class="text-danger">
                    <?= $validasi->listErrors() ?>
                </div>
            <?php endif; ?>
            <form action="save_taxbloom" method="post">
                <!-- <div class="form-group">
                    <label for="c1">C1 </label>
                    <input type="text" class="form-control" name="c1" id="c1" value="" aria-describedby="help c1"
                        autofocus placeholder="Inputkan Index C1">
                </div> -->
                <div class="form-group">
                    <label for="c2">C2 </label>
                    <input type="text" class="form-control" name="c2" id="c2" value="" aria-describedby="help c2"
                        autofocus placeholder="Inputkan Index C2">
                </div>
                <div class="form-group">
                    <label for="c3">C3 </label>
                    <input type="text" class="form-control" name="c3" id="c3" value="" aria-describedby="help c3"
                        placeholder="Inputkan Index C3">
                </div>
                <div class="form-group">
                    <label for="c4">C4 </label>
                    <input type="text" class="form-control" name="c4" id="c4" value="" aria-describedby="help c4"
                        placeholder="Inputkan Index C4">
                </div>
                <div class="form-group">
                    <label for="c5">C5 </label>
                    <input type="text" class="form-control" name="c5" id="c5" value="" aria-describedby="help c5"
                        placeholder="Inputkan Index C5">
                </div>
                <div class="form-group">
                    <label for="c6">C6 </label>
                    <input type="text" class="form-control" name="c6" id="c6" value="" aria-describedby="help c6"
                        placeholder="Inputkan Index C6">
                </div>
                <hr>
                <button type="submit" class="btn btn-success right">Simpan Katalog</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>