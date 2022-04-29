<?php

use app\core\Controllers;

class Terbaru extends Controllers
{
  public function index()
  {
    $data["terbaru"] = Controllers::model('Admin_model')->tampilkanBerita();
    Controllers::views('templates/header/index');
    Controllers::views('terbaru/index', $data);
    Controllers::views('templates/footer/index');
  }
}
