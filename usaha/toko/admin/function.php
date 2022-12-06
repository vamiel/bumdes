<?php
include '../dbconnect.php';

// Menghapus Kategori
if(isset($_POST['hapuskategori'])) {
    $id = $_POST['id'];
    $hapusk = mysqli_query($conn, "DELETE FROM kategori WHERE idkategori='$id'");
    if($hapusk) {
        header('location: kategori.php');
    } else {
        echo 'Gagal!';
        header('location: kategori.php');
    }
};

// Menghapus Metode Pembayaran
if(isset($_POST['hapusmetode'])) {
    $idm = $_POST['idm'];
    $hapusm = mysqli_query($conn, "DELETE FROM pembayaran WHERE no='$idm'");
    if($hapusm) {
        header('location: pembayaran.php');
    } else {
        echo 'Gagal!';
        header('location: pembayaran.php');
    }
};

// Menghapus Produk
if(isset($_POST['hapusproduk'])) {
    $idp = $_POST['idp'];

    $hapusp = mysqli_query($conn, "DELETE FROM produk WHERE idproduk='$idp'");
    if($hapusp) {
        header('location: produk.php');
    } else {
        echo 'Gagal!';
        header('location: produk.php');
    }
};

?>