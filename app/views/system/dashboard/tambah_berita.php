<?php
session_start();
if ( !isset($_SESSION["login"]) ):
    header('Location: home');
endif;
?>
<div class="dashSpace"></div>
<div class="container-tambahBerita">
  <div class="FormtambahBerita">
    <form action="tambah" method="post" enctype="multipart/form-data">
      <ul>
        <h1>Tambah Berita</h1>
        <li><label for="judul">Judul</label></li>
        <li><input type="text" name="judul" id="judul" placeholder="Judul..." autocomplete="off" autofocus required></li>
        <li><label>Category<label></li>
        <li>
          <select required>
            <option>------</option>
            <option value="islam">Islam</option>
            <option value="teknologi">Teknologi</option>
            <option value="food">Food</option>
            <option value="olahraga">Olahraga</option>
          </select>
        </li>
        <li><label>Content</label></li>
        <li><input id="content" type="hidden" name="content" required></li>
        <li><trix-editor input="content"></trix-editor></li>
        <li><label for="gambar">Image</label></li>
        <li><input type="file" name="image" id="gambar" autocomplete="off"></li>
        <li><input type="text" name="sumber" placeholder="Sumber gambar..." autocomplete="off" required></li>
        <li><label for="tgl">Date time</label></li>
        <div class="flexDatime">
          <li><input type="date" name="tanggal" id="tgl" autocomplete="off" required></li>
          <li><input type="time" name="jam" required></li>
        </div>
        <button type="submit" name="submit">Post Berita</button>
      </ul>
    </form>
  </div>
</div>
