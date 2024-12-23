<style>
    :root {
        --primary-color: #28a745; /* Warna hijau utama */
        --secondary-color: #218838; /* Warna hijau sekunder */
        --hover-color: #34ce57; /* Warna untuk efek hover */
        --text-color: #ffffff; /* Warna teks */
    }

    nav {
        background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        padding: 10px 20px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    nav .navbar-brand {
        color: var(--text-color);
        font-weight: bold;
        font-size: 22px;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    nav .navbar-nav .nav-link {
        color: var(--text-color);
        font-weight: 500;
        transition: color 0.3s ease-in-out, transform 0.3s;
    }

    nav .navbar-nav .nav-link:hover {
        color: var(--hover-color);
        transform: scale(1.1);
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--secondary-color);
        font-weight: bold;
        color: var(--text-color);
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .btn-primary:hover {
        background-color: var(--hover-color);
        border-color: var(--hover-color);
        color: var(--text-color);
    }

    .dropdown-menu {
        border-radius: 8px;
        border: 1px solid var(--secondary-color);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
        color: #000;
        font-weight: 500;
        padding: 10px 15px;
    }

    .dropdown-item:hover {
        background-color: var(--hover-color);
        color: var(--text-color);
    }

    .navbar-toggler-icon {
        background-color: var(--text-color);
        border-radius: 3px;
    }

    .navbar-toggler:focus {
        outline: none;
    }

    @media (max-width: 768px) {
        nav .navbar-brand {
            font-size: 18px;
        }

        .btn-primary {
            font-size: 14px;
            padding: 5px 10px;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">HomeCare</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if ($_SESSION['level_user'] == 1): ?>
                    <!-- Tambahkan menu jika level user admin -->
                <?php endif; ?>
            </ul>
        </div>
        <div class="btn-group ms-3">
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"
                aria-expanded="false" aria-label="User Options">
                <i class="bi bi-person-circle"></i>
                <?php echo $_SESSION['name']; ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <?php if ($_SESSION['level_user'] == 3): ?>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="userpesanan.php?id=<?php echo $_SESSION['id']; ?>">History</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                <?php endif; ?>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
