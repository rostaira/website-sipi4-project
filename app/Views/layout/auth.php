<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?= $this->include('layout/head') ?>

    <?= $this->renderSection('styles') ?>
</head>
<body>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('layout/footer') ?>
</body>
</html>
