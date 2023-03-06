<?php
session_start();
if(!isset($_SESSION["username"])) header("Location: login.php");
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
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
                                    <span><?= $_SESSION["username"] ?></span>
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
                                        <span id="more-details"><?= $_SESSION["username"] ?></span>
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
                                            <p class="m-b-0">Welcome <?= $_SESSION["username"] ?></p>
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
                        <?php if (isset($_GET['status'])) : ?>
                            <?php
                            if ($_GET['status'] == 'sukses') {
                                echo "<div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <i class='fa fa-check'></i> Data Mahasiswa Berhasil ditambahkan!
                               </div>";
                            } else {
                                echo "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <i class='fa fa-check'></i> Gagal Menambahkan Data Mahasiswa!
                                </div>";
                            }
                            ?>
                        <?php endif; ?>
                        <?php if (isset($_GET['stat'])) : ?>
                            <?php
                            if ($_GET['stat'] == 'berhasil') {
                                echo "<div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <i class='fa fa-check'></i> Data Mahasiswa Berhasil Dihapus!
                               </div>";
                            } else {
                                echo "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <i class='fa fa-check'></i> Gagal Menghapus Data Mahasiswa!
                                </div>";
                            }
                            ?>
                        <?php endif; ?>
                        <?php if (isset($_GET['kode'])) : ?>
                            <?php
                            if ($_GET['kode'] == 'berhasil') {
                                echo "<div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <i class='fa fa-check'></i> Data Mahasiswa Berhasil Diedit!
                               </div>";
                            } else {
                                echo "<div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <i class='fa fa-check'></i> Gagal Mengedit Data Mahasiswa!
                                </div>";
                            }
                            ?>
                        <?php endif; ?>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="tambah_mahasiswa.php" class="btn btn-primary text-white mb-3" data-bs-toggle="tooltip" data-bs-original-title="Tambah Mahasiswa">
                                                    <i class=" fa fa-plus"></i>Tambah Mahasiswa
                                                </a>
                                                <!-- <h5>DATA MAHASISWA</h5> -->

                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <!-- <table id="example" class="display" style="width:100%"> -->
                                                    <table class="table">
                                                        <thead>
                                                            <th>No</th>
                                                            <th>NIM</th>
                                                            <th>NAMA</th>
                                                            <th>NO TELP</th>
                                                            <th>ALAMAT</th>
                                                            <th>ACT</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <?php
                                                                $sql = "SELECT * FROM tb_mahasiswa";
                                                                $query = mysqli_query($db, $sql);
                                                                $no = 1;
                                                                while ($mhs = mysqli_fetch_array($query)) {
                                                                    echo "<tr>";
                                                                    echo "<td>" . $no++ . "</td>";
                                                                    echo "<td>" . $mhs['nim'] . "</td>";
                                                                    echo "<td>" . $mhs['nama_lengkap'] . "</td>";
                                                                    echo "<td>" . $mhs['no_telp'] . "</td>";
                                                                    echo "<td>" . $mhs['alamat'] . "</td>";
                                                                    echo "<td>";
                                                                    echo "<a class='btn btn-warning' href='edit_mahasiswa.php?id=" . $mhs['id'] . "'>Edit</a> ";
                                                                    echo "<a class='btn btn-danger' name='hapus' href='hapus.php?id=" . $mhs['id'] . "'>Hapus</a>";
                                                                    echo "</td>";
                                                                    echo "</tr>";
                                                                }
                                                                ?>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>