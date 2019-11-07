<?php
include "../includes/config.php";

if(!empty($_POST["email"])){
// 		$conn = mysqli_connect("localhost", "root", "", "blog_samples");
		
	
	
		$sql = "Select * from car_user where email = '".$_POST["email"]."'";
		
		$result = mysqli_query($conni,$sql);
		//$user = mysqli_fetch_array($result);
		$match  = mysqli_num_rows($result);
// 		var_dump($match);
		 if($match > 0){
			//require_once("forgot-password-recovery-mail.php");
			
			$row = mysqli_fetch_assoc($result);
            $id=	$row['id'];
    	    $name=	$row['name'];
    	   $token_remember=	$row['remember_token'];
			
			    // sending email
                    include ('../includes/mail.php');
        
                    $to=$_POST["email"];
                    $subject="Forgot Password Recovery";
                    $body=' <html>
                                    <head>
                                		<title>Forgot Password Recovery</title>
                                	</head>
                                	<body>
                                	 <table>
                                			<tr><td>&nbsp;</td></tr>
                                			<tr><td><img src="http://autohapa.oneviewcrm.com/autohapa/assets/images/logo.png"></td></tr>
                                			<tr><td>Dear  <b>'.$name.'!</b></td></tr>
                                            <tr><td>&nbsp;</td></tr>
                                			<tr><td><a href="http://autohapa.oneviewcrm.com/autohapa/login/reset-password.php?email='.$_POST["email"].'">Click here to Reset Your password!</a></td></tr>
                                			<tr><td>&nbsp;</td></tr>
                                			<tr><td>Thanks & Regards,</td></tr>
                                			<tr><td>AutoHapa Team</td></tr>
                                		</table>
                                	
                                	</body>
                                </html>';
                              sendMail($to,$subject,$body);
			
			echo 'successfull';
			
			
		} else {
			//$error_message = 'No User Found';
			echo 'No User Found';
		}
	}

?>