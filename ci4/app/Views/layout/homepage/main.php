<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title><?= $meta_title ?></title>
</head>
<style>
    .right {
        float: right;
    }

    .center {
        text-align: center;
    }

    .pad {
        padding-top: 10%;
    }

    .mrg-konten {
        margin-top: 5%;
    }

    .mrg-side {
        margin-top: 10%;
    }

    .s-head {
        text-align: left;
        background-color: lightgray;
    }

    .s-body {
        font-weight: bold;
        text-align: left;
        text-decoration: none;
    } 
</style>

<body>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-top:2%">
            <div class="container">
                <a class="navbar-brand" href="/"><strong>SIM UMMAT</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Menu <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Menu</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Menu</a>
                        </li>
                    </ul>
                    <li class="nav-item dropdown form-inline">

                        <?php $sesi = session();
                        $sesiLogin = $sesi->get('login');
                        if (isset($sesiLogin['nama_user'])) {
                            echo '<a class="btn btn-danger nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                            echo $sesiLogin['nama_user'];
                        } else {
                            echo '<a class="btn btn-secondary nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                            if (isset($menu)) {

                                if ($menu == 'login') {
                                    echo 'Sebagai ' . $kategori;
                                } else {
                                    echo 'Login';
                                }
                            } else {
                                echo 'Login';
                            }
                        }
                        ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (isset($sesiLogin['nama_user'])): ?>
                                <form action="/logUserOut" method="post">
                                    <!-- <a class="dropdown-item logout" href="">Logout</a> -->
                                    <button class="dropdown-item logout btn" type="submit"
                                        style="color: red;">Logout</button>
                                </form>
                            <?php else: ?>
                                <a class="dropdown-item" href="/Login?login=dosen">Sebagai Dosen</a>
                                <a class="dropdown-item" href="/Login?login=prodi">Sebagai Prodi</a>
                                <a class="dropdown-item" href="/Login?login=fakultas">Sebagai Fakultas</a>
                            <?php endif; ?>
                        </div>
                    </li>
                </div>
        </nav>
    </div>
    <div class="container">
        <?= $this->renderSection('konten') ?>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


</body>

</html>