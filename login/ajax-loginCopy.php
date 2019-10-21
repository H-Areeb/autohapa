<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	
$email= '';

if(isset($_REQUEST['user_email'] )){  
     
$email = $_REQUEST['user_email'];	 

     $check_query = 'select * from car_user where email = "'.$email.'"';
     $res =  mysqli_query($conni, $check_query);
	 
     if (mysqli_num_rows($res) == 0) {
        // output data of each row
        echo json_encode(array("status"=>"invalid"));
     }  
	else{
		$row = mysqli_fetch_assoc($res);
		
		   $id=	$row['id'];
			
		
		echo json_encode(array("status"=>"success","id"=>$id));
	}
}



//------- for checking password if it available

	if(isset($_REQUEST['user_pwd'])){    
        
		$password =  mysqli_real_escape_string($conni,$_REQUEST['user_pwd']);

    $user_id = $_REQUEST['user_id'];


     $check_query = 'select * from car_user where id = "'.$user_id.'"';
     $res =  mysqli_query($conni, $check_query);
	  
     if (mysqli_num_rows($res) == 0) {
        // output data of each row
        echo json_encode(array("status"=>"invalidsss"));
     }  
	else{
		
		$row = mysqli_fetch_assoc($res);
		
		   
				if(password_verify($password, $row["password"]))  
				 {  
					  //return true;  
					  //$_SESSION["username"] = $username;  
					  echo json_encode(array("status"=>"success"));
				 }  
				 else  
				 {  
					  //return false;  
					 echo json_encode(array("status"=>"invalid"));
				 }  
	   
		
		
	}
	
}

if(isset($_REQUEST['RegEmail'])){    

		$regEmail = $_REQUEST['RegEmail'];
		$regName = $_REQUEST['RegName'];
      $regPass = $_REQUEST['RegPwd'];
	   
	   $password_string = mysqli_real_escape_string($conni,$regPass);
			  // // The value of $password_hash
			  // // should similar to the following:
			  // // $2y$10$aHhnT035EnQGbWAd8PfEROs7PJTHmr6rmzE2SvCQWOygSpGwX2rtW
      $password_hash = password_hash($password_string, PASSWORD_DEFAULT);
	  
     $check_query = 'select * from car_user where email = "'.$regEmail.'"';
     $res =  mysqli_query($conni, $check_query);
	 
     if (mysqli_num_rows($res) == 0) {
        // output data of each row
		
        $insert_query = 'INSERT INTO car_users (name,email,password)  VALUES ("'.$regName.'","'.$regEmail.'","'.$password_hash.'")';
       $insert_query_exec =  mysqli_query($conni, $insert_query);
	   
	        // if($insert_query_exec === FALSE){
					// die(mysqli_error($conni));
				// }
				// else{
					// echo 'success';
				// }
				
			echo 'success';	
				
     }else{
		 
		 echo 'invalid';	
	 }
	
	
}


	
	
?>