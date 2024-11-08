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
            <div class="card">
                <div class="card-header">
                    <h4><?= $sub_title ?></h4>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class=" col-md-9 col-" style="border-style:double; padding:10px;cursor:default" >
                                    <span id="tred" style="color:red">Mampu <?= $edit[0]['katalog'] ?></span>
                                    <span id="tblue" style="color:blue"><?= $edit[0]['blue'] ?></span>
                                    <span id="tgreen" style="color:green"><?= $edit[0]['green'] ?></span>
                                    <span id="blank"></span>
                            </div>
                        </div>
                    </div><br> 
                </div>
                <form method="post" class="needs-validation" novalidate>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kata Kerja </label>
                        <div class="col-sm-12 col-md-7 form-inline">
                            <a class="btn btn-info form-control " data-toggle="modal" data-target="#modalKataKerja">
                                <i class="fas fa-list" style="color:white"></i></a>

                            <input class="btn form-control" type="text" name="ku_id" id="ku_id" placeholder="ID"
                                value="<?= $edit[0]['ku_id'] ?>" required hidden>
                            <input class="btn form-control" type="text" name="taxbloom_id" id="taxbloom_id" placeholder="ID"
                                value="<?= $edit[0]['taxbloom_id'] ?>" required hidden>
                            <input class="btn form-control" style="width:80%;color:red;cursor:default" type="text" name="red" id="red"
                                placeholder="--Pilih Kata Kerja--" value="Mampu <?= $edit[0]['katalog'] ?>" >


                            <div class="invalid-feedback">
                                Silahkan pilih kata kejra! 
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kata 1</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="blue" id="blue" required value="<?= $edit[0]['blue'] ?>"
                                style="color:blue" oninput="inputPp()">
                            <div class="invalid-feedback">
                                Input text!
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kata 2</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" name="green" id="green" required value="<?= $edit[0]['green'] ?>"
                                style="color:green" oninput="inputPp()">
                            <div class="invalid-feedback">
                                Input text!
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
</section>

<!-- Modal -->
<?= view_cell('\App\Libraries\Data::modalTaxbloomTbl', ['table' => $table->generate($taxbloom)]) ?>
 
<!-- END Modal -->


<?= $this->endSection() ?>