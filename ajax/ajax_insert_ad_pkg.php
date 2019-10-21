<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	

	

$carad_id =$_REQUEST['carad_id'];
$pkg_id =$_REQUEST['pkgSelected_id'];

//$options = json_decode($_REQUEST['options']);
//print_r($chekboxes);


if(isset($_REQUEST['carad_id']))
{
	
	$insert = mysqli_query($conni,"insert into car_ad_pkg (car_ad_id,car_pkg_id) values('.$carad_id.','.$pkg_id.')");											
	          
	  if($insert === FALSE){
		die(mysqli_error($conni));
	}
		
		
				
}



	
	
	
	
	
	
	
?>