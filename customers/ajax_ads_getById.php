<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	
	
	
	if(isset($_GET['user_id']))
	{
	       $customer_id = $_GET['user_id'];
	       
		    $query = mysqli_query($conni,'select * from account_info where user_id ="'.$customer_id.'" limit 1');
		    
		    $user_data = mysqli_fetch_assoc($query);
		  
		    echo json_encode(array("data"=>$user_data));	
	}
	
	
	
	
	
		
	if(isset($_REQUEST['idcustomer'])){
		
		$idcustomer= $_REQUEST['idcustomer'];
		
	    $CarSearchQuery = mysqli_query($conni,
                'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_ad.`adverttext` AS Detail , car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
                 car_images.`name` AS image ,car_images.`ordinal`,
                 car_derivative.`name` AS derivative , car_lkptfuel_type.`name` AS FuelType , 
                 car_lkpttransmission.`name` AS Transmission , car_ad.`price` AS price , car_ad.`car_milage` AS milage , car_ad.`isadminapproved_id` AS approved , car_ad.`isdeleteyn_id` AS rejected
                 FROM car_ad
                INNER JOIN car_lkptColour ON car_lkptColour.`id` = car_ad.`car_colourid`
                INNER JOIN car_variant ON car_ad.`car_variantid` = car_variant.`id`
                INNER JOIN car_derivative ON car_ad.`car_derivativeid` = car_derivative.`id`
                INNER JOIN car_lkptfuel_type ON car_ad.`car_fueltypeid` = car_lkptfuel_type.`id`
                INNER JOIN car_lkpttransmission ON car_ad.`car_transmissionid` = car_lkpttransmission.`id`
                INNER JOIN car_images ON car_images.`carad_id` = car_ad.`id` AND car_images.`ordinal` = 0
                 WHERE  car_ad.`customer_id` = "'.$idcustomer.'" 
                  ORDER BY car_ad.`id` DESC ');
                  
                  
                		$data_arr = array();
                		
                	while($data = mysqli_fetch_assoc($CarSearchQuery))
                	{	
                
                		$CarImageQuery = mysqli_query($conni,'Select id,name From car_images where carad_id = "'.$data['id'].'"  and isdeleted_ynid=2  ;');
                		$CarImageDataAll = array();
                		while($Imagedata = mysqli_fetch_assoc($CarImageQuery))
                		{
                			$CarImageDataAll[] = $Imagedata;
                		}
                			   
                			   $data["Images"] = $CarImageDataAll;
                               $data_arr[] = $data;
                				
                	}
                	
                            	echo(json_encode($data_arr));	
	       }	
	       
	       
	       


if(isset($_REQUEST['firstName']))
{
	
	
	$companyName=$_REQUEST['companyName'];	       
    $firstName=$_REQUEST['firstName'];	       
    $lastName=$_REQUEST['lastName'];
    $phone = $_REQUEST['phone'];
    $website = $_REQUEST['website'];
    $country = $_REQUEST['country'];
    $city = $_REQUEST['city'];
    $address = $_REQUEST['address'];
    $zipCode = $_REQUEST['zipCode'];
    $about = mysqli_real_escape_string($conni,$_REQUEST['about']);
     $customer_id = $_REQUEST['customer_id'];
	
	
	
	
	                 $update = mysqli_query($conni,"update account_info set 
	                                                companyName='$companyName',
													firstName='$firstName',
													lastName='$lastName',
													phone='$phone',
													website='$website',
													country='$country',
													city='$city',
													address='$address',
													zipCode='$zipCode',
													about='$about'
													where user_id ='$customer_id'");	
					
			if($update === FALSE){
					die(mysqli_error($conni));
				}
				else{
    
                	echo json_encode(array("status"=>"success"));
				    
				
				}	
				
		
				
				
}   
	  
	  
	  //------------------- for update image ---------------------------------------------------
	  
	  
	  if(isset($_POST['img_user_id']) && !empty($_POST['img_user_id'] && isset($_FILES['c_image']) ))
	  {
	        $img_user = $_POST['img_user_id'];
	        $c_image= $_FILES['c_image']['name'];
            $c_image_temp=$_FILES['c_image']['tmp_name'];
           
           
           $query = mysqli_query($conni,'select * from account_info where user_id ="'.$img_user.'" limit 1');
		    
		    $row = mysqli_fetch_assoc($query);
		     $pic =   $row['pic'];
            $filename = '../assets/'.$pic;
            
            if (file_exists($filename)) {
                     unlink($filename); //-------------> for delete file from directory
       
               
                               $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');   //-------> valid extensions
                                $path = 'images/customers';      //-------> upload directory
                        
                        
                                $ext = strtolower(pathinfo($c_image, PATHINFO_EXTENSION));
            		      //  $final_image = rand(1000,1000000).$c_image;   //-------> can upload same image using rand function
            				
            				
            				
            				if(in_array($ext, $valid_extensions)) //------> check's valid format
            				{ 
            					$path = $path.strtolower($c_image); 
            					$uploadfile = $path;
            				
                                move_uploaded_file($c_image_temp,'../assets/'.$uploadfile);
                                $c_update="update account_info set pic = '$uploadfile' where user_id ='$img_user'"; 
                                $run_update = mysqli_query($conni, $c_update);
                                
                                echo 'success';
            				    }
				        
            }else
            {
                echo 'not deleted';
            }
            //die();
           
            
             
	  }
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  //------------------- for reset Password ----------------------------------------------------
	  
	       //if(isset($_POST["reset-password"])){

// AND isset($_GET['token']) && !empty($_GET['token'])
if(isset($_REQUEST['email']) && !empty($_REQUEST['email'])){
    // Verify data
    $email = $_REQUEST['email']; // Set email variable
        $current_password =  mysqli_real_escape_string($conni,$_REQUEST['current_password']);
      $newPassword = mysqli_real_escape_string($conni,$_REQUEST['newPassword']); 
      
      
    $search = mysqli_query($conni,"SELECT *  FROM car_user WHERE email='".$email."'   AND isActive_ynid='1'") or die(mysqli_error($conni)); 
    $match  = mysqli_num_rows($search);
           
        //   echo'<h1>'.$match.'</h1>';
                 
    if($match > 0){
        // We have a match, update the password
        
        
                 $row = mysqli_fetch_assoc($search);
		
		      //   $id=	$row['id'];
			
				if(password_verify($current_password, $row["password"]))  
				 {  
					  $password_string = mysqli_real_escape_string($conni,$newPassword);
                        $password_hash = password_hash($password_string, PASSWORD_DEFAULT);
        
                    mysqli_query($conni,"UPDATE car_user SET password='".$password_hash."' WHERE email='".$email."'  AND isActive_ynid='1'") or die(mysqli_error($conni));
    
      
					 echo json_encode(array("status"=>"success"));
				 }  
				 else  
				 {  
					  //return fals;  
					 echo json_encode(array("status"=>"invalid"));
				 }  
        
    }
    //  else
    //  {
    //       echo  ' invalid or user Email Not matched!.';
    //  }  

}
// else
// {
//   echo 'notMatched';
// }


	       
	       
	
	?>