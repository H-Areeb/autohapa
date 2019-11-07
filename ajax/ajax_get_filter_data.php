<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";


                                                ini_set('display_errors', 1);
                                                ini_set('display_startup_errors', 1);
                                                error_reporting(E_ALL);


	
	@$type_id = $_REQUEST['type_id'];
	

	
    if(isset($_REQUEST['getmake_id'])){
	
	  $getmake_id = $_REQUEST['getmake_id'];
	    
	    
        vehicle_makes($conni,$getmake_id,$type_id);
         
	}
	
	if(isset($_REQUEST['getmodel_id'])){
	
	  $getmodel_id = $_REQUEST['getmodel_id'];
	
	    
        vehicle_models($conni,$getmodel_id,$type_id);
        
	}
	
	
	if(isset($_REQUEST['getbodyType_id'])){
	
	  $getbodyType_id = $_REQUEST['getbodyType_id'];
	
	   
	    if($type_id == 1)
        {	
  
        	forCar_bodyType($conni,$getmake_id,$type_id);
        }
        else
        {
            forBike_bodyType($conni,$getmake_id,$type_id);
        } 
	    
	}
	
    
	
	if(isset($_REQUEST['Postcode']) || isset($_REQUEST['make']) || isset($_REQUEST['model']) ){
		
		@$type_id = $_REQUEST['type_id'];
		@$postcode= $_REQUEST['postcode'];
		@$make= $_REQUEST['make'];
		@$model= $_REQUEST['model'];
		@$MinPrice= $_REQUEST['MinPrice'];
		
	}

//$MaxPrice= $_REQUEST['MaxPrice'];	
	
