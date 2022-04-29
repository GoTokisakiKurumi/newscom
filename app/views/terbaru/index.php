<div class="tabspasi slide"></div>
<?php

use App\core\Time;

foreach ( $data["terbaru"] as $data ):
  $TimeAgo = $data["tanggal"] . ' ' . $data["jam"];
  $time_ago = Time::timeAgo(strtotime($TimeAgo));
  $slug = str_replace(' ', '-', $data["slug"]);
?>
<div class="sec-berita">
  <img src="<?= BASEURL; ?>/image/thumbnails/<?= $data["image"] ;?>">
  <div class="sec-berita-text">
    <p><a href="Berita/<?= $slug ?>"><?= $data["judul"]; ?></a></p>
    <span class="tgl-post"><?= Time::timeAgo(strtotime($TimeAgo)); ?></span>
  </div>
</div>
<?php endforeach; ?>

