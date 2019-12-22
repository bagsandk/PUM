<div class="col-md-4 mb-0">
  <?php Flasher::flashlog(); ?>
</div>
<div class="content">
  <div class="hero-image">
    <div class="hero-text">
      <h1 style="font-size:50px">Dashboard</h1>
      <h3>Selamat Datang Di Aplikasi SKTLK Polsek Kedaton</h3>
      <!-- <button>Hire me</button> -->
    </div>
  </div>
</div>
<style>
  body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
  }

  .hero-image {
    background-image: linear-gradient(to bottom, rgba(92, 77, 66, 0.8) 0%, rgba(92, 77, 66, 0.8) 100%), url("<?= BASEURL ?>/img/polsek.jpg");
    background-color: #cccccc;
    height: 500px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
  }

  .hero-text {
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
  }
</style>