if($type_id == 1)
{	
    
    
    
    //---------------- Query for searching car ---------------------------
    
    
    
    
$CarSearchQuery = mysqli_query($conni,
'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_ad.`adverttext` AS Detail , car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
 car_images.`name` AS image ,car_images.`ordinal`,
 car_derivative.`name` AS derivative , car_lkptfuel_type.`name` AS FuelType , 
 car_lkpttransmission.`name` AS Transmission , car_ad.`price` AS price , car_ad.`car_milage` AS milage ,car_ad.`isadminapproved_id` AS Approved
 FROM car_ad
INNER JOIN car_lkptColour ON car_lkptColour.`id` = car_ad.`car_colourid`
INNER JOIN car_variant ON car_ad.`car_variantid` = car_variant.`id`
INNER JOIN car_derivative ON car_ad.`car_derivativeid` = car_derivative.`id`
INNER JOIN car_lkptfuel_type ON car_ad.`car_fueltypeid` = car_lkptfuel_type.`id`
INNER JOIN car_lkpttransmission ON car_ad.`car_transmissionid` = car_lkpttransmission.`id`
INNER JOIN car_images ON car_images.`carad_id` = car_ad.`id` AND car_images.`ordinal` = 0
 WHERE  car_ad.`isadminapproved_id` = 1 AND car_ad.`type_id` = "'.@$type_id.'" AND  car_ad.`locationofcarpostalcode` LIKE "'.@$postcode.'" OR 
 car_ad.`car_makeid` LIKE "'.@$make.'" OR car_ad.`car_modelid` LIKE "'.@$model.'" 
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
            	
            	
          
   
          
     
          
          
          
            	
            	
	
}
else
{
     //---------------Query  for searching Bike ------------------------------
   
    
    
            $CarSearchQuery = mysqli_query($conni,
        'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , 
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
            WHERE car_ad.`type_id` = "'.@$type_id.'" AND car_ad.`locationofcarpostalcode` LIKE "'.@$postcode.'" OR 
            car_ad.`car_makeid` LIKE "'.@$make.'" OR car_ad.`car_modelid` LIKE "'.@$model.'" AND car_ad.`isadminapproved_id` = 1
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
            	
           	
}
	
	

       	

	
// 	function forBike_models($conni,$getmodel_id,$type_id){
		
        			
//         $CarSearchQuery = mysqli_query($conni,
//         'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , 
//         		car_ad.`adverttext` AS Detail ,   car_lkptColour.`name` AS color ,
//                  car_images.`name` AS image ,car_images.`ordinal`,
//                  car_ad.`price` AS price , car_ad.`car_milage` AS milage ,
//                  car_lkptbody_type.`name` AS bodyType,
//                  car_ad.`contactnumber` AS contact ,car_ad.`adsubtitle` AS subtitle , car_user.`name`AS sellerName
//                  FROM car_ad
//                 INNER JOIN car_lkptColour ON car_lkptColour.`id` = car_ad.`car_colourid`
//                 INNER JOIN car_lkptbody_type ON car_lkptbody_type.`id` = car_ad.`car_bodytypeid`
//                 INNER JOIN car_user ON car_ad.`customer_id` = car_user.`id`
//                 INNER JOIN car_images ON car_images.`carad_id` = car_ad.`id` AND car_images.`ordinal` = 0
//          WHERE car_ad.`type_id` = "'.$type_id.'" AND car_ad.`isadminapproved_id` = 1 AND car_ad.`car_modelid` = "'.$getmodel_id.'" 
//           ORDER BY car_ad.`id` DESC ');
		
		
// 		$data_arr = array();
		
// 	while($data = mysqli_fetch_assoc($CarSearchQuery))
// 	{	

// 		$CarImageQuery = mysqli_query($conni,'Select id,name From car_images where carad_id = "'.$data['id'].'" and isadminApproved_ynid=1 and isdeleted_ynid=2 ;');
// 		$CarImageDataAll = array();
// 		while($Imagedata = mysqli_fetch_assoc($CarImageQuery))
// 		{
// 			$CarImageDataAll[] = $Imagedata;
// 		}
			   
// 			   $data["Images"] = $CarImageDataAll;
//               $data_arr[] = $data;
				
// 	}
	
// 	 die(json_encode($data_arr));	
		
// 	//	echo(json_encode(array("data"=>$CarImageDataAll)));	
// 	}
	
// 	function forBike_bodyType($conni,$getbodyType_id,$type_id){
		
        			
//         $CarSearchQuery = mysqli_query($conni,
//         'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , 
//         		car_ad.`adverttext` AS Detail ,   car_lkptColour.`name` AS color ,
//                  car_images.`name` AS image ,car_images.`ordinal`,
//                  car_ad.`price` AS price , car_ad.`car_milage` AS milage ,
//                  car_lkptbody_type.`name` AS bodyType,
//                  car_ad.`contactnumber` AS contact ,car_ad.`adsubtitle` AS subtitle , car_user.`name`AS sellerName
//                  FROM car_ad
//                 INNER JOIN car_lkptColour ON car_lkptColour.`id` = car_ad.`car_colourid`
//                 INNER JOIN car_lkptbody_type ON car_lkptbody_type.`id` = car_ad.`car_bodytypeid`
//                 INNER JOIN car_user ON car_ad.`customer_id` = car_user.`id`
//                 INNER JOIN car_images ON car_images.`carad_id` = car_ad.`id` AND car_images.`ordinal` = 0
//          WHERE car_ad.`type_id` = "'.@$type_id.'" AND car_ad.`car_bodytypeid` = "'.$getbodyType_id.'"
//           ORDER BY car_ad.`id` DESC ');
		
		
// 		$data_arr = array();
		
// 	while($data = mysqli_fetch_assoc($CarSearchQuery))
// 	{	

// 		$CarImageQuery = mysqli_query($conni,'Select id,name From car_images where carad_id = "'.$data['id'].'" and isadminApproved_ynid=1 and isdeleted_ynid=2 ;');
// 		$CarImageDataAll = array();
// 		while($Imagedata = mysqli_fetch_assoc($CarImageQuery))
// 		{
// 			$CarImageDataAll[] = $Imagedata;
// 		}
			   
// 			   $data["Images"] = $CarImageDataAll;
//               $data_arr[] = $data;
				
// 	}
	
// 	 die(json_encode($data_arr));	
		
		
// 	}
            	
	
    //---------------------------------------------------------------------      	
	
	function vehicle_makes($conni,$getmake_id,$type_id){
		
		
		
		if($type_id == 1){
                        				
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
                             WHERE car_ad.`isadminapproved_id` = 1 AND car_ad.`car_makeid` = "'.$getmake_id.'" AND car_ad.`type_id` = "'.@$type_id.'"
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
        else{
        		
        			
                $CarSearchQuery = mysqli_query($conni,
                'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , 
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
                 WHERE car_ad.`type_id` = "'.$type_id.'" AND car_ad.`isadminapproved_id` = 1 AND car_ad.`car_makeid` = "'.$getmake_id.'" 
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
	    
	}
	
	
	
	//---------------------------------------------------------------------
	
	
	function vehicle_models($conni,$getmodel_id,$type_id){
		
        	
    if($type_id == 1)    	
    {    	
        			
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
             WHERE car_ad.`isadminapproved_id` = 1 AND car_ad.`car_modelid` = "'.$getmodel_id.'" AND car_ad.`type_id` = "'.@$type_id.'"
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
    else
    {
                $CarSearchQuery = mysqli_query($conni,
                'SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , 
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
                 WHERE car_ad.`type_id` = "'.$type_id.'" AND car_ad.`isadminapproved_id` = 1 AND car_ad.`car_modelid` = "'.$getmodel_id.'" 
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
            
    
	}
	
?>