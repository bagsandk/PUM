<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= BASEURL; ?>/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= BASEURL; ?>/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $data['judul']; ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="<?= BASEURL; ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= BASEURL; ?>/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= BASEURL; ?>/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="black">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:;" class="simple-text">
                        SKTLK
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>">
                            <i class="nc-icon nc-icon nc-bank"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= BASEURL; ?>/admin">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= BASEURL; ?>/user">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li>
                        <a class=" nav-link" href="<?= BASEURL; ?>/Pelapor">
                            <i class="nc-icon nc-notes"></i>
                            <p>Data Pelapor </p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= BASEURL; ?>/Laporan">
                            <i class="nc-icon nc-notes"></i>
                            <p>Laporan Kehilangan</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= BASEURL; ?>">Aplikasi SKTLK</a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <!-- <li class="nav-item">
                                    <a class="nav-link" href="#pablo">
                                        <span class="no-icon">Account</span>
                                    </a>
                                </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="nc-icon nc-button-power"> Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->