        <div class="layout">
            <aside class="side">
                <div class="nav flex-column">
                    <h3 class="fw-bold text-uppercase"><?= esc($judulSidebar) ?></h3>
                    <?php if (!empty($menuSidebar)): ?>
                        <?php foreach ($menuSidebar as $menu): ?>
                            <a class="nav-link teks-hover <?= (service('uri')->getPath()==$menu['url'] ? 'active' : '') ?>" href="<?= base_url($menu['url']) ?>">
                                <img src="/img/gedung.png" width="20" class="me-2">
                                <?= esc($menu['nama']) ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </aside>
            <main class="content">
                <?= $this->renderSection('content'); ?>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>