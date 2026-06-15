<?= $this->extend('layout/auth') ?>
<?= $this->section('content') ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Inter", sans-serif;
    }

    html, body {
        height: 100%;
        overflow: hidden;
    }

    body {
        background: url('<?= base_url("img/gedung a.jpg"); ?>') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        position: relative;
    }

    .bg-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.55);
        z-index: 1;
    }

    .wrapper-center {
        min-height: 115vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px 0;
        position: relative;
        z-index: 2;
    }

    .register-container {
        width: 500px;
        max-width: 100%;
        background: rgba(255, 255, 255, 255);
        padding: 15px 30px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.25);
        text-align: center;
        
    }

    .register-container h1 {
        font-size: 38px;
        font-weight: 900;
        margin-bottom: 5px;
        margin-top: 0;
        color: black;
    }

    label {
        font-weight: 600;
        font-size: 13px;
        display: block;
        text-align: left;
        margin-bottom: 2px;
        color: #333;
    }

    .input-group {
        width: 100%;
        margin-bottom: 10px;
        background: #d9d9d9;
        border-radius: 10px;
        position: relative;
        display: flex;
        align-items: center;
        padding: 10px 12px;
    }

    .input-group .icon-left {
        position: absolute;
        left: 18px;
        width: 20px;
        opacity: 0.7;
    }

    .input-group .toggle-password {
        position: absolute;
        right: 12px;
        width: 20px;
        cursor: pointer;
        opacity: 0.7;
    }

    .input-group input {
        width: 100%;
        border: none;
        background: #d9d9d9;
        font-size: 14px;
        font-weight: 700;
        outline: none;
        padding-left: 42px;  
        padding-right: 42px; 
    }

    .btn-register {
        background: #ffb300;
        color: white;
        font-weight: bold;
        border: none;
        padding: 5px 0px;
        width: 25%;
        border-radius: 10px;
        font-size: 15px;
        cursor: pointer;
        margin-top: 0px;
        transition: 0.2s;
    }

    .btn-register:hover {
        background: #ff9900;
    }

    .footer-link {
        margin-top: 5px;
        font-size: 13px;
        color: #333;
    }

    .footer-link a {
        text-decoration: none;
        font-weight: 600;
        color: black;
    }
</style>

<body>
<div class="bg-overlay"></div>

<div class="wrapper-center">
<div class="register-container">

    <h1>REGISTRASI</h1>

    <?= view('App\Views\Auth\_message_block') ?>

    <form action="<?= url_to('register') ?>" method="post">
        <?= csrf_field() ?>

        <label>Username:</label>
        <div class="input-group">
            <img src="<?= base_url('img/username.png'); ?>" class="icon-left">
            <input type="text" name="username" value="<?= old('username') ?>" placeholder="Nama Instansi" required>
        </div>

        <label>Email:</label>
        <div class="input-group">
            <img src="<?= base_url('img/email.png'); ?>" class="icon-left">
            <input type="email" name="email" value="<?= old('email') ?>" placeholder="Email Instansi" required>
        </div>

        <label>Password:</label>
        <div class="input-group">
            <img src="<?= base_url('img/pw.png'); ?>" class="icon-left">
            <input type="password" name="password" id="password" placeholder="Masukkan Password" required>
            <img src="<?= base_url('img/show.png'); ?>" class="toggle-password" onclick="togglePassword('password', this)">
        </div>
        <div class="input-group">
            <img src="<?= base_url('img/verifikasi.png'); ?>" class="icon-left">
            <input type="password" name="pass_confirm" id="pass_confirm" placeholder="Verifikasi Password" required>
            <img src="<?= base_url('img/show.png'); ?>" class="toggle-password" onclick="togglePassword('pass_confirm', this)">
        </div>

        <button class="btn-register" type="submit">Buat Akun</button>

        <div class="footer-link">
        <p>Sudah Punya Akun?<a href="<?= site_url('login-eksternal') ?>"> Login di sini</a></p>
        </div>

    </form>
</div>
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
</body>
</div>
<?= $this->endSection() ?>
