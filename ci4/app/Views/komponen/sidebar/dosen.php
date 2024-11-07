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

            <li class="menu-header">Capaian Pembelajaran</li>
            <li class="nav-item dropdown <?= $var = isset($sidePp) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
                    <span>Penguasaan Pengetahuan</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= $var = isset($menuPp) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Dosen/Penguasaan-pengetahuan">Index</a></li>
                    <li class="<?= $var = isset($menuPpAdd) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Dosen/Penguasaan-pengetahuan-baru">Tambah PP Baru</a></li>
                    <li class="<?= $var = isset($menuPpADel) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Dosen/Penguasaan-pengetahuan-terhapus">PP Terhapus</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown <?= $var = isset($sideKu) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
                    <span>Keterampilan Umum</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= $var = isset($menuKuIndex) ? 'active' : '' ?>"><a class="nav-link"
                            href="#">Index</a></li>
                    <li class="<?= $var = isset($menuKuAdd) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Dosen/Keterampilan-umum">Tambah KU Baru</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown <?= $var = isset($sideKk) ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
                    <span>Keterampilan Khusus</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= $var = isset($menuKkIndex) ? 'active' : '' ?>"><a class="nav-link"
                            href="#">Index</a></li>
                    <li class="<?= $var = isset($menuKkAdd) ? 'active' : '' ?>"><a class="nav-link"
                            href="/Dosen/Keterampilan-khusus">Tambah KK Baru</a></li>
                </ul>
            </li>

            <li class="menu-header">MENU</li>
            <li class=""><a class="nav-link" href="blank.html"><i class="far fa-square"></i>
                    <span>Blank Page</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                    <span>Components</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="components-article.html">Article</a></li>
                    <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Avatar</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Forms</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-map-marker-alt"></i> <span>Google
                        Maps</span></a>
                <ul class="dropdown-menu">
                    <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                    <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-plug"></i>
                    <span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="modules-calendar.html">Calendar</a></li>
                    <li><a class="nav-link" href="modules-chartjs.html">ChartJS</a></li>
                </ul>
            </li>
            <li class="menu-header">MENU</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                    <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                    <li><a href="auth-login.html">Login</a></li>
                    <li><a class="beep beep-sidebar" href="auth-login-2.html">Login 2</a></li>
                    <li><a href="auth-register.html">Register</a></li>
                    <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-exclamation"></i>
                    <span>Errors</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="errors-503.html">503</a></li>
                    <li><a class="nav-link" href="errors-403.html">403</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i>
                    <span>Features</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="features-activities.html">Activities</a></li>
                    <li><a class="nav-link" href="features-post-create.html">Post Create</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-ellipsis-h"></i>
                    <span>Utilities</span></a>
                <ul class="dropdown-menu">
                    <li><a href="utilities-contact.html">Contact</a></li>
                    <li><a class="nav-link" href="utilities-invoice.html">Invoice</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i>
                    <span>Credits</span></a></li>
        </ul>

    </aside>
</div>