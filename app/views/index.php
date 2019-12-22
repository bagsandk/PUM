<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi SKTLK Polsek Kedaton</title>

    <!-- Font Awesome Icons -->
    <link href="<?= BASEURL; ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?= BASEURL; ?>/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS - Includes Bootstrap -->
    <link href="<?= BASEURL; ?>/css/creative.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/css/creative.min.css" rel="stylesheet">
    <!-- <link href="<?= BASEURL; ?>/css/light-bootstrap-dashboard.css" rel="stylesheet"> -->

    <link href="<?= BASEURL; ?>/css/icon.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Aplikasi SKTLK</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <button type="button" class="btn btn-default nav-link" data-toggle="modal" data-target="#exampleModalScrollable">
                            Tutorial
                        </button>
                    </li>
                    <?php if (isset($_SESSION['id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURL; ?>/dashboard">Back to Dashboard</a>
                        </li>
                    <?php } ?>
                    <?php if (!isset($_SESSION['id'])) { ?>
                        <li class="nav-item">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-default nav-link" data-toggle="modal" data-target="#exampleModal">
                                Login / Regist
                            </button>
                        </li>
                    <?php } ?>
                    <?php if (isset($_SESSION['id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= BASEURL; ?>/login/keluar">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">Aplikasi SKTLK</h1>
                    <h3 class="text-white">Kepolisian Sektor Kedaton</h3>
                    <h4 class="description text-white text-center">Jl. Soekarno Hatta No.14, Kp. Baru, Kec. Kedaton, Kota Bandar Lampung, Lampung 35245</h4>
                    <hr class="divider my-4">
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5">Selalu melayani setulus hati</p>
                    <?php if (isset($_SESSION['id'])) {
                        echo '<a class="btn btn-primary btn-xl js-scroll-trigger" href="' . BASEURL . '/dashboard">Buat SKTLK</a>';
                    } else {
                        echo '<button type="button" class="btn btn-primary btn-xl js-scroll-trigger" data-toggle="modal" data-target="#exampleModal">
              Buat SKTLK
          </button>';
                    }
                    ?>
                </div>
                <div class="col-md-6 float-right">
                    <?php Flasher::flashlog(); ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer class="bg-light py-3">
        <div class="small text-center text-muted">Copyright &copy; 2019 - Start Bootstrap</div>
        </div>
    </footer>
    <!-- Modal tutorial-->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Tutorial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ol>
                        <li>Melakukan Registrasi jika belum memiliki akun</li>
                        <li>Bagi yang sudah memiliki akun bisa melakukan masuk/Login</li>
                        <li>Setelah masuk pada aplikasi masukan data pelapor pada menu Pelapor</li>
                        <li>Setelah memasukan data diri tambahkan data laporan kehilangan pada menu Lapor Kehilangan</li>
                        <li>Selanjutnya anda menunggu laporan diverifikasi</li>
                        <li>Anda akan mendapatkan Notifikasi Email jika laporan telah diverifikasi</li>
                        <li>Terakhir Anda dapat mengambil SKTLK pada Polsek Kedaton</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login And Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/login/masuk" method="post" onsubmit="return ceklogin();">
                        <div class="tabcontent" id="sign-in">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <form action="<?= BASEURL; ?>/login/daftar" method="post" onsubmit="return cekdaftar();" id="daftar">
                        <div class=" tabcontent" id="sign-up">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" name="email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="tel" class="form-control" onkeypress=" return angka(event);" id="no_hp" name="no_hp" maxlength="13" minlength="11">
                            </div>
                            <div class="form-group">
                                <label for="password1">Password</label>
                                <input type="password" class="form-control" id="password1" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="tablinks btn btn-info" onclick="openCity(event, 'sign-in')" id="defaultOpen">Masuk</button>
                    <button class="tablinks btn btn-success" onclick="openCity(event, 'sign-up')">Daftar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
    <script type="text/javascript">
        function angka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="<?= BASEURL; ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= BASEURL; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?= BASEURL; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= BASEURL; ?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?= BASEURL; ?>/js/creative.min.js"></script>
    <script src="<?= BASEURL; ?>/js/cekform.js"></script>

</body>

</html>