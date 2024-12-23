<?php
session_start();
include("sql.php");

// Ambil data email dan password dari POST
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = hash('sha256', $_POST['password']);

// Query ke database
$query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($connect, $query);

// Periksa apakah query berhasil dan ada hasil
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);

    // Atur session untuk login
    $_SESSION['login'] = true;
    $_SESSION['name'] = $data['username'];
    $_SESSION['id'] = $data['id'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['level_user'] = $data['level_user'];

    // Redirect ke dashboard
    echo "<script>
            alert('Login Berhasil!');
            window.location.href = 'userdashboard.php';
          </script>";
} else {
    // Redirect kembali ke halaman login dengan status error
    header("Location: userloginpage.php?status=invalid_credentials");
    exit;
}
?>
