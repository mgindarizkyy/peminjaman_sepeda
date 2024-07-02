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
$type_sepeda	= $_POST['type_sepeda'];
$desk	= $_POST['desk'];

$query = mysqli_query($koneksi, "UPDATE sepeda SET kd_sepeda='$kode', nama_sepeda='$nama', produksi='$produksi', type_sepeda='$type_sepeda', desk ='$desk' 
		 where kd_sepeda='$_GET[id]'");
if ($query) {
	echo "<script>alert('data berhasil disimpan');
	document.location.href='sepeda.php'</script>\n";
} else {
	echo "<script>alert('data gagal disimpan');
	document.location.href='sepeda.php'</script>\n";
}
?>