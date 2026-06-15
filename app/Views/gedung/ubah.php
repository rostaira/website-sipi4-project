<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="col">
        <div class="row">
            <h3 class="mt-3">Form Ubah Ruangan</h3>
            <form action="/gedung/update/<?= $gedung['id']; ?>" method="post" class="mt-4">
                <?= csrf_field(); ?>

                <!-- Nama Ruangan -->
                <div class="form-group row mb-3">
                    <label for="inputNama" class="col-sm-2 col-form-label">Nama Ruangan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" value="<?= old('nama', $gedung['nama']); ?>">
                    </div>
                </div>

                <!-- Nomor Ruangan -->
                <div class="form-group row mb-3">
                    <label for="inputNomor" class="col-sm-2 col-form-label">Nomor Ruangan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?= ($validation->hasError('nomor')) ? 'is-invalid' : ''; ?>" name="nomor" value="<?= old('nomor', $gedung['nomor']); ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nomor'); ?>
                        </div>
                    </div>
                </div>

                <!-- Kode -->
                <div class="form-group row mb-3">
                    <label for="inputKode" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="kode" value="<?= old('kode', $gedung['kode']); ?>">
                    </div>
                </div>

                <!-- Lantai -->
                <div class="form-group row mb-3">
                    <label for="inputLantai" class="col-sm-2 col-form-label">Lantai</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="lantai" value="<?= old('lantai', $gedung['lantai']); ?>">
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="form-group row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-warning">Ubah</button>
                    </div>
                </div>

                <?php
                // Tentukan nilai sub untuk redirect
                if (in_array($gedung['kode'], ['A','B','D'])) {
                    $subValue = strtolower($gedung['kode']); // a, b, d
                } else {
                    $subValue = strtolower($gedung['lantai']); // angka lantai
                }

                // Gedung URL
                $gedungValue = strtolower(
                    in_array($gedung['kode'], ['A','B','D']) ? 'gedut' : ($gedung['kode']=='I' ? 'gkb' : 'gtil')
                );
                ?>
                <input type="hidden" name="gedung" value="<?= $gedungValue; ?>">
                <input type="hidden" name="sub" value="<?= $subValue; ?>">

            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
