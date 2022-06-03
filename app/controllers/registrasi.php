<?php

use app\core\Controllers;
use app\core\Flasher;

class Registrasi extends Controllers
{
  public function index()
  {
    Controllers::views('system/registrasi/index');
  }

  public function postData()
  {
    if (Controllers::model('Users_model')->registrasiData($_POST) > 0) {
      echo "<script>
                alert('users baru berhasil ditambahkan');
                //document.location.href = '';
            </script>";
    }
  }
}
