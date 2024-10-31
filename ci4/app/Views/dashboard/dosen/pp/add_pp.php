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
                    <h4><?= $sub_title ?></h4>
                </div>
                <div class="card-body">
                    <form method="testing" class="needs-validation" novalidate>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode </label>
                            <div class="col-sm-12 col-md-7 form-inline">

                                <!-- <button class="btn btn-outline-secondary form-control" type="text" data-toggle="modal"
                                    data-target="#modalKataKerja" placeholder="--Pilih Kata Kerja--" value="" 
                                    readonly required><i class="fas fa-list-ul"></i>add</button> -->
                                <a class="btn btn-info form-control " data-toggle="modal" data-target="#modalKataKerja">
                                    <i class="fas fa-list" style="color:white"></i></a>

                                <input class="btn form-control" type="text" name="red" id="index"
                                    placeholder="--Pilih Kata Kerja--" value="" required style="color:red" hidden>

                                <div class="invalid-feedback">
                                    Silahkan pilih kata kejra!
                                </div>

                                <input class="btn form-control" type="text" name="taxbloom_id" id="id"
                                    value=""  hidden>

                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kata 1</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="blue" required value=""
                                    style="color:blue">
                                <div class="invalid-feedback">
                                    ----------------!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kata 2</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="green" required value=""
                                    style="color:green">
                                <div class="invalid-feedback">
                                    ----------------!
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Simpan 1</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalKataKerja" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKataKerjaLabel">Kata Kerja Taxonomi Bloom</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="height:75vh; overflow:auto">

                    <?= $table->generate($taxbloom) ?>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
<!-- END Modal -->


<?= $this->endSection() ?>