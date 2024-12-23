<?php
include("sql.php");

// Collect form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = hash('sha256', $_POST['password']);
$alamat = $_POST['address'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$level_user = 2; //Company

// Check if username or email already exists
$check_query = mysqli_query($connect, "SELECT * FROM companyaccount WHERE email = '$email'") or die(mysqli_error($connect));
if (mysqli_num_rows($check_query) > 0) {
    // Redirect to register page with error message
    header("Location: companyregisterpage.php?status=exists");
    exit();
}

// Insert new user if username/email is unique
$insert_query = mysqli_query($connect, "INSERT INTO companyaccount (companyname, email, phone, address, city, password, level_user) VALUES ('$username', '$email', '$phone', '$alamat', '$city','$password', '$level_user')");

if ($insert_query) {
    // Redirect to login page with success message
    header("Location: companyloginpage.php?status=success");
    exit();
} else {
    // Redirect to register page with generic error message
    header("Location: companyregisterpage.php?status=failed");
    exit();
}
?>
