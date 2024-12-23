<?php 
include ("sql.php");
if(!isset($_SESSION['login'])){
    header("Location: userloginpage.php?status=notlogin");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background: linear-gradient(to right, #e8f5e9, #a5d6a7);
            min-height: 100vh;
        }

        h1 {
            color: #1b5e20;
            font-weight: bold;
            text-align: center;
        }

        .card {
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card .btn-primary {
            background-color: #2e7d32;
            border: none;
            font-weight: bold;
        }

        .card .btn-primary:hover {
            background-color: #1b5e20;
        }

        .caption p {
            margin: 5px 0;
            font-weight: 500;
        }

        .product_name {
            font-size: 1.1rem;
            color: #2e7d32;
        }

        .artist {
            font-size: 0.9rem;
            color: #757575;
        }

        .price {
            font-size: 1rem;
            font-weight: bold;
            color: #1b5e20;
        }

        table {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
        }

        table th {
            background-color: #2e7d32;
            color: #ffffff;
        }

        table td img {
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <?php
    include_once 'navbar.php';
    ?>
    <div class="container mt-3">
        <h1>Daftar Perawatan Rumah</h1>
    </div>
    <div class="container d-flex flex-wrap justify-content-center">
        <?php 
        $text = "Disetujui";
            $sql = "SELECT * from jasa where status = '$text'";
            $all_produk = $connect->query($sql);
            while($row = mysqli_fetch_assoc($all_produk)){
        ?>
        <div class="card shadow-sm m-3" style="max-width: 300px; text-align:center;" data-bs-toggle="modal"
            data-bs-target="#productModal" onclick="showDetails('<?php echo $row['id']; ?>')">
            <div class="card-body">
                <div class="image mb-3">
                    <img src="<?php echo $row['gambar']; ?>" alt=""
                        style="width: 100%; height:200px; object-fit:cover; border-radius: 10px;">
                </div>
                <div class="caption">
                    <p class="product_name"> <?php echo $row['nama_jasa']; ?></p>
                    <p class="artist"><?php echo $row['kategori']; ?></p>
                    <p class="artist"><?php echo $row['jenis']; ?></p>
                    <p class="price">Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                </div>
            </div>
        </div>

        <?php } ?>
    </div>

    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Detail Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="modal-content">
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="orderButton" href="#" class="btn btn-secondary">Pesan</a>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
function showDetails(id) {
    // Lakukan AJAX untuk mendapatkan detail produk berdasarkan ID
    fetch(`get_product_details.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            // Isi konten modal dengan data produk
            const modalContent = `
                <img src="${data.gambar}" alt="" style="width: 100%; height:200px; object-fit:cover; border-radius: 10px; margin-bottom: 10px;">
                <h5>${data.nama_jasa}</h5>
                <p>Kategori: ${data.kategori}</p>
                <p>Jenis: ${data.jenis}</p>
                <p>Deskripsi: ${data.deskripsi}</p>
                <p>Durasi: ${data.durasi} jam</p>
                <p class="price">Rp${new Intl.NumberFormat('id-ID').format(data.harga)}</p>
            `;
            document.getElementById('modal-content').innerHTML = modalContent;

            // Update link tombol "Pesan" dengan ID produk
            const orderButton = document.getElementById('orderButton');
            orderButton.href = `userorderform.php?id=${id}`;
        })
        .catch(error => {
            console.error('Error fetching product details:', error);
            document.getElementById('modal-content').innerHTML = '<p>Gagal memuat detail produk.</p>';
        });
}
</script>

</html>
