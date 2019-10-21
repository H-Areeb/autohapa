<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	
//$email= '';

if(isset($_REQUEST['user_email'] )){  
     
  $email = $_REQUEST['user_email'];	 
  $password =  mysqli_real_escape_string($conni,$_REQUEST['user_pwd']);
  
  
     $check_query = 'select * from car_user where email = "'.$email.'"';
     $res =  mysqli_query($conni, $check_query);
	 
     if (mysqli_num_rows($res) == 0) {
        // output data of each row
        echo json_encode(array("status"=>"invalid"));
     }  
	else{
		        $row = mysqli_fetch_assoc($res);
		
		         $id=	$row['id'];
			
				if(password_verify($password, $row["password"]))  
				 {  
					  
					 echo json_encode(array("status"=>"success","id"=>$id));
				 }  
				 else  
				 {  
					  //return false;  
					 echo json_encode(array("status"=>"invalid"));
				 }  
	}
}



//------- for checking password if it available

// 	if(isset($_REQUEST['user_pwd'])){    
        
		

//     $user_id = $_REQUEST['user_id'];


//      $check_query = 'select * from car_user where id = "'.$user_id.'"';
//      $res =  mysqli_query($conni, $check_query);
	  
//      if (mysqli_num_rows($res) == 0) {
//         // output data of each row
//         echo json_encode(array("status"=>"invalidsss"));
//      }  
// 	else{
		
// 		$row = mysqli_fetch_assoc($res);
		
		   
// 				if(password_verify($password, $row["password"]))  
// 				 {  
// 					  //return true;  
// 					  //$_SESSION["username"] = $username;  
// 					  echo json_encode(array("status"=>"success"));
// 				 }  
// 				 else  
// 				 {  
// 					  //return false;  
// 					 echo json_encode(array("status"=>"invalid"));
// 				 }  
	   
		
		
// 	}
	
// }




	
	
?>