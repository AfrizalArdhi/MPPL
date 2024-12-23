<?php
include("sql.php"); // Pastikan file ini memiliki koneksi database

$text1 = "Menunggu Persetujuan";
$text2 = "Selesai";
$query1 = "SELECT * from companyaccount";
$query2 = "SELECT * from jasa where status = '$text1'";
$query2 = "SELECT * from jasa where status = '$text1'";
$query3 = "SELECT * from jasa";
$query4 = "SELECT * from listorder where status = '$text2'";

$result1 = mysqli_query($connect, $query1);
$count1 = mysqli_num_rows($result1);

$result2 = mysqli_query($connect, $query2);
$count2 = mysqli_num_rows($result2);

$result3 = mysqli_query($connect, $query3);
$count3 = mysqli_num_rows($result3);

$result4 = mysqli_query($connect, $query4);
$count4 = mysqli_num_rows($result4);
?>

<div class="container">
<h2>Admin Dashboard</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Jumlah Perusahaan Terdaftar</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $count1 ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Jumlah Jasa Menunggu Persetujuan</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $count2 ?></h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Jumlah Jasa</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $count3 ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Jumlah Jasa Selesai</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $count4?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
