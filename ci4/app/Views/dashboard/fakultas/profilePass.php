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
                    <!-- Notif -->
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
                    <!--  -->
                    <div class="card-body">
                        <div class="form-group col-md-12 col-12">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" name="password" value=""
                                aria-describedby="help password" autofocus placeholder="Inputkan Password Baru"
                                 minlength="8">
                            <div class="invalid-feedback">
                                Inputkan Password dengan benar!
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-12">
                            <label>Ketik Kembali Password Baru</label>
                            <input type="password" class="form-control" name="rePassword" value=""
                                placeholder="Inputkan Kembali Password Baru" required>
                            <div class="invalid-feedback">
                                Inputkan Password dengan benar!
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-md-12 col-12">
                            <label>Password Terkini</label>
                            <input type="password" class="form-control" name="oldPassword" value=""
                                placeholder="Inputkan Password Terkini" required>
                            <div class="invalid-feedback">
                                Inputkan Password dengan benar!
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>