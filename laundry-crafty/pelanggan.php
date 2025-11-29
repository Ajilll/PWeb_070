<?php include 'header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Pelanggan</h3>
    <a href="tambah-pelanggan.php" class="btn btn-primary">+ Tambah Pelanggan</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");
                
                while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['no_hp']; ?></td>
                    <td>
                        <a href="edit-pelanggan.php?id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                        <a href="hapus-pelanggan.php?id=<?php echo $data['id_pelanggan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>