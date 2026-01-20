<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Laporan Data Siswa</h3>
        <button onclick="window.print()" class="btn btn-success d-print-none">Cetak / PDF</button>
    </div>

    <form action="<?= BASEURL; ?>/laporan/siswa" method="post" class="mb-3 d-print-none">
        <div class="input-group">
            <select class="form-select" name="id_kelas">
                <option value="">-- Semua Kelas --</option>
                <?php foreach ($data['kelas'] as $k) : ?>
                    <option value="<?= $k['id']; ?>" <?= (isset($data['selected_kelas']) && $data['selected_kelas'] == $k['id']) ? 'selected' : ''; ?>>
                        <?= $k['nama_kelas']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button class="btn btn-primary" type="submit">Filter</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-sm border-dark">
            <thead class="table-light border-dark">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['siswa'] as $s) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $s['nis']; ?></td>
                        <td><?= $s['nama']; ?></td>
                        <td><?= $s['nama_kelas']; ?></td>
                        <td><?= $s['alamat']; ?></td>
                        <td><?= $s['no_telp']; ?></td>
                        <td>
                            <?php
                            $tp = $s['total_poin'];
                            $status = 'Aman';
                            if ($tp >= 50) $status = 'Teladan';
                            elseif ($tp < 0 && $tp >= -19) $status = 'Pengawasan';
                            elseif ($tp < -19 && $tp >= -49) $status = 'SP 1';
                            elseif ($tp < -49 && $tp >= -99) $status = 'SP 2';
                            elseif ($tp <= -100) $status = 'Drop Out';
                            echo $status;
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4 d-none d-print-block">
        <div class="row">
            <div class="col-4 text-center offset-8">
                <p>Mengetahui,<br>Kepala Sekolah</p>
                <br><br><br>
                <p>___________________</p>
            </div>
        </div>
    </div>
</div>
<style>
    @media print {
        .d-print-none {
            display: none !important;
        }

        .d-print-block {
            display: block !important;
        }
    }
</style>