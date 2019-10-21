<?php 
//session_start();
header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");	
	
	
	include_once('../includes/header.php'); 
	
	include_once("../includes/config.php");
	
	
	
	if(!isset($_SESSION['customer_id']) && !isset($_SESSION['customer_id2']) ){
	
	header("location: ../login/");
}
	
	
	
	
	
	?>

	<style>
		html, body {font-size: 14px;}
		.steps_wrapper {
			position: relative;
			height: 30px;
		}
		.steps_wrapper:before, .steps_wrapper:after {
			position: absolute;
			top: 14px;
			content: "";
			border-top: 1px solid #e8e8e3;
			width: 50%;
		}
		.steps_wrapper:before {left: 0;}
		.steps_wrapper:after {right: 0;}

		.steps_wrapper div {
			position: absolute;
			display: inline-block;
			background: #fff;
			line-height: 29px;
			padding-right: 16px;
			z-index: 1;
		}
		.steps_wrapper div:nth-child(2) {
			left: 50%;
			padding-left: 16px;
			margin-left: -90px;
		}
		.steps_wrapper div:nth-child(3) {
			right: 0;
			padding-left: 16px;
			padding-right: 0;
		}
		.steps_wrapper div:before {
			content: attr(data-step);
			float: left;
			background: #fff;
			border-radius: 50%;
			border: 2px solid #154a96;
			color: #154a96;
			text-align: center;
			margin-right: 10px;
			width: 30px;
			height: 30px;
			line-height: 26px;
			font-weight: bold;
		}
		.steps_wrapper[data-current='1'] div:nth-child(1):before {
			color: #56b847;
			border-color: #56b847;
		}
		.page-header__number {
			background: #fff;
			border: 2px solid #56b847;
			color: #56b847;
			margin-right: 5px;
			display: inline-block;
			border-radius: 50%;
			text-align: center;
			width: 30px;
			height: 30px;
			line-height: 26px;
			font-weight: bold;
		}
		.page-header__title {
			display: inline;
			color: #154a96;
			font-size: 20px;
			font-weight: bold;
		}
		
		.col-form-label {font-weight: bold;text-align: right;}
		
		.invalid-feedback{
			display:inline-block!important;
			
		}
	</style>
	
	<hr />
	<?php
	if(isset($_REQUEST['pkgSelected_id'])){
		
		 $pkgSelected_id = $_REQUEST['pkgSelected_id'];
	}

	if(isset($_REQUEST['pkgSelected_week'])){
		
		 $pkgSelected_week = $_REQUEST['pkgSelected_week'];
		 
		 if($pkgSelected_week == 100){
				$pkgSelected_week = "<b><span style='color: #56b847;'>Advertised until sold </span><br/></b><span style='font-size:14px; '>free to rebook</span>";
		}else{
			$pkgSelected_week = $pkgSelected_week." week"; 
		}
		 
	}
	if(isset($_REQUEST['pkgSelected_price'])){
		
		 $pkgSelected_price = $_REQUEST['pkgSelected_price'];
	}
	

	    $query = "select car_ad.id AS id , car_ad.contactnumber AS number , car_ad.locationofcarpostalcode AS postcode, car_user.name AS customer_name from car_ad
                  LEFT OUTER JOIN  car_user ON car_user.id = car_ad.customer_id
				  where customer_id = ".$customer_id;
				  
		  $result = mysqli_query($conni,$query);
		  while($row = mysqli_fetch_assoc($result))
		  {   
				$carad_id = $row['id'];
				$contact_num = $row['number'];
				$postcode = $row['postcode'];
				$customer_name = $row['customer_name'];
				  
		  }
	
	
	
	?>
	<input type="hidden" id="hcarad_id" name="hcarad_id" value="<?php echo $carad_id; ?>" />
	<input type="hidden" id="hpkg_id" name="hpkg_id" value="<?php echo $pkgSelected_id;?>" />
	
	
	<section class="steps mb-4">
		<div class="container">
			<div class="steps_wrapper" data-current="3"> 
				<div class="step" data-step="1">Vehicle details</div>
				<div class="step" data-step="2">Your Advert</div>
				<div class="step" data-step="3">Package & Payment</div>
			</div>
		</div>
	</section>
	

	<section class="main mb-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 card">
                  <form class="needs-validation" >
           
           <div class="container">

                 <h2 class="mb-3 mt-3">Payment Summary </h2>
             <div class="row">
					 <div class="col-md-12 mt-2 mb-3">
						<p> &nbsp;<?php echo $customer_name.', '.$contact_num.' (protected) , '. $postcode .' (not shown in ad)';?></p>
					 </div>
					<div class="col-md-6 mb-3">
						<p><?php echo $pkgSelected_week;?> advert  </p>
					 </div>
					 <div class="col-md-6 text-right mb-3">
						<h4>$<?php echo $pkgSelected_price;?></h4>
					 </div>
             </div>
			 
            <div class="row">
			 <div class="col-md-12 mb-3">
			 <p>--------------------------------------------------- Enter Your Card Details -----------------------------------------------</p>
			 </div> 
			 <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback2">
                  
                </div>
              </div>
            </div>
            <div class="row">
			<div class="col-md-3 mb-3">
                <label for="cc-Postcode">Postcode</label>
                <input type="text" class="form-control" id="cc-Postcode" placeholder="" required>
                <div class="invalid-feedback3">
                  
                </div>
              </div>
			  <div class="col-md-3 mb-3"></div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" required>
                <div class="invalid-feedback4">
                 
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv"  required>
                <div class="invalid-feedback5">
                  
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <input class="btn btn-primary mb-4 btn-block" type="button" onclick="validateForm()"  value="Continue"/>
          
		  </div>
		  
		  </form>
			
					</div>
					
					
				</div>
					
			</div>
		</div>
	</section>
	
	
	<script>

	$(document).ready(function(){
		
		
		
		
		var dataString = "carad_id="+document.getElementById('hcarad_id').value
		                 +"&pkgSelected_id="+document.getElementById('hpkg_id').value;
		
		//alert(dataString);
		
		$.ajax({
			   type: "POST",
			   url: "../ajax/ajax_insert_ad_pkg.php",
			   data: dataString,
			   cache: false,
			   success: function(result){
					
				//alert(result);
				
			},
		});
		
	//	updateApproved_id();
		
		
		
	});
				
				
	
