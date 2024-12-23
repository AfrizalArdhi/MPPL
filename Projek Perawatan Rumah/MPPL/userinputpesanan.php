<?php
include("sql.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $note = mysqli_real_escape_string($connect, $_POST['note']);
    $companyname = mysqli_real_escape_string($connect, $_POST['companyname']);
    $nama_jasa = mysqli_real_escape_string($connect, $_POST['nama_jasa']);
    $jenis = mysqli_real_escape_string($connect, $_POST['jenis']);
    $harga = mysqli_real_escape_string($connect, $_POST['harga']);
    $payment_method = mysqli_real_escape_string($connect, $_POST['payment_method']);
    $nominal = mysqli_real_escape_string($connect, $_POST['nominal']);

    $status = "Menunggu"; // Menunggu, Dikerjakan, Selesai
    $upload_dir = 'uploads/';

    // Periksa apakah folder upload sudah ada, jika tidak, buat folder
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Buat folder dengan izin penuh
    }

    // Validasi dan upload file
    $file_name = basename($_FILES['bukti_transfer']['name']);
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $target_file = $upload_dir . time() . '_' . $file_name;

    if (in_array(strtolower($file_extension), $allowed_extensions)) {
        if (move_uploaded_file($_FILES['bukti_transfer']['tmp_name'], $target_file)) {
            $bukti_transfer = $target_file;
        } else {
            die("Gagal mengunggah bukti transfer.");
        }
    } else {
        die("Format file tidak didukung. Hanya JPG, JPEG, PNG, dan GIF yang diizinkan.");
    }

    // Simpan data ke database
    $query = "INSERT INTO listorder 
                (nama_pelanggan, alamat, nomor_telepon, catatan, nama_perusahaan, nama_jasa, jenis, harga, metode_pembayaran, nominal_bayar, bukti_transfer, status) 
              VALUES 
                ('$username', '$alamat', '$phone', '$note', '$companyname', '$nama_jasa', '$jenis', '$harga', '$payment_method', '$nominal', '$bukti_transfer', '$status')";

    if (mysqli_query($connect, $query)) {
        echo "<script>
                alert('Pesanan berhasil disimpan.');
                window.location.href = 'userdashboard.php';
            </script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
