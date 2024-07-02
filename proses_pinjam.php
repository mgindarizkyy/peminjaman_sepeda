<?php
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}

require_once __DIR__."/koneksi.php";

$peminjam	= $_POST['peminjam'];
$sepeda		= $_POST['sepeda'];


$query = mysqli_query($koneksi, 'insert into meminjam(tgl_pinjam,jumlah_pinjam,id_peminjam,kd_sepeda,kembali) values ("'.date('Y-m-d').'",1,"'.$peminjam.'","'.$sepeda.'",1)');

if ($query) {
    echo "<script>alert('data berhasil disimpan');
    document.location.href='pinjam.php'</script>\n";
} else {
    echo "<script>alert('data gagal disimpan');
    document.location.href='pinjam.php'</script>\n";
}
?>