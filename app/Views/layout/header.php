<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('img/logo.png'); ?>">
    <title>SIPI4 PNC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
      body{
        padding-top: 95px;
        font-family: 'Inter', sans-serif;
      }
      h3{
        margin: 13px;
      }
      .sidebar, .side{
        position: fixed; 
        background-color: #e4e4e4;
        font-size: 13px;
        height: 100%;
        width: 220px;
        overflow-y: auto;
      }.side{
        margin-top: -20px;
      }.content{
        margin-left: 220px;
        padding: 15px 10px;
      }.card-wrapper{
        display: grid;
        gap: 10px;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      }table{
        font-size: 15px;
        text-align: center;
      }.sidebar a, .side a {
        color: black;
        display: flex;
        align-items: center;
        padding: 15px;
        transition: all 0.3s ease;
      }.sidebar a:hover, .side a:hover, .sidebar a.active, .side a.active{
        cursor: pointer;
        background-color: #142143;
        opacity: 0.9;
        color: white;
      }.sidebar a:hover img, .side a:hover img, .sidebar a.active img, .side a.active img{
        filter: brightness(100) invert(1);
        transition: all 0.3s ease;
      }.sidebar .nav-link{
        border-bottom: 1px solid #000000;
      }.video-wrapper {
          text-align: center;
          margin-bottom: 2rem;
      }.video-wrapper iframe{
          width: 100%;
          height: 300px;
          border-radius: 15px;
          box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
          transition: transform 0.3s ease, box-shadow 0.3s ease;
      }.video-wrapper p {
          margin-top: 1rem;
          font-weight: 600;
          font-size: 18px;
          color: #333;
      }.clickable{
          cursor: pointer;
          transition: transform 0.25s ease, box-shadow 0.25s ease;
          border-radius: 10px;
          overflow: hidden;
      }.clickable:hover {
          transform: translateY(-5px);
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      }.btn{
        color: white;
      }.btn-tambah{
        position: fixed;
        bottom: 40px; right: 40px; 
        border-radius: 100px; 
        width: 50px; 
        height: 50px; 
        display: flex; 
        align-items: center; 
        justify-content: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
      }.btn:hover{
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.4);
      }
    </style>
  </head>
  <body>
  <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary shadow-sm">
      <div class="container-fluid py-1 px-3">
        <div class="d-flex align-items-center">
          <img src="/img/logo.png" width="55" class="me-2">
          <div class="lh-1">
            <span class="fw-bold" style="font-size: 30px; margin:0; padding:0; line-height:1;">SIPI4</span><br>
            <small class="text-secondary fw-semibold fst-italic" style="font-size: 15px; margin:0; padding:0; line-height:1;">POLITEKNIK NEGERI CILACAP</small>
          </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>  
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <div class="navbar-nav fw-bold me-30" style="font-size: 20px;">
          <a class="nav-link" aria-current="page" href="<?= base_url('dashboard') ?>">DASHBOARD</a>
          <a class="nav-link" href="/jadwal">JADWAL</a>
            <a class="nav-link d-flex align-items-center" href="#" style="font-size: 17px;">
              <img src="/img/profile.png" width="20" class="me-1"> <?= session()->get('username') ?? 'USERNAME' ?>
            </a>
          </div>
        </div>
      </div>
    </nav>