<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	//@$make_id = $_REQUEST['makeid'];
	
	$CarFeatureQuery = mysqli_query($conni,'Select id,name,controltypeid From car_feature where isactiveynid=1 and isdeletedynid=2 ;');
		
	$CarFeatureRowDataAll = array("Features"=>array());
	
	while($CarFeaturedata = mysqli_fetch_array($CarFeatureQuery))
	{		
		$CarFeatureRowDataAll["Features"][] = $CarFeaturedata;
	}
	
	echo json_encode($CarFeatureRowDataAll);	
	
?>