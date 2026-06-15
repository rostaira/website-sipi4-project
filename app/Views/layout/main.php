<!DOCTYPE html>
<html lang="id">
<head>
    <?= $this->include('layout/head') ?>
</head>

    <?= $this->include('layout/header') ?>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('layout/footer') ?>

</body>
</html>