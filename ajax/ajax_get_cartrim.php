<?php 


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	@$variant_id = $_REQUEST['variantid'];
	
	$CarTrimQuery = mysqli_query($conni,'Select id,name From car_trim where isactiveynid=1 and isdeletedynid=2 and car_variantid="'.$variant_id.'" order by ordinal;');

	$CarTrimRowDataAll = array("trim"=>array(),"derivative"=>array());

	while($CarTrimdata = mysqli_fetch_array($CarTrimQuery))
	{
		$CarTrimRowDataAll["trim"][] = $CarTrimdata;
	}
	
	$CarDerivativeQuery = mysqli_query($conni,'Select id,name From car_derivative where isactiveynid=1 and isdeletedynid=2 and car_variantid="'.$variant_id.'" order by ordinal;');

	while($CarDerivativedata = mysqli_fetch_array($CarDerivativeQuery))
	{
		$CarTrimRowDataAll["derivative"][] = $CarDerivativedata;
	}

	echo json_encode($CarTrimRowDataAll);

?>