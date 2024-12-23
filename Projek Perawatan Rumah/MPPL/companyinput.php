<style>
    :root {
        --primary-color: #28a745; /* Warna hijau utama */
        --hover-color: #34ce57; /* Warna hijau untuk hover */
        --light-gray: #f8f9fa; /* Warna latar belakang form */
        --border-gray: #ced4da; /* Warna border */
    }

    form {
        background-color: var(--light-gray);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: bold;
        color: var(--primary-color);
    }

    .form-control, .form-select {
        border: 1px solid var(--border-gray);
        border-radius: 4px;
        transition: border-color 0.3s ease-in-out;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0px 0px 5px rgba(40, 167, 69, 0.5);
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: var(--hover-color);
        border-color: var(--hover-color);
    }
</style>

<h2>Permohonan Jasa</h2>
<form action="companyjasainput.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nj" class="form-label">Nama Jasa</label>
        <input type="text" class="form-control" id="nj" required name="nj">
    </div>
    <div class="mb-3">
        <label for="kt" class="form-label">Kategori</label>
        <div class="input-group mb-3">
            <select class="form-select" id="kt" name="kt" onchange="updateJenisPerawatan()">
                <option selected>Choose...</option>
                <option value="Kebersihan Rumah">Kebersihan Rumah</option>
                <option value="Perawatan Luar Rumah">Perawatan Luar Rumah</option>
                <option value="Perawatan Interior">Perawatan Interior</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label for="jp" class="form-label">Jenis Perawatan</label>
        <div class="input-group mb-3">
            <select class="form-select" id="jp" name="jp">
                <option selected>Choose...</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi Jasa</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Harga</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
        <label for="duration" class="form-label">Durasi (jam)</label>
        <input type="number" class="form-control" id="duration" name="duration" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Gambar Jasa</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
