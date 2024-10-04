<?= $this->extend('layout/layout_home') ?>

<?= $this->section('konten') ?>

<div class="row">
    <div class="col-12 col-sm-3">    </div>
    <div class="card col-12 col-sm-6 col-md-6 mrg-login">
        <h3 class="card-header ">
            <?= $header_title ?>
        </h3>
        <div class="card-body">
            <?php if (isset($validasi)): ?>
                    <div class="text-danger">
                        <?= $validasi->listErrors() ?>
                    </div>
            <?php endif; ?>
            <form action="/register" method="post" >
                <div class="form-group">
                    <label for="nidn">NIDN</label>
                    <input type="text" class="form-control" name="nidn" id="nidn" value="<?= set_value('nidn') ?>"
                        aria-describedby="help nidn" autofocus placeholder="Inputkan NIDN">
                </div>
                <div class="form-group">
                    <label for="nama_dosen">Nama Lengkap </label>
                    <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" value="<?= set_value('nama_dosen') ?>"
                        aria-describedby="help nama_dosen" autofocus placeholder="Inputkan Nama Lengkap">
                </div>
                <!-- <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>"
                        aria-describedby="help username" autofocus placeholder="Inputkan Username">
                </div> -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Inputkan Password">
                </div><hr>
                <button type="submit" class="btn btn-success right" >Daftar</button>
                <!-- <input class="btn btn-success right" type="submit" name="submit" value="Masuk Sebagai "> -->
            </form>
            <!-- <input class="btn btn-primary right" name="register" value="Daftar Akun "> -->
            <!-- <a class="btn btn-outline-primary reg" href="/daftar">Daftarrr</a> -->
        </div>
    </div>

</div>

<?= $this->endSection() ?>