<?php

use app\core\Controllers;

class Video extends Controllers
{
  public function index()
  {
    Controllers::views('templates/header/index');
    Controllers::views('system/berita/video');
    Controllers::views('templates/footer/index');
  }
}
