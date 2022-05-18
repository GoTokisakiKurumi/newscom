<?php
session_start();
$data = isset($_SESSION["admin"]) ? $_SESSION["admin"] : '';

if ($data) {
  $profile = $_SESSION["admin"]["Profileimage"];
  $banner = $_SESSION["admin"]["Bannerimage"];
} else {
  $profile = "default.png";
  $banner = "default.png";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>News.com</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= BASEURL; ?>/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,600&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="container-nav">
      <nav class="navigation">
        <h1>News.com</h1>
        <i id="btn" class="fa-solid fa-bars"></i>
      </nav>
    </div>

    <head class="container-head">
      <div class="text-kategori">
        <ul>
          <a href="<?= SETURL; ?>/">
            <li <?= include "../App/views/system/home/index.php" ?>>Home</li>
          </a>
          <a href="<?= SETURL; ?>/terbaru">
            <li <?= include "../App/views/system/terbaru/index.php"; ?>>Terbaru</li>
          </a>
          <a href="<?= SETURL; ?>/terpopuler">
            <li <?= include "../App/views/system/terpopuler/index.php"; ?>>Terpopuler</li>
          </a>
          <a href="<?= SETURL; ?>/videos">
            <li <?= include "../App/views/system/videos/index.php"; ?>>Videos</li>
          </a>
        </ul>
      </div>
    </head>
  </div>
  <div class="container-bars">
    <ul id="views_Bars">
      <div class="container-profile">
        <div class="profile-img"><br>
          <img src="<?= BASEURL; ?>/image/profil/<?= $profile; ?>"><br>
          <img src="<?= BASEURL; ?>/image/banner/<?= $banner; ?>">
        </div>
      </div>
      <h4>Kategori</h4>
      <div class="flexKategori">
        <div class="container-kat">
          <a href="#">
            <li><i class="fa-solid fa-star-and-crescent"></i><span>Islam</span></li>
          </a>
          <a href="#">
            <li><i class="fa-solid fa-server"></i><span>Teknologi</span></li>
          </a>
          <a href="#">
            <li><i class="fa-solid fa-burger"></i><span>Food</span></li>
          </a>
          <a href="#">
            <li><i class="fa-solid fa-futbol"></i><span>Olahraga</span></li>
          </a>
        </div>
        <div class="container-kat">
          <a href="#">
            <li><i class="fa-solid fa-star-and-crescent"></i><span>Islam</span></li>
          </a>
          <a href="#">
            <li><i class="fa-solid fa-server"></i><span>Teknologi</span></li>
          </a>
          <a href="#">
            <li><i class="fa-solid fa-burger"></i><span>Food</span></li>
          </a>
          <a href="#">
            <li><i class="fa-solid fa-futbol"></i><span>Olahraga</span></li>
          </a>
        </div>
      </div>
      <span class="KatLine"></span>
      <a href="<?= BASEURL; ?>/../Home/login">
        <li><i class="fa-solid fa-house"></i><span>Admin</span></li>
      </a>
      <a href="#">
        <li><i class="fa-solid fa-gear"></i><span>Pengaturan</span></li>
      </a>
      <a href="#">
        <li><i class="fa-solid fa-moon"></i><span>Mode gelap</span></li>
      </a>
      <a href="#">
        <li><i class="fa-solid fa-book"></i><span>Tentang</span></li>
      </a>
      <a href="dashboard/keluar">
        <li><i class="fa-solid fa-arrow-right-to-bracket"></i><span>Keluar</span></li>
      </a>
    </ul>
  </div>
  <section>
