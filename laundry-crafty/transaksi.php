<?php include 'header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Riwayat Transaksi</h3>
    <a href="tambah-transaksi.php" class="btn btn-primary">+ Transaksi Baru</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tgl Masuk</th>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
                    <th>Berat</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // QUERY PENTING: Menggabungkan (JOIN) 3 tabel
                $query = mysqli_query($koneksi, "SELECT * FROM transaksi 
                                                 JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan 
                                                 JOIN layanan ON transaksi.id_layanan = layanan.id_layanan 
                                                 ORDER BY id_transaksi DESC");
                
                while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['tgl_masuk']; ?></td>
                    <td><?php echo $data['nama']; ?></td> <!-- Nama Pelanggan -->
                    <td><?php echo $data['nama_layanan']; ?></td> <!-- Nama Layanan -->
                    <td><?php echo $data['berat']; ?> Kg</td>
                    <td>Rp <?php echo number_format($data['total_harga']); ?></td>
                    <td>
                        <!-- Badge Status Bootstrap -->
                        <?php if($data['status'] == 'baru'): ?>
                            <span class="badge bg-secondary">Baru</span>
                        <?php elseif($data['status'] == 'proses'): ?>
                            <span class="badge bg-warning text-dark">Proses</span>
                        <?php elseif($data['status'] == 'selesai'): ?>
                            <span class="badge bg-success">Selesai</span>
                        <?php elseif($data['status'] == 'diambil'): ?>
                            <span class="badge bg-info text-dark">Diambil</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="detail-transaksi.php?id=<?php echo $data['id_transaksi']; ?>" class="btn btn-info btn-sm text-white">Detail</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>