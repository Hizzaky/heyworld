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
        $sukses = $dataSesi->getFlashdata('suksesHapusKataKerja');
        $fail = $dataSesi->getFlashdata('failHapusKataKerja');

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
            <div class="table-responsive">


            </div>
        </div>
        <!--  -->
        <div class="container">
            <div class="row">
                <?php foreach ($pp as $key => $val): ?>

                    <div class="card col-12 col-sm-6 col-md-4" style="margin:10px">
                        <div class="container" style="">
                            <div class="card-body">
                                <h6 class="card-title" style="cursor:default"><i class="fas fa-star"
                                        style="color:lightblue"></i> <u><?= $val['katalog'] ?></u> (<?= $val['kode'] ?>)</h6>
                                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                                <p class="card-text limitText">
                                    <span style="color:red">Mampu <?= $val['katalog'] ?></span>
                                    <span style="color:blue"><?= $val['blue'] ?></span>
                                    <span style="color:green"><?= $val['green'] ?></span>
                                </p>
                                <!--  -->
                                <hr>
                                <div class="" style="float:left">

                                    <div class="dropdown ">
                                        <!-- <a class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Aksi</a> -->
                                        <button class="btn " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                            style="width:10px !important; text-align:center;">
                                            <a class="btn btn-warning btn-sm " href="#"><i class="fas fa-pencil-alt"></i>
                                            </a> |
                                            <button class="btn btn-danger btn-sm "
                                                data-confirm="Hapus Kata Kerja?|Yakin ingin menghapus kata kerja <?= $val['katalog'] ?> (<?= $val['kode'] ?>) ?"
                                                data-confirm-yes=""><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <!--  -->
                                </div>
                                <!-- <a href="#" class="card-link">edit delete</a> -->
                                <div class="" style="float:right">
                                    <a href="2" class=" " style="">Selengkapnya...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>