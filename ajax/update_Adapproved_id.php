<?php


header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";

if(isset($_REQUEST['caradid']))
{
	
	$id=$_REQUEST['caradid'];
	$approved_id =$_REQUEST['approved_id'];
	
	
	
	
	$update = mysqli_query($conni,"update car_ad set isadminapproved_id='$approved_id' where id ='$id'");	
					
			if($update === FALSE){
			    //	echo 'not success';
					die(mysqli_error($conni));
				}
				else{
					echo 'approved success';
				}	
				
		// $insert = mysqli_query($conni,"insert into car_ad_feature_ (carad_id,feature_id) values('.$id.','.$chekboxes.')");											
	          // if($insert === FALSE){
					// die(mysqli_error($conni));
				// }
			  
				
				
}






















?>