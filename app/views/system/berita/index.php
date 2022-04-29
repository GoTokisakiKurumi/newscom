<?php
if ($data["berita"]) :
  $jam = explode(':', $data["berita"][0]["jam"]);
  unset($jam[2]);
  $Jam = $jam[0] . ':' . $jam[1];
?>
  <div class="tabspasi slide"></div>
  <div class="container-blog">
    <div class="blog-berita">
      <h1><?= $data["berita"][0]["judul"]; ?></h1>
      <p><?= $data["berita"][0]["nama"] ?> - <span>News.com<span></p>
      <p><?= $data["berita"][0]["t_tanggal"] . ' - ' . $Jam; ?> WIB</p>
      <img src="<?= BASEURL; ?>/image/thumbnails/<?= $data["berita"][0]["image"]; ?>">
      <span>Sumber Foto: <?= $data["berita"][0]["sumber"]; ?></span>
      <?= $data["berita"][0]["content"]; ?>
    </div>
    <div class="container-share">
      <div class="share">
        <h5>bagikan:</h5>
        <ul>
          <li><a><i class="fa-brands fa-facebook"></i></a></li>
          <li><a><i class="fa-brands fa-twitter"></i></a></li>
          <li><a><i class="fa-brands fa-instagram"></i></a></li>
          <li><a><i class="fa-brands fa-whatsapp"></i></a></li>
        </ul>
      </div>
    </div>
    <div class="lineRekomendasi"></div>
    <div class="text-re">
      <h5>Rekomendasi</h5>
    </div>
    <div class="container-rekomendasi">
      <div class="rekomendasi">
        <a href="#">
          <img src="<?= BASEURL; ?>/image/thumbnails/<?= $data["berita"][0]["image"]; ?>">
          <h5>NewsTerbaru</h5>
          <p><?= $data["berita"][0]["judul"]; ?></p>
        </a>
      </div>
      <div class="rekomendasi">
        <a href="#">
          <img src="<?= BASEURL; ?>/image/thumbnails/<?= $data["berita"][0]["image"]; ?>">
          <h5>NewsTerbaru</h5>
          <p><?= $data["berita"][0]["judul"]; ?></p>
        </a>
      </div>
    </div>
  </div>
<?php else : ?>
  <div class="container-berita-404">
    <div class="message-berita-404">
      <img src="<?= BASEURL; ?>/image/system/404.png">
      <p>sorry this page doesn't exist</p>
      <p>perhaps you would like to page <a href="../home">home?</a></p>
    </div>
  </div>
<?php endif; ?>
