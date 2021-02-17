<?php
include_once "./dbHelper.php";
    class Data{
        public function saveData($waterlevel,$moisture,$temperature,$humidity){
                 
                $decision="No Flood";
                $db_conn=new DbConnect();
                $connection=$db_conn->connect();
        
                $stmt=$connection->prepare("INSERT INTO efdws_measures VALUES ('',:wtl,:mois,:temp,:hum,:deci,NOW())");
                $stmt->bindParam(":wtl",$waterlevel);
                $stmt->bindParam(":mois",$moisture);
                $stmt->bindParam(":temp",$temperature);
                $stmt->bindParam(":hum",$humidity);
                $stmt->bindParam(":deci",$decision);
                $stmt->execute();
                $result=$stmt->execute();
                if($result){
                    return true;
                }
                else{
                    return false;
                }
        }
        }

?>