<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	

if(isset($_POST['action'])){
	
	
	if(isset($_POST["bodytype"]))
		 {
		  $bodytype =  implode("','",$_POST["bodytype"]);
		  $bodytypewhere = " AND car_ad.`car_bodytypeid` IN('".$bodytype."')";
		 }
		 else{
			 $bodytypewhere = '' ;
		 }
		
		if(isset($_POST["fueltype"]))
		 {
		  $fueltype =  implode("','",$_POST["fueltype"]);
		  $fueltypewhere = "AND car_ad.`car_fueltypeid` IN('".$fueltype."')";
		 }
		else{
			 $fueltypewhere = '' ;
		 }
		
		if(isset($_POST["colour"]))
		 {
		  $colour = implode("','",$_POST["colour"]);
		  $colourwhere = "AND car_ad.`car_colourid` IN('".$colour."')";
		 }	
		else{
			 $colourwhere = '' ;
		 }
		if(isset($_POST["transmission"]))
		 {
		  $transmission = implode("','",$_POST["transmission"]);
		  
		  $transmissionwhere = " AND car_ad.`car_transmissionid` IN('".$transmission."')";
		 } 	
		else{
			 $transmissionwhere = '' ;
		 }
	
	
		
$Query = 
"SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_ad.`adverttext` AS Detail ,   car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
 car_images.`name` AS image ,car_images.`ordinal`,
 car_derivative.`name` AS derivative , car_lkptfuel_type.`name` AS FuelType , 
 car_lkpttransmission.`name` AS Transmission , car_ad.`price` AS price , car_ad.`car_milage` AS milage 
 FROM car_ad
INNER JOIN car_lkptColour ON car_lkptColour.`id` = car_ad.`car_colourid`
INNER JOIN car_variant ON car_ad.`car_variantid` = car_variant.`id`
INNER JOIN car_derivative ON car_ad.`car_derivativeid` = car_derivative.`id`
INNER JOIN car_lkptfuel_type ON car_ad.`car_fueltypeid` = car_lkptfuel_type.`id`
INNER JOIN car_lkpttransmission ON car_ad.`car_transmissionid` = car_lkpttransmission.`id`
INNER JOIN car_images ON car_images.`carad_id` = car_ad.`id` AND car_images.`ordinal` = 0
 WHERE car_ad.`isadminapproved_id` = 1 $bodytypewhere  $fueltypewhere  $colourwhere  $transmissionwhere ORDER BY car_ad.`id` DESC";
// 		die($Query);
		
		
		
	$CarSearchQuery = mysqli_query($conni,$Query);
		
		$data_arr = array();
		
	while($data = mysqli_fetch_assoc($CarSearchQuery))
	{	

		$CarImageQuery = mysqli_query($conni,'Select id,name From car_images where carad_id = "'.$data['id'].'" and isadminApproved_ynid=1 and isdeleted_ynid=2  ;');
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
	
	

	
	
?>