<?php include 'header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">Input Transaksi Laundry</div>
            <div class="card-body">
                <form action="proses-tambah-transaksi.php" method="POST">
                    
                    <div class="row">
                        <!-- Pilih Pelanggan -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pilih Pelanggan</label>
                            <select name="id_pelanggan" class="form-select" required>
                                <option value="">-- Pilih Pelanggan --</option>
                                <?php
                                $q_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan ORDER BY nama ASC");
                                while($p = mysqli_fetch_array($q_pelanggan)){
                                    echo "<option value='$p[id_pelanggan]'>$p[nama] - $p[no_hp]</option>";
                                }
                                ?>
                            </select>
                            <small><a href="tambah-pelanggan.php">Pelanggan Baru? Klik sini.</a></small>
                        </div>

                        <!-- Pilih Layanan -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pilih Layanan</label>
                            <select name="id_layanan" class="form-select" required>
                                <option value="">-- Pilih Layanan --</option>
                                <?php
                                $q_layanan = mysqli_query($koneksi, "SELECT * FROM layanan ORDER BY nama_layanan ASC");
                                while($l = mysqli_fetch_array($q_layanan)){
                                    echo "<option value='$l[id_layanan]'>$l[nama_layanan] - Rp ".number_format($l['harga_per_kg'])."/kg</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Input Berat -->
                    <div class="mb-3">
                        <label class="form-label">Berat Cucian (Kg)</label>
                        <input type="number" step="0.1" name="berat" class="form-control" placeholder="Misal: 3.5" required>
                    </div>

                    <!-- Input Tanggal -->
                    <div class="mb-3">
                        <label class="form-label">Tanggal Masuk</label>
                        <input type="date" name="tgl_masuk" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan Transaksi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>