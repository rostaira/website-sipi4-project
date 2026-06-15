<?= $this->extend('layout/auth') ?>
<?= $this->section('content') ?>

<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background: url('/img/gedung a.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: "Inter", sans-serif;
    }

    .reset-wrapper {
        position: relative;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        overflow: auto;
        padding-top: 95px;
        margin-bottom: 10px;
    }

    .reset-wrapper::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.55);
        z-index: 1;
    }

    .reset-box {
        min-height: auto;
        overflow-y: auto;
        width: 100%;
        max-width: 450px;
        margin: 3 auto;
        background: #ffffff;
        padding: 15px;
        border-radius: 20px;
        box-shadow: 0 8px 28px rgba(0,0,0,0);
        z-index: 2;
    }

    .reset-box h2 {
        font-size: 28px;
        font-weight: 900;
        text-align: center;
        margin-bottom: 5px;
        color: #222;
    }

    .reset-box p {
        font-size: 14px;
        color: #666;
        text-align: center;
        margin-bottom: 2px;
        line-height: 1;
    }

    .form-group {
    margin-bottom: 8px !important; /* jarak antar field */
    }

    label {
        font-weight: 600;
        font-size: 14px;
        color: #333;
        margin-bottom: 3px;
    }

    input.form-control {
        height: 45px;
        border-radius: 10px;
        border: 1px solid #ccc;
        padding-left: 12px;
        font-size: 14px;
        background: #d9d9d9;
        color: #333;
    }

    input.form-control:focus {
    background: #d9d9d9;
    border: 1px solid #a6a6a6;
    box-shadow: none;
    outline: none;
    }

    .btn-primary {
        background: #ffb300;
        border: none;
        height: 45px;
        font-weight: 700;
        font-size: 16px;
        border-radius: 10px;
        width: 100%;
        margin-top: 5px;
    }

    .btn-primary:hover {
        background: #ff9c00 !important;
        transform: scale(1.02);
    }

</style>

<div class="reset-wrapper">
    <div class="reset-box">

        <h2><?= lang('Auth.resetYourPassword') ?></h2>

        <?= view('App\Views\Auth\_message_block') ?>

        <p><?= lang('Auth.enterCodeEmailPassword') ?></p>

        <form action="<?= url_to('reset-password') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group mb-3">
                <label for="token"><?= lang('Auth.token') ?></label>
                <input type="text"
                       class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>"
                       name="token"
                       placeholder="<?= lang('Auth.token') ?>"
                       value="<?= old('token', $token ?? '') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.token') ?>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="email"><?= lang('Auth.email') ?></label>
                <input type="email"
                       class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                       name="email"
                       placeholder="<?= lang('Auth.email') ?>"
                       value="<?= old('email') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="password"><?= lang('Auth.newPassword') ?></label>
                <input type="password"
                       class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                       name="password"
                       placeholder="Masukkan password baru">
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
            </div>

            <div class="form-group mb-4">
                <input type="password"
                       class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                       name="pass_confirm"
                       placeholder="Ulangi password baru">
                <div class="invalid-feedback">
                    <?= session('errors.pass_confirm') ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <?= lang('Auth.resetPassword') ?>
            </button>

        </form>
    </div>
</div>

<?= $this->endSection() ?>
