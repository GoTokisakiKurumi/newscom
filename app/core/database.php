<?php

namespace app\core;

class Database
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $db_name = DB_NAME;

  protected $tabel;
  protected $select = "*";
  protected $from = "FROM";
  protected $where = "WHERE";

  protected $relations = null;
  protected $and = null;
  protected $slug = null;
  protected $id = null;
  protected $value = null;

  public $conn;

  public function __construct()
  {
    $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);
    return $this->conn = $conn;
  }

  public function rowCount()
  {
    $rowcount = mysqli_affected_rows($this->conn);
    return $rowcount;
  }

  public function setQuery($data)
  {
    if (isset($data["tabel"])) {
      if (is_string($data["tabel"])) {
        $this->tabel = $data["tabel"];
      }
    }
    if (isset($data["select"])) {
      if (is_string($data["select"])) {
        $this->select = $data["select"];
      }
    }
    if (isset($data["relations"])) {
      if (is_string($data["relations"])) {
        $relation = $data["relations"];
        $ex = explode(',', $this->tabel);
        $relation = "WHERE " . $ex[0] . "." . $relation . " =" . $ex[1] . "." . $relation;
        $this->relations = $relation;
      }
    }
    if (isset($data["and"])) {
      if (is_string($data["and"])) {
        $this->and = " AND " . $data["and"] . " = ";
      }
    }
    if (isset($data["slug"])) {
      if (is_string($data["slug"])) {
        $slug = $data["slug"];
        $this->slug = "'$slug'";
      }
    }
    if (isset($data["id"])) {
      if (!is_int($data["id"])) {
        $this->id = $data["id"];
      }
    }
    if (isset($data["value"])) {
      if (is_string($data["value"])) {
        $this->value = $data["value"];
      }
    }
  }

  public function getQuery($type)
  {
    if (is_string($type)) {
      if ($type === "post") {
        return "INSERT INTO $this->tabel VALUES( $this->value ) ";
      }
    }

    if (is_string($type)) {
      if ($type === "get") {
        return "SELECT $this->select FROM $this->tabel $this->relations $this->and $this->id $this->slug";
      }
    }

    if (is_string($type)) {
      if ($type === "update") {
        return "UPDATE $this->tabel SET $this->value $this->where $this->id";
      }
    }

    if (is_string($type)) {
      if ($type === "delete") {
        return "DELETE FROM $this->tabel $this->where $this->id $this->value";
      }
    }
  }

  public function select($query)
  {
    if ($query["select"] == true) {
      $select =  $query["select"];
    } else {
      $select =  "*";
    }
    if ($query["where"] == true) {
      $where =  $query["where"];
      $where =  " WHERE $where";
    }
    if ($query["data"] == true) {
      $data =  $query["data"];
      $data =  " = '$data'";
    }

    $query =  "SELECT $select FROM " .  $query["tabel"] .  $where .  $data;
    return mysqli_query($this->conn, $query);
  }

  public function selectNum($query)
  {
    if (is_string($query["tabel"])) {
      $this->tabel =  $query["tabel"];
    }
    $query = "SELECT $this->select FROM $this->tabel $this->relations $this->and $this->id";
    $result = mysqli_query($this->conn, $query);
    return mysqli_num_rows($result);
  }

  public function selectAll($query)
  {
    $this->setQuery($query);
    $rows =  [];
    $result = mysqli_query($this->conn, $this->getQuery("get"));
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
  }

  public function insertData($query)
  {
    $this->setQuery($query);
    mysqli_query($this->conn, $this->getQuery("post"));
    return $this->rowCount();
  }

  public function updateData($query)
  {
    $this->setQuery($query);
    mysqli_query($this->conn, $this->getQuery("update"));
    return $this->rowCount();
  }

  public function deleteData($query)
  {
    $this->setQuery($query);
    mysqli_query($this->conn, $this->getQuery("delete"));
    return $this->rowCount();
  }
}
