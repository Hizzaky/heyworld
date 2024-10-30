<?= $this->extend('layout/default/profile') ?>

<?= $this->section('konten') ?>
<div class="section-body">


    <h2 class="section-title">Hi, <?= $nama_user ?>!</h2>
    <p class="section-lead">
        ( <?= $nidn ?> )
    </p>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <!-- <div class="profile-widget-header"> --> 
                <div class="card-header">
                    <h4>
                        Menu <?= $header_title ?>
                    </h4>
                </div>
                <!-- </div> -->
                <div class="profile-widget-description">
                    <!-- <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div> Web Developer
                        </div>
                    </div> -->
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
                    <?php endif;
                    $name_inputNamaBaru='nama_'.lcfirst($jenis_user);
                    ?>
                    <!--  -->
                    <div class="card-body">
                        <!-- <div class="row"> -->
                        <div class="form-group col-md-12 col-12">
                            <label>Nama <?= $jenis_user ?></label>
                            <input type="text" class="form-control" value="<?= $login['nama_user'] ?>" disabled>
                        </div>
                        <div class="form-group col-md-12 col-12">
                            <label>Input Nama Baru</label>
                            <input type="text" class="form-control" name="<?= $name_inputNamaBaru ?>" value="" autofocus required>
                            <div class="invalid-feedback">
                                Inputkan nama <?= lcfirst($jenis_user) ?> dengan benar!
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-success">Update Nama</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>