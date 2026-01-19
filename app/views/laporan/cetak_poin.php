<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Poin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 12px;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="container mt-4">
        <h2 class="text-center mb-4">Laporan Poin Prestasi & Pelanggaran Siswa</h2>
        <p>Dicetak pada: <?= date('d-m-Y H:i:s'); ?></p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Siswa</th>
                    <th>Jenis Poin</th>
                    <th>Kategori</th>
                    <th>Poin</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['riwayat'] as $r) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= date('d-m-Y H:i', strtotime($r['tanggal'])); ?></td>
                        <td><?= $r['nama_siswa']; ?> (<?= $r['nis']; ?>)</td>
                        <td><?= $r['nama_poin']; ?></td>
                        <td><?= ucfirst($r['kategori']); ?></td>
                        <td><?= $r['poin']; ?></td>
                        <td><?= $r['keterangan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>