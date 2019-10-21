<?php



// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	@$make_id = $_REQUEST['makeid'];
	
	$CarModelQuery = mysqli_query($conni,'Select id,name From car_model where isactiveynid=1 and isdeletedynid=2 and car_makeid="'.$make_id.'" order by ordinal;');
		
	$CarModelRowDataAll = array("model"=>array());
	
	while($CarModeldata = mysqli_fetch_array($CarModelQuery))
	{		
		$CarModelRowDataAll["model"][] = $CarModeldata;
	}
	
	echo json_encode($CarModelRowDataAll);	
	
?>