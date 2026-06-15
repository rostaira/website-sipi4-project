<?= $this->extend('layout/main')?>
<?= $this->section('content')?>
<div class="container">
    <div class="col">
        <div class="row">
            <h3 class="mt-3">Form Tambah Ruangan</h3>
            <form action="/gedung/simpan" method="post" class="mt-4" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row mb-3">
                    <label for="inputNama" class="col-sm-2 col-form-label">Nama Ruangan</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="inputNomor" class="col-sm-2 col-form-label">Nomor Ruangan</label>
                    <div class="col-sm-4"> 
                        <input type="text" class="form-control <?= ($validation->hasError('nomor')) ? 'is-invalid': '';?>" name="nomor" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nomor'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="inputKode" class="col-sm-2 col-form-label">Kode Gedung</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="kode">
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="inputLantai" class="col-sm-2 col-form-label">Lantai</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="lantai">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-warning">Tambah</button>
                    </div>
                </div>
                <input type="hidden" name="gedung" value="<?= $gedungURL ?>">
                <input type="hidden" name="sub" value="<?= $subURL ?>">
            </form>
        </div>
    </div>
</div>
<?= $this->endSection();?>