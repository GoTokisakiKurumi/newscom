<?php

namespace app\core;

class Flasher
{
  public static function setFlash($message, $aksi)
  {
    $_SESSION['flash'] = [
      'message' => $message,
      'aksi' => $aksi
    ];
  }

  public static function flash()
  {
    if (isset($_SESSION["flash"])) {
      echo '<div id="cls" class="alertNotiv blockAlert">
               <div id="btn" class="contentAlert">
                  <i class="fa-solid fa-circle-check"></i>
                  <p>' . $_SESSION["flash"]["message"] . ' successfully ' . $_SESSION["flash"]["aksi"] . '</p>
               </div>
              </div>';
      unset($_SESSION["flash"]);
    }
  }
}
