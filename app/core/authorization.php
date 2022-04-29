<?php

namespace app\core;

class Authorization
{

  public $status;

  public function __construct()
  {
    return $this->status = "Super Admin";
  }
}
