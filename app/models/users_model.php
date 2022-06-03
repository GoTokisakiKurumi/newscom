<?php

use app\core\Database;
use app\core\Flasher;

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
    $this->db->setValidated($data);
    $validated = $this->db->getValidated();

    $email      = $validated["email"];
    $username   = $validated["username"];
    $password   = $validated["password"];
    $banner     = IMG_DEFAULT;
    $namaGambar = @$_FILES["Profileimage"]["name"];
    $sizeGambar = @$_FILES["Profileimage"]["size"];
    $error      = @$_FILES["Profileimage"]["error"];
    $tmpName    = @$_FILES["Profileimage"]["tmp_name"];

    if ($error  === 4) {
      Flasher::setFlash('gambar tidak ada!', '');
      header('Location: ' . SETURL . '/registrasi');
      return false;
    }

    $typeGambarValid = ['jpg', 'jpeg', 'png'];
    $typeGambar = explode('.', $namaGambar);
    $typeGambar = strtolower(end($typeGambar));
    if (!in_array($typeGambar, $typeGambarValid)) {
      Flasher::setFlash('tidak bisa selain gambar!', '');
      header('Location: ' . SETURL . '/registrasi');
      return false;
    }

    if ($sizeGambar > 5000000) {
      Flasher::setFlash('size gambar terlalu besar!', '');
      header('Location: ' . SETURL . '/registrasi');
      return false;
    }

    $namaGambarNew = uniqid();
    $namaGambarNew .= '.';
    $namaGambarNew .= $typeGambar;

    $data = [
      "tabel" => $this->tabel,
      "select" => "email",
      "where" => "email = '$email'",
    ];

    $result_email = $this->db->selectAll($data);

    if ($result_email) {
      Flasher::setFlash('email sudah terdaftar!', '');
      header('Location: ' . SETURL . '/registrasi');
      return false;
    }

    $data = [
      "tabel" => $this->tabel,
      "select" => "username",
      "where" => "username = '$username'"
    ];

    $result_username = $this->db->selectAll($data);
    if ($result_username) {
      Flasher::setFlash('nama sudah terdaftar!', '');
      header('Location: ' . SETURL . '/registrasi');
      return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $data = [
      "tabel" => $this->tabel,
      "value" => "'null','$email','$username',
                  '$password','$namaGambarNew',
                  '$banner'",
    ];

    if ($this->db->insertData($data) > 0)  move_uploaded_file($tmpName, '../public/image/profile/' . $namaGambarNew);
    $query = mysqli_query($this->db->conn, "SELECT id_users FROM $this->tabel WHERE email = '$email'");
    $id_users = mysqli_fetch_assoc($query);
    $this->id_users = $id_users["id_users"];
    mysqli_query($this->db->conn, "INSERT  INTO " . $this->rtabel . " VALUES ('', '$this->id_users', '$username', '$this->status')");
    return $this->db->rowCount();
  }

  public function dataLogin($data)
  {
    $this->db->setValidated($data);
    $validated = $this->db->getValidated();
    $email = $validated["email"];
    $password = $validated["password"];

    $data = [
      "tabel" => $this->tabel,
      "where" => "email = '$email'"
    ];

    $result = $this->db->selectAll($data);
    $resultAdmin = mysqli_query($this->db->conn, "SELECT * FROM tb_users , tb_admin WHERE tb_users.id_users = tb_admin.id_users AND tb_users.email = '$email'");
    $admin = mysqli_fetch_assoc($resultAdmin);
    if (password_verify($password, @$result[0]["password"])) {
      $_SESSION["login"] = true;
      $_SESSION["admin"] = $admin;
      header("Location: ../dashboard/dashboard");
      exit;
    }
  }
}
