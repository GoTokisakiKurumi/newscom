<?php

use app\core\Database;

session_start();
class Admin_model
{

  private $db;
  private $tabel = "tb_berita";
  private $rtabel = "tb_admin";
  private $utabel = "tb_users";
  private $id_admin;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function jumlahAdmin()
  {
    $query = [
      "tabel" => $this->rtabel
    ];

    return $this->db->selectNum($query);
  }

  public function Admin()
  {
    $data = [
      "tabel" => "$this->rtabel, $this->utabel",
      "relations" => "id_users"
    ];

    return $this->db->selectAll($data);
  }

  public function tampilkanBerita()
  {
    $data = [
      "tabel" => $this->tabel,
    ];

    return $this->db->selectAll($data);
  }

  public function tampilkanBeritaRekomendasi()
  {
    $data = [
      "tabel" => $this->tabel,
      "limit" => 25
    ];

    return $this->db->selectRekom($data);
  }
  public function tampilkanBeritaTerbaru()
  {
    $data  = [
      "tabel" => $this->tabel,
      "order" => "id_berita",
    ];

    return $this->db->selectAll($data);
  }

  public function tampilkanBeritaByLimit()
  {
    $data  = [
      "tabel" => $this->tabel,
      "order" => "id_berita",
      "limit" => 5
    ];

    return $this->db->selectAll($data);
  }

  public function tampilkanBeritaByAdmin()
  {
    if (isset($_SESSION["admin"])) {
      $this->id_admin  = $_SESSION["admin"]["id_admin"];
    }
    $data  = [
      "tabel" => "$this->tabel, $this->rtabel",
      "relations" => "id_admin",
      "and" => "tb_berita.id_admin",
      "id" => "$this->id_admin"
    ];

    return $this->db->selectAll($data);
  }

  public function tampilkanBeritaById($id)
  {
    $data = [
      "tabel" => $this->tabel,
      "where" => "id_berita = '$id'"
    ];

    return $this->db->selectAll($data);
  }

  public function tampilkanBeritaBySlugs($slugs)
  {
    $slug  = str_replace('-', ' ', $slugs);
    $data  = [
      "tabel" => "$this->tabel, $this->rtabel",
      "relations" => "id_admin",
      "and" => "tb_berita.slug",
      "slug" => $slug
    ];

    return $this->db->selectAll($data);
  }

  public function tambahBerita($data)
  {
    $this->id_admin  = $_SESSION["admin"]["id_admin"];
    $judul       = htmlspecialchars($data["judul"]);
    $title       = htmlspecialchars($judul);
    $content     = $data["content"];
    $image       = htmlspecialchars($this->uploadGambar());
    $sumber      = htmlspecialchars($data["sumber"]);
    if (!$image) {
      return false;
    }
    $tanggal     = htmlspecialchars($data["tanggal"]);
    $jam         = htmlspecialchars($data["jam"]);
    $hari   = array(1 => 'Senin ', 'Selasa ', 'Rabu ', 'Kamis ', 'Jumat ', 'Sabtu ', 'Minggu');
    $bulan  = array(1 => 'Januari ', 'Februari ', 'Maret ', 'April ', 'Mei ', 'Juni ', 'Juli ', 'Agustus ', 'September ', 'Oktober ', 'November ', 'Desember');
    $pecah  = explode('-', "$tanggal");
    $num    = date('N', strtotime("$tanggal"));
    $t_tanggal  = $hari[$num]  . ','  . $pecah[2]  . ' '  . $bulan[(int) $pecah[1]]  . ' '  . $pecah[0];

    $data  = [
      "tabel" => $this->tabel,
      "value" => "'null' , '$this->id_admin', 
                   '$judul', '$title', '$content', 
                   '$image', '$sumber', '$tanggal',
                   '$t_tanggal','$jam'"
    ];

    return $this->db->insertData($data);
  }

  public function uploadGambar()
  {
    $namaGambar  = $_FILES["image"]["name"];
    $sizeGambar  = $_FILES["image"]["size"];
    $error       = $_FILES["image"]["error"];
    $tmpName     = $_FILES["image"]["tmp_name"];


    if ($error === 4) {
      echo "<script>
                alert('pilih gambar terlebih dahulu!');
                document.location.href = 'error';
              </script>";
      return false;
    }

    $typeGambarValid  = ['jpg', 'jpeg ', 'png'];
    $typeGambar  = explode('.', $namaGambar);
    $typeGambar  = strtolower(end($typeGambar));
    if (!in_array($typeGambar, $typeGambarValid)) {
      echo "<script>
                alert('tidak terdeteksi gambar!');
            </script>";
      return false;
    }

    if ($sizeGambar  > 5000000) {
      echo "<script>
                alert('ukuran gambar terlalu besar!');
              </script>";
      return false;
    }

    $namaGambarNew  = uniqid();
    $namaGambarNew .= '.';
    $namaGambarNew .= $typeGambar;
    move_uploaded_file($tmpName, '../public/image/thumbnails/'  . $namaGambarNew);
    return $namaGambarNew;
  }

  public function editBerita($data)
  {
    $id_berita  = htmlspecialchars($data["id_berita"]);
    $judul      = htmlspecialchars($data["judul"]);
    $slug       = htmlspecialchars($data["slug"]);
    $content    = $data["content"];
    $tanggal    = htmlspecialchars($data["tanggal"]);
    $jam        = htmlspecialchars($data["jam"]);
    $imageOld   = htmlspecialchars($data["imageOld"]);

    if ($_FILES["image"]["error "] === 4) {
      $image  = $imageOld;
    } else {
      unlink('../public/image/thumbnails/'  . $data["imageOld"]);
      $image  = $this->uploadGambar();
    }

    $data  = [
      "tabel" => $this->tabel,
      "value" => "judul = '$judul', 
                  slug = '$slug',
                  content = '$content',
                  image = '$image',
                  tanggal = '$tanggal',
                  jam = '$jam'",
      "id" => "id_berita = '$id_berita'"

    ];

    return $this->db->updateData($data);
  }

  public function hapusBerita($id_berita)
  {
    $data  = [
      "tabel" => $this->tabel,
      "where" => "id_berita = '$id_berita'"
    ];

    $namaGambar = $this->tampilkanBeritaById($id_berita);
    $this->db->deleteData($data);
    unlink('../public/image/thumbnails/' . $namaGambar[0]["image"]);
  }

  public function hapusAdmin($id_users, $image)
  {
    $admin  = [
      "admin" => "DELETE FROM  "  . $this->rtabel  . " WHERE id_admin = $id_users",
      "users" => "DELETE FROM  "  . $this->utabel  . " WHERE id_users = $id_users",
      "image" => $image
    ];
    mysqli_query($this->db->conn, $admin["admin"]);
    mysqli_query($this->db->conn, $admin["users"]);
    $this->hapusBerita($id_users);
    unlink('../public/image/profil/'  . $admin["image"]);
  }
}
