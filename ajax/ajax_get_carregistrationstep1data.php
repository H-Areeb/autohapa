<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	
	
	$CarMakeQuery = mysqli_query($conni,'Select id,name From car_make where isactiveynid=1 and isdeletedynid=2 order by ordinal;');
		
	$CarMakeRowDataAll = array("make"=>array(), "bodytype"=>array(), "MinPrice"=>array(), "MaxPrice"=>array(), "transmission"=>array(),"fueltype"=>array(),"colour"=>array());
	
	while($CarMakedata = mysqli_fetch_array($CarMakeQuery))
	{		
		$CarMakeRowDataAll["make"][] = $CarMakedata;
	}
		
	$CarBodyTypequery = mysqli_query($conni,'Select id,name From car_lkptbody_type where isactiveynid=1 and isdeletedynid=2 order by ordinal;');
		
	while($CarBodyTypedata = mysqli_fetch_array($CarBodyTypequery))
	{		
		$CarMakeRowDataAll["bodytype"][] = $CarBodyTypedata;
	}
	
	$CarMinPricequery = mysqli_query($conni,'SELECT price AS MinPrice FROM car_ad ORDER BY price ASC LIMIT 10 ;');
		
	while($CarMinPricedata = mysqli_fetch_array($CarMinPricequery))
	{		
		$CarMakeRowDataAll["MinPrice"][] = $CarMinPricedata;
	}
	
	$CarMaxPricequery = mysqli_query($conni,'SELECT price AS MaxPrice FROM car_ad ORDER BY price DESC LIMIT 10 ;');
		
	while($CarMaxPricedata = mysqli_fetch_array($CarMaxPricequery))
	{		
		$CarMakeRowDataAll["MaxPrice"][] = $CarMaxPricedata;
	}
	
				
	$CarTransmissionquery = mysqli_query($conni,'Select id,name From car_lkpttransmission where isactiveynid=1 and isdeletedynid=2 order by ordinal;');
			
	while($CarTransmissiondata = mysqli_fetch_array($CarTransmissionquery))
	{		
		$CarMakeRowDataAll["transmission"][] = $CarTransmissiondata;
	}
	
	$CarFuelTypequery = mysqli_query($conni,'Select id,name From car_lkptfuel_type where isactiveynid=1 and isdeletedynid=2 order by ordinal;');
			
	while($CarFuelTypedata = mysqli_fetch_array($CarFuelTypequery))
	{	
		$CarMakeRowDataAll["fueltype"][] = $CarFuelTypedata;
	}
			
	$CarColourquery = mysqli_query($conni,'Select id,name From car_lkptColour where isactiveynid=1 and isdeletedynid=2 order by ordinal;');
			
	while($CarColourdata = mysqli_fetch_array($CarColourquery))
	{	
		$CarMakeRowDataAll["colour"][] = $CarColourdata;
	}

	echo json_encode($CarMakeRowDataAll);
?>