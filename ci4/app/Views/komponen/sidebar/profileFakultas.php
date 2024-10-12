<div class="">
    <ul class="list-group">
        <li class="list-group-item s-head "><strong>Menu Profile : </strong></li>
        <div class="row">
            <div class="col-5"></div>
            <div class="col-7">
                <div class="">
                    <?= $side ?>
                    <a class="list-group-item btn <?= $variable = $side == '1' ? 'active' : 'btn-outline-primary' ?> s-body"
                        href="nama_fakultas">Nama Fakultas</a>
                    <a class="list-group-item btn <?= $variable = $side == '2' ? 'active' : 'btn-outline-primary' ?> s-body"
                        href="password">Password</a>
                    <!-- <a class="list-group-item btn btn-outline-primary s-body "
                        href="/Daftar/fakultas">Menu</a> -->
                </div>
            </div>
        </div>
    </ul>
</div>