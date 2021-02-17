<?php
class DbConnect {

    public function connect() {
        $db_string="mysql:host=localhost;port=3306;dbname=efdws_db";
        $user="root";
        $password="";
        try{
            $conn = new PDO($db_string,$user,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch( PDOException $e){
            echo 'Database Error: '.$e->getMessage();	
        }
    }    
}
?>