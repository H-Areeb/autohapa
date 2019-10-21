<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	
	
	// $query = "select * from car_images where =";
	// $result = mysqli_query($conni, $query);
	// while($row = mysqli_fetch_assoc($result))
	// {
		// $ad_id = $row['id'];
		// $car_colourid = $row['car_colourid'];
		// $car_milage = $row['car_milage'];
		// $car_variantid = $row['car_variantid'];
		// $car_transmissionid = $row['car_transmissionid'];
		// $car_fueltypeid = $row['car_fueltypeid'];
		// $car_derivativeid = $row['car_derivativeid'];
		// $adtitle = $row['adtitle'];
		// $price = $row['price'];
		
	// }
	
	
	
	
$CarAdQuery = mysqli_query($conni,
'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
 car_images.`name` AS image ,car_images.`ordinal`,
 car_derivative.`name` AS derivative , car_lkptfuel_type.`name` AS FuelType , 
 car_lkpttransmission.`name` AS Transmission , car_ad.`price` AS price , car_ad.`car_milage` AS milage 
 FROM car_ad
LEFT OUTER JOIN car_lkptColour ON car_lkptColour.`id` = car_ad.`car_colourid`
LEFT OUTER JOIN car_variant ON car_ad.`car_variantid` = car_variant.`id`
LEFT OUTER JOIN car_derivative ON car_ad.`car_derivativeid` = car_derivative.`id`
LEFT OUTER JOIN car_lkptfuel_type ON car_ad.`car_fueltypeid` = car_lkptfuel_type.`id`
LEFT OUTER JOIN car_lkpttransmission ON car_ad.`car_transmissionid` = car_lkpttransmission.`id`
LEFT OUTER JOIN car_images ON car_images.`carad_id` = car_ad.`id` AND car_images.`ordinal` = 0
where car_ad.`isadminapproved_id` = 1
 ORDER BY car_ad.`id` DESC LIMIT 4');
		//$data = mysqli_fetch_assoc($CarAdQuery);
		
		$data_arr = array();
		
	while($data = mysqli_fetch_assoc($CarAdQuery))
	{	
				$data_arr[] = $data;
	}
	
	echo(json_encode($data_arr));	
	
	
	
?>