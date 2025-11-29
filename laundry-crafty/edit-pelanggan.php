<?php 
include 'header.php'; 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$data = mysqli_fetch_array($query);
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-white">
                <h5 class="mb-0">Edit Data Pelanggan</h5>
            </div>
            <div class="card-body">
                <form action="proses-edit-pelanggan.php" method="POST">
                    <!-- ID Disembunyikan sebagai kunci edit -->
                    <input type="hidden" name="id_pelanggan" value="<?php echo $data['id_pelanggan']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" required><?php echo $data['alamat']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="number" name="no_hp" class="form-control" value="<?php echo $data['no_hp']; ?>" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning text-white">Update Data</button>
                        <a href="pelanggan.php" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>