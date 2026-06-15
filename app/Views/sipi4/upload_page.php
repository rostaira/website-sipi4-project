<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<style>
  body {
    background: url('/img/gedung a.jpg') no-repeat center center/cover;
    height: 100vh;
    /* color: white; */
    display: flex;
    flex-direction: column;
  }
/* Overlay popup utama */
.overlay {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0, 0, 0, 0.4);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

/* Kotak utama */
.main-popup {
  background: #fff;
  border-radius: 20px;
  padding: 40px 50px;
  text-align: center;
  width: 520px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.2);
  position: relative;
  animation: fadeIn 0.3s ease-in-out;
}

.main-popup h5 {
  font-weight: 600;
  color: #222;
  margin-bottom: 20px;
}

.main-popup p {
  color: #444;
  margin-bottom: 10px;
}

.btn-orange {
  background-color: #ffb300;
  color: white;
  font-weight: bold;
  border-radius: 8px;
  border: none;
  padding: 12px 40px;
  transition: all 0.2s ease;
}

.btn-orange:hover {
  background-color: #e09a00;
}

.close-btn {
  position: absolute;
  top: 15px; right: 20px;
  font-size: 20px;
  color: #555;
  border: none;
  background: none;
  cursor: pointer;
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}

/* Popup upload kecil */
#popupUpload {
  position: fixed;
  top: 0; left: 0; 
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.5);
  display: none;
  align-items: center; 
  justify-content: center;
  z-index: 10000;
}

.popup-content {
  background: white;
  padding: 30px;
  border-radius: 15px;
  width: 400px;
  text-align: center;
  box-shadow: 0 4px 12px rgba(0,0,0,0.3);
}

a {
  color: black;
  text-decoration: none;
}
</style>

<!-- Popup utama -->
<div class="overlay" id="mainPopup">
  <div class="main-popup">
    <button class="close-btn" onclick="closeMainPopup()"><a href="/dashboard">×</a></button>
    <h5>Diharapkan melakukan pengajuan surat hard file ke <b>BAAK/BAUP</b> dan upload scan disini:</h5>
    <p><b>Deadline Upload: <?= $tanggal ?? '-' ?></b></p>
    <button class="btn-orange" onclick="openUploadPopup()">UPLOAD</button>
  </div>
</div>

<!-- Popup upload file -->
<div id="popupUpload">
  <div class="popup-content">
    <h5>Upload Scan Berkas</h5>
    <?php 
    $action = $id_peminjaman ? "/peminjaman/uploadBerkas/$id_peminjaman": "/peminjaman/upload";
    ?>
    <form action="<?= $action ?>" 
          method="post" enctype="multipart/form-data">
      <input type="file" name="scan_berkas" class="form-control mt-3" required>
      <div class="text-end mt-3">
        <button type="submit" class="btn btn-orange">Upload</button>
      </div>
    </form>
  </div>
</div>

<script>
function openUploadPopup() {
  document.getElementById('popupUpload').style.display = 'flex';
}
function closeMainPopup() {
  document.getElementById('mainPopup').style.display = 'none';
}
</script>

<?= $this->endSection(); ?>
