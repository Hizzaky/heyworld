<?= $this->extend('layout/homepage/main') ?>

<?= $this->section('konten') ?>

<div class="row">
    <div class="col-12 col-sm-3"> </div>
    <div class="card col-12 col-sm-6 col-md-6 mrg-konten">
        <h3 class="card-header center">
            <?= $header_title . " " . $jenis_user ?>
        </h3>
        <div class="card-body">
            <?php
            $dataSesi = session();
            $register = $dataSesi->getFlashdata('register');

            if (isset($register)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $register ?>
                </div>
            <?php endif; ?>
            <?php if (isset($fail)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $fail ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
            <?php endif; 
                  if (isset($validasi)): ?>
                <div class="text-danger">
                    <?= $validasi->listErrors() ?> <!-- validasi form error -->
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <select class="form-control" name="username" id="username">
                        <option class="center" value="">-- Silahkan pilih prodi anda --</option>

                        <?php foreach ($dataTbl as $x => $val) : ?>
                            <option value=<?= $val['username'] ?>><?= $val['nama_prodi'] ?></option>
                        <?php endforeach ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Inputkan Password">
                </div>
                <hr>
                <!-- <button type="submit" class="btn btn-primary right" >Masuk</button> -->
                <input class="btn btn-success right" type="submit" name="submit" value="Masuk Sebagai <?= $jenis_user ?>">
            </form>
            <!-- <input class="btn btn-primary right" name="register" value="Daftar Akun <?= $jenis_user ?>"> -->
            <!-- <a class="btn btn-outline-primary reg" href="/Daftar/dosen">Daftar</a> -->
        </div>
    </div>

</div>

<?= $this->endSection() ?>