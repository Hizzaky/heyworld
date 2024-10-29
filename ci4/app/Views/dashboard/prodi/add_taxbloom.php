<?= $this->extend('layout/default/main') ?>
<?= $this->section('konten') ?>

<section class="section">
    <div class="section-header">
        <h1><?= $header_title ?></h1>
    </div>
    <div class="section-body">
        <!-- Notif -->
        <?php
        $dataSesi = session();
        $sukses = $dataSesi->getFlashdata('suksesAddKataKerja');
        $fail = $dataSesi->getFlashdata('failAddKataKerja');

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
        <!--  -->
        <div class="card-body p-0">
            <div class="card">
                <div class="card-header">
                    <h4>Kata Kerja Baru</h4>
                </div>
                <div class="card-body">
                    <form method="post" class="needs-validation" novalidate>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode </label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="kode" required>
                                    <?php
                                    $x = 0;
                                    foreach ($kode as $val): ?>
                                        <option <?= $x=$val['kode']=='C4' ? 'selected' : '' ?> value="<?= $val['kode'] ?>"><?= $val['kode'] ?></option>
                                        <?php
                                        $x++;
                                    endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kata Kerja</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="katalog" required value="tes">
                                <div class="invalid-feedback">
                                    Inputkan kata kerja baru dengan benar!
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>