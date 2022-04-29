<?php

use App\core\Flasher;
use App\core\Authorization;

session_start();
if (!isset($_SESSION["login"])) :
  header('Location: home');
endif;
?>
<div class="container-search">
  <div class="search">
    <form method="post" action="">
      <i class="fa-solid fa-magnifying-glass"></i>
      <input type="text" name="search" id="search" placeholder="search..." autocomplete="off">
      <button id="button" type="submit">Search</button>
    </form>
  </div>
</div>
<?php $status = new Authorization(); ?>
<?php if ($_SESSION["admin"]["status"] == "$status->status") : ?>
  <div class="container-card">
    <div class="bgcard"></div>
    <a href="">
      <div class="card">
        <i class="fa-solid fa-eye"></i>
        <p>Total Views</p>
        <p>540
        <p>
          <span></span>
      </div>
    </a>
    <a href="<?= SETURL; ?>/dashboard/admin">
      <div class="card">
        <i class="fa-solid fa-user"></i>
        <p>Total Admin</p>
        <p><?= $admin["jmladmin"]; ?>
        <p>
          <span></span>
      </div>
    </a>
    <a href="">
      <div class="card">
        <i class="fa-solid fa-users"></i>
        <p>Total Pengunjung</p>
        <p>1500
        <p>
          <span></span>
      </div>
    </a>
  </div>
<?php endif; ?>
<?php Flasher::flash(); ?>
<div id="main" class="container-table">
  <div class="table">
    <table border="0">
      <thead>
        <th>No</th>
        <th>Topik Berita</th>
        <th>View</th>
        <th>Action</th>
      </thead>
      <?php $i = 1; ?>
      <?php foreach ($data["data"] as $data) : ?>
        <tbody>
          <td><?= $i; ?></td>
          <td>
            <img src="<?= BASEURL; ?>/image/thumbnails/<?= $data["image"]; ?>">
            <p><?= $data["judul"]; ?></p>
          </td>
          <td><?= $i; ?></td>
          <td><a href="<?= BASEURL; ?>/../Home/dashboard/detail/<?= str_replace(' ', '-', $data["slug"]); ?>">detail</a></td>
        </tbody>
        <?php $i++; ?>
      <?php endforeach; ?>
    </table>
  </div>
</div>
