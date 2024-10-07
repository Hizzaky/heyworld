<div class="">
    <ul class="list-group">
        <li class="list-group-item s-head"><strong>Daftar Akun : </strong></li>
        <div class="row">
            <div class="col-5"></div>
            <div class="col-7">
                <div class="">

                    <!-- <li class="list-group-item dropdown-item"><a class="" href="/Daftar/dosen">Dosen</a></li>
            <li class="list-group-item dropdown-item"><a class="" href="/Daftar/prodi">Prodi</a></li>
            <li class="list-group-item dropdown-item"><a class="" href="/Daftar/fakultas">Fakulas</a></li> -->
                    <a class="list-group-item btn <?= $sideClass = $jenis_user == 'Dosen' ? 'btn-primary' : 'btn-outline-primary' ?> s-body"
                        href="/Daftar/dosen">Dosen</a>
                    <a class="list-group-item btn btn-outline-primary s-body" href="/Daftar/prodi">Prodi</a>
                    <a class="list-group-item btn btn-outline-primary s-body active" href="/Daftar/fakultas">Fakulas</a>
                </div>
            </div>
        </div>
    </ul>
</div>