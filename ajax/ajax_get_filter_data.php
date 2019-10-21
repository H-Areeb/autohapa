<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	
	
if(isset($_REQUEST['getmake_id'])){
	
	  $getmake_id = $_REQUEST['getmake_id'];
	
    	for_makes($conni,$getmake_id);


	}
	
	if(isset($_REQUEST['getmodel_id'])){
	
	  $getmodel_id = $_REQUEST['getmodel_id'];
	
	    for_models($conni,$getmodel_id);
	}
	
	
	if(isset($_REQUEST['getbodyType_id'])){
	
	  $getbodyType_id = $_REQUEST['getbodyType_id'];
	
	    for_bodyType($conni,$getbodyType_id);
	}
	
	
	
	if(isset($_REQUEST['postcode'])){
		
		@$postcode= $_REQUEST['postcode'];
		@$make= $_REQUEST['make'];
		@$model= $_REQUEST['model'];
		@$MinPrice= $_REQUEST['MinPrice'];
		
	}

//$MaxPrice= $_REQUEST['MaxPrice'];	
	
	
$CarSearchQuery = mysqli_query($conni,
'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_ad.`adverttext` AS Detail , car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
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
 WHERE car_ad.`isadminapproved_id` = 1 AND car_ad.`locationofcarpostalcode` = "'.@$postcode.'" 
 AND car_ad.`car_makeid` = "'.@$make.'" AND car_ad.`car_modelid` = "'.@$model.'"
  ORDER BY car_ad.`id` DESC ');
  
		//$data = mysqli_fetch_assoc($CarAdQuery);
		
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
	
	
	
	
	function for_makes($conni,$getmake_id){
		
			
$CarSearchQuery = mysqli_query($conni,
'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_ad.`adverttext` AS Detail ,   car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
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
 WHERE car_ad.`isadminapproved_id` = 1 AND car_ad.`car_makeid` = "'.$getmake_id.'" 
  ORDER BY car_ad.`id` DESC ');
		
		
		$data_arr = array();
		
	while($data = mysqli_fetch_assoc($CarSearchQuery))
	{	

		$CarImageQuery = mysqli_query($conni,'Select id,name From car_images where carad_id = "'.$data['id'].'" and isadminApproved_ynid=1 and isdeleted_ynid=2 ;');
		$CarImageDataAll = array();
		while($Imagedata = mysqli_fetch_assoc($CarImageQuery))
		{
			$CarImageDataAll[] = $Imagedata;
		}
			   
			   $data["Images"] = $CarImageDataAll;
               $data_arr[] = $data;
				
	}
            //	return $data_arr;

	die(json_encode($data_arr));	
		
		//echo(json_encode(array("data"=>$CarImageDataAll)));	
	}
	
	function for_models($conni,$getmodel_id){
		
			
$CarSearchQuery = mysqli_query($conni,
'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_ad.`adverttext` AS Detail , car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
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
 WHERE car_ad.`isadminapproved_id` = 1 AND car_ad.`car_modelid` = "'.$getmodel_id.'" 
  ORDER BY car_ad.`id` DESC ');
		
		
		$data_arr = array();
		
	while($data = mysqli_fetch_assoc($CarSearchQuery))
	{	

		$CarImageQuery = mysqli_query($conni,'Select id,name From car_images where carad_id = "'.$data['id'].'" and isadminApproved_ynid=1 and isdeleted_ynid=2 ;');
		$CarImageDataAll = array();
		while($Imagedata = mysqli_fetch_assoc($CarImageQuery))
		{
			$CarImageDataAll[] = $Imagedata;
		}
			   
			   $data["Images"] = $CarImageDataAll;
               $data_arr[] = $data;
				
	}
	
	 die(json_encode($data_arr));	
		
	//	echo(json_encode(array("data"=>$CarImageDataAll)));	
	}
	
	function for_bodyType($conni,$getbodyType_id){
		
			
$CarSearchQuery = mysqli_query($conni,
'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_ad.`adverttext` AS Detail , car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
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
 WHERE car_ad.`car_bodytypeid` = "'.$getbodyType_id.'" 
  ORDER BY car_ad.`id` DESC ');
		
		
		$data_arr = array();
		
	while($data = mysqli_fetch_assoc($CarSearchQuery))
	{	

		$CarImageQuery = mysqli_query($conni,'Select id,name From car_images where carad_id = "'.$data['id'].'" and isadminApproved_ynid=1 and isdeleted_ynid=2 ;');
		$CarImageDataAll = array();
		while($Imagedata = mysqli_fetch_assoc($CarImageQuery))
		{
			$CarImageDataAll[] = $Imagedata;
		}
			   
			   $data["Images"] = $CarImageDataAll;
               $data_arr[] = $data;
				
	}
	
	 die(json_encode($data_arr));	
		
		
	}
	
	
?>