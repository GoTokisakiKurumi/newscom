<?php

use app\core\Database;

session_start();
class Users_model
{
  private $db;
  private $tabel = "tb_users";
  private $rtabel = "tb_admin";
  private $status = "Admin";
  private $id_users;

  public function __construct()
  {
    $this->db =  new Database();
  }

  public function registrasiData($data)
  {
    $email = htmlspecialchars($data["email"]);
    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $password = htmlspecialchars(mysqli_real_escape_string($this->db->conn, $data["password"]));
    $verifikasi = htmlspecialchars(mysqli_real_escape_string($this->db->conn, $data["verifikasi"]));
    $profile = $this->uploadGambar();

    if ($password !== $verifikasi) {
      echo "<script>
                alert('verifikasi password salah!');
                document.location.href = '../registrasi';
             </script>";
      return false;
    }

    $data = [
      "tabel" => $this->tabel,
      "select" => "email",
      "where" => "email",
      "data" => $email
    ];

    $result_email = $this->db->select($data);
    if (mysqli_fetch_assoc($result_email)) {
      var_dump($result_email);
      echo "<script>
              alert('email sudah ada!');
            </script>";
      return false;
    }

    $result_username = mysqli_query($this->db->conn, "SELECT username FROM " . $this->tabel . " WHERE username = '$username'");
    if (mysqli_fetch_assoc($result_username)) {
      echo "<script>
                alert('nama sudah ada!');
              </script>";
      return false;
    }
    die;
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($this->db->conn, "INSERT INTO " . $this->tabel . " VALUES ('null', '$email', '$username', '$password', '$profile')");
    $query = mysqli_query($this->db->conn, "SELECT id_users FROM $this->tabel");
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
      $rows[] = $row;
    }
    foreach ($rows as $id_users) {
    }
    $this->id_users = $id_users["id_users"];
    mysqli_query($this->db->conn, "INSERT INTO " . $this->rtabel . " VALUES ('null', '$this->id_users', '$username', '$this->status')");
    return $this->db->rowCount();
  }

  public function uploadGambar()
  {
    $namaGambar = $_FILES["Profileimage"]["name"];
    $sizeGambar = $_FILES["Profileimage"]["size"];
    $error      = $_FILES["Profileimage"]["error"];
    $tmpName    = $_FILES["Profileimage"]["tmp_name"];

    if ($error === 4) {
      echo "<script>
                alert('pilih gambar terlebih dahulu!');
                document.location.href = '';
              </script>";
      return false;
    }

    $typeGambarValid = ['jpg', 'jpeg', 'png'];
    $typeGambar = explode('.', $namaGambar);
    $typeGambar = strtolower(end($typeGambar));
    if (!in_array($typeGambar, $typeGambarValid)) {
      echo "<script>
                alert('tidak terdeteksi gambar!');
              </script>";
      return false;
    }

    if ($sizeGambar > 5000000) {
      echo "<script>
                alert('ukuran gambar terlalu besar!');
              </script>";
      return false;
    }

    $namaGambarNew = uniqid();
    $namaGambarNew .= '.';
    $namaGambarNew .= $typeGambar;
    move_uploaded_file($tmpName, '../Public/image/profil/' . $namaGambarNew);
    return $namaGambarNew;
  }

  public function dataLogin($data)
  {
    $email = $data["email"];
    $password = $data["password"];

    $result = mysqli_query($this->db->conn, "SELECT * FROM " . $this->tabel . " WHERE email = '$email'");
    $Aresult = mysqli_query($this->db->conn, "SELECT * FROM tb_users , tb_admin WHERE tb_users.id_users = tb_admin.id_users AND tb_users.email = '$email'");
    $admin = mysqli_fetch_assoc($Aresult);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row["password"])) {
        $_SESSION["login"] = true;
        $_SESSION["admin"] = $admin;
        header("Location: ../dashboard/dashboard");
        exit;
      }
    }
  }
}
