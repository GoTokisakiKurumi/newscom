<?php
session_start();
if (!isset($_SESSION["login"])) header('location: home');
$jam = $data["detail"][0]["jam"];
$jam = explode(':', $jam);
unset($jam[2]);
$Jam = $jam[0] . ':' . $jam[1];
?>
<div class="dashSpace"></div>
<div class="Options">
  <a href="../edit_berita/<?= str_replace(' ', '-', $data["detail"][0]["slug"]); ?>"><button>edit</button></a>
  <a id="buttonAlert"><button id="Bgred">Hapus</button></a>
</div>
<div class="container-blog">
  <div class="blog-berita">
    <h1><?= $data["detail"][0]["judul"]; ?></h1>
    <p><?= $data["detail"][0]["nama"]; ?> - <span>News.com<span></p>
    <p><?= $data["detail"][0]["t_tanggal"] . '-' . $Jam; ?> WIB</p>
    <img src="<?= BASEURL; ?>/image/thumbnails/<?= $data["detail"][0]["image"]; ?>">
    <span>Sumber Poto: <?= $data["detail"][0]["sumber"]; ?></span>
    <?= $data["detail"][0]["content"]; ?>
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
        <img src="<?= BASEURL; ?>/image/thumbnails/a.png">
        <h5>NewsTerbaru</h5>
        <p>Lorem Ipsum hanyalah teks
          tiruan dari industri percetakan
        </p>
      </a>
    </div>
    <div class="rekomendasi">
      <a href="#">
        <img src="<?= BASEURL; ?>/image/thumbnails/e.png">
        <h5>NewsTerpopuler</h5>
        <p>Lorem Ipsum hanyalah teks
          tiruan dari industri percetakan
        </p>
      </a>
    </div>
  </div>
  <div class="container-rekomendasi">
    <div class="rekomendasi">
      <a href="#">
        <img src="<?= BASEURL; ?>/image/thumbnails/f.png">
        <h5>NewsTerpopuler</h5>
        <p>Lorem Ipsum hanyalah teks
          tiruan dari industri percetakan
        </p>
      </a>
    </div>
    <div class="rekomendasi">
      <a href=#>
        <img src="<?= BASEURL; ?>/image/thumbnails/g.png">
        <h5>NewsTerbaru</h5>
        <p>Lorem Ipsum hanyalah teks
          tiruan dari industri percetakan
        </p>
      </a>
    </div>
  </div>
</div>
