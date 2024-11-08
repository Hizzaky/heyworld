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
        <div class="container">
            <div class="row">
                <?php foreach ($ku as $key => $val): ?>

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
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                    style="width:10px !important; text-align:center;">
                                                    <a class="btn btn-warning btn-sm " href="Edit-ku/<?= $val['ku_id'] ?>">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a> |
                                                    <button class="btn btn-danger btn-sm "
                                                        data-confirm="Hapus Kata Kerja?|Yakin ingin menghapus kata kerja <b><?= $val['katalog'] ?> (<?= $val['kode'] ?>)</b> ?"
                                                        data-confirm-yes="dosenDeleteKu(<?= $val['ku_id'] ?>)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="" style="float:right">
                                        <!-- <a href="2" class=" " style="">Selengkapnya...</a> -->
                                        <a class="" data-toggle="modal" data-target="#modalKataKerja" style="cursor:pointer"
                                            onclick="ppDetail('<?= $val['katalog'] ?>','<?= $val['blue'] ?>','<?= $val['green'] ?>')">
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
<?= view_cell('\App\Libraries\Data::modalTaxbloomKonteks') ?>
<!-- END Modal -->

<?= $this->endSection() ?>