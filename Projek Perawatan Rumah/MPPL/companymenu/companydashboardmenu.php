<?php
include("sql.php"); // Pastikan file ini memiliki koneksi database

$company = $_SESSION['name'];
$setuju = "Disetujui";
$tidaksetuju = "Menunggu Persetujuan";

// Query untuk mengambil data jasa
$query1 = "SELECT * FROM jasa WHERE companyname = '$company' AND status = '$setuju'";
$query2 = "SELECT * FROM jasa WHERE companyname = '$company' AND status = '$tidaksetuju'";

$query3 = "SELECT * FROM listorder WHERE nama_perusahaan = '$company' AND status = 'Sedang Dikerjakan'";
$query4 = "SELECT * FROM listorder WHERE nama_perusahaan = '$company' AND status = 'Selesai'";

$result1 = mysqli_query($connect, $query1);
$result2 = mysqli_query($connect, $query2);

$result3 = mysqli_query($connect, $query3);
$result4 = mysqli_query($connect, $query4);

// Menghitung jumlah data
$count1 = mysqli_num_rows($result1);
$count2 = mysqli_num_rows($result2);

$count3 = mysqli_num_rows($result3);
$count4 = mysqli_num_rows($result4);

if (!$result1 || !$result2 || !$result3 || !$result4) {
    die("Query gagal: " . mysqli_error($connect));
}
?>

<div class="container">
<h2>Company Dashboard</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Jumlah Jasa Disetujui</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $count1; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Jumlah Jasa Menunggu</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $count2; ?></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Jumlah Jasa Dikerjakan</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $count3; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Jumlah Jasa Selesai</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $count4; ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
