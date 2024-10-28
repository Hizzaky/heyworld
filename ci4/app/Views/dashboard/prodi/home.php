<?= $this->extend('layout/default/main') ?>
<?= $this->section('konten') ?>

<section class="section">
    <div class="section-header">
        <h1><?= $header_title ?></h1>
    </div>
    <div class="section-body">

        <div class="dropdown-center">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Centered dropdown
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Action two</a></li>
                <li><a class="dropdown-item" href="#">Action three</a></li>
            </ul>
        </div>

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
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                            <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>



    </div>
</section>

<?= $this->endSection() ?>