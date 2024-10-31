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
                    <form method="post" class="needs-validation" novalidate>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode </label>
                            <div class="col-sm-12 col-md-7 form-inline">
                                
                                <!-- <button class="btn btn-outline-secondary form-control" type="text" data-toggle="modal"
                                    data-target="#modalKataKerja" placeholder="--Pilih Kata Kerja--" value="" 
                                    readonly required><i class="fas fa-list-ul"></i>add</button> -->
                                    <a class="btn btn-info form-control " data-toggle="modal" data-target="#modalKataKerja"> 
                                       <i class="fas fa-list"></i></a> 
                                <input class="btn form-control" type="text" name="kode" id="kode" 
                                    placeholder="--Pilih Kata Kerja--" value="" required style="color:red" hidden>

                                <div class="invalid-feedback"> 
                                    ----------------!
                                </div> 

                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kata Kerja</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="katalog" required value="" style="color:blue">
                                <div class="invalid-feedback">
                                    ----------------!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kata Kerja</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="katalog" required value="" style="color:green">
                                <div class="invalid-feedback">
                                    ----------------!
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

<!-- Modal -->
<div class="modal fade" id="modalKataKerja" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKataKerjaLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modal -->

<?= $this->endSection() ?>