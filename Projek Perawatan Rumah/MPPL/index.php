<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeCare - Perawatan Rumah Profesional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">HomeCare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="userloginpage.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userregisterpage.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="container">
        <div class="jumbotron mt-5">
            <h1 class="display-4">Selamat Datang di HomeCare</h1>
            <p class="lead">Solusi profesional untuk kebutuhan perawatan rumah Anda. Kami hadir untuk memberikan layanan
                terbaik yang membuat rumah Anda nyaman dan indah.</p>
            <hr class="my-4">
            <p>Daftar sekarang untuk menjelajahi layanan kami atau bergabung sebagai mitra.</p>
            <a class="btn btn-custom btn-lg me-2" href="userregisterpage.php" role="button">Daftar Sekarang</a>
            <a class="btn btn-custom btn-lg" href="companyregisterpage.php" role="button">Daftar Sebagai Mitra</a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container features mt-5">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card feature-card p-4 text-center">
                    <i class="fas fa-home"></i>
                    <h3 class="mt-3">Perawatan Rumah</h3>
                    <p>Layanan profesional untuk menjaga kebersihan dan perawatan rumah Anda.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card feature-card p-4 text-center">
                    <i class="fas fa-tools"></i>
                    <h3 class="mt-3">Perbaikan</h3>
                    <p>Kami siap membantu memperbaiki kerusakan di rumah Anda, mulai dari atap hingga pipa.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card feature-card p-4 text-center">
                    <i class="fas fa-user-check"></i>
                    <h3 class="mt-3">Kepercayaan</h3>
                    <p>Dapatkan layanan terpercaya dengan teknisi berpengalaman dan bersertifikat.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer mt-5">
    <a href="adminlogin.php" id="admin-link" style="text-decoration: none; color: grey;">
    <p>&copy; 2024 HomeCare. All rights reserved.</p>
</a>      
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    let clickCount = 0; // Initialize click count
    const adminLink = document.getElementById('admin-link');

    adminLink.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent immediate navigation
        clickCount++;

        if (clickCount >= 3) {
            adminLink.style.color = ""; // Restore original color
            window.location.href = adminLink.getAttribute('href'); // Redirect to the link
        }
    });
</script>
</body>

</html>
