<?php
include("sql.php"); // Pastikan file ini memiliki koneksi database
$company = $_SESSION['name'];
$status = "Selesai";
// Query untuk mengambil data dari tabel 'listorder'
$query = " SELECT listorder.*, keluhan.keluhan AS komentar 
    FROM listorder LEFT JOIN keluhan ON listorder.id = keluhan.id_order 
    WHERE listorder.nama_perusahaan = '$company' 
    AND listorder.status = '$status'";

$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($connect));
}
?>

<div class="container">
    <h2>Riwayat Pekerjaan</h2>

    <div class="table-responsive" style="max-width: 100%; overflow-x: auto;">
        <!-- Tambahkan overflow-x -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Jasa</th>
                    <th scope="col">Jenis Perawatan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Nominal Bayar</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Bukti Transfer</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keluhan Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                <?php
    $no = 1; // Penomoran baris
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<th scope='row'>{$no}</th>";
            echo "<td>" . htmlspecialchars($row['nama_pelanggan']) . "</td>";
            echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nomor_telepon']) . "</td>";
            echo "<td>" . htmlspecialchars($row['catatan']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama_perusahaan']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nama_jasa']) . "</td>";
            echo "<td>" . htmlspecialchars($row['jenis']) . "</td>";
            echo "<td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>";
            echo "<td>" . htmlspecialchars($row['metode_pembayaran']) . "</td>";
            echo "<td>Rp " . number_format($row['nominal_bayar'], 0, ',', '.') . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tanggal_selesai']) . "</td>";
            echo "<td><a href='" . htmlspecialchars($row['bukti_transfer']) . "' target='_blank'>Lihat</a></td>";
            echo "<td id='status-{$row['id']}'>" . htmlspecialchars($row['status']) . "</td>";

            // Tampilkan komentar
            if (!empty($row['komentar'])) {
                echo "<td>" . htmlspecialchars($row['komentar']) . "</td>";
            } else {
                echo "<td><em>Tidak ada komentar</em></td>";
            }

            echo "</tr>";
            $no++;
        }
    } else {
        echo "<tr>";
        echo "<td colspan='16' class='text-center'>Tidak ada data jasa yang ditemukan.</td>";
        echo "</tr>";
    }
    ?>
            </tbody>

        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>