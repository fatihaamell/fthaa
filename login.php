<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($koneksi, $username);

    $result = $koneksi->query("SELECT * FROM tb_user WHERE username='$username'");
    
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email']; 
             $_SESSION['password'] = $user['password']; 
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        
body {
  height: 100vh;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(135deg, #fce4ec, #b2dfdb);
  font-family: 'Poppins', sans-serif;
}

.form-signin {
  background: #fff;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 5px 20px rgba(0,0,0,0.1);
  max-width: 380px;
  width: 100%;
}

h2 {
  text-align: center;
  color: #555;
  margin-bottom: 25px;
}

.form-control {
  margin-bottom: 15px;
  border-radius: 8px;
  border: 1px solid #ddd;
}

.btn-primary {
  width: 100%;
  background: #81d4fa;
  border: none;
  border-radius: 8px;
  font-weight: 600;
}

.btn-primary:hover {
  background: #4fc3f7;
}

label {
  color: #666;
  font-size: 0.9rem;
}
   </style>

</head>

<body class="text-center">
<main class="form-signin">
    <h2 class="mb-5">Silahkan Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="username" required>
        <label for="floatingPassword">Nama</label>
        </div>
         <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="email" required>
        <label for="floatingPassword">Email</label>
        </div>
        <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingInput" name="password" required>
        <label for="floatingPassword">Password</label>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</main>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
