<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LaundryCrafty</title>
    <!-- Kita pakai Bootstrap Online (CDN) agar tampilan langsung bagus -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .card-login { width: 100%; max-width: 400px; }
    </style>
</head>
<body>

    <div class="card card-login shadow">
        <div class="card-body p-4">
            <h3 class="text-center mb-4 text-primary">LaundryCrafty</h3>
            
            <!-- Menampilkan Pesan Error jika login gagal -->
            <?php if(isset($_GET['pesan'])): ?>
                <div class="alert alert-danger text-center">
                    <?php 
                        if($_GET['pesan'] == 'gagal') echo "Login Gagal! Username/Password salah.";
                        if($_GET['pesan'] == 'logout') echo "Anda berhasil Logout.";
                        if($_GET['pesan'] == 'belum_login') echo "Anda harus login dulu.";
                    ?>
                </div>
            <?php endif; ?>

            <form action="cek-login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk Sistem</button>
            </form>
        </div>
    </div>

</body>
</html>