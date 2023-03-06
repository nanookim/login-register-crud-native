<?php require_once("auth.php"); ?>
<?php

include("config.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: halaman_utama.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM tb_mahasiswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$mhs = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Mahasiswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="codedthemes" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <link rel="stylesheet" href="assets/menu-utama/pages/waves/css/waves.min.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="assets/menu-utama/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/menu-utama/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/menu-utama/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/menu-utama/icon/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/menu-utama/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/menu-utama/css/style.css">
</head>

<body>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a href="halaman_utama.php">
                            <img class="img-fluid" src="assets/menu-utama/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">

                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="assets/menu-utama/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span><?= $_SESSION["user"]["nama"] ?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="logout.php">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 img-radius" src="assets/menu-utama/images/avatar-4.jpg" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details"><?= $_SESSION["user"]["nama"] ?></span>
                                    </div>
                                </div>


                            </div>

                            <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Main Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="index.html" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>DM</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Data Mahasiswa</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <p class="m-b-0">Welcome <?= $_SESSION["user"]["nama"] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="halaman_utama.php"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="halaman_utama.php" class="btn mb-3" data-bs-toggle="tooltip" data-bs-original-title="Tambah Mahasiswa">
                                                <i class=" fa fa-arrow-left"></i>
                                            </a>
                                        </div>
                                        <div class="card-block">
                                            <form class="form-material" method="POST" action="proses-edit.php">
                                                <input type="hidden" name="id" value="<?php echo $mhs['id'] ?>" />
                                                <div class="form-group form-default">
                                                    <input type="text" name="nim" class="form-control" value="<?php echo $mhs['nim'] ?>" required="">
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">NIM</label>
                                                </div>
                                                <div class="form-group form-default">
                                                    <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $mhs['nama_lengkap'] ?>" required="">
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Nama Lengkap</label>
                                                </div>
                                                <div class="form-group form-default">
                                                    <input type="text" name="no_telp" class="form-control" value="<?php echo $mhs['no_telp'] ?>" required="">
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">No Telp</label>
                                                </div>
                                                <div class="form-group form-default">
                                                    <textarea class="form-control" name="alamat" required=""><?php echo $mhs['alamat'] ?></textarea>
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Alamat</label>
                                                </div>
                                                <div class="form-default">
                                                    <button class="btn btn-success" name="submit" id="submit" type="submit">SAVE</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Page-body end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/menu-utama/js/jquery/jquery.min.js"></script>
    <script src="assets/menu-utama/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/menu-utama/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/menu-utama/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/menu-utama/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="assets/menu-utama/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="assets/menu-utama/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/menu-utama/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/menu-utama/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="assets/menu-utama/js/SmoothScroll.js"></script>
    <script src="assets/menu-utama/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="assets/menu-utama/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="assets/menu-utama/pages/widget/amchart/gauge.js"></script>
    <script src="assets/menu-utama/pages/widget/amchart/serial.js"></script>
    <script src="assets/menu-utama/pages/widget/amchart/light.js"></script>
    <script src="assets/menu-utama/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="assets/menu-utama/js/pcoded.min.js"></script>
    <script src="assets/menu-utama/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/menu-utama/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="assets/menu-utama/js/script.js "></script>

</body>

</html>