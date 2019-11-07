<?php


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
	/*
	if($_GET[action] == "update"){
     $id = $_GET['id'];
     echo $id;
}*/
	
	

$id=$_REQUEST['hdcaradid'];
$askingPrice = $_REQUEST['askingPrice'];
$adTitle = $_REQUEST['adTitle'];
$txtSubtitle = $_REQUEST['txtSubtitle'];
$OwnersQuantity = $_REQUEST['OwnersQuantity'];
$ServiceHistory = $_REQUEST['ServiceHistory'];
$MotDate = $_REQUEST['MotDate'];
//$txtdesc = str_replace("'"," ",$_REQUEST['txtdesc']);
$txtdesc = mysqli_real_escape_string($conni,$_REQUEST['txtdesc']);
$contactNumber1 = $_REQUEST['contactNumber1'];
$contactNumber2 = $_REQUEST['contactNumber2'];
$contactEmail = $_REQUEST['contactEmail'];
$postcode = $_REQUEST['postcode'];
$customer_id = $_REQUEST['customer_id'];

//echo $txtdesc;
//die();
if(isset($_REQUEST['hdcaradid']))
{
	
	$update = mysqli_query($conni,"update car_ad set price='$askingPrice',
													adtitle='$adTitle',
													adsubtitle='$txtSubtitle',
													ownersqty='$OwnersQuantity',
													servicehistoryid='$ServiceHistory',
													MOTduedate='$MotDate',
													adverttext='$txtdesc',
													contactnumber='$contactNumber1',
													contactsecondarynumber='$contactNumber2',
													buyercontactbyemailynid='$contactEmail',
													locationofcarpostalcode='$postcode',
													customer_id='$customer_id'
													where id ='$id'");	
					
			if($update === FALSE){
					die(mysqli_error($conni));
				}
				else{
					echo '<script>console.log('.die('updates success').');</script>';
				}	
				
		// $insert = mysqli_query($conni,"insert into car_ad_feature_ (carad_id,feature_id) values('.$id.','.$chekboxes.')");											
	          // if($insert === FALSE){
					// die(mysqli_error($conni));
				// }
			  
				
				
}
else
{
	
$txtCarNumber=mysqli_real_escape_string($conni,str_replace("{and}", "&", $_REQUEST['txtCarNumber']));
$txtMilage= mysqli_real_escape_string($conni,str_replace("{and}", "&", $_REQUEST['txtMilage']));
$cmbMake= $_REQUEST['cmbMake'];
$cmbModel= $_REQUEST['cmbModel'];
$cmbVariant= $_REQUEST['cmbVariant'];
$cmbTrim = $_REQUEST['cmbTrim'];
$cmbDerivative = $_REQUEST['cmbDerivative'];
$cmbBodyType = $_REQUEST['cmbBodyType'];
$cmbTransmission = $_REQUEST['cmbTransmission'];
$cmbFuelType = $_REQUEST['cmbFuelType'];
$cmbColour = $_REQUEST['cmbColour'];
$txtCarRegistrationDate = $_REQUEST['txtCarRegistrationDate'];
$type_id = $_REQUEST['type_id'];
$enginecc = $_REQUEST['enginecc'];
$newOrUsed = $_REQUEST['newOrUsed'];


$result = mysqli_query($conni,"INSERT INTO car_ad (
														carregistrationnumber,
														type_id,
														newOrUsed,
														car_makeid,
														car_modelid,
														car_variantid,
														car_trimid,
														car_derivativeid,
														car_bodytypeid,
														car_transmissionid,
														car_fueltypeid,
														car_colourid,
														enginecc,
														dateoffirstregistration,
														car_milage) 
														values(
														'$txtCarNumber',
														'$type_id',
														'$newOrUsed',
														'$cmbMake',
														'$cmbModel',
														'$cmbVariant',
														'$cmbTrim',
														'$cmbDerivative',
														'$cmbBodyType',
														'$cmbTransmission',
														'$cmbFuelType',
														'$cmbColour',
														'$enginecc',
														'$txtCarRegistrationDate',
														'$txtMilage')");

				if($result === FALSE){
					die(mysqli_error($conni));
				}
				else{
					$id = mysqli_insert_id($conni);
				}
					
	
	
}	


	
	
	
	
	
	
	
?>