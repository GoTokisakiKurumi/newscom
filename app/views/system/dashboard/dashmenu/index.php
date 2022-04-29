<?php
session_start();
?>
    <section id="section">
    <div class="dashboard-menu">
       <ul id="dashmenu">
         <li <?php include "../App/views/system/dashboard/system/profile/index.php"; ?>><a href="<?= BASEURL; ?>/../Home/dashboard/profile"><img src="<?= BASEURL; ?>/image/profil/<?= $_SESSION["admin"]["Profileimage"];?>"></a></li>
         <li <?php include "../App/views/system/dashboard/system/home/index.php"; ?> ><a href="<?= BASEURL; ?>/../Home/dashboard/dashboard"><i class="fa-solid fa-house"></i></a></li>
         <li <?php include "../App/views/system/dashboard/system/tambah/index.php"; ?> ><a href="<?= BASEURL; ?>/../Home/dashboard/tambah_berita"><i class="fa-solid fa-circle-plus"></i></a></li>
         <li <?php include "../App/views/system/dashboard/system/message/index.php"; ?> ><a href="<?= BASEURL; ?>/../Home/dashboard/message"><i class="fa-solid fa-message"></i></a></li>
         <li <?php include "../App/views/system/dashboard/system/back/index.php"; ?> ><a href="<?= BASEURL; ?>/../Home"><i class="fa-solid fa-arrow-left-long"></i></a></li>
         <li <?php include "../App/views/system/dashboard/system/keluar/index.php"; ?> ><a href="<?= BASEURL; ?>/../Home/dashboard/keluar"><i class="fa-solid fa-arrow-right-to-bracket"></i></a></li>
       </ul>
     </div>
