<?php 

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	@$model_id = $_REQUEST['modelid'];
	
	$CarVariantQuery = mysqli_query($conni,'Select id,name From car_variant where isactiveynid=1 and isdeletedynid=2 and car_modelid="'.$model_id.'" order by ordinal;');

	$CarVariantRowDataAll = array("variant"=>array());

	while($CarVariantdata = mysqli_fetch_array($CarVariantQuery))
	{
		$CarVariantRowDataAll["variant"][] = $CarVariantdata;
	}

	echo json_encode($CarVariantRowDataAll);

?>