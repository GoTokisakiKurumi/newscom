<?php

use app\core\Controllers;

class Home extends Controllers
{
  public function index()
  {
    $data["berita"] = Controllers::model('Admin_model')->tampilkanBerita();
    Controllers::views('templates/header/index');
    Controllers::views('templates/slider/index');
    Controllers::views('home/index', $data);
    Controllers::views('templates/footer/index');
  }
}
