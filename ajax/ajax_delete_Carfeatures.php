<?php header("Cache-Control: no-cache, must-revalidate");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include "../includes/config.php";

/*
	if($_GET[action] == "update"){
     $id = $_GET['id'];
     echo $id;
}*/



$id = $_REQUEST['hdcaradid'];

//$chekboxes = json_decode($_REQUEST['checkboxes']);
//print_r($chekboxes);
if (isset($_REQUEST['hdcaradid'])) {

      //foreach($chekboxes as $checkbox){

      $delete = mysqli_query($conni, "Delete from car_ad_feature_ where carad_id = '$id'");
      if ($delete === FALSE) {
            die(mysqli_error($conni));
      } else {
            echo '<script>console.log(' . die('delewte success') . ');</script>';
      }

      //}	

}
