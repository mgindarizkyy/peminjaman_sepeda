<?php
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}

require_once __DIR__."/koneksi.php";

$nama	= $_POST['nama'];
$alamat	= $_POST['alamat'];
$ttl	= $_POST['ttl'];
$status	= $_POST['status'];

$query = mysqli_query($koneksi, "UPDATE peminjam SET nm_peminjam ='$nama',
										alamat			='$alamat',
										ttl_peminjam		='$ttl',
										status_peminjam	='$status' 
										where id_peminjam ='$_GET[id]'");
		
if ($query) {
echo "<script>alert('data berhasil disimpan');
document.location.href='peminjam.php'</script>\n";
} else {
echo "<script>alert('data gagal disimpan');
document.location.href='peminjam.php'</script>\n";
}
?>