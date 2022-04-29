<?php

namespace app\core;

class Controllers
{
  public static function views($view, $data = [], $admin = [])
  {
    require_once "../App/views/" . $view . ".php";
  }

  public static function model($model)
  {
    require_once "../App/models/" . $model . ".php";
    return new $model;
  }
}
