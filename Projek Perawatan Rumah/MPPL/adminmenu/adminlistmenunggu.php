<?php
include("sql.php"); // Pastikan file ini memiliki koneksi database
$company = $_SESSION['name'];
$setuju = "Menunggu Persetujuan";
// Query untuk mengambil data dari tabel 'jasa'
$query = "SELECT * FROM jasa where status = '$setuju'";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($connect));
}

?>
<div class="container">
    <h2>Pengajuan Jasa</h2>
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
                    <th scope="col">Aksi</th>
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
                        echo "<td>" . htmlspecialchars($row['status']) . "</td>"; ?>
                        <td>
                            <?php if ($row['status'] === 'Menunggu Persetujuan') : ?>
                                <form action="update_status.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                                </form>
                            <?php else : ?>
                                <span class="badge bg-success">Disetujui</span>
                            <?php endif; ?>
                        </td>
                        <?php
                        echo "</tr>";
                        $no++;
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='8' class='text-center'>Tidak ada data jasa yang ditemukan.</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
