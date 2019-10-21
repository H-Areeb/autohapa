<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	
	
	//$id=$_REQUEST['hdcaradid'];

//$imageOrdinal = json_decode($_REQUEST['imageOrdinal']);

	//in_array()
	
	
	
	
	
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');   //-------> valid extensions
$path = 'images/';      //-------> upload directory

// echo "<pre>";print_r($_FILES);
// die();

if(!empty($_POST['hdcaradids']) || $_FILES['uploadImage'])
{
	
	
	foreach($_FILES['uploadImage']['name'] as $key => $val)
	{
		
		$path = 'images/'; 
		
		$img = $_FILES['uploadImage']['name'][$key];
		
		
		$tmp = $_FILES['uploadImage']['tmp_name'][$key];

		$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		
		$final_image = rand(1000,1000000).$img;   //-------> can upload same image using rand function
				
				
				
				if(in_array($ext, $valid_extensions)) //------> check's valid format
				{ 
					$path = $path.strtolower($final_image); 
						$uploadfile=$path;
						
					
				// 		 $movefile = '../assets/images/'; 

			        	move_uploaded_file($tmp,'../assets/'.$uploadfile);
				// 	{
						$id = $_POST['hdcaradids'];
						
						
                        
						//--------> insert form data in the database
						$query = "INSERT INTO car_images (name,carad_id,ordinal) VALUES ('$uploadfile','$id','$key')";
						$insert = mysqli_query($conni, $query);
				// 	}
					
				// 	else
				// 	{echo 'invalid';}
				}
				
			$path = null;
			
	}
	
	if($insert === FALSE){die(mysqli_error($conni));}
						else{die('upload success!');}

}	
	
	
	
	
	
	

			
		  
		


	
	
	
	
	
	
	
?>