// 	function updateApproved_id()
// 	{	
	    
// 	   // var approved_id = 1;
	    
// 					var dataString = "caradid="+document.getElementById('hcarad_id').value
// 		                 +"&approved_id="+approved_id;
		
			
// 			$.ajax({
// 			   type: "POST",
// 			   url: "../ajax/update_Adapproved_id.php",
// 			   data: dataString,
// 			   cache: false,
// 			   success: function(result){
					
// 				//alert(result);
				
// 			},
// 		});			
		
		
		
			
// 	}
	
	
	
	function validateForm()
	{
		var errorCount = 0;
		
		if ($('#cc-name').val() == '')
		{
			$('.invalid-feedback').html(' Name on card is required');	
             $(".invalid-feedback").css("color", "#dc3545");		
		}
		else
		{
			$('.invalid-feedback').html('');
			errorCount = errorCount + 1;
		}
		
		if ($('#cc-number').val() == '')
		{
			$('.invalid-feedback2').html(' Credit card number is required');	
             $(".invalid-feedback2").css("color", "#dc3545");
		}
		else
		{
			$('.invalid-feedback2').html('');
			errorCount = errorCount + 1;
		}
		
		if ($('#cc-Postcode').val() == '')
		{
			$('.invalid-feedback3').html(' Postcode are required');	
             $(".invalid-feedback3").css("color", "#dc3545");
		}
		else
		{
			$('.invalid-feedback3').html('');
			errorCount = errorCount + 1;
		}
		
		if ($('#cc-expiration').val() == '')
		{
			$('.invalid-feedback4').html('  Expiration date required');	
             $(".invalid-feedback4").css("color", "#dc3545");
		}
		else
		{
			$('.invalid-feedback4').html('');
			errorCount = errorCount + 1;
		}
		
		if ($('#cc-cvv').val() == '')
		{
			$('.invalid-feedback5').html(' Security code required');	
             $(".invalid-feedback5").css("color", "#dc3545");
		}
		else
		{
			$('.invalid-feedback5').html('');
			errorCount = errorCount + 1;
		}
		
		

		if (errorCount == 5)
		{
			document.location.href = '../payment-details/thankyou-msg.php';
					
		}
		
		
			
	}
	
	
	
            
	</script>
<?php include_once('../includes/footer.php'); ?>
