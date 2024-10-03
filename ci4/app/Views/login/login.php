<?= $this->extend('layout/layout_home') ?>

<?= $this->section('konten') ?>

<div class="row">
    <div class="col-12 col-sm-3">
        <span></span>
    </div>
    <div class="card col-12 col-sm-6 col-md-6 mrg-login">
        <h3 class="card-header ">
            <?= $header_title . " " . $kategori ?>
        </h3>
        <div class="card-body">
            <?php if (isset($validasi)) : ?>
                <div class="text-danger">
                    <?= $validasi->listErrors() ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>"
                        aria-describedby="help username" autofocus placeholder="Inputkan Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Inputkan Password">
                </div>
                <!-- <button type="submit" class="btn btn-primary right" style="margin=right -50%">Masuk</button> -->
                <input class="btn btn-primary right" type="submit" name="submit" value="Masuk Sebagai <?= $kategori ?>">
            </form>
        </div>
    </div>

</div>

<?= $this->endSection() ?>