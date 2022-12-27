<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>BUMDes SiMak | Peminjaman</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="index/assets/img/favicon_io/favicon.ico" rel="icon" />
    <link href="index/assets/img/favicon_io/favicon.ico" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Vendor CSS Files -->
    <link href="index/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="index/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="index/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="index/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="index/assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="index/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="index/assets/css/style.css" rel="stylesheet" />

    <style type="text/css">
        html {
            font-family: 'Poppins', sans-serif;
        }

        .header-font {
            font-weight: 600;
            font-size: 2rem;
        }

        .header-text {
            font-weight: 800;
            font-size: 2rem;
        }

        .thun {
            max-height: 250px;
            max-width: 500px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .round {
            border-radius: 10px;
        }

        .card .btn-block {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="sticky-top">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo">
                <a href="../../index.htm" class="logo"><img src="../../assets/img/logo.png" alt="" class="img-fluid" /></a>
                <a href="../../index.htm">BUMDes SiMak</a>
            </h1>

            <!-- Navbar Start -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="active" href="../../index.html">Beranda</a></li>
                    <li><a href="../../tentang.html">Tentang</a></li>
                    <li><a href="../../mitra.html">Mitra</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Usaha</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="../../internet.php">Internet Desa</a></li>
                            <li><a href="../toko/">Toko</a></li>
                            <li><a href="usaha/peminjaman/">Peminjaman Alat Tani</a></li>
                        </ul>
                    </li>
                    <li><a href="../../kontak.html">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- Navbar End -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Jumbo ======= -->
    <div class="container-fluid p-5 bg-custom text-white text-center" style="background-color: #31ff31;">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="header-text col p-3 text-white text-start">Sewa Alat Pertanian
                    <p class="header-font" style="color: black;">Pajerukan</p>
                </div>
                <div class="header-text col-xl p-3 text-white text-end">BUMDES SIMAK
                    <p class="header-font" style="color: black;">Penyewaan</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= End Jumbo ======= -->

    <!-- ======= Jumbo ======= -->
    <div class="mt-4 row bg-white">
        <div class="header-text col-sm-4 p-3 mt-3 text-center text-black">BUMDES SIMAK
            <p class="header-font" style="color: black;">Penyewaan</p>
        </div>
        <div class="col-sm-8 p-3 text-black">
            <strong>
                <p class="ms-4 me-4">Sewa Alat Pertanian Desa BUMDES Pajerukan</p>
            </strong>
            <p class="me-4 ms-4 text-break" style="text-align: justify;">Sewa alat pertanian pada BUMDES Pajerukan adalah layanan penyewaan untuk melihat stok alat pertanian yang tersedia pada BUMDES Pajerukan.</p>
            <p class="me-4 ms-4 text-break" style="text-align: justify;">Saat ini semua orang butuh sistem untuk memudahkan dalam mencari informasi, update sosial media, baca berita dan lainnya. Maka dari itu, dengan adanya web ini dapat mengetahui apa saja alat yang tersedia pada BUMDES Pajerukan.</p>
        </div>
    </div>
    <!-- ======= End Jumbo ======= -->

    <!-- ======= Card ======= -->
    <div class="tes container py-3">
        <div class="row col-lg-10 mx-auto">
            <?php
            $ambildata = mysqli_query($conn, "SELECT * FROM pb_stock");
            $i = 1;

            while ($data = mysqli_fetch_array($ambildata)) {
                $idb = $data['idbarang'];
                $namabarang = $data['namabarang'];
                $deskripsi = $data['deskripsi'];
                $stock = $data['stock'];

                $gambar = $data['image'];
                if ($gambar == null) {
                    $img = 'No Photo';
                } else {
                    $img = '<img src="images/' . $gambar . '" class="thun card-img-top">';
                }
            ?>

                <div class="col-md-4 py-3">
                    <div class="card round h-100 bg-custom" style="background-color: #31ff31;">
                        <?= $img; ?>
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight: 600; font-family: 'Poppins', sans-serif;"><?= $namabarang; ?></h5>
                            <p class="card-text" style="font-family: 'Poppins', sans-serif;"><?= $deskripsi; ?></p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-custom text-white w-100" style="background-color: #339966; font-family: 'Poppins', sans-serif;"> <?= $stock; ?> </button>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
    <!-- ======= End Card ======= -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>DESA SIDO MAKMUR</h3>
            <p>
                Silahkan hubungi kontak kami dibawah ini jika ingin memberikan
                masukkan atau saran buat Desa ini.
            </p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>One Server</span></strong>. All Rights Reserved
            </div>
            <!-- <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div> -->
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="index/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="index/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="index/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="index/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="index/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>