<div class="container-head">
  <?php foreach ($data["berita"] as $data) : ?>
    <header class="headers">
      <div class="slide fade">
        <div class="text">
          <p><?= $data["judul"]; ?></p>
        </div>
        <span class="bgtext"></span>
        <img src="<?= BASEURL; ?>/image/thumbnails/<?= $data["image"]; ?>">
      </div>
    </header>
  <?php endforeach; ?>
</div>
