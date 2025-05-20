<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = intval($_GET['id']);
$result = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

if (isset($_POST['submit'])) {
    $link_gambar = htmlspecialchars($_POST['link_gambar']);
    $judul = htmlspecialchars($_POST['judul']);
    $tahun = htmlspecialchars($_POST['tahun']);
    $penulis = htmlspecialchars($_POST['penulis']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $isi = htmlspecialchars($_POST['isi']);

    $update = "UPDATE tb_buku SET 
        link_gambar='$link_gambar', 
        judul='$judul', 
        tahun='$tahun',
        penulis='$penulis', 
        penerbit='$penerbit', 
        isi='$isi' 
        WHERE id=$id";

    if (mysqli_query($koneksi, $update)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">baca yuk</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="create.php">Data</a></li>
        <li class="nav-item"><a class="nav-link disabled">Link</a></li>
      </ul>
      <a href="index.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="text-center">Edit Data Buku</h2>
  <form method="POST" class="col-lg-4 mx-auto mt-4">
    <div class="mb-3">
      <label class="form-label">Link Gambar</label>
      <input type="text" name="link_gambar" class="form-control" value="<?= $data['link_gambar'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Judul</label>
      <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Tahun Terbit</label>
      <input type="text" name="tahun" class="form-control" value="<?= $data['tahun'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Penulis</label>
      <input type="text" name="penulis" class="form-control" value="<?= $data['penulis'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Penerbit</label>
      <input type="text" name="penerbit" class="form-control" value="<?= $data['penerbit'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Isi</label>
      <input type="text" name="isi" class="form-control" value="<?= $data['isi'] ?>">
    </div>
    <div class="d-flex gap-2">
      <button type="submit" name="submit" class="btn btn-success">Simpan</button>
      <a href="dashboard.php" class="btn btn-danger">Batal</a>
    </div>
  </form>
</div>
</body>
</html>

