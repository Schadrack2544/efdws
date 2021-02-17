<?php
require_once './dbHelper.php';
class Users{
    //public string $username;
    //public string $password;
    public function __construct($username,$password)
    {
        $this->username=$username;
        $this->password=$password;
        
    }
    public function login($username,$password){
       $db_conn=new DbConnect();
       $connection=$db_conn->connect();
       
       $stmt=$connection->prepare("SELECT * FROM credentials WHERE username=:un AND password=:pass");
       $stmt->bindParam(":un",$username);
       $stmt->bindParam(":pass",$password);
       $stmt->execute();
       $result=$stmt->fetch(PDO::FETCH_ASSOC);
       if($result){
           return true;
       }
       else{
           return false;
       }

    }
    public function save($username,$password){
        $db_conn=new DbConnect();
        $connection=$db_conn->connect();

        $stmt=$connection->prepare("INSERT INTO credentials VALUES (username=:un , password=:pass)");
        $stmt->bindParam(":un",$username);
        $stmt->bindParam(":pass",$password);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}
?>