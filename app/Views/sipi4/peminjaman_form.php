<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Peminjaman Tempat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
   body {
    background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('/img/gedung a.jpg');
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
  }

  .form-card {
    background: rgba(255, 255, 255, 1);
    border-radius: 15px;
    max-width: 660px;
    margin: 5px auto;
    box-shadow: 0 4px 12px rgba(0,0,0,0.5);
    padding: 0px;
    font-weight: bold;
  }

  .form-header {
    background-color: #ffb300;
    color: white;
    font-weight: bold;
    font-size: 22px;
    border-radius: 10px 10px 0px 0px;
    text-align: center;
    padding: 15px;
  }

  input, select, textarea {
    background-color: #d9d9d9 !important;
  }

  .btn-orange {
    background-color: #ffb300;
    color: white;
    font-weight: bold;
    border-radius: 10px;
  }

  .btn-orange:hover {
    background-color: #e0a200;
  }
  </style>
</head>
<body>
  <div class="form-card">
    <div class="form-header">Formulir Peminjaman Tempat</div>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success mt-3"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>
<?= session()->getFlashdata('success') ?>

    <form action="/peminjaman/simpan" method="post" class="p-3">
      <div class="row mb-3">
        <div class="col-md-6">
          <label>Nama Ruangan:</label>
          <select name="nama_ruangan" value="<?= old('nama_ruangan'); ?>" 
                 class="form-control <?= ($validation->hasError('nama_ruangan')) ? 'is-invalid' : ''; ?>">
                 <option value="">-- Pilih Ruangan --</option>
            <option value="Kelas">Kelas</option>
            <option value="Lab">Lab</option>
            <option value="Roof Garden">Roof Garden</option>
            <option value="Auditorium">Auditorium</option>
            <option value="Serbaguna">Serbaguna</option>
            <option value="Gazebo">Gazebo</option>
          </select>
        </div>
        <div class="col-md-6">
          <label>Nomor Ruangan:</label>
          <input type="text" name="nomor_ruangan" value="<?= old('nomor_ruangan'); ?>" 
                 class="form-control <?= ($validation->hasError('nomor_ruangan')) ? 'is-invalid' : ''; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
        <label>Tanggal Pelaksanaan:</label>
        <input type="date" name="tanggal" value="<?= old('tanggal'); ?>" 
               class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>">
        </div>
        <div class="col-md-6">
          <label>Waktu Pelaksanaan:</label>
               <input type="text" name="jam" value="<?= old('jam'); ?>"
               class="form-control <?= ($validation->hasError('jam')) ? 'is-invalid' : ''; ?>">
      </div>

      <div class="mb-3">
        <label>Nama Kegiatan:</label>
        <input type="text" name="nama_kegiatan" value="<?= old('nama_kegiatan'); ?>" 
               class="form-control <?= ($validation->hasError('nama_kegiatan')) ? 'is-invalid' : ''; ?>">
      </div>

      <div class="mb-3">
        <label>Nama Penanggungjawab:</label>
        <input type="text" name="penanggung_jawab" value="<?= old('penanggung_jawab'); ?>" 
               class="form-control <?= ($validation->hasError('penanggung_jawab')) ? 'is-invalid' : ''; ?>">
      </div>

      <div class="mb-3">
        <label>Nama Organisasi:</label>
        <input type="text" name="nama_organisasi" value="<?= old('nama_organisasi'); ?>" 
               class="form-control <?= ($validation->hasError('nama_organisasi')) ? 'is-invalid' : ''; ?>">
      </div>

      <div class="mb-3">
        <label>No. WA Penanggungjawab:</label>
        <input type="text" name="no_wa" value="<?= old('no_wa'); ?>" 
               class="form-control <?= ($validation->hasError('no_wa')) ? 'is-invalid' : ''; ?>">
      </div>
      <div class="text-end">
        <button type="submit" class="btn btn-orange px-4">Ajukan</button>
      </div>
    </form>
    </div>
</body>
</html>

<?= $this->endSection(); ?>
