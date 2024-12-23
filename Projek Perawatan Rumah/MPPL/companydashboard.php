<?php 
include ("sql.php");
if(!isset($_SESSION['login'])){
    header("Location: companyloginpage.php?status=notlogin");
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
    <?php include ("navbar.php") ?>
    <div class="container my-4 p-4">
        <div class="row align-items-start">
            <div class="col-2">
                <ul class="list-group">
                    <li class="list-group-item"><a href="companydashboard.php?mn=1">Dashboard</a></li>
                    <li class="list-group-item"><a href="companydashboard.php?mn=2">Permohonan Jasa</a></li>
                    <li class="list-group-item"><a href="companydashboard.php?mn=3">Daftar Jasa</a></li>
                    <li class="list-group-item"><a href="companydashboard.php?mn=4">Pesanan Pelanggan</a></li>
                    <li class="list-group-item"><a href="companydashboard.php?mn=5">Riwayat Pekerjaan</a></li>
                </ul>
            </div>
            <div class="col-10">
                <?php 
                    $menu = $_GET['mn'];
                    if($menu == 1){
                        include_once ("companymenu/companydashboardmenu.php");
                    } elseif ($menu == 2) {
                        include_once ("companyinput.php");
                    } elseif ($menu == 3) { 
                        include_once ("companymenu/companylistjasa.php");
                    } elseif ($menu == 4) {
                        include_once ("companywaitinglist.php");
                    } elseif ($menu == 5) {
                        include_once ("companymenu/companyhistory.php");
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function updateJenisPerawatan() {
            const kategori = document.getElementById("kt").value;
            const jenisPerawatan = document.getElementById("jp");

            // Clear existing options
            jenisPerawatan.innerHTML = "";

            // Define options based on kategori
            const options = {
                "Kebersihan Rumah": [
                    "Pembersihan harian/rutin",
                    "Pembersihan mendalam (deep cleaning)",
                    "Pembersihan pasca-renovasi",
                    "Cuci karpet dan sofa"
                ],
                "Perawatan Luar Rumah": [
                    "Pemotongan rumput",
                    "Perawatan taman",
                    "Pembersihan kaca dan dinding luar"
                ],
                "Perawatan Interior": [
                    "Pengecatan dinding",
                    "Perbaikan furnitur",
                    "Pemasangan wallpaper atau dekorasi"
                ]
            };

            // Populate jenisPerawatan dropdown with new options
            if (options[kategori]) {
                options[kategori].forEach(option => {
                    const opt = document.createElement("option");
                    opt.value = option;
                    opt.textContent = option;
                    jenisPerawatan.appendChild(opt);
                });
            } else {
                const opt = document.createElement("option");
                opt.value = "";
                opt.textContent = "Choose...";
                jenisPerawatan.appendChild(opt);
            }
        }
    </script>
</body>

</html>
