<?php 
    include ("sql.php");
    if(!isset($_SESSION['login'])){
        header("Location: userloginpage.php?status=notlogin");
    }
    $nama = $_SESSION['name'];
    $sql = "SELECT * FROM listorder WHERE nama_pelanggan = '$nama'";
    $data = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #eafaf1; /* Latar belakang lembut kehijauan */
            font-family: 'Arial', sans-serif;
        }

        h2 {
            color: #016930;
            margin-bottom: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 128, 96, 0.2);
        }

        thead {
            background-color: #016930;
            color: #ffffff;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f8f4;
        }

        tbody tr:hover {
            background-color: #e0f0e9;
        }

        .btn-primary,
        .btn-success {
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 128, 96, 0.3);
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #014722;
        }

        .btn-success:hover {
            background-color: #014d34;
        }

        .badge {
            font-size: 0.9rem;
        }

        .modal-header {
            background-color: #016930;
            color: white;
        }

        .btn-close {
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php include_once 'navbar.php'; ?>

    <!-- Main Content -->
    <div class="container">
        <h2>History</h2>
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
                    <th scope="col">Aksi</th>
                    <th scope="col">Keluhan</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data->num_rows > 0) { 
                    $no = 1;
                    while ($row = $data->fetch_assoc()) { ?>
                <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <?php
                        // Output data dengan sanitasi
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

                        // Validasi bukti transfer
                        if (!empty($row['bukti_transfer'])) {
                            echo "<td><a href='" . htmlspecialchars($row['bukti_transfer']) . "' target='_blank'>Lihat</a></td>";
                        } else {
                            echo "<td>-</td>";
                        }
                        echo "<td id='status-{$row['id']}'>" . htmlspecialchars($row['status']) . "</td>";
                        ?>

                    <td>
                        <?php if ($row['status'] !== 'Selesai') { ?>
                        <button class="btn btn-success ubah-status" data-id="<?php echo $row['id']; ?>">Ubah ke
                            Selesai</button>
                        <?php } else { ?>
                        <span class="badge bg-success">Selesai</span>
                        <?php } ?>
                    </td>
                    <td>
                        <button class="btn btn-primary berikan-komentar" data-id-order="<?php echo $row['id']; ?>"
                            data-nama-perusahaan="<?php echo $row['nama_perusahaan']; ?>"
                            data-nama-pelanggan="<?php echo htmlspecialchars($nama); ?>">
                            Berikan Keluhan
                        </button>
                    </td>
                </tr>
                <?php } 
                } else { ?>
                <tr>
                    <td colspan="16" class="text-center">Tidak ada data.</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="komentarModal" tabindex="-1" aria-labelledby="komentarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="komentarModalLabel">Keluhan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formKomentar">
                        <input type="hidden" name="id_order" id="id_order">
                        <input type="hidden" name="nama_perusahaan" id="nama_perusahaan">
                        <input type="hidden" name="nama_pelanggan" id="nama_pelanggan">
                        <div class="mb-3">
                            <label for="isi_komentar" class="form-label"></label>
                            <textarea class="form-control" id="isi_komentar" name="isi_komentar" rows="4"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.ubah-status', function () {
            const id = $(this).data('id');
            const rowStatus = $(`#status-${id}`);

            if (confirm('Apakah Anda yakin ingin mengubah status menjadi "Selesai"?')) {
                $.ajax({
                    url: 'update_status_user.php',
                    type: 'POST',
                    data: {
                        id: id,
                        status: 'Selesai'
                    },
                    success: function (response) {
                        if (response === 'success') {
                            rowStatus.text('Selesai');
                            $(`button[data-id="${id}"]`).replaceWith(
                                '<span class="badge bg-success">Selesai</span>');
                        } else {
                            alert('Gagal mengubah status. Silakan coba lagi.');
                        }
                    },
                    error: function () {
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    }
                });
            }
        });
    </script>
    <script>
        $(document).on('click', '.berikan-komentar', function () {
            const idOrder = $(this).data('id-order');
            const namaPerusahaan = $(this).data('nama-perusahaan');
            const namaPelanggan = $(this).data('nama-pelanggan');

            $('#id_order').val(idOrder);
            $('#nama_perusahaan').val(namaPerusahaan);
            $('#nama_pelanggan').val(namaPelanggan);

            $('#komentarModal').modal('show');
        });

        $('#formKomentar').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                url: 'simpan_komentar.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response === 'success') {
                        alert('Komentar berhasil disimpan!');
                        $('#komentarModal').modal('hide');
                        $('#formKomentar')[0].reset();
                    } else {
                        alert('Gagal menyimpan komentar. Silakan coba lagi.');
                    }
                },
                error: function () {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            });
        });
    </script>


</body>

</html>