<?php 

	include "../includes/config.php";
	
	$temparr = array();
	$Query = mysqli_query($conni,'SELECT * FROM car_package WHERE isActive_ynid=1 AND isdeleted_ynid=2  ORDER BY ordinal;');
		
	//$CarpackageRowDataAll = array("Packages"=>array());
	
	while($row= mysqli_fetch_assoc($Query))
	{		
		$car_package_id = $row['id'];
		

		$CarpackageQuery = mysqli_query($conni,"SELECT * FROM carpkg_features
											INNER JOIN carpkg_features_details ON carpkg_features_details.`pkg_features_id` = carpkg_features.`id`
											WHERE carpkg_features_details.`car_pkg_id` = $car_package_id ");
		
	//$CarpackageRowDataAll = array("Packages"=>array());
	$row['package_feature'] = array();
	while($Carpackagedata = mysqli_fetch_assoc($CarpackageQuery))
	{		
		
		$row['package_feature'][] = $Carpackagedata;
		
		//$temparr[] = $Carpackagedata;
	}
	
	$CarpackageRowDataAll[]=$row;
	
	//


// $sql = "SELECT carpkg_features.`name` AS feature_name , car_package.`name` AS package_name ,car_package.`adDisplayWeek` AS package_week,
  // car_package.`price` AS package_price FROM `carpkg_features`
  // LEFT OUTER JOIN carpkg_features_details ON carpkg_features.`id` = carpkg_features_details.`pkg_features_id` 
  
  // LEFT OUTER JOIN `car_package`
   // ON carpkg_features_details.`car_pkg_id`= car_package.`id`
   // WHERE `car_package`.`id` = $car_package_id";
			 
	// $result = $conni->query($sql);	
	
    // if($result->num_rows > 0 ){
		
		// while($row = $result->fetch_assoc()){
			
			// $package_name = $row['package_name'];
			// $feature_name = $row['feature_name'];
			// $package_price = $row['package_price'];
			// $package_week = $row['package_week'];
			
			
			
			// echo $package_name.' | | '.$feature_name .' | | '. $package_price.' | | '.$package_week . '<br/>';
			  
			
		// }
		
	// }


	
	}
	//$CarpackageRowDataAll["Packages"] = $temparr;
	
echo json_encode($CarpackageRowDataAll);	
	
	
	
	//@$make_id = $_REQUEST['makeid'];
	
		
	
?>