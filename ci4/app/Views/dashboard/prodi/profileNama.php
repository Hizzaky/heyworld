<?= $this->extend('layout/prodi/main') ?>

<?= $this->section('konten') ?>

<div class="row">
    <div class="col-12 col-sm-3 mrg-side">

        <?= $this->include('komponen/sidebar/profileProdi'); ?>
    </div>
    <div class="card col-12 col-sm-6 col-md-6 mrg-konten">
        <h3 class="card-header ">
            <?= $header_title ?>
        </h3>
        <div class="card-body">
            <?php
            $dataSesi = session();
            $sukses = $dataSesi->getFlashdata('sukses');
            $fail = $dataSesi->getFlashdata('fail');

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
            <form action="update_nama" method="post"> 

                <div class="form-group">
                    <label for="nama_prodi_lama">Nama Fakultas </label>
                    <input type="text" class="form-control" name="nama_prodi_lama" id="nama_prodi_lama"
                        value="<?= $login['nama_user'] ?>" aria-describedby="help nama_prodi_lama" disabled>
                </div>
                <div class="form-group">
                    <label for="nama_prodi">Nama Fakultas Baru </label>
                    <input type="text" class="form-control" name="nama_prodi" id="nama_prodi"
                        value="" aria-describedby="help nama_prodi" autofocus
                        placeholder="Inputkan Nama Baru">
                </div><hr>
                <button type="submit" class="btn btn-success right">Update Nama Fakultas</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>