<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = intval($id);
    $query = "DELETE FROM tb_buku WHERE id = $id";
    mysqli_query($koneksi, $query);
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  .img-fixed {
    height: 300px;
    object-fit: cover;
    width: 100%;
  }
</style>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">baca yuk</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="dashboard.php">Data</a></li>
        <li class="nav-item"><a class="nav-link"  href="create.php">Tambah Data</a></li>
      </ul>
      <a href="index.php"><button class="btn btn-danger">Logout</button></a>
    </div>
  </div>
</nav>
 
<div class="container mt-4">
  <h3 class="text-center mb-4">Data Buku</h3>
  <?php
    include 'koneksi.php';
    $result = mysqli_query($koneksi, "SELECT * FROM tb_buku ORDER BY id DESC");

    if (mysqli_num_rows($result) > 0):
  ?>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="col">
        <div class="card h-100">
<img src="<?= $row['link_gambar'] ?>" class="card-img-top img-fixed" alt="gambar" onerror="this.onerror=null;this.src='https://via.placeholder.com/150';">

          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['judul']) ?></h5>
            <p class="card-text">
              <strong>Penulis:</strong> <?= $row['penulis'] ?><br>
              <strong>Penerbit:</strong> <?= $row['penerbit'] ?><br>
               <strong>Tahun:</strong> <?= $row['tahun'] ?><br>
              <strong>Isi:</strong> <?= $row['isi'] ?>
            </p>
            
            <div class="btn">
            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
            <a href="dashboard.php?id=<?php echo $row['id']; ?>" onclick="return confirm
             ('Apakah Anda yakin ingin menghapus data ini?')" 
            class="btn btn-danger">Hapus</a>
            </div>
            

          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <?php else: ?>
    <div class="alert alert-info text-center">Tidak ada data.</div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
