<?= $this->extend('layout/auth') ?>
<?= $this->section('content') ?>

<style>
    body { 
        background: url('<?= base_url("img/gedung a.jpg"); ?>') no-repeat center center fixed;
        background-size: cover;

        /* FIX supaya tidak menumpuk pada foto */
        overflow-x: hidden;
        overflow-y: auto;
    }

    .bg-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.55);
        z-index: 1;
    }

    .login-container {
        width: 450px;
        margin: 150px auto;
        background: rgba(255, 255, 255, 0.98);
        padding: 20px 50px;
        border-radius: 18px;
        box-shadow: 0 0 15px rgba(0,0,0,0.25);
        text-align: center;
        position: relative;
        z-index: 2;
    }

    .login-container h1 {
        font-size: 38px;
        font-weight: 900;
        margin-bottom: 25px;
        color: black;
    }

    .input-group {
        margin-bottom: 15px;
        position: relative;
        background: #d9d9d9;
        border-radius: 10px;
        padding-left: 45px;
        padding-right: 15px;
    }

    .input-group img.icon-left {
        position: absolute;
        left: 25px;
        top: 50%;
        transform: translateY(-50%);
        width: 22px;
        opacity: 0.9;
    }

    .input-group input {
        width: 100%;
        height: 45px;
        padding: 10px;
        border: none;
        background: transparent;
        font-size: 15px;
        font-weight: bold;
        outline: none;
        padding-right: 45px;
        padding-left: 10px;
    }

    .input-group .icon-left {
        position: absolute;
        left: 12px;
        width: 18px;
        opacity: 0.7;
    }

    .input-group .toggle-password {
        position: absolute;
        right: 12px;
        width: 22px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        opacity: 0.8;
        z-index: 5;
    }

    .btn-login {
        background: #ffb300;
        color: white;
        font-weight: bold;
        border: none;
        padding: 5px 20px;
        border-radius: 10px;
        font-size: 15px;
        cursor: pointer;
        margin-top: 10px;
        width: 30%;
    }

    .btn-login:hover {
        background: #ff9900;
    }

    .footer-link {
        margin-top: 12px;
        font-size: 13px;
    }

    .footer-link a {
        text-decoration: none;
        color: #000;
        font-weight: 500;
        font-weight: bold;
    }

    a{
        color: #d9d9d9;
        text-decoration: none;
    }

</style>

<div class="bg-overlay"></div>

<div class="login-container">
    <h1>LOGIN</h1>
    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <div class="input-group">
            <img src="<?= base_url('img/username.png'); ?>" class="icon-left" alt="Username Icon">
            <input type="text" name="login" placeholder="Username" value="<?= old('login') ?>" required>
        </div>

        <div class="input-group">
            <img src="<?= base_url('img/pw.png'); ?>" class="icon-left" alt="Password Icon">
            <input type="password" name="password" placeholder="Password" required>
            <img src="<?= base_url('img/show.png'); ?>" class="toggle-password" onclick="togglePassword('password', this)">
        </div>

        <button class="btn-login" type="submit">Login</button>
    </form>
</div>

<script>
function togglePassword(inputName, icon) {
    const input = document.querySelector(`input[name="${inputName}"]`);
    if (input.type === "password") {
        input.type = "text";
        icon.src = "<?= base_url('img/hide.png') ?>";
    } else {
        input.type = "password";
        icon.src = "<?= base_url('img/show.png') ?>";
    }
}
</script>

<?= $this->endSection() ?>
