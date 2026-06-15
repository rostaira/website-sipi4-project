<?= $this->extend('layout/auth') ?>
<?= $this->section('content') ?>

<style>
    body {
        margin: 0;
        background: url('<?= base_url('img/gedung a.jpg'); ?>') no-repeat center center / cover;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
        z-index: 1;
    }

    .menu {
        position: relative;
        z-index: 2;
        display: flex;
        gap: 80px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .card {
      width: 240px;
      height: 240px;
      background: rgba(255, 255, 255, 0.7);
      border-radius: 50px;
      padding: 20px;
      text-align: center;
      cursor: pointer;
      transition: 0.25s;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .card:hover {
        transform: scale(1.06);
        background: rgba(255, 255, 255, 1);
    }

    .card img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-bottom: 15px;
    }

    .card p {
        font-size: 30px;
        font-weight: bold;
        margin: 0;
        text-align: center;
        letter-spacing: 1px;
    }

</style>

<div class="overlay"></div>

<div class="menu">
    <div class="card card-internal" onclick="window.location.href='<?= base_url('regisInternal'); ?>'">
        <img src="<?= base_url('img/internal.png'); ?>" alt="Internal">
        <p>INTERNAL</p>
    </div>

    <div class="card card-eksternal" onclick="window.location.href='<?= base_url('register'); ?>'">
        <img src="<?= base_url('img/eksternal.png'); ?>" alt="Eksternal">
        <p>EKSTERNAL</p>
    </div>
</div>

<?= $this->endSection() ?>
