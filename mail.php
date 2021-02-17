<?php

class mailer{
public function sendMail($message){
    try{
    $to = "schadrackgodson@gmail.com";
    $subject = "Flood Notification";
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <nzayinaschad250@gmail.com>' ."\r\n";
    $headers .= 'Cc:sammyshyaka@.gmail.com' . "\r\n";

    if(mail($to,$subject,$message,$headers)){;
     echo "\n Email  sent successfullsy!";
    }
    else{
      //  echo "\n Failed to sent message!";
    }
    }
    catch(Exception $ex){
        echo $ex->getMessage();
    }
}
}  
?>