<?php
session_start(); 
// cek jika belom login, pindah ke halaman login
if(!isset($_SESSION['is_login'])) {
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistem Peminjaman Sepeda | Peminjaman</title>

  <!-- Custom fonts for this template-->
  <link href="sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include("templates/sidebar.php");?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php include("templates/top-navbar.php");?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Peminjaman</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning float-left">Data Peminjaman</h6>
                    <a href="pinjam_sepeda.php" class="btn btn-warning float-right">Pinjam Sepeda</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Jumlah Pinjam</th>
                                    <th>Nama Peminjam</th>
                                    <th>Buku</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require_once __DIR__."/koneksi.php"; 

                                    $query  = "select * from meminjam,sepeda,peminjam
                                    where meminjam.id_peminjam = peminjam.id_peminjam and
                                    meminjam.kd_sepeda = sepeda.kd_sepeda and meminjam.kembali = 1
                                    order by id_pinjam";
                                    $sql  = mysqli_query($koneksi, $query);
                                    $no = 1;
                                    while ($data=mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['tgl_pinjam'];?></td>
                                        <td><?php echo $data['jumlah_pinjam'];?></td>
                                        <td><?php echo $data['nm_peminjam'];?></td>
                                        <td><?php echo $data['nama_sepeda'];?></td>
                                        <td>
                                        <a class="btn btn-warning" href="edit_pinjam.php?id=<?php echo $data['id_pinjam']; ?>" >Edit</a>
                                        <a class="btn btn-info" href="kembali_sepeda.php?id=<?php echo $data['id_pinjam']; ?>" onClick = "return confirm('Apakah Anda ingin mengembalikan  <?php echo $data['nama_sepeda']; ?>?')">Kembalikan</a>
                                        </td>
                                    </tr>
                                <?php $no++; };?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <span>Copyright &copy; Sistem Peminjaman Sepeda 2024</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="sb-admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="sb-admin/js/demo/datatables-demo.js"></script> -->
</body>

</html>