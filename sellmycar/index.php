<?php
//session_start();
 header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");	
	?>
	<?php 


	include_once('../includes/header.php'); 
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
		
		.form-group {position: relative;}
		.error {
		    color: red;
            position: absolute;
            border: 1px solid red;
            padding: 7px;
            border-radius: 5px;
            background-color: #fff;
            left: 100.6%;
            font-size: 12px;
            width: 300px;
            top: 0;
            z-index: 5;
            display: none;
        }
        .error::before {
            width: 10px;
            height: 10px;
            top: 9px;
            border-top: 1px solid #ff4436;
            border-left: 1px solid #ff4436;
            background-color: #fff;
            content: '';
            position: absolute;
            left: -6px;
            transform: rotate(-45deg);
        }
	</style>
	
	<hr />
	
	<input type="hidden" id="hcaradid" name="hcaradid" value="<?php echo $caradid; ?>" />
	<section class="steps mb-4">
		<div class="container">
			<div class="steps_wrapper" data-current="1"> 
				<div class="step" data-step="1">Vehicle details</div>
				<div class="step" data-step="2">Your Advert</div>
				<div class="step" data-step="3">Package & Payment</div>
			</div>
		</div>
	</section>
	<section class="page-header mb-4">
		<div class="container">
			<span class="page-header__number">1</span>
            <h1 class="page-header__title">Enter the basic details about the car you want to sell</h1>
		</div>
	</section>

	<section class="main mb-5">
		<div class="container">
		<?php //echo @$user_id;?>
			<div class="row justify-content-center">
				<div class="col-md-7">
					<form>
						<div class="form-group row">
							<label for="txtCarNumber" class="col-sm-4 col-form-label">Reg. No:</label>
							<div class="col-sm-8">
								<input type="text" id="txtCarNumber" name="txtCarNumber" class="form-control" />
							</div>
							<div id="txtCarNumberError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="txtMilage" class="col-sm-4 col-form-label">Milage:</label>
							<div class="col-sm-8">
								<input type="text" id="txtMilage" name="txtMilage" class="form-control" />
							</div>							
							<div id="txtMilageError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="cmbMake" class="col-sm-4 col-form-label">Make:</label>
							<div class="col-sm-8">
								<select id="cmbMake" name="cmbMake" onchange="FillCarModels();" class="form-control linked">
									<option value="0">Please select</option>
								</select>
							</div>
							<div id="cmbMakeError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="cmbModel" class="col-sm-4 col-form-label">* Model:</label>
							<div class="col-sm-8">
								<select id="cmbModel" name="cmbModel" onchange="FillCarVariant();" class="form-control linked" >
									<option value="0">Please select</option>
								</select>
							</div>
							<div id="cmbModelError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="cmbVariant" class="col-sm-4 col-form-label">* Variant:</label>
							<div class="col-sm-8">
								<select id="cmbVariant" name="cmbVariant" onchange="FillCarTrim();" class="form-control linked">
									<option value="0">Please select</option>
								</select>
							</div>
							<div id="cmbVariantError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="cmbTrim" class="col-sm-4 col-form-label">Trim:</label>
							<div class="col-sm-8">
								<select id="cmbTrim" name="cmbTrim" class="form-control linked">
									<option value="0">Please select</option>
									
								</select>
							</div>
							<div id="cmbTrimError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="cmbDerivative" class="col-sm-4 col-form-label">* Derivative:</label>
							<div class="col-sm-8">
								<select id="cmbDerivative" name="cmbDerivative" class="form-control linked">
									<option value="0">Please select</option>
								</select>
							</div>
							<div id="cmbDerivativeError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="cmbBodyType" class="col-sm-4 col-form-label">* Body type:</label>
							<div class="col-sm-8">
								<select id="cmbBodyType" name="cmbBodyType" class="form-control ">
									<option value="0">Please select</option>
								</select>
							</div>
							<div id="cmbBodyTypeError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="cmbTransmission" class="col-sm-4 col-form-label">* Transmission:</label>
							<div class="col-sm-8">
								<select id="cmbTransmission" name="cmbTransmission" class="form-control ">
									<option value="0">Please select</option>
								</select>
							</div>
							<div id="cmbTransmissionError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="cmbFuelType" class="col-sm-4 col-form-label">* Fuel type:</label>
							<div class="col-sm-8">
								<select id="cmbFuelType" name="cmbFuelType" class="form-control">
									<option value="0">Please select</option>
								</select>
							</div>
							<div id="cmbFuelTypeError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="cmbColour" class="col-sm-4 col-form-label">* Colour:</label>
							<div class="col-sm-8">
								<select id="cmbColour" name="cmbColour" class="form-control">
									<option value="0">Please select</option>
								</select>
							</div>
							<div id="cmbColourError" class="error">
							</div>
						</div>
						<div class="form-group row" id="datepicker" >
							<label for="txtCarRegistrationNumber" class="col-sm-4 col-form-label">Date of first registration:</label>
							<div class="col-sm-8 input-date" data-provide="datepicker">
								<i class="fa fa-calendar icon" aria-hidden="true"></i>
								<input type="text" id="txtCarRegistrationDate" data-date-format="yyyy-mm-dd" name="txtCarRegistrationDate"  class="form-control" />
							</div>	
							<div id="txtCarRegistrationDateError" class="error">
							</div>
						</div>
							
					</div>
						
					</form>
					</div>
					<div class="form-footer mb-4">
						<div class="buttons text-center">
							<a href="javascript:void(0);" id="BtnNext" name="BtnNext" onclick="validateForm()" class="btn btn-blue">Next Step</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
	
	<script>
	
	//for disabled select field until above isnt selected!
		var linkOrder = [
					"cmbMake",
					"cmbModel",
					"cmbVariant",
					"cmbTrim",
					"cmbDerivative"
				];
				$('select.linked').not('#' + linkOrder[0]).attr('disabled', 'disabled');
				$('.linked').change(function(){
						var id = $(this).attr('id');
						var index = $.inArray(id, linkOrder);
					$('#' + linkOrder[index+1]).removeAttr('disabled');
				});
				
				
				
	
	function validateForm()
	{
		var errorCount = 0;
		
		if ($('#txtCarNumber').val() == '')
		{
			$('#txtCarNumberError').html("Please enter your vehicle's registration number.");	
            //document.getElementById('txtCarNumberError').style.color = 'red';
            $('#txtCarNumberError').css({ 'display': 'block' });
		}
		else
		{
			$('#txtCarNumberError').html('');
			$('#txtCarNumberError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}
		
		if ($('#txtMilage').val() == '')
		{
			$('#txtMilageError').html("Please enter your vehicle's milage.");
			//document.getElementById('txtMilageError').style.color = 'red';
			$('#txtMilageError').css({ 'display': 'block' });
		}
		else
		{
			$('#txtMilageError').html('');
			$('#txtMilageError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}
		
		if ($('#cmbMake').val() == '0')
		{
			$('#cmbMakeError').html("Please select your vehicle's  make.");	
			//document.getElementById('cmbMakeError').style.color = 'red';
			$('#cmbMakeError').css({ 'display': 'block' });
		}
		else
		{
			$('#cmbMakeError').html('');
			$('#cmbMakeError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}
		
		if ($('#cmbModel').val() == '0')
		{
			$('#cmbModelError').html("Please select your vehicle's model.");
			//document.getElementById('cmbModelError').style.color = 'red';
			$('#cmbModelError').css({ 'display': 'block' });
		}
		else
		{
			$('#cmbModelError').html('');
			$('#cmbModelError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}
		
		if ($('#cmbVariant').val() == '0')
		{
			$('#cmbVariantError').html("Please select your vehicle's variant.");
			document.getElementById('cmbVariantError').style.color = 'red';
			$('#cmbVariantError').css({ 'display': 'block' });
		}
		else
		{
			$('#cmbVariantError').html('');
			$('#cmbVariantError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}
		
		if ($('#cmbTrim').val() == '0')
		{
			$('#cmbTrimError').html("Please select your vehicle's Trim.");
			//document.getElementById('cmbTrimError').style.color = 'red';
			$('#cmbTrimError').css({ 'display': 'block' });
		}
		else
		{
			$('#cmbTrimError').html('');
			$('#cmbTrimError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}
						
		if ($('#cmbDerivative').val() == '0')
		{
			$('#cmbDerivativeError').html("Please select your vehicle's derivative.");
			//document.getElementById('cmbDerivativeError').style.color = 'red';
			$('#cmbDerivativeError').css({ 'display': 'block' });
		}
		else
		{
			$('#cmbDerivativeError').html('');
			$('#cmbDerivativeError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}
		
		if ($('#cmbBodyType').val() == '0')
		{
			$('#cmbBodyTypeError').html("Please select your vehicle's body type.");
			//document.getElementById('cmbBodyTypeError').style.color = 'red';
			$('#cmbBodyTypeError').css({ 'display': 'block' });
		}
		else
		{
			$('#cmbBodyTypeError').html('');
			$('#cmbBodyTypeError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}
		
		if ($('#cmbTransmission').val() == '0')
		{
			$('#cmbTransmissionError').html("Please select your vehicle's transmission.");
			//document.getElementById('cmbTransmissionError').style.color = 'red';
			$('#cmbTransmissionError').css({ 'display': 'block' });
		}
		else
		{
			$('#cmbTransmissionError').html('');
			$('#cmbTransmissionError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}
		
		if ($('#cmbFuelType').val() == '0')
		{
			$('#cmbFuelTypeError').html("Please select your vehicle's fuel type.");
			//document.getElementById('cmbFuelTypeError').style.color = 'red';
			$('#cmbFuelTypeError').css({ 'display': 'block' });
		}
		else
		{
			$('#cmbFuelTypeError').html('');
			$('#cmbFuelTypeError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}
		
		if ($('#cmbColour').val() == '0')
		{
			$('#cmbColourError').html("Please select your vehicle's colour.");
			//document.getElementById('cmbColourError').style.color = 'red';
			$('#cmbColourError').css({ 'display': 'block' });
		}
		else
		{
			$('#cmbColourError').html('');
			$('#cmbColourError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}
		
		if ($('#txtCarRegistrationDate').val() == '')
		{
			$('#txtCarRegistrationDateError').html("Please enter your vehicle's first registration date.");
			//document.getElementById('txtCarRegistrationDateError').style.color = 'red';
			$('#txtCarRegistrationDateError').css({ 'display': 'block' });
		}
		else
		{
			$('#txtCarRegistrationNumberError').html('');
			$('#txtCarRegistrationDateError').css({ 'display': 'none' });
			errorCount = errorCount + 1;
		}

		if (errorCount == 12)
		{
			
				insert_car_ad_data();
				
				
			//document.location.href = '../price/xyz?id='+result;
					
		}
		
		
			
	}
	
	
	
	
	
	
	  $.ajax({
            type: "GET",
            url:"../ajax/ajax_get_carregistrationstep1data.php",
            dataType: "json",
            success: function (data) {
				
                $.each(data.make,function(i,obj)
                {					
					var div_data="<option value="+obj.id+">"+obj.name+"</option>";					
					$(div_data).appendTo('#cmbMake'); 
                });
				
				$.each(data.bodytype,function(i,obj)
                {					
					var div_data="<option value="+obj.id+">"+obj.name+"</option>";					
					$(div_data).appendTo('#cmbBodyType'); 
                });
				
				$.each(data.transmission,function(i,obj)
                {					
					var div_data="<option value="+obj.id+">"+obj.name+"</option>";					
					$(div_data).appendTo('#cmbTransmission'); 
                });
				
				$.each(data.fueltype,function(i,obj)
                {					
					var div_data="<option value="+obj.id+">"+obj.name+"</option>";					
					$(div_data).appendTo('#cmbFuelType'); 
                });
				
				$.each(data.colour,function(i,obj)
                {					
					var div_data="<option value="+obj.id+">"+obj.name+"</option>";					
					$(div_data).appendTo('#cmbColour'); 
                });
			}
		});
		
		function FillCarModels()
		{						
			$.ajax({
            type: "GET",
            url:"../ajax/ajax_get_carmodel.php?makeid="+$("#cmbMake").val(),
            dataType: "json",
            success: function (data) {
					var dropdown=$('#cmbModel');
					dropdown.empty(); 
					$('<option value="0">Please select</option>').appendTo('#cmbModel');
					$.each(data.model,function(i,obj)
					{					
						var div_data="<option value="+obj.id+">"+obj.name+"</option>";					
						$(div_data).appendTo('#cmbModel');
					});
				}
			});
		}
		
		
		function FillCarVariant()
		{						
			$.ajax({
            type: "GET",
            url:"../ajax/ajax_get_carvariant.php?modelid="+$("#cmbModel").val(),
            dataType: "json",
            success: function (data) {
					var dropdown = $('#cmbVariant');
					dropdown.empty(); 
					$('<option value="0">Please select</option>').appendTo('#cmbVariant');
					$.each(data.variant,function(i,obj)
					{					
						var div_data="<option value="+obj.id+">"+obj.name+"</option>";					
						$(div_data).appendTo('#cmbVariant');
					});
				}
			});
		}
		
		function FillCarTrim()
		{						
			$.ajax({
            type: "GET",
            url:"../ajax/ajax_get_cartrim.php?variantid="+$("#cmbVariant").val(),
            dataType: "json",
            success: function (data) {
					var dropdown = $('#cmbTrim');
					dropdown.empty(); 
					$('<option value="0">Please select</option>').appendTo('#cmbTrim');
						$('<option value="1">Not sure</option>').appendTo('#cmbTrim');
					$.each(data.trim,function(i,obj)
					{					
						var div_data="<option value="+obj.id+">"+obj.name+"</option>";
						$(div_data).appendTo('#cmbTrim');
					});
					
					var dropdown2 = $('#cmbDerivative');
					dropdown2.empty(); 
					$('<option value="0">Please select</option>').appendTo('#cmbDerivative');
						$('<option value="1">Not sure</option>').appendTo('#cmbDerivative');
					$.each(data.derivative,function(i,obj)
					{					
						var div_data="<option value="+obj.id+">"+obj.name+"</option>";
						$(div_data).appendTo('#cmbDerivative');
					});					
				}
			});
			
			
		}
		
		
		function insert_car_ad_data()
		{
			
			var dataString = "txtCarNumber="+document.getElementById('txtCarNumber').value
										 +"&txtMilage="+document.getElementById('txtMilage').value
										 +"&cmbMake="+document.getElementById('cmbMake').value
										 +"&cmbModel="+document.getElementById('cmbModel').value
										 +"&cmbVariant="+document.getElementById('cmbVariant').value
										 +"&cmbTrim="+document.getElementById('cmbTrim').value
										 +"&cmbDerivative="+document.getElementById('cmbDerivative').value
										 +"&cmbBodyType="+document.getElementById('cmbBodyType').value
										 +"&cmbTransmission="+document.getElementById('cmbTransmission').value
										 +"&hcaradid="+document.getElementById('hcaradid').value
										 +"&cmbFuelType="+document.getElementById('cmbFuelType').value 
										 +"&cmbColour="+ document.getElementById('cmbColour').value 
										 +"&txtCarRegistrationDate="+ document.getElementById('txtCarRegistrationDate').value ;
										 
										// alert("ajax_insert_ad_data.php?"+dataString);
			
                $.ajax({
				   type: "POST",
				   url: "../ajax/ajax_insert_ad_data.php",
				   data: dataString,
				   cache: false,
				   success: function(result){
					   
					   document.location.href = '../price/?regnum='+document.getElementById('txtCarNumber').value;
				   },
				});			
							
		}
		
		
		
		
            
	</script>
<?php include_once('../includes/footer.php'); ?>
	<script>
	$(function () {
    $('#txtCarRegistrationDate').datepicker({
        format: 'yyyy-mm-dd',
        endDate: '+0d',
        autoclose: true
    });
});
//$("#txtCarRegistrationDate").datepicker();




</script>