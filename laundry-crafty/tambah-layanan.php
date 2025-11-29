<?php include 'header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">Tambah Layanan</div>
            <div class="card-body">
                <form action="proses-tambah-layanan.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan</label>
                        <input type="text" name="nama_layanan" class="form-control" placeholder="Contoh: Cuci Komplit" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Per Kg (Rp)</label>
                        <input type="number" name="harga_per_kg" class="form-control" placeholder="Contoh: 7000" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estimasi Waktu (Jam)</label>
                        <input type="number" name="estimasi_jam" class="form-control" placeholder="Contoh: 24" required>
                        <small class="text-muted">Masukkan angka dalam jam (misal 24 jam untuk 1 hari)</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="layanan.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>