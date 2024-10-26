<?= $this->extend('layout/default/profile') ?>

<?= $this->section('konten') ?>
<div class="section-body">


    <h2 class="section-title">Hi, <?= $nama_user ?>!</h2>
    <p class="section-lead">
        <!-- (Kalo dosen pake NIDN Prodi/Fakultas ga perlu) -->
    </p>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="card-header">
                    <h4>
                        Menu <?= $header_title ?>
                    </h4>
                </div>
                <div class="profile-widget-description">
                    <a class="list-group-item btn <?= $variable = $side == '1' ? 'btn-primary' : 'btn-outline-primary' ?> s-body"
                        href="Update-nama">Update Nama</a><br>
                    <a class="list-group-item btn <?= $variable = $side == '2' ? 'btn-primary' : 'btn-outline-primary' ?> s-body"
                        href="Update-password">Update Password</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
                <form method="post" class="needs-validation" novalidate>
                    <div class="card-header">
                        <h4>Edit <?= $konten . ' ' . $jenis_user ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group col-md-12 col-12">
                            <label>Nama Fakultas</label>
                            <input type="text" class="form-control" value="<?= $login['nama_user'] ?>" disabled>
                        </div>
                        <div class="form-group col-md-12 col-12">
                            <label>Input Nama Baru</label>
                            <input type="text" class="form-control" name="nama_fakultas" value="" required>
                            <div class="invalid-feedback">
                                Isi nama fakultas dengan benar!
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success">Update Nama</button>
                    </div>
                </form>
                <form action="update_password" method="post">


                    <div class="form-group">
                        <label for="password">Password Baru </label>
                        <input type="password" class="form-control" name="password" id="password" value=""
                            aria-describedby="help password" autofocus placeholder="Inputkan Password Baru">
                    </div>
                    <div class="form-group">
                        <label for="rePassword">Ketik Ulang Password Baru </label>
                        <input type="password" class="form-control" name="rePassword" id="rePassword" value=""
                            aria-describedby="help rePassword" autofocus placeholder="Inputkan Kembali Password Baru">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="oldPassword">Password Terakhir</label>
                        <input type="password" class="form-control" name="oldPassword" id="oldPassword" value=""
                            aria-describedby="help oldPassword" autofocus
                            placeholder="Inputkan Password Terakhir Digunakan">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success right">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>