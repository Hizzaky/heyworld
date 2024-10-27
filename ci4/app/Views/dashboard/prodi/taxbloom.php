<?= $this->extend('layout/default/main') ?>
<?= $this->section('konten') ?>

<section class="section">
    <div class="section-header">
        <h1><?= $header_title ?></h1>
    </div>
    <div class="section-body">

        <div class="card-body p-0">
            <div class="table-responsive">
                <!-- <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Irwansyah Saputra</td>
                            <td>2017-01-09</td>
                            <td>
                                <div class="badge badge-success">Active</div>
                            </td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Hasan Basri</td>
                            <td>2017-01-09</td>
                            <td>
                                <div class="badge badge-success">Active</div>
                            </td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kusnadi</td>
                            <td>2017-01-11</td>
                            <td>
                                <div class="badge badge-danger">Not Active</div>
                            </td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Rizal Fakhri</td>
                            <td>2017-01-11</td>
                            <td>
                                <div class="badge badge-success">Active</div>
                            </td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Isnap Kiswandi</td>
                            <td>2017-01-17</td>
                            <td>
                                <div class="badge badge-success">Active</div>
                            </td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                    </tbody>
                </table> -->

                <?= $table->generate($taxbloom) ?>
            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>