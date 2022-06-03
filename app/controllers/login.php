<?php

use app\core\Controllers;
use app\core\Flasher;

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
      Flasher::setFlash('email and password no valid', '');
      header('Location: ' . SETURL . '/login');
      exit;
    }
  }
}
