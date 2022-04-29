<?php
session_start();
if ( !isset($_SESSION["login"]) ):
    header('Location: home');
endif;
?>

<div class="dashSpace"></div>
<div class="container-tambahBerita">
  <div class="FormtambahBerita">
    <form action="../edit" method="post" enctype="multipart/form-data">
      <li><input type="hidden" name="id_berita" value="<?= $data["edit"][0]["id_berita"];?>"></li>
      <li><input type="hidden" name="imageOld" value="<?= $data["edit"][0]["image"];?>"></li>     
      <ul>
        <h1>Edit Berita</h1>
        <li><label for="judul">Judul</label></li>
        <li><input type="text" name="judul" id="judul" value="<?= $data["edit"][0]["judul"]; ?>" autocomplete="off"></li>
        <li><input type="text" name="slug" value="<?= $data["edit"][0]["slug"];?>"></li>
        <li><label>Category<label></li>
        <li>
          <select>
            <option value="islam">Islam</option>
            <option value="teknologi">Teknologi</option>
            <option value="food">Food</option>
            <option value="olahraga">Olahraga</option>
          </select>
        </li>
        <li><label>Content</label></li>
        <li><input id="content" type="hidden" name="content" value="<?= $data["edit"][0]["content"]; ?>"></li>
        <li><trix-editor input="content"></trix-editor></li>
        <li><label for="gambar">Image</label></li>
        <li><img style="width: 100px; height: 100px; object-fit: cover;" src="<?= BASEURL; ?>/image/thumbnails/<?= $data["edit"][0]["image"]; ?>"></li>
        <li><input type="file" name="image" id="gambar" autocomplete="off"></li>
        <li><label for="tgl">Date time</label></li>
        <div class="flexDatime">
          <li><input type="date" name="tanggal" value="<?= $data["edit"][0]["tanggal"]; ?>" id="tgl" autocomplete="off"></li>
          <li><input type="time" name="jam" value="<?= $data["edit"][0]["jam"]; ?>"></li>
        </div>
        <button type="submit" name="submit">Edit Berita</button>
      </ul>
    </form>
  </div>
</div>
