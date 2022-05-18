<?php

use App\core\Time;

foreach ($data["berita"] as $data) :
  $TimeAgo = $data["tanggal"] . ' ' . $data["jam"];
  $time_ago = Time::TimeAgo(strtotime($TimeAgo));
?>
  <div class="sec-berita">
    <img src="<?= BASEURL; ?>/image/thumbnails/<?= $data["image"]; ?>">
    <div class="sec-berita-text">
      <p><a href="home/berita/<?= str_replace(' ', '-', $data["slug"]); ?>"><?= $data["judul"]; ?></a></p>
      <span class="tgl-post"><?= time::TimeAgo(strtotime($TimeAgo)); ?> | News.com</span>
    </div>
  </div>
<?php endforeach; ?>
