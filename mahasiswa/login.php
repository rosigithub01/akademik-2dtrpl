<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="min-height:100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Login Akademik</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" required>
                                <div class="form-text">Gunakan email yang sudah terdaftar.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <?php
                        if (isset($_POST['email'])) {
                            $email = $_POST['email'];
                            $pass  = md5($_POST['password']);
                            require 'koneksi.php';

                            // cek credentials user
                            $ceklogin = "SELECT * FROM pengguna WHERE email='$email' AND password='$pass'";
                            $result   = $koneksi->query($ceklogin);

                            if ($result->num_rows > 0) {
                                session_start();
                                $_SESSION['login'] = true;
                                $_SESSION['email'] = $email;
                                header("Location: index.php");
                                exit;
                            } else {
                                echo '<div class="alert alert-danger mt-3">Login gagal, email atau password salah.</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
