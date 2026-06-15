<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Jadwal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/img/gedung a.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: 80%;
        }
        .bg-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.55);
            z-index: 1;
        }
        .input-group{
            height: 50px;
            width: 100%;
        }
        .btn-cari{
            width: 10%;
        }
    </style>
<div class="container my-5">
    <!-- searchbar -->
    <form action="<?= base_url('jadwal') ?>" method="get" class="flex justify-content-center mb-3">
        <div class="input-group">
            <span class="input-group-text bg-light border-end-0">
                <i class="bi bi-search"></i>
            </span>
            <input type="text" name="tanggal" class="form-control border-start-0" placeholder="Cari Tanggal" value="<?= esc($cari) ?>">
            <button class="btn btn-cari btn-warning" type="submit">Cari</button>
        </div>
    </form>

   <!-- table tanggal -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-borderless table-hover align-middle text-center">
                <thead class="border-bottom fw-bold">
                    <tr>
                        <th>Tanggal</th>
                        <th>Ruangan</th>
                        <th>Gedung</th>
                        <th>Jam</th>
                        <th>Instansi</th>
                        <?php if (session()->get('role') == 1): ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($peminjaman) && count($peminjaman) > 0): ?>
                        <?php foreach ($peminjaman as $p): ?>
                            <tr>
                                <td>
                                    <?php
                                        $bulanID = [
                                            'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
                                            'April' => 'April', 'May' => 'Mei', 'June' => 'Juni',
                                            'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September',
                                            'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
                                        ];

                                        $tanggal = date('d F Y', strtotime($p['tanggal']));
                                        $tanggalID = str_replace(array_keys($bulanID), array_values($bulanID), $tanggal);

                                        echo $tanggalID;
                                    ?>
                                </td>
                                <td><?= esc($p['nama_ruangan']) ?></td>
                                <td><?= esc($p['nomor_ruangan'])?></td>
                                <td><?= esc($p['jam']) ?></td>
                                <td><?= esc($p['nama_organisasi']) ?></td>
                                <?php if (session()->get('role') != 2): ?>
                                    <td><a href="/jadwal/detailjadwal/<?=$p['id_peminjaman'];?>" class="btn btn-info btn-sm btn-warning">Detail</a></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-muted">Tidak ada data peminjaman.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- paginate -->
            <div class="d-flex justify-content-center mt-3">
                <?= $pager->links('jadwal', 'page_jadwal')?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>