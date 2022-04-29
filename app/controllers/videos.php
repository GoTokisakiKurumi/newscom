<?php

use app\core\Controllers;

class Videos extends Controllers
{
  public function index()
  {
    Controllers::views('templates/header/index');
    Controllers::views('videos/index');
    Controllers::views('templates/footer/index');
  }
}
