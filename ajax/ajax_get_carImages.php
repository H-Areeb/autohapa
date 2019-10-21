<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	@$carad_id = $_REQUEST['carad_id'];
	
	$CarImageQuery = mysqli_query($conni,'Select id,name From car_images where carad_id = "'.$carad_id.'" and isadminApproved_ynid=1 and isdeleted_ynid=2  ;');
		
	$CarImageRowDataAll = array("Images"=>array());
	
	while($CarImagedata = mysqli_fetch_array($CarImageQuery))
	{		
		$CarImageRowDataAll["Images"][] = $CarImagedata;
	}
	
	echo json_encode($CarImageRowDataAll);	
	
?>