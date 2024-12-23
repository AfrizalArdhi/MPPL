<?php
    session_start();
    include ("sql.php");

    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $query = mysqli_query($connect, "SELECT *  FROM user WHERE email = '$email' AND password = '$password'") or die(mysqli_error($connect));

    $count = mysqli_num_rows($query);
    if ($count > 0) {
        echo "<script>
                alert('Login Berhasil!');
                window.location.href = 'admindashboard.php?mn=1';
            </script>";
        $data = mysqli_fetch_assoc($query);
        $_SESSION['login'] = true;
        $_SESSION['name'] = $data['username'];
        $_SESSION['id'] = $data['id'];
        $_SESSION['level_user'] = $data['level_user'];        
    } else {
        // header("Location: loginpage.php");
        header("Location: adminlogin.php?status=invalid_credentials");

    }
?>
