<?= $this->extend('layout/auth') ?>
<?= $this->section('content') ?>

<style>
    body, html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .forgot-wrapper {
        position: fixed;
        top: 50px; 
        left: 0;
        width: 100%;
        height: 100%;
        background: url('/img/gedung a.jpg') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .forgot-wrapper::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,0.55);
        z-index: 1;
    }

    .forgot-box {
        position: relative;
        z-index: 2;
        width: 430px;
        padding: 35px 40px;
        border-radius: 18px;
        background: white;
        box-shadow: 0 8px 28px rgba(0,0,0,0.25);
        animation: fadeIn 0.4s ease-out;
    }

    .forgot-title {
        font-size: 27px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #222;
        text-align: center;
    }

    .forgot-subtext {
        font-size: 14px;
        color: #555;
        margin-bottom: 20px;
        text-align: center;
    }

    input.form-control {
        height: 45px;
        border-radius: 10px;
        border: 1px solid #ccc;
        background: #d9d9d9 !important;
        font-weight: bold;
        color: #000;
    }

    input.form-control:focus, input.form-control:hover {
        background: #d9d9d9 !important;
        border: 1px solid #ccc !important;
        box-shadow: none !important;
    }

    .btn-primary {
        width: 100%;          
        display: block;       
        margin: 10px auto 0;  
        height: 45px;
        border-radius: 10px;

        background: #ffaf00 !important;
        border: #ffaf00 !important;
        font-weight: bold;
    }

    .btn-primary:hover {
        background: ##ff9c00  !important;
        border: ##ff9c00  !important;
    }

    .btn-primary:focus, .btn-primary:active {
        background: #e69c00 !important;
        border: #e69c00 !important;
        box-shadow: none !important;
        outline: none !important;
    }

</style>

<div class="forgot-wrapper">
    <div class="forgot-box">

        <?= view('Myth\Auth\Views\_message_block') ?>

        <h2 class="forgot-title"><?= lang('Auth.forgotPassword') ?></h2>

        <p class="forgot-subtext"><?= lang('Auth.enterEmailForInstructions') ?></p>

        <form action="<?= url_to('forgot') ?>" method="post">
            <?= csrf_field() ?>

            <div class="form-group mb-3">
                <label for="email"><?= lang('Auth.emailAddress') ?></label>
                <input type="email"
                    class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                    name="email"
                    placeholder="<?= lang('Auth.email') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <?= lang('Auth.sendInstructions') ?>
            </button>
        </form>

    </div>
</div>

<?= $this->endSection() ?>
