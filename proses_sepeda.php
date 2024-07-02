<?php
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}

require_once __DIR__."/koneksi.php";

$kode		= $_POST['kode'];
$nama		= $_POST['nama'];
$produksi	= $_POST['produksi'];
$type_sepeda		= $_POST['type_sepeda'];
$desk	= $_POST['desk'];


$query = mysqli_query($koneksi, 'insert into sepeda(kd_sepeda,nama_sepeda,produksi,type_sepeda,desk) values ("'.$kode.'","'.$nama.'","'.$produksi.'","'.$type_sepeda.'","'.$desk.'")');

if ($query) {
    echo "<script>alert('data berhasil disimpan');
    document.location.href='sepeda.php'</script>\n";
} else {
    echo "<script>alert('data gagal disimpan');
    document.location.href='input_sepeda.php'</script>\n";
}
?>