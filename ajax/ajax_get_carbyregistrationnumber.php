<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	@$carregistrationnumber = $_REQUEST['carregnum'];
//	@$carregistrationnumber = '87544131';
$CarModelQuery = mysqli_query($conni,
'SELECT car_ad.`id` As id ,car_model.`name` AS model,car_make.`name`  AS make,
car_derivative.`name` AS derivative , car_ad.`price` AS price, car_user.`email` AS email
 FROM car_ad
LEFT OUTER JOIN car_model ON car_model.`id` = car_ad.`car_modelid`
LEFT OUTER JOIN car_make ON car_ad.`car_makeid` = car_make.`id`
LEFT OUTER JOIN car_derivative ON car_ad.`car_derivativeid` = car_derivative.`id`
LEFT OUTER JOIN car_user ON car_ad.`customer_id` = car_user.`id`
WHERE car_ad.`carregistrationnumber` ="'.$carregistrationnumber.'" ;');
		$data = mysqli_fetch_array($CarModelQuery);
		
	echo json_encode(array("data"=>$data));	
	
	// $CarModelRowDataAll = array("carad"=>array());
	
	// while($CarModeldata = mysql_fetch_array($CarModelQuery))
	// {		
		// $CarModelRowDataAll["model"][] = $CarModeldata;
	// }
	
	// echo json_encode($CarModelRowDataAll);	
	
	
	
	
?>