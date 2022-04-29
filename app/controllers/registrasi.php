<?php

use app\core\Controllers;

class Registrasi extends Controllers
{
  public function index()
  {
    Controllers::views('system/registrasi/index');
  }

  public function postData()
  {
    if (Controllers::model('Users_model')->RegistrasiData($_POST) > 0) {
      echo "<script>
                alert('users baru berhasil ditambahkan');
                document.location.href = '../login';
              </script>";
    } else {
      echo "<script>
                alert('users baru gagal ditambahkan');
                document.location.href = '../registrasi';
              </script>";
    }
  }
}
