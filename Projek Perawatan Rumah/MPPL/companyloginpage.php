<?php
session_start();
if (isset($_SESSION['login'])) {
    header('location: companydashboard.php');
}
$alert_message = "";
$alert_class = "";
if (isset($_GET['status'])) {
    if ($_GET['status'] == "success") {
        $alert_message = "Registration successful! Please log in.";
        $alert_class = "alert-success";
    } elseif ($_GET['status'] == "invalid_credentials") {
        $alert_message = "Invalid username or password.";
        $alert_class = "alert-danger";
    } elseif ($_GET['status'] == "notlogin") {
        $alert_message = "Login First!";
        $alert_class = "alert-danger";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="loginregister.css">

</head>

<body>
    <section>
        <div class="container mt-5 justify-content-center">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="companyloginproses.php" method="post">
                                <label for="" class="d-block text-center mb-4 fs-4">Company Login</label>
                                <?php if (!empty($alert_message)): ?>
                                    <div class="alert <?= htmlspecialchars($alert_class); ?> mb-3" role="alert">
                                        <?= htmlspecialchars($alert_message); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter your password" required>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="companyregisterpage.php" class="nav-link">Don't have an account? Register here</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
