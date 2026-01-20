<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Laporan Data Guru & Staff</h3>
        <button onclick="window.print()" class="btn btn-success d-print-none">Cetak / PDF</button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-sm border-dark">
            <thead class="table-light border-dark">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['guru'] as $g) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $g['nip']; ?></td>
                        <td><?= $g['nama']; ?></td>
                        <td><?= ucfirst($g['role']); ?></td>
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