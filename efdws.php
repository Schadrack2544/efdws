<?php
require './dbHelper.php';
class efdws{

public function getWaterLevel(){
$db_conn=new DbConnect();
$connection=$db_conn->connect();
return "High ";
}
public function getWaterFlow(){
return "18000L/h";
}
public function getTemperature(){
    return "32 C";
    }
public function makeDecision($waterlevel,$temp,$humi,$moist){
    $decision="";
    if($waterlevel<30) $decision="Flood is small";
    if($waterlevel>30 && $waterlevel<50) $decision="Flood is medium";
    if($waterlevel>50) $decision="Flood is Critical";
    
    return $decision;
   
}
public function getMeasures(){
    $db_conn=new DbConnect();
    $connection=$db_conn->connect();

    $stmt=$connection->prepare("SELECT * FROM efdws_measures ORDER BY measure_Id");
    $stmt->execute();
    $result=$stmt->fetchAll();
    return $result;
}
public function getLastMeasure(){
    $db_conn=new DbConnect();
    $connection=$db_conn->connect();

    $stmt=$connection->prepare("SELECT * FROM efdws_measures ORDER BY measure_Id DESC LIMIT 1");
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

}

?>