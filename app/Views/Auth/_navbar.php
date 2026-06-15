<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIPI 4 PNC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
      body{
        padding-top: 120px;
        font-family: 'Inter', sans-serif;
        
      }
      .sidebar, .side{
        position: fixed; 
        background-color: #e4e4e4;
        padding: 20px;
        font-size: 15px;
        height: 100%;
        width: 270px;
        overflow-y: auto;
      }
      .side{
        margin-top: -2px;
      }
      .content{
        margin-left: 270px;
        padding: 20px 10px;
      }
      .card-wrapper{
        display: grid;
        gap: 10px;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      }
      table{
        font-size: 15px;
        text-align: center;
      }
      .sidebar a, .side a {
        color: black;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
      }
      .sidebar a:hover, .side a:hover, .sidebar a.active, .side a.active{
        cursor: pointer;
        background-color: #142143;
        opacity: 0.9;
        color: white;
      }
      .teks-hover:hover {
        color: white;
      }
      .sidebar a:hover img, .side a:hover img, .sidebar a.active img, .side a.active img {
        filter: brightness(100) invert(1);
        transition: all 0.3s ease;
      }
      .sidebar .nav, .side .nav {
        gap: 20px;
      }
      .video-wrapper {
          text-align: center;
          margin-bottom: 2rem;
      }
      .video-wrapper iframe{
          width: 100%;
          height: 300px;
          border-radius: 15px;
          box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
          transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      /* .video-wrapper iframe:hover {
          transform: scale(1.02);
          box-shadow: 0 6px 25px rgba(0, 0, 0, 0.3);
      } */
      .video-wrapper p {
          margin-top: 1rem;
          font-weight: 600;
          font-size: 18px;
          color: #333;
      }
      .clickable{
          cursor: pointer;
          transition: transform 0.25s ease, box-shadow 0.25s ease;
          border-radius: 10px;
          overflow: hidden;
      }
      .clickable:hover {
          transform: translateY(-5px);
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      }
      .btn-tambah{
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
      }
      /* .btn-tambah:hover{
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.4);
      } */
      /* .btn{
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
      } */
      .btn:hover{
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.4);
      }
    </style>
  </head>
  <body>
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary shadow-sm">
      <div class="container-fluid" style="padding:10px 20px;">
        <div class="d-flex align-items-center">
          <img src="/img/logo.png" width="80" class="me-2">
          <div>
            <span class="fw-bold" style="font-size: 35px;">SIPI4</span><br>
            <small class="text-secondary fw-semibold fst-italic" style="font-size: 20px">POLITEKNIK NEGERI CILACAP</small>
          </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>  
      </div>
    </nav>