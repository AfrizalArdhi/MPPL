<?php 
include("sql.php");

if (!isset($_SESSION['login'])) {
    header("Location: userloginpage.php?status=notlogin");
}

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Query untuk mendapatkan detail produk berdasarkan ID
    $query = "SELECT * FROM jasa WHERE id = '$productId'";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        // Gunakan data produk untuk menampilkan informasi pemesanan
    } else {
        echo "<p>Produk tidak ditemukan.</p>";
    }
} else {
    echo "<p>ID produk tidak diberikan.</p>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #eafaf1;
            font-family: 'Arial', sans-serif;
        }

        .list-group-item {
            border: 1px solid #a5d6a7;
        }

        .list-group-item a {
            text-decoration: none;
            color: #2e8b57;
        }

        .list-group-item:hover {
            background-color: #a5d6a7;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2e8b57;
        }

        .btn-primary {
            background-color: #2e8b57;
            border: none;
        }

        .btn-primary:hover {
            background-color: #256d4a;
        }

        select,
        option {
            border-color: #a5d6a7;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #a5d6a7;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php include("navbar.php"); ?>
    <div class="container my-4 p-4">
        <h1 class="text-center">Formulir Pemesanan</h1>
        <form action="userinputpesanan.php" method="POST" enctype="multipart/form-data">
            <h5>Data Pemesan</h5>
            <table class="table">
                <tr>
                    <td width = "300"><label for="name" class="form-label">Nama Pemesan</label></td>
                    <td>
                        <input type="text" class="form-control" id="name"
                            value="<?php echo htmlspecialchars($_SESSION['name']); ?>" readonly>
                        <input type="hidden" name="username" value="<?php echo htmlspecialchars($_SESSION['name']); ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="alamat" class="form-label">Alamat Lengkap</label></td>
                    <td><input type="text" name="alamat" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="phone" class="form-label">Nomor Telepon</label></td>
                    <td><input type="text" name="phone" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="note" class="form-label">Catatan</label></td>
                    <td><input type="text" name="note" class="form-control"></td>
                </tr>
            </table>
            <div class="mt-4">
                <h5>Paket yang Dipilih</h5>
                <table class="table">
                    <tr>
                        <td width = "300"><label for="companyname" class="form-label">Nama Perusahaan</label></td>
                        <td>
                            <input type="text" class="form-control" id="companyname"
                                value="<?php echo htmlspecialchars($product['companyname']); ?>" readonly>
                            <input type="hidden" name="companyname"
                                value="<?php echo htmlspecialchars($product['companyname']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nama_jasa" class="form-label">Nama Jasa</label></td>
                        <td>
                            <input type="text" class="form-control" id="nama_jasa"
                                value="<?php echo htmlspecialchars($product['nama_jasa']); ?>" readonly>
                            <input type="hidden" name="nama_jasa"
                                value="<?php echo htmlspecialchars($product['nama_jasa']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="jenis" class="form-label">Jenis</label></td>
                        <td>
                            <input type="text" class="form-control" id="jenis"
                                value="<?php echo htmlspecialchars($product['jenis']); ?>" readonly>
                            <input type="hidden" name="jenis"
                                value="<?php echo htmlspecialchars($product['jenis']); ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="harga" class="form-label">Harga</label></td>
                        <td>
                            <input type="text" class="form-control" id="harga"
                                value="<?php echo number_format($product['harga'], 0, ',', '.'); ?>" readonly>
                            <input type="hidden" name="harga"
                                value="<?php echo htmlspecialchars($product['harga']); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="mt-4">
                <h5>Pembayaran</h5>
                <table class="table">
                    <tr>
                        <td width = "300"><label for="payment_method" class="form-label">Metode Pembayaran</label></td>
                        <td>
                            <select name="payment_method" id="payment_method" class="form-select">
                                <option value="" disabled selected>Pilih Metode Pembayaran</option>
                                <option value="bank">Bank Transfer</option>
                                <option value="e_wallet">E-Wallet</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nominal" class="form-label">Nominal</label></td>
                        <td>
                            <input type="text" id="nominal" name="nominal" class="form-control"
                                placeholder="Masukkan nominal pembayaran">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="bukti_transfer" class="form-label">Bukti Transfer</label></td>
                        <td>
                            <input type="file" id="bukti_transfer" name="bukti_transfer" class="form-control"
                                accept="image/*">
                        </td>
                    </tr>
                </table>
            </div>
            <button type="submit" class="btn btn-primary w-100">Pesan Sekarang</button>
        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>