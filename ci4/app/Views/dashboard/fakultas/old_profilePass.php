<?= $this->extend('layout/fakultas/main') ?>

<?= $this->section('konten') ?>

<div class="row">
    <div class="col-12 col-sm-3 mrg-side">

        <?= $this->include('komponen/sidebar/profileFakultas'); ?>
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
            <form action="update_password" method="post">

                
                <div class="form-group">
                    <label for="password">Password Baru </label>
                    <input type="password" class="form-control" name="password" id="password"
                        value="" aria-describedby="help password" autofocus
                        placeholder="Inputkan Password Baru">
                </div>
                <div class="form-group">
                    <label for="rePassword">Ketik Ulang Password Baru </label>
                    <input type="password" class="form-control" name="rePassword" id="rePassword"
                        value="" aria-describedby="help rePassword" autofocus
                        placeholder="Inputkan Kembali Password Baru">
                </div><hr>
                <div class="form-group">
                    <label for="oldPassword">Password Terakhir</label>
                    <input type="password" class="form-control" name="oldPassword" id="oldPassword"
                        value="" aria-describedby="help oldPassword" autofocus
                        placeholder="Inputkan Password Terakhir Digunakan">
                </div><hr>
                <button type="submit" class="btn btn-success right">Update Password</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>