<?php

use app\core\Controllers;

class Terbaru extends Controllers
{
  public function index()
  {
    $data["terbaru"] = Controllers::model('Admin_model')->tampilkanBeritaTerbaru();
    Controllers::views('templates/header/index');
    Controllers::views('terbaru/index', $data);
    Controllers::views('templates/footer/index');
  }

  public function berita($slug_berita)
  {
    $data["berita"] = Controllers::model('Admin_model')->tampilkanBeritaBySlugs($slug_berita);
    $dataAll["rekomendasi"] = Controllers::model('Admin_model')->tampilkanBeritaRekomendasi();
    $dataNew = array_merge($data, $dataAll);
    Controllers::views('templates/header/index');
    Controllers::views('system/berita/index', $dataNew);
    Controllers::views('templates/footer/index');
  }
}
