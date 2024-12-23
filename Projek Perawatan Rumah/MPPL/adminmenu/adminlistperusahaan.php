<?php
include("sql.php"); // Pastikan file ini memiliki koneksi database

// Query untuk mengambil data dari tabel 'jasa'
$query = "SELECT * FROM companyaccount";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($connect));
}
?>

<div class="container">
<h2>Daftar Perusahaan</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Nomor Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1; // Penomoran baris
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<th scope='row'>{$no}</th>";
                        echo "<td>" . htmlspecialchars($row['companyname']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['city']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='5' class='text-center'>Tidak ada data perusahaan yang ditemukan.</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
