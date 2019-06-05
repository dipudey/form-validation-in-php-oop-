<?php
  include "Database.php";
?>
<?php
class From{
  public $db;
  public function __construct(){
    $this->db = new DB();
  }
  public function insert($data){
    $name        = $data['name'];
    $username    = $data['username'];
    $email       = $data['email'];
    if (strlen($data['password']) < 6) {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Password is too short enter 6 digit or more !</div>";
      return $msg;
    }else {
      $password    = md5($data['password']);
    }
    $check_email = $this->checkEmail($email);

    if ($name=='' or $username=='' or $email=='' or $password=='') {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>The Field Must Be Required!</div>";
      return $msg;
    }

    if (strlen($username) < 3) {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>User Name is too short !</div>";
      return $msg;
    }elseif (preg_match('/[^a-zA-z0-9_-]+/i',$username)) {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>User Name must only contain alphanumerical,dash and underscores !</div>";
      return $msg;
    }

    if (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>email address is not validate !</div>";
      return $msg;
    }
    if ($check_email == true) {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>email address Already Exist !</div>";
      return $msg;
    }

    $sql  = "INSERT INTO tbl_user(name,username,email,password) VALUES(:name,:username,:email,:password)";
    $stmt = $this->db->connection()->prepare($sql);
    $stmt->bindParam(":name",$name);
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":password",$password);
    $result = $stmt->execute();
    if ($result) {
      $msg = "<div class='alert alert-success'><strong>Success ! </strong>You registration is completed !</div>";
      return $msg;
    }else {
      $msg = "<div class='alert alert-danger'><strong>Error ! </strong>Something is Problem to registration !</div>";
      return $msg;
    }

  }

  public function checkEmail($email){
    $sql  = "SELECT email FROM tbl_user WHERE email = :email";
    $stmt = $this->db->connection()->prepare($sql);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    if ($stmt->rowCount() > 0 ) {
      return true;
    }else {
      return false;
    }
  }

}


?>
