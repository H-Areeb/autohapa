<?php
      include_once("../includes/config.php");
      // include_once("../includes/Auth.php");
      include_once('../includes/header.php');
    
     $http_referer = @$_SERVER['HTTP_REFERER'];
     if(isset($_GET["vtype"])){
      
      $type_id = $_GET["vtype"];
         
     }
   



   if($type_id == 1 )
	{ 
	    $type_id = 1; // type = Car
     
        include_once('for_car.php');
    
	}
	else if($type_id == 2)
	{
	    
        $type_id = 2; // type = Bikes
        
        include_once('for_bikes.php');
	    

    }
    else if($type_id == 3)
    {
        $type_id = 3; // type = Bikes
        
        include_once('for_vans.php');
    }
    else if($type_id == 4)
    {
        $type_id = 4; // type = Bikes
        
        include_once('for_motorhomes.php');
    }
    ?>
    






	<script src="sellingPageScript.js"></script>
	
	<?php include_once('../includes/footer.php'); ?>
	