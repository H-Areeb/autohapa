<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	/*
	if($_GET[action] == "update"){
     $id = $_GET['id'];
     echo $id;
}*/
	
	

$id=$_REQUEST['hdcaradid'];

$options = json_decode($_REQUEST['options']);
//print_r($chekboxes);


if(isset($_REQUEST['hdcaradid']))
{
	
	foreach($options as $option){
		
		$insert = mysqli_query($conni,"insert into car_ad_feature_ (carad_id,feature_id) values('.$id.','.$option.')");											
	          if($insert === FALSE){
					die(mysqli_error($conni));
				}
		
	}	
				
}



	
	
	
	
	
	
	
?>