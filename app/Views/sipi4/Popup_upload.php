<div id="popupUpload" 
     style="position: fixed; top:0; left:0; width:100%; height:100%;
            background: rgba(0,0,0,0.5); display:flex; align-items:center; justify-content:center;">
  <div style="background:white; padding:30px; border-radius:15px; width:400px;">
    <h5>Upload Scan Berkas</h5>
    <form action="/peminjaman/uploadBerkas/<?= session('id_peminjaman') ?>" 
      method="post" enctype="multipart/form-data">
      <input type="file" name="scan_berkas" class="form-control" required>
      <div class="text-end mt-3">
        <button type="submit" class="btn btn-orange">Upload</button>
        <button type="button" class="btn btn-secondary" onclick="closePopup()">Batal</button>
      </div>
    </form>
  </div>
</div>

<script>
function closePopup() {
  document.getElementById('popupUpload').style.display = 'none';
}
</script>
