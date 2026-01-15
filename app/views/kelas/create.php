<div class="row">
    <div class="col-6">
        <h3 class="mt-4">Tambah Data Kelas</h3>

        <form action="<?= BASEURL; ?>/kelas/store" method="post">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
            </div>
            <div class="mb-3">
                <label for="wali_kelas" class="form-label">Wali Kelas</label>
                <input type="text" class="form-control" id="wali_kelas" name="wali_kelas">
            </div>
            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" min="0">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= BASEURL; ?>/kelas" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>