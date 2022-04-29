<?php
session_start();
class Search
{
  private $host = "localhost";
  private $user = "root";
  private $pass = "";
  private $db_name = "Newscom";
  private $tb_name = "tb_berita";

  public $conn;
  public $getsearch;

  public function __construct()
  {
    $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);
    return $this->conn = $conn;
  }

  public function getSearch()
  {
    $id_admin = $_SESSION["admin"]["id_admin"];
    $keyword = $_GET["search"];
    $query = "SELECT * FROM " . $this->tb_name . " , tb_admin WHERE tb_berita.id_admin = tb_admin.id_admin AND tb_berita.id_admin = $id_admin AND judul LIKE '%$keyword%'";
    $result = mysqli_query($this->conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }

  public function RowCount($rowcount)
  {
    $rowcount = mysqli_affected_rows($this->conn);
    return $rowcount;
  }
}
