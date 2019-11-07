<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

function sendMail($to,$subject,$body){
    
 require("PHPMailer-master/src/PHPMailer.php");
    require("PHPMailer-master/src/SMTP.php");
    //require("PHPMailer-master/src/Exception.php");


    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(false); 

    $mail->CharSet="UTF-8";
    $mail->Host = "host62.registrar-servers.com";
    $mail->SMTPDebug = 0; 
    $mail->Port = 587 ; //465 or 587

     $mail->SMTPSecure = 'TLS';  
    $mail->SMTPAuth = false; 
    $mail->IsHTML(true);

    //Authentication
    $mail->Username = "";
    $mail->Password = "";

    //Set Params
    $mail->SetFrom("root@host62.registrar-servers.com");
    $mail->AddAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $body;


     if(!$mail->Send()) {
        echo "Mailer Errorssss: " . $mail->ErrorInfo;
     } else {
       // echo "Message has been sent";
     }

}




?>