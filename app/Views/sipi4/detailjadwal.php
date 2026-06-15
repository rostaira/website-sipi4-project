<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/img/gedung a.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: black 80%;
        }
        .card {
            margin-top: 30px;
            margin-left: 10%;
            margin-right: 10%;
        }
        p{
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card shadow-lg border-0 rounded-3 p-2">
        <div class="row g-0">
                <h3 class="fw-bold mb-2">Detail Jadwal</h3>
                <div class="col-md-4 d-flex align-items-center justify-content-center p-2">
                  <td> <?php if (!empty($peminjaman['scan_berkas'])): ?>
                    <?php 
                        $ext = pathinfo($peminjaman['scan_berkas'], PATHINFO_EXTENSION);
                        $fileUrl = base_url('uploads/' . $peminjaman['scan_berkas']);
                    ?>
                    <?php if (in_array($ext, ['jpg','jpeg','png','gif'])): ?>
                    <img src="<?= $fileUrl ?>" alt="Scan Berkas" style="max-width:100%; height:auto;">
                    <?php elseif ($ext === 'pdf'): ?>
                        <iframe src="<?= $fileUrl ?>" width="90%" height="350px"></iframe>
                    <?php else: ?>
                        <a href="<?= $fileUrl ?>" target="_blank">Lihat Berkas</a>
                    <?php endif; ?>
                    <?php else: ?>
                        <p class="text-muted">Berkas belum diupload.</p>
                    <?php endif; ?></td>
                </div>
                <div class="col-md-8">
                    <p>
                        <strong>Tanggal : </strong> <?php
                        $bulanID = [
                            'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
                            'April' => 'April', 'May' => 'Mei', 'June' => 'Juni',
                            'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September',
                            'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
                        ];

                        $tanggal = date('d F Y', strtotime($peminjaman['tanggal']));
                        $tanggalID = str_replace(array_keys($bulanID), array_values($bulanID), $tanggal);

                        echo $tanggalID;
                        ?>
                    </p>
                    <p><strong>Jam : </strong> <?= esc($peminjaman['jam']); ?></p>
                    <p><strong>Ruang : </strong> <?= esc($peminjaman['nama_ruangan']); ?></p>
                    <p><strong>Gedung : </strong> <?= esc($peminjaman['nomor_ruangan']); ?></p>
                    <p><strong>Nama Organisasi : </strong> <?= esc($peminjaman['nama_organisasi'] ?? '-'); ?></p>
                    <p><strong>Nama Kegiatan : </strong><?= esc($peminjaman['nama_kegiatan']);?></p>
                    <p><strong>Penanggung Jawab : </strong><?= esc($peminjaman['penanggung_jawab']);?></p>
                    <p><strong>WhatsApp : </strong><?= esc($peminjaman['no_wa']);?><br>
                    <form action="/jadwal/updateStatus/<?= $peminjaman['id_peminjaman']; ?>" method="post">
                        <div class="d-flex align-items-center mb-3">
                            <strong class="me-2">Status :</strong>
                            <select name="status" class="form-select form-select-sm w-auto">
                                <option value="pending" <?= $peminjaman['status']=='pending'?'selected':'' ?>>Menunggu</option>
                                <option value="approved" <?= $peminjaman['status']=='approved'?'selected':'' ?>>Disetujui</option>
                                <option value="canceled" <?= $peminjaman['status']=='canceled'?'selected':'' ?>>Dibatalkan</option>
                            </select>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="/jadwal" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-warning">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?= $this->endSection(); ?>
