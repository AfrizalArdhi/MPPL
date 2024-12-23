<?php
include("sql.php"); // Pastikan file ini memiliki koneksi database
$company = $_SESSION['name'];

// Query untuk mengambil data dari tabel 'jasa'
$query = "SELECT * FROM jasa";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($connect));
}
?>

<div class="container">
    <h2>Daftar Jasa Perusahaan</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Nama Jasa</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Jenis Perawatan</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Durasi (Jam)</th>
                    <th scope="col">Status</th>
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
                        echo "<td>" . htmlspecialchars($row['nama_jasa']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['kategori']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['jenis']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                        echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
                        echo "<td>" . htmlspecialchars($row['durasi']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='9' class='text-center'>Tidak ada data jasa yang ditemukan.</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

