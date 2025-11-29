<?php include 'header.php'; ?>

<!-- Bagian Sambutan -->
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2 class="text-primary">Halo, <?php echo $_SESSION['username']; ?>!</h2>
                <p class="lead mb-0">Selamat datang di panel admin LaundryCrafty. Silakan pilih menu di bawah ini.</p>
            </div>
        </div>
    </div>
</div>

<!-- Bagian Menu Utama (3 Kolom) -->
<div class="row text-center">
    
    <!-- 1. Menu Pelanggan -->
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-info shadow h-100">
            <div class="card-body d-flex flex-column justify-content-center">
                <h1 class="display-4">👥</h1> <!-- Ikon Emoji -->
                <h4 class="card-title">Pelanggan</h4>
                <p class="card-text">Kelola data pelanggan laundry Anda di sini.</p>
                <a href="pelanggan.php" class="btn btn-light text-info fw-bold mt-auto">Kelola Pelanggan</a>
            </div>
        </div>
    </div>

    <!-- 2. Menu Layanan -->
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-warning shadow h-100">
            <div class="card-body d-flex flex-column justify-content-center">
                <h1 class="display-4">👕</h1> <!-- Ikon Emoji -->
                <h4 class="card-title">Layanan</h4>
                <p class="card-text">Atur jenis layanan dan harga per kilonya.</p>
                <a href="layanan.php" class="btn btn-light text-warning fw-bold mt-auto">Kelola Layanan</a>
            </div>
        </div>
    </div>

    <!-- 3. Menu Transaksi -->
    <div class="col-md-4 mb-3">
        <div class="card text-white bg-success shadow h-100">
            <div class="card-body d-flex flex-column justify-content-center">
                <h1 class="display-4">💸</h1> <!-- Ikon Emoji -->
                <h4 class="card-title">Transaksi</h4>
                <p class="card-text">Input cucian baru dan lihat riwayat pendapatan.</p>
                <a href="transaksi.php" class="btn btn-light text-success fw-bold mt-auto">Lihat Transaksi</a>
            </div>
        </div>
    </div>

</div>

<?php include 'footer.php'; ?>