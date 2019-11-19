<?php 

	include "../includes/config.php";
	
	@$type_id = $_REQUEST['type_id'];

if(isset($_POST['action'])){
	
	
// 	if(isset($_POST["make_id"]))
// 		 {
// 		  $make =  implode("','",$_POST["make_id"]);
// 		  $makewhere = " AND car_ad.`car_makeid` IN('".$make."')";
// 		 }
// 		 else{
// 			 $makewhere = '' ;
// 		 }
		 
// 		 if(isset($_POST["model_id"]))
// 		 {
// 		  $model =  implode("','",$_POST["model_id"]);
// 		  $modelwhere = " AND car_ad.`car_modelid` IN('".$model."')";
// 		 }
// 		 else{
// 			 $modelwhere = '' ;
// 		 }
	
	
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
	
	
if($type_id == 1)
{	
        // ------------------ Query for Car -----------------------------------
		
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
         WHERE car_ad.`type_id` = $type_id AND car_ad.`isadminapproved_id` = 1  $bodytypewhere  $fueltypewhere  $colourwhere  $transmissionwhere ORDER BY car_ad.`id` DESC";
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
else
{
     
     // ------------------ Query for bike -----------------------------------
    
    
    
            $Query = 
            "SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , 
            		car_ad.`adverttext` AS Detail ,   car_lkptColour.`name` AS color ,
                     car_images.`name` AS image ,car_images.`ordinal`,
                     car_ad.`price` AS price , car_ad.`car_milage` AS milage ,
                     car_lkptbody_type.`name` AS bodyType,
                     car_ad.`contactnumber` AS contact ,car_ad.`adsubtitle` AS subtitle , car_user.`name`AS sellerName
                     FROM car_ad
                    INNER JOIN car_lkptColour ON car_lkptColour.`id` = car_ad.`car_colourid`
                    INNER JOIN car_lkptbody_type ON car_lkptbody_type.`id` = car_ad.`car_bodytypeid`
                    INNER JOIN car_user ON car_ad.`customer_id` = car_user.`id`
                    INNER JOIN car_images ON car_images.`carad_id` = car_ad.`id` AND car_images.`ordinal` = 0
             WHERE car_ad.`type_id` = $type_id AND car_ad.`isadminapproved_id` = 1 $bodytypewhere    $colourwhere   ORDER BY car_ad.`id` DESC";
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




	
}

	
	
?>