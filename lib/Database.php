<?php
include "config.php";
class DB{
  public $pdo;
  public function connection(){
    if (!isset($this->pdo)) {
      try {
        $link = new PDO("mysql:dbhost=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
        $this->pdo = $link;
      } catch (PDOException $e) {
        die("fail connection".$e->getMessage());
      }
    }
    return $this->pdo;
  }

}

?>
