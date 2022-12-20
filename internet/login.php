<?php
require 'dbconnect.php';

// Cek Login
if (isset($_POST['login'])) {
    $nama_pengguna = $_POST['nama_pengguna'];
    $nik_pengguna = $_POST['nik_pengguna'];

    // Pengecekan data di dalam database
    $cekdatabase = mysqli_query($conn, "SELECT * FROM internet_login WHERE nama_pengguna='$nama_pengguna' AND nik_pengguna='$nik_pengguna'");

    // Menghitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);

    if ($hitung > 0) {
        $_SESSION['log'] = 'True';
        header('location: ./internet.html');
    } else {
        header('location: login.php');
    }
};

if (!isset($_SESSION['log'])) {
} else {
    header('location: ./internet.html');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <!-- css -->
    <style type="text/css">
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #588970;
        }

        .btn {
            background-color: #588970;
            color: white;
        }
    </style>
    <!-- css end -->
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-4">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">DAFTAR</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputNama">Nama</label>
                                            <input class="form-control py-4" name="email" id="inputNama" type="email" placeholder="Masukan Nama Anda" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputAlamat">Alamat</label>
                                            <input class="form-control py-4" name="alamat" id="inputAlamat" type="text" placeholder="Masukan Alamat Anda" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputNIK">NIK</label>
                                            <input class="form-control py-4" name="nik" id="inputNIK" type="text" placeholder="Masukan NIK Anda" />
                                        </div>

                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <label for="floatingInputGrid">RT</label>
                                                    <input type="email" class="form-control" id="floatingInputGrid" value="">
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating mb-3">
                                                    <label for="floatingSelectGrid">RW</label>
                                                    <input type="email" class="form-control" id="floatingInputGrid" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputNope">No. Handphone</label>
                                            <input class="form-control py-4" name="nope" id="inputNope" type="text" placeholder="Masukan No. Hp Anda" />
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn" name="login">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>