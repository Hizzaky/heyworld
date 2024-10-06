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

    .reg {
        /* float: left; */
        /* text-decoration: none; */
    }

    .pad {
        padding-top: 10%;
    }

    .mrg-login {
        margin-top: 5%;
    }

    .mrg-home {
        margin-top: 5%;
    }
</style>

<body>
    <div class=""><br>
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
                <a class="navbar-brand" href="/"><strong>SIM UMMAT</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <a class="dropdown-item" href="#">Sebagai Dosen</a>
                            <a class="dropdown-item" href="#">Sebagai Prodi</a>
                            <a class="dropdown-item" href="llogin">Sebagai Fakultas</a> -->
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>
                    <!-- <form class=" my-2 my-lg-0"> -->
                    <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <!-- <a class="btn form-inline btn-outline-success my-2 my-sm-0" href="Login">Login</a> -->
                    <!-- </form> -->
                    <li class="nav-item dropdown form-inline">
                        <a class="btn btn-secondary nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            if (isset($menu)) {

                                if ($menu == 'login') {
                                    echo 'Sebagai ' . $kategori;
                                } else {
                                    echo 'Login';
                                }
                            } else {
                                echo 'Login';
                            }
                            ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/Login/dosen">Sebagai Dosen</a>
                            <a class="dropdown-item" href="/Login/prodi">Sebagai Prodi</a>
                            <a class="dropdown-item" href="/Login/fakultas">Sebagai Fakultas</a>
                        </div>
                        <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form action="login/dosen" method="post">
                            <input type="text" name="login" value="dosen" hidden>
                            <button class="btn dropdown-item " style="cursor='pointer'" >Akun Dosen</button>
                        </form>
                        <form action="login" method="post">
                            <input type="text" name="login" value="prodi" hidden>
                            <button class="btn dropdown-item" >Akun Prodi</button>
                        </form>
                        <form action="login" method="post">
                            <input type="text" name="login" value="fakultas" hidden>
                            <button class="btn dropdown-item" >Akun Fakultas</button>
                        </form>
                    </div> -->
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