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
            <li class="/<?= $jenis_user ?>"><a class="nav-link" href="#"><i class="far fa-home"></i>
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
                    <li><a class="nav-link" href="#">Menu</a></li>
                </ul>
            </li>

        </ul>

    </aside>
</div>