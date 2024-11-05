<?= $this->extend('layout/default/main') ?>
<?= $this->section('konten') ?>

<section class="section">
    <div class="section-header">
        <h1><?= $header_title ?></h1>
    </div>
    <div class="section-body">
        <!-- Notif -->
        <?php
        $dataSesi = session();
        $sukses = $dataSesi->getFlashdata('suksesHapusKataKerja');
        $fail = $dataSesi->getFlashdata('failHapusKataKerja');

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
        <div class="card-body p-0">
            <div class="table-responsive">


            </div>
        </div>
        <!--  -->
        <div class="row">
            <?php foreach($pp as $key=>$val): ?>
                
                <div class="card col-12 col-sm-5 col-md-3" style="width: 18rem;">
                        <div style="padding:5px">
                        <div class="card-body">
                            <h5 class="card-title"><?= $val['katalog'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <p class="card-text">
                                <span style="color:red"><?= $val['katalog'] ?></span>
                                <span style="color:blue"><?= $val['blue'] ?></span>
                                <span style="color:green"><?= $val['green'] ?></span>
                            </p>
                            <a href="#" class="card-link">edit delete</a>
                            <a href="#" class="card-link">more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<?= $this->endSection() ?>