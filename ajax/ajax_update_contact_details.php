<?php header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	/*
	if($_GET[action] == "update"){
     $id = $_GET['id'];
     echo $id;
}*/
	
	

$id=$_REQUEST['hdcaradid'];
// $askingPrice = $_REQUEST['askingPrice'];
// $adTitle = $_REQUEST['adTitle'];
// $txtSubtitle = $_REQUEST['txtSubtitle'];
// $OwnersQuantity = $_REQUEST['OwnersQuantity'];
// $ServiceHistory = $_REQUEST['ServiceHistory'];
// $MotDate = $_REQUEST['MotDate'];
// $txtdesc = $_REQUEST['txtdesc'];
$contactNumber1 = $_REQUEST['contactNumber1'];
$contactNumber2 = $_REQUEST['contactNumber2'];
$contactEmail = $_REQUEST['contactEmail'];
$postcode = $_REQUEST['postcode'];
//$chekboxes = $_REQUEST['checkboxes'];

if(isset($_REQUEST['hdcaradid']))
{
	
	$update = mysqli_query($conni,"update car_ad set contactnumber='$contactNumber1',
													contactsecondarynumber='$contactNumber2',
													buyercontactbyemailynid='$contactEmail',
													locationofcarpostalcode='$postcode'
													where id ='$id'");	
					
			if($update === FALSE){
					die(mysqli_error($conni));
				}
				else{
					echo '<script>console.log('.die('updates contact deatils  success').');</script>';
				}	
				
		
				
				
}
// else
// {
	
// $txtCarNumber=mysql_real_escape_string(str_replace("{and}", "&", $_REQUEST['txtCarNumber']));
// $txtMilage= mysql_real_escape_string(str_replace("{and}", "&", $_REQUEST['txtMilage']));
// $cmbMake= $_REQUEST['cmbMake'];
// $cmbModel= $_REQUEST['cmbModel'];
// $cmbVariant= $_REQUEST['cmbVariant'];
// $cmbTrim = $_REQUEST['cmbTrim'];
// $cmbDerivative = $_REQUEST['cmbDerivative'];
// $cmbBodyType = $_REQUEST['cmbBodyType'];
// $cmbTransmission = $_REQUEST['cmbTransmission'];
// $cmbFuelType = $_REQUEST['cmbFuelType'];
// $cmbColour = $_REQUEST['cmbColour'];
// $txtCarRegistrationDate = $_REQUEST['txtCarRegistrationDate'];


// $result = mysqli_query($conni,"INSERT INTO car_ad (
														// carregistrationnumber,
														// car_makeid,
														// car_modelid,
														// car_variantid,
														// car_trimid,
														// car_derivativeid,
														// car_bodytypeid,
														// car_transmissionid,
														// car_fueltypeid,
														// car_colourid,
														// dateoffirstregistration,
														// car_milage) 
														// values(
														// '$txtCarNumber',
														// '$cmbMake',
														// '$cmbModel',
														// '$cmbVariant',
														// '$cmbTrim',
														// '$cmbDerivative',
														// '$cmbBodyType',
														// '$cmbTransmission',
														// '$cmbFuelType',
														// '$cmbColour',
														// '$txtCarRegistrationDate',
														// '$txtMilage')");

				// if($result === FALSE){
					// die(mysqli_error($conni));
				// }
				// else{
					// $id = mysqli_insert_id($conni);
				// }
					
	
	
// }	


	
	
	
	
	
	
	
?>