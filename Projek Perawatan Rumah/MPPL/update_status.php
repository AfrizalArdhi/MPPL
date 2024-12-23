<?php
include("sql.php"); // Pastikan koneksi database ada

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);

    // Update status di database
    $query = "UPDATE jasa SET status='Disetujui' WHERE id=?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        // Redirect kembali ke halaman utama
        header("Location: admindashboard.php?mn=3");
        exit;
    } else {
        die("Gagal memperbarui status: " . mysqli_error($connect));
    }
}
