<div class="row g-5">
    <?= $this->section('content'); ?>
        <div class="row g-2 mb-3">
            <?php if (session()->get('role') == 1): ?>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 bg-primary text-white">
                    <div class="card-body">
                        <h6 class="text-uppercase">Total Pengajuan</h6>
                        <h2 class="fw-bold"><?= $total ?? 0 ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 bg-success text-white">
                    <div class="card-body">
                        <h6 class="text-uppercase">Disetujui</h6>
                        <h2 class="fw-bold"><?= $approved ?? 0 ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 bg-danger text-white">
                    <div class="card-body">
                        <h6 class="text-uppercase">Dibatalkan</h6>
                        <h2 class="fw-bold"><?= $canceled ?? 0 ?></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 bg-warning text-dark">
                    <div class="card-body">
                        <h6 class="text-uppercase">Menunggu</h6>
                        <h2 class="fw-bold"><?= $pending ?? 0 ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <div class="video-wrapper text-center mb-2">
            <iframe 
                src="https://www.youtube.com/embed/zwAL-mcjDvM?si=oMqIT8gEhqutmGMW&autoplay=1&mute=1&loop=1&playlist=zwAL-mcjDvM" 
                title="Video Profil PNC" 
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
            <!-- <p class="fw-bold mt-3">
                Politeknik Negeri Cilacap (PNC) merupakan kampus negeri yang berada di Kabupaten Cilacap dan sudah memiliki 13 program studi.
            </p> -->
        </div>
        <div class="card-wrapper text-center">
            <div class="card clickable" onclick="location.href='/gedung/gedut/a'">
                <img src="/img/gedung a.png">
                <div class="card-body">
                    <h6 class="card-title fw-bold">Gedung Utama<br>(Gedung A, Gedung B, Gedung D)</h6>
                </div>
            </div>
            <div class="card clickable" onclick="location.href='/gedung/gkb/1'">
                <img src="/img/gkb.png">
                <div class="card-body">
                    <h6 class="card-title fw-bold">Gedung Kuliah Bersama<br>(GKB)</h6>
                </div>
            </div>
            <div class="card clickable" onclick="location.href='/gedung/gtil/2'">
                <img src="/img/gtil.png">
                <div class="card-body">
                    <h6 class="card-title fw-bold">Gedung Teknik Informatika dan Lingkungan (GTIL)</h6>
                </div>
            </div>
        </div>
    <?= $this->endSection(); ?>
</div>
<?= $this->include('layout/sidebar')?>