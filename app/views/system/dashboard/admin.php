<?php

use App\core\Flasher;

?>
<div class="dashSpace"></div>
<?php foreach ($data["admin"] as $data) : ?>
  <div class="container-card-admin">
    <?php Flasher::flash(); ?>
    <div class="card-admin">
      <img src="<?= BASEURL; ?>/image/profile/<?= $data["Profileimage"]; ?>">
      <h1><?= $data["nama"]; ?></h1>
      <p><?= $data["status"]; ?></p>
      <div class="action-flex">
        <a href=""><button>Detail</button></a>
        <a href="../dashboard/hapusadmin/<?= $data["id_admin"]; ?>/<?= $data["Profileimage"]; ?>"><button>Hapus</button></a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
