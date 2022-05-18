<?php

use app\core\Controllers;

session_start();
if (isset($_SESSION["login"])) {
  header('Location: dashboard');
}

class Login extends Controllers
{
  public function index()
  {
    Controllers::views('system/login/index');
  }

  public function loginVerify()
  {
    if (!$data["login"] = Controllers::model("Users_model")->dataLogin($_POST) > 0) {
      echo "<script>
                  alert('username atau password salah!');
                  document.location.href = '../login';
            </script>";
    }
  }
}
