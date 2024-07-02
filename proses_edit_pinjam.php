<?php
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}

require_once __DIR__."/koneksi.php";

$peminjam = $_POST['peminjam'];
$sepeda = $_POST['sepeda'];
$tgl = date('Y-m-d');

$query = mysqli_query($koneksi, "UPDATE meminjam SET tgl_pinjam ='$tgl', id_peminjam ='$peminjam', kd_sepeda ='$sepeda'
		 where id_pinjam	='$_GET[id]'");
if ($query) {
	echo "<script>alert('data berhasil disimpan');
	document.location.href='pinjam.php'</script>\n";
} else {
	echo "<script>alert('data gagal disimpan');
	document.location.href='pinjam.php'</script>\n";
}
?>