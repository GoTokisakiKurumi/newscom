<?php

use app\core\Controllers;
use app\core\Flasher;

class Dashboard extends Controllers
{
  public function index()
  {
    $data["data"] = Controllers::model('Admin_model')->tampilkanBeritaByAdmin();
    $jmladmin["jmladmin"] = Controllers::model('Admin_model')->jumlahAdmin();
    Controllers::views('system/dashboard/index');
    Controllers::views('system/dashboard/dashmenu/index');
    Controllers::views('system/dashboard/home/index', $data, $jmladmin);
    Controllers::views('system/dashboard/footer/index');
  }

  public function profile()
  {
    Controllers::views('system/dashboard/index');
    Controllers::views('system/dashboard/dashmenu/index');
    Controllers::views('system/dashboard/profile');
    Controllers::views('system/dashboard/footer/index');
  }

  public function Tambah_Berita()
  {
    Controllers::views('system/dashboard/index');
    Controllers::views('system/dashboard/dashmenu/index');
    Controllers::views('system/dashboard/tambah_berita');
    Controllers::views('system/dashboard/footer/index');
  }

  public function Edit_Berita($slug_edit)
  {
    $data["edit"] = Controllers::model('Admin_model')->tampilkanBeritaBySlugs($slug_edit);
    Controllers::views('system/dashboard/index');
    Controllers::views('system/dashboard/dashmenu/index');
    Controllers::views('system/dashboard/edit_berita', $data);
    Controllers::views('system/dashboard/footer/index');
  }

  public function Message()
  {
    Controllers::views('system/dashboard/index');
    Controllers::views('system/dashboard/dashmenu/index');
    Controllers::views('system/dashboard/message');
    Controllers::views('system/dashboard/footer/index');
  }

  public function Keluar()
  {
    Controllers::views('system/dashboard/index');
    Controllers::views('system/dashboard/dashmenu/index');
    Controllers::views('system/dashboard/keluar');
    Controllers::views('system/dashboard/footer/index');
  }

  public function Detail($slug_detail)
  {
    $data["detail"] = Controllers::model('Admin_model')->tampilkanBeritaBySlugs($slug_detail);
    Controllers::views('system/dashboard/index');
    Controllers::views('system/dashboard/system/popup/index', $data);
    Controllers::views('system/dashboard/dashmenu/index');
    Controllers::views('system/dashboard/detail', $data);
    Controllers::views('system/dashboard/footer/index');
  }

  public function admin()
  {
    $data["admin"] = Controllers::model('Admin_model')->Admin();
    Controllers::views('system/dashboard/index');
    Controllers::views('system/dashboard/dashmenu/index');
    Controllers::views('system/dashboard/admin', $data);
    Controllers::views('system/dashboard/footer/index');
  }

  public function tambah()
  {
    if (Controllers::model('Admin_model')->tambahBerita($_POST) > 0) {
      Flasher::setFlash('new post', 'added');
      header('Location: ' . SETURL . '/dashboard');
      exit;
    }
  }

  public function edit()
  {
    if (Controllers::model('Admin_model')->editBerita($_POST) > 0) {
      Flasher::setFlash('post', 'update');
      header('Location: ' . SETURL . '/dashboard');
      exit;
    } else {
      Flasher::setFlash('new post', 'added');
      header('Location: ' . SETURL . '/dashboard');
      exit;
    }
  }

  public function hapus($id_berita)
  {
    Controllers::model('Admin_model')->hapusBerita($id_berita);
    Flasher::setFlash('post', 'deleted');
    header('Location: ' . SETURL . '/dashboard');
    exit;
  }

  public function hapusAdmin($id_users, $image)
  {
    Controllers::model('Admin_model')->hapusAdmin($id_users, $image);
    Flasher::setFlash('admin', 'deleted');
    header('Location: ' . SETURL . '/dashboard/admin');
    exit;
  }
}
