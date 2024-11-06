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
        <div class="container">
            <div class="row">
                <?php foreach ($pp as $key => $val): ?>

                    <div class="card col-12 col-sm-6 col-md-5" style="margin:10px">
                        <div class="container" style="padding-bottom:5px">
                            <div class="card-body">
                                <h6 class="card-title" style="cursor:default"><i class="fas fa-star"
                                        style="color:lightblue"></i> <u><?= $val['katalog'] ?></u> (<?= $val['kode'] ?>)
                                </h6>
                                <p class="card-text limitText">
                                    <span style="color:red">Mampu <?= $val['katalog'] ?></span>
                                    <span style="color:blue"><?= $val['blue'] ?></span>
                                    <span style="color:green"><?= $val['green'] ?></span>
                                </p>
                                <hr>
                                <div style="">
                                    <div class="" style="float:left">
                                        <div class="dropdown ">
                                            <a class=" " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                                </>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                    style="width:10px !important; text-align:center;">
                                                    <a class="btn btn-warning btn-sm " href="#"><i
                                                            class="fas fa-pencil-alt"></i>
                                                    </a> |
                                                    <button class="btn btn-danger btn-sm "
                                                        data-confirm="Hapus Kata Kerja?|Yakin ingin menghapus kata kerja <b><?= $val['katalog'] ?> (<?= $val['kode'] ?>)</b> ?"
                                                        data-confirm-yes="dosenDeleteTaxbloom(<?= $val['pp_id'] ?>)"><i
                                                            class="fas fa-trash"></i></button>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="" style="float:right">
                                        <!-- <a href="2" class=" " style="">Selengkapnya...</a> -->
                                        <a class="" data-toggle="modal" data-target="#modalKataKerja"
                                            style="cursor:pointer" onclick="tesini('<?= $val['katalog'] ?>','<?= $val['blue'] ?>','<?= $val['green'] ?>')">
                                            Selengkapnya...
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalKataKerja" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKataKerjaLabel">
                    Penguasaan Pengetahuan
                    (<span id="modalPp"></span>)
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><hr>
            <div class="modal-body" style="padding:5px;">
                <!-- <div style="height:75vh; overflow:auto"> -->
                <div class="container">
                    <p class="card-text" style="text-align:justify">

                        <span id="modalRed" style="color:red">Mampu blablabla bla</span>
                        <span id="modalBlue" style="color:blue">blablabla blablabla</span>
                        <span id="modalGreen" style="color:green">blabla blabla blabla</span>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<!-- END Modal -->

<?= $this->endSection() ?>