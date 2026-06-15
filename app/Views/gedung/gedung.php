<div class="content" style="margin-top: -60px;">
    <div class="flex g-3">
        <div class="row">
            <div style="position: relative;">
                <h3 class="fw-bold">Daftar Ruangan</h3>
            <?php if (session()->get('role') == 1): ?>
                <a href="/gedung/tambah?gedung=<?= strtolower($gedung) ?>&sub=<?= strtolower($sub) ?>" class="btn btn-warning btn-tambah">
                    <img src="/img/tambah.png" width="40">
                </a>
            <?php endif; ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Ruangan</th>
                        <th scope="col">Nomor Ruangan</th>
                        <?php if (session()->get('role') == 1 & 2): ?>
                            <th scope="col">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        foreach ($ruangan as $g):
                    ?>
                    <tr>
                        <th scope="row"><?= $i++ ?>.</th>
                        <td><?= $g['nama']; ?></td>
                        <td><?= $g['nomor']; ?></td>
                        <td>
                        <?php if (session()->get('role') != 3): ?>
                            <a href="/peminjaman/form" class="btn btn-warning btn-l">Pinjam</a>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 1): ?>
                            <a href="/gedung/ubah/<?= $g['id'] ?>" class="btn btn-warning btn-l">Ubah</a>
                            <form action="/gedung/<?= strtolower($gedung) ?>/<?= strtolower($sub) ?>/hapus/<?= $g['id'];?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <button type="submit" class="btn btn-warning" onclick="return confirm('Yakin Hapus Data Ini?')">Hapus</button>
                            </form>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
