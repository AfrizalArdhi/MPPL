<?php
include("sql.php");

// Collect form data
$companyname = $_SESSION['name'];
$nama_jasa = htmlspecialchars($_POST['nj']);
$kategori = htmlspecialchars($_POST['kt']);
$jenis = htmlspecialchars($_POST['jp']);
$deskripsi = htmlspecialchars($_POST['description']);
$harga = intval($_POST['price']);
$durasi = intval($_POST['duration']);
$status = "Menunggu Persetujuan";

// Handle image upload
$target_dir = "uploads/jasa/"; // Folder untuk menyimpan file gambar
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true); // Buat folder jika belum ada
}

$image_name = basename($_FILES['image']['name']);
$target_file = $target_dir . $image_name;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Cek apakah file adalah gambar
if (!empty($image_name)) {
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        die("File bukan gambar!");
    }

    // Validasi ekstensi file
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed_extensions)) {
        die("Hanya format JPG, JPEG, PNG, & GIF yang diizinkan.");
    }

    // Upload file
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        die("Terjadi kesalahan saat mengunggah gambar.");
    }
} else {
    $target_file = NULL; // Jika tidak ada gambar yang diunggah
}

// Insert data ke database
$insert_query = $connect->prepare(
    "INSERT INTO jasa (companyname, nama_jasa, kategori, jenis, deskripsi, harga, durasi, gambar, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
);

$insert_query->bind_param(
    "sssssiiss",
    $companyname,
    $nama_jasa,
    $kategori,
    $jenis,
    $deskripsi,
    $harga,
    $durasi,
    $target_file,
    $status
);

if ($insert_query->execute()) {
    header("Location: companydashboard.php?mn=1");
    exit();
} else {
    echo "Terjadi kesalahan: " . $connect->error;
}

$insert_query->close();
$connect->close();
?>
