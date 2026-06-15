<div class="layout">
            <aside class="sidebar">
                <div class="nav flex-column">
                    <h3 class="fw-bold">DASHBOARD</h3>
                <?php if (session()->get('role') != 3): ?>
                    <a class="nav-link teks-hover" href="/peminjaman/form">
                        <img src="/img/ajukan.png" width="20" class="me-2">Ajukan Peminjaman
                    </a>
                <?php endif; ?>
                <?php if (session()->get('role') == 1): ?>
                    <a class="nav-link teks-hover" href="/gedung/tambah">
                        <img src="/img/tambah.png" width="20" class="me-2">Tambah Data Ruangan
                    </a>
                <?php endif; ?>    
                    <a class="nav-link teks-hover" href="/logout">
                        <img src="/img/logout.png" width="20" class="me-2">Logout
                    </a>
                </div>
            </aside>
            <main class="content">
                <?= $this->renderSection('content'); ?>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>