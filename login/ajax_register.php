<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	


if(isset($_POST['RegEmail'])){    

		$regEmail = $_POST['RegEmail'];
		$regName = $_POST['RegName'];
      $regPass = $_POST['RegPwd'];
       $token  = $_POST['token'];
       
       
       
       
       $url = "https://www.google.com/recaptcha/api/siteverify";
       
       $data = [
           'secret' => "6Ldb5b0UAAAAAJfaFQipFN6Vwq2oLQvHd4DnrhBp",
           'response' => $_POST['token'],
           'remoteip' => $_SERVER['REMOTE_ADDR']
           ];
      
            $options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );
	   
	   
	   
	   $context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);
	   
	   
	   
	  
	  $result = json_decode($response, true);
	  
	  
if($result['success'] == true)
{
    
    	   $password_string = mysqli_real_escape_string($conni,$regPass);
           $password_hash = password_hash($password_string, PASSWORD_DEFAULT);
	  
             $check_query = 'select * from car_user where email = "'.$regEmail.'"';
             $res =  mysqli_query($conni, $check_query);
	 
     if (mysqli_num_rows($res) == 0) {
        
		
             $insert_query = 'INSERT INTO car_user (name,email,password)  VALUES ("'.$regName.'","'.$regEmail.'","'.$password_hash.'")';
             $insert_query_exec =  mysqli_query($conni, $insert_query);
	   
	   
        	        if($insert_query_exec === FALSE)
        	        {
        				     
        					die(mysqli_error($conni));
        			}
        			else{
				                         $check_query = 'select * from car_user where email = "'.$regEmail.'"';
                                         $res =  mysqli_query($conni, $check_query);
                                    
                                            if (mysqli_num_rows($res) == 0)
                                                {
                                                // output data of each row
                                                echo json_encode(array("status"=>"invalid"));
                                             }  
                                        	else
                                        	    {
                                        		
                                        		    $row = mysqli_fetch_assoc($res);
                                        		    $id=	$row['id'];
                                        			
                                        		
                                        		echo json_encode(array("status"=>"success","id"=>$id));
                                        	 } 
				    }
				
			//echo 'success';	
				
     }else{
		 
		  echo json_encode(array("status"=>"exists"));
		 
	 }
    
}	  
else
{
   
    echo json_encode(array("status"=>"recapchaError"));
    
}	   
	   
	   
	   
// 	   $password_string = mysqli_real_escape_string($conni,$regPass);
//       $password_hash = password_hash($password_string, PASSWORD_DEFAULT);
	  
//      $check_query = 'select * from car_user where email = "'.$regEmail.'"';
//      $res =  mysqli_query($conni, $check_query);
	 
//      if (mysqli_num_rows($res) == 0) {
//         // output data of each row
		
//         $insert_query = 'INSERT INTO car_user (name,email,password)  VALUES ("'.$regName.'","'.$regEmail.'","'.$password_hash.'")';
//       $insert_query_exec =  mysqli_query($conni, $insert_query);
	   
	   
// 	        if($insert_query_exec === FALSE){
				     
// 					die(mysqli_error($conni));
// 				}
// 				else{
// 				                         $check_query = 'select * from car_user where email = "'.$regEmail.'"';
//                                          $res =  mysqli_query($conni, $check_query);
//                                     if (mysqli_num_rows($res) == 0) {
//                                             // output data of each row
//                                             echo json_encode(array("status"=>"invalid"));
//                                          }  
//                                     	else{
//                                     		$row = mysqli_fetch_assoc($res);
                                    		
//                                     		   $id=	$row['id'];
                                    			
                                    		
//                                     		echo json_encode(array("status"=>"success","id"=>$id));
//                                     	} 
				    
				    
					
// 				}
				
// 			//echo 'success';	
				
//      }else{
		 
// 		  echo json_encode(array("status"=>"invalid2"));
		 
// 	 }
	
	
}


	
	
?>