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
    .card-header{
        text-align: center;
    }
    .right{
        float: right;
    }
</style>
<body>
    <div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-top:2%">
            <div class="container">
            <a class="navbar-brand" href="/"><strong>SIM UMMAT</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <?= $var = isset($kategori)? "Sebagai " . $kategori : "Login " ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/login/dosen">Sebagai Dosen</a>
                        <a class="dropdown-item" href="/login/prodi">Sebagai Prodi</a>
                        <a class="dropdown-item" href="/login/fakultas">Sebagai Fakultas</a>
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