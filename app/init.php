<?php

spl_autoload_register(function ($class) {
  $class = explode('\\', $class);
  $class = end($class);
  require_once "config/config.php";
  require_once __DIR__ . '/core/' . $class . '.php';
});

spl_autoload_register(function ($class) {
  var_dump($class);
  $class = explode('\\', $class);
  $class = end($class);
  require_once "config/config.php";
  require_once __DIR__ . '/controllers/' . $class . '.php';
});
