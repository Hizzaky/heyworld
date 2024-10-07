<?= $this->extend('layout/homepage/main') ?>

<?= $this->section('konten') ?>

<div class="row">
    <!-- <div class="col-12 col-sm-3"> </div> -->
    <?= $this->include('komponen/sidebarDaftar'); ?>

    <div class="card col-12 col-sm-6 col-md-6 mrg-login">
        <?php if (isset($register)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $register ?>
                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span -->
                <!-- aria-hidden="true">&times;</span></button> -->
            </div>
        <?php endif; ?>
        <h3 class="card-header ">
            <?= $header_title ?> Dosen
        </h3>
        <div class="card-body">
            <?php if (isset($fail)): ?>
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
            <form action="/dosen" method="post">
                <div class="form-group">
                    <label for="nidn">NIDN</label>
                    <input type="text" class="form-control" name="nidn" id="nidn" value="<?= set_value('nidn') ?>"
                        aria-describedby="help nidn" autofocus placeholder="Inputkan NIDN">
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Nama Lengkap </label>
                    <input type="text" class="form-control" name="nama_dosen" id="nama_dosen"
                        value="<?= set_value('nama_dosen') ?>" aria-describedby="help nama_dosen" autofocus
                        placeholder="Inputkan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Inputkan Password">
                </div>
                <div class="form-group">
                    <label for="rePassword">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="rePassword" id="rePassword"
                        placeholder="Ketik Ulang Password">
                </div>
                <hr>
                <button type="submit" class="btn btn-success right">Daftar</button>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection() ?>