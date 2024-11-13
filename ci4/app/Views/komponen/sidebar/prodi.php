<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/<?= $jenis_user ?>">SIM UMMAT</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/<?= $jenis_user ?>">SU</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= $var = isset($sideDashboard) ? 'active' : '' ?>"><a class="nav-link"
                    href="/<?= $jenis_user ?>"><i class="fas fa-home"></i>
                    <span>Home</span></a></li>

            <li class="menu-header">Kata Kerja Operasional</li>
            <li class="nav-item dropdown <?= $var = isset($sideTaxbloom) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Taxonomi Bloom</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= $var = isset($menuIndexKataKerja) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Kata-kerja">Index Kata Kerja</a></li>
                    <li class="<?= $var = isset($menuAddKataKerja) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Penambahan-kata-kerja">Penambahan Kata Kerja</a></li>
                    <li class="<?= $var = isset($menuDelKataKerja) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Restore-kata-kerja">Kata Kerja Terhapus</a></li>
                </ul>
            </li>

            <li class="menu-header">Capaian Pembelajaran</li>
            <li class="nav-item dropdown <?= $var = isset($sidePp) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
                    <span>Penguasaan Pengetahuan</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= $var = isset($menuPp) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Penguasaan-pengetahuan">Index PP</a></li>
                    <li class="<?= $var = isset($menuPpAdd) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Penguasaan-pengetahuan-baru">Tambah PP Baru</a></li>
                    <li class="<?= $var = isset($menuPpDel) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Penguasaan-pengetahuan-terhapus">PP Terhapus</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown <?= $var = isset($sideKu) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
                    <span>Keterampilan Umum</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= $var = isset($menuKu) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Keterampilan-umum">Index KU</a></li>
                    <li class="<?= $var = isset($menuKuAdd) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Keterampilan-umum-baru">Tambah KU Baru</a></li>
                    <li class="<?= $var = isset($menuKuDel) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Keterampilan-umum-terhapus">KU Terhapus</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown <?= $var = isset($sideKk) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
                    <span>Keterampilan Khusus</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= $var = isset($menuKk) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Keterampilan-khusus">Index KK</a>
                    </li>
                    <li class="<?= $var = isset($menuKkAdd) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Keterampilan-khusus-baru">Tambah KK Baru</a></li>
                    <li class="<?= $var = isset($menuKkDel) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Prodi/Keterampilan-khusus-terhapus">KK Terhapus</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>