<?php

use app\core\Controllers;

class Terpopuler extends Controllers
{
  public function index()
  {
    Controllers::views('templates/header/index');
    Controllers::views('terpopuler/index');
    Controllers::views('templates/footer/index');
  }
}
