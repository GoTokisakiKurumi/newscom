<?php

use app\core\Controllers;

class Berita extends Controllers
{
  public function index($slug_berita)
  {
    $data["berita"] = Controllers::model('Admin_model')->tampilkanBeritaBySlugs($slug_berita);
    Controllers::views('templates/header/index');
    Controllers::views('system/berita/index', $data);
    Controllers::views('templates/footer/index');
  }
}
