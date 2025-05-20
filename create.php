<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tambah Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">baca yuk</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="create.php">Tambah Data</a></li>
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Data </a></li>
      </ul>
      <form class="d-flex"><button class="btn btn-danger" type="submit">Logout</button></form>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h3 class="text-center">Tambah Data Baru</h3>
  <form action="" method="POST" class="col-lg-4 mx-auto mt-3">
    <?php
      include 'koneksi.php';
      function input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $link_gambar = input($_POST['link_gambar']);
        $judul       = input($_POST['judul']);
        $penulis    = input($_POST['penulis']);
        $penerbit    = input($_POST['penerbit']);
        $tahun       = input($_POST['tahun']);
        $isi         = input($_POST['isi']);

        $sql = "INSERT INTO tb_buku (link_gambar, judul, penulis, penerbit, tahun, isi) VALUES 
                ('$link_gambar', '$judul', '$penulis', '$penerbit', '$tahun', '$isi')";
        if (mysqli_query($koneksi, $sql)) header("Location: dashboard.php");
        else echo "<div class='alert alert-danger'>Data Gagal Disimpan.</div>";
      }
    ?>

    <div class="mb-3"><label class="form-label">Link Gambar</label>
      <input type="text" name="link_gambar" class="form-control" placeholder="https://contoh.com/gambar.jpg">
    </div>
    <div class="mb-3"><label class="form-label">Judul</label>
      <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul">
    </div>
    <div class="mb-3"><label class="form-label">Penulis</label>
      <textarea name="penulis" class="form-control" placeholder="Masukkan Penulis "></textarea>
    </div>
    <div class="mb-3"><label class="form-label">Penerbit</label>
      <input type="text" name="penerbit" class="form-control" placeholder="Masukkan Penerbit">
    </div>
     <div class="mb-3"><label class="form-label">Tahun Terbit</label>
      <textarea name="tahun" class="form-control" placeholder="Masukkan Tahun Terbit"></textarea>
    </div>
    <div class="mb-3"><label class="form-label">Isi</label>
      <input type="text" name="isi" class="form-control" placeholder="Masukkan Isi">
    </div>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-success">Tambah</button>
      <a href="dashboard.php" class="btn btn-danger">Batal</a>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
