<?php
include("sql.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_order = intval($_POST['id_order']);
    $nama_perusahaan = htmlspecialchars(trim($_POST['nama_perusahaan']));
    $nama_pelanggan = htmlspecialchars(trim($_POST['nama_pelanggan']));
    $isi_komentar = htmlspecialchars(trim($_POST['isi_komentar']));

    // Validasi apakah input tidak kosong
    if (empty($id_order) || empty($nama_perusahaan) || empty($nama_pelanggan) || empty($isi_komentar)) {
        echo 'error_empty_input';
        exit;
    }

    $sql = "INSERT INTO keluhan (id_order, nama_perusahaan, nama_pelanggan, keluhan) VALUES (?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);

    // Perhatikan tipe data: i (integer) dan s (string)
    $stmt->bind_param("isss", $id_order, $nama_perusahaan, $nama_pelanggan, $isi_komentar);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $connect->close();
} else {
    echo 'invalid_request';
}
?>
