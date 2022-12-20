<?php

session_start();

$conn = mysqli_connect("localhost", "root", "", "bumdes_simak");


// Menambah Barang Baru
if(isset($_POST['addnewbarang'])) {
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    // Gambar
    $allowed_extension = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['file']['name']; // Mengambil Nama Gambar

    $addtotable = mysqli_query($conn, "INSERT INTO pb_stock (namabarang, deskripsi, stock) VALUES ('$namabarang', '$deskripsi', '$stock')");
    if($addtotable) {
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};

// Menambah Barang Masuk
if(isset($_POST['barangmasuk'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn, "SELECT * FROM pb_stock WHERE idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang + $qty;

    $addtomasuk = mysqli_query($conn, "INSERT INTO pb_masuk (idbarang, keterangan, qty) VALUES ('$barangnya', '$penerima', '$qty')");
    $updatestockmasuk = mysqli_query($conn, "UPDATE pb_stock SET stock='$tambahkanstocksekarangdenganquantity' WHERE idbarang='$barangnya'");
    if($addtomasuk && $updatestockmasuk) {
        header('location:masuk.php');
    } else {
        echo 'Gagal';
        header('location:masuk.php');
    }
};

// Menambah Barang Keluar
if(isset($_POST['addbarangkeluar'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn, "SELECT * FROM pb_stock WHERE idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];

    if($stocksekarang >= $qty) {
        // Kalau Barangnya Cukup
        $tambahkanstocksekarangdenganquantity = $stocksekarang - $qty;

        $addtokeluar = mysqli_query($conn, "INSERT INTO pb_keluar (idbarang, penerima, qty) VALUES ('$barangnya', '$penerima', '$qty')");
        $updatestockmasuk = mysqli_query($conn, "UPDATE pb_stock SET stock='$tambahkanstocksekarangdenganquantity' WHERE idbarang='$barangnya'");
        if($addtokeluar && $updatestockmasuk) {
            header('location:keluar.php');
        } else {
            echo 'Gagal';
            header('location:keluar.php');
        }
    } else {
        // Kalau Barangnya Tidak Cukup
        echo '
        <script>
            alert("Stock saat ini tidak mencukupi");
            windows.location.href="keluar.php";
        </script>
        ';
    }
};

// Update Info Barang
if(isset($_POST['updatebarang'])) {
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];

    $update = mysqli_query($conn, "UPDATE pb_stock SET namabarang='$namabarang', deskripsi='$deskripsi' WHERE idbarang='$idb'");
    if($update) {
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};

// Menghapus Barang dari Stock
if(isset($_POST['hapusbarang'])) {
    $idb = $_POST['idb'];
    $hapus = mysqli_query($conn, "DELETE FROM pb_stock WHERE idbarang='$idb'");
    if($hapus) {
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};

// Mengubah Data Barang Masuk
if(isset($_POST['updatebarangmasuk'])) {
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $deskripsi = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn, "SELECT * FROM pb_stock WHERE idbarang='idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtysekarang = mysqli_query($conn, "SELECT * FROM pb_masuk WHERE idmasuk='$idm'");
    $qtynya = mysqli_fetch_array($qtysekarang);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg) {
        $selisih = $qty - $qtyskrg;
        $kurangin = $stockskrg - $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE pb_stock SET stock='$kurangin' WHERE idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE pb_masuk SET qty='$qty', keterangan='$deskripsi' WHERE idmasuk='$idm'");
        if($kurangistocknya && $updatenya) {
            header('location:masuk.php');
        } else {
            echo 'Gagal';
            header('location:masuk.php');
        }
    } else {
        $selisih = $qtyskrg - $qty;
        $kurangin = $stockskrg + $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE pb_stock SET stock='$kurangin' WHERE idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE pb_masuk SET qty='$qty', keterangan='$deskripsi' WHERE idmasuk='$idm'");
        if($kurangistocknya && $updatenya) {
            header('location:masuk.php');
        } else {
            echo 'Gagal';
            header('location:masuk.php');
        }
    }
};

// Menghapus Barang Masuk
if(isset($_POST['hapusbarangmasuk'])) {
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idm = $_POST['idm'];

    $getdatastock = mysqli_query($conn, "SELECT * FROM pb_stock WHERE idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];

    $selisih = $stok-$qty;

    $update = mysqli_query($conn, "UPDATE pb_stock SET stock='$selisih' WHERE idbarang='$idb'");
    $hapusdata = mysqli_query($conn, "DELETE FROM pb_masuk WHERE idmasuk='$idm'");
    
    if($update && $hapusdata) {
        header('location: masuk.php');
    } else {
        header('location: masuk.php');
    }
};


// Mengubah Data Barang Keluar
if(isset($_POST['updatebarangkeluar'])) {
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn, "SELECT * FROM pb_stock WHERE idbarang='idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtysekarang = mysqli_query($conn, "SELECT * FROM pb_keluar WHERE idkeluar='$idk'");
    $qtynya = mysqli_fetch_array($qtysekarang);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg) {
        $selisih = $qty - $qtyskrg;
        $kurangin = $stockskrg - $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE pb_stock SET stock='$kurangin' WHERE idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE pb_keluar SET qty='$qty', penerima='$penerima' WHERE idkeluar='$idk'");
        if($kurangistocknya && $updatenya) {
            header('location:keluar.php');
        } else {
            echo 'Gagal';
            header('location:keluar.php');
        }
    } else {
        $selisih = $qtyskrg - $qty;
        $kurangin = $stockskrg + $selisih;
        $kurangistocknya = mysqli_query($conn, "UPDATE pb_stock SET stock='$kurangin' WHERE idbarang='$idb'");
        $updatenya = mysqli_query($conn, "UPDATE pb_keluar SET qty='$qty', penerima='$penerima' WHERE idkeluar='$idk'");
        if($kurangistocknya && $updatenya) {
            header('location:keluar.php');
        } else {
            echo 'Gagal';
            header('location:keluar.php');
        }
    }
};

// Menghapus Barang Keluar
if(isset($_POST['hapusbarangkeluar'])) {
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idk = $_POST['idk'];

    $getdatastock = mysqli_query($conn, "SELECT * FROM pb_stock WHERE idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];

    $selisih = $stok+$qty;

    $update = mysqli_query($conn, "UPDATE pb_stock SET stock='$selisih' WHERE idbarang='$idb'");
    $hapusdata = mysqli_query($conn, "DELETE FROM pb_keluar WHERE idkeluar='$idk'");
    
    if($update && $hapusdata) {
        header('location: keluar.php');
    } else {
        header('location: keluar.php');
    }
};


// Menambah Admin Baru
if(isset($_POST['addadmin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryinsert = mysqli_query($conn, "INSERT INTO pb_login (email, password) VALUES ('$email', '$password')");

    if($queryinsert) {
        header('location: admin.php');
    } else {
        header('location: admin.php');
    }
};


// Edit Data Admin
if(isset($_POST['updatedataadmin'])) {
    $emailbaru = $_POST['emailadmin'];
    $passwordbaru = $_POST['passwordbaru'];
    $idnya = $_POST['id'];

    $queryupdate = mysqli_query($conn, "UPDATE pb_login SET email='$emailbaru', password='$passwordbaru' WHERE iduser='$idnya'");

    if($queryupdate) {
        header('location:admin.php');
    } else {
        header('location:admin.php');
    }
};

// Hapus Data Admin
if(isset($_POST['hapusdataadmin'])) {
    $id = $_POST['id'];

    $querydelete = mysqli_query($conn, "DELETE FROM pb_login WHERE iduser='$id'");

    if($querydelete) {
        header('location:admin.php');
    } else {
        header('location:admin.php');
    }
};


?>