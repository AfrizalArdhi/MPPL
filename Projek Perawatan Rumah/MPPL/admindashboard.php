<?php 
include ("sql.php");

if(!isset($_SESSION['login'])){
    header("Location: adminlogin.php?status=notlogin");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="dashboardpage.css">
    <link rel="stylesheet" href="tablepage.css">

</head>

<body>
    <?php include("navbar.php") ?>
    <div class="container my-4 p-4">
        <div class="row align-items-start">
            <div class="col-2">
                <ul class="list-group">
                    <li class="list-group-item"><a href="admindashboard.php?mn=1">Dashboard</a></li>
                    <li class="list-group-item"><a href="admindashboard.php?mn=2">Daftar Perusahaan</a></li>
                    <li class="list-group-item"><a href="admindashboard.php?mn=3">Daftar Jasa</a></li>
                    <li class="list-group-item"><a href="admindashboard.php?mn=4">Daftar Pengajuan Jasa</a></li>
                    <li class="list-group-item"><a href="admindashboard.php?mn=5">Log Jasa Selesai</a></li>
                </ul>
            </div>
            <div class="col-10">
                <?php 
                    $menu = $_GET['mn'];
                    if($menu == 1){
                        include_once ("adminmenu/admindashboardmenu.php");
                    } elseif ($menu == 2) {
                        include_once ("adminmenu/adminlistperusahaan.php");
                    } elseif ($menu == 3) { 
                        include_once ("adminmenu/adminlistjasa.php");
                    } elseif ($menu == 4) {
                        include_once ("adminmenu/adminlistmenunggu.php");
                    } elseif ($menu == 5) {
                        include_once ("adminmenu/adminlistorder.php");
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
