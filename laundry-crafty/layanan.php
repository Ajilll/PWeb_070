<?php include 'header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Layanan Laundry</h3>
    <a href="tambah-layanan.php" class="btn btn-primary">+ Tambah Layanan</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Harga / Kg</th>
                    <th>Estimasi Waktu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM layanan ORDER BY id_layanan ASC");
                while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_layanan']; ?></td>
                    <td>Rp <?php echo number_format($data['harga_per_kg']); ?></td>
                    <td><?php echo $data['estimasi_jam']; ?> Jam</td>
                    <td>
                        <a href="edit-layanan.php?id=<?php echo $data['id_layanan']; ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                        <a href="hapus-layanan.php?id=<?php echo $data['id_layanan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus layanan ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>