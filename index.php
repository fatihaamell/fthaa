<?php session_start(); ?>
<!doctype html>
<html lang="en" class="h-100">
<head>
  <title>RPL MEMBACA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('assets/img/abtu.jpg') center/cover no-repeat;
    }
    .glass {
      background:linear-gradient(135deg, #fce4ec, #b2dfdb);
      border-radius: 15px;
      padding: 40px;
      backdrop-filter: blur(4px);
      color: white;
    }
  </style>
</head>
<body class="d-flex h-100 align-items-center justify-content-center text-white">

  <div class="glass text-center col-md-6">
    <?php if (isset($_SESSION['username'])): ?>
      <div class="alert alert-success bg-success bg-opacity-50 border-0">
        Username Anda adalah: <strong><?= $_SESSION['username'] ?></strong><br>Silakan login menggunakan username ini.
      </div>
      <?php unset($_SESSION['username']); ?>
    <?php endif; ?>

    <h1 class="mb-3">Selamat Datang!</h1>
    <p class="lead mb-4">
      Baca yuk! biar ga minim literasi.
    </p>
    <div class="d-flex justify-content-center gap-3">
      <a href="login.php" class="btn btn-outline-light btn-lg">Login</a>
    </div>
  </div>

  <footer class="position-absolute bottom-0 w-100 text-center text-white-50 pb-3">
    <p class="mb-0">&copy; 2025 XI RPL 1. All Rights Reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

