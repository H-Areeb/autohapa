<?php
include_once("../includes/config.php");
include_once("../includes/Auth.php");
include_once("../includes/checkSession.php");
include_once('../includes/header.php');
	?>
	
	<style>
		html, body {font-size: 14px;}
		a:not([href]):not([tabindex]), a:not([href]):not([tabindex]):focus, a:not([href]):not([tabindex]):hover {color: #104896;}
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
		
		.steps_wrapper[data-current='2']::before {
			border-color: #154a96;
		}

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
		.steps_wrapper[data-current='2'] div:nth-child(2):before {
			color: #56b847;
			border-color: #56b847;
		}
		
		.steps_wrapper[data-current='2'] div:nth-child(1)::before {
			content: "\f00c";
			display: inline-block;
			font: normal normal normal 14px/1 FontAwesome;
			text-rendering: auto;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			background: #104896;
			border-color: #104896;
			color: #fff;
			font-size: 13px;
			line-height: 30px;
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
		.section-title {
			border-bottom: 1px solid #d0d0cb;
			font-size: 18px;
			padding-bottom: 15px;
		}
		.price__container {
			background: #f7f7f5;
			padding: 30px 20px 20px;
		}
		.price__input-container {
			position: relative;
			width: 270px;
		}
		.price__input-container span {
			position: absolute;
			top: 2px;
			left: 2px;
			width: 45px;
			height: 100%;
		}
		.price__input-container span:last-child {
			left: unset;
			right: 2px;
		}
		.price__input-container span i {
			display: block;
			background: #e8e8e3;
			color: #555;
			cursor: pointer;
			border-radius: 2px 0 0 2px;
			line-height: 41px;
			font-size: 16px;
			font-weight: bold;
			text-align: center;
			width: 45px;
		}
		.price__input-container span:last-child:before {
			border-radius: 0 2px 2px 0;
		}
		.price__input {
			border-radius: 4px;
			border: 2px solid #e8e8e3;
			color: #666;
			padding: 0 8px;
			margin: 0;
			width: 270px;
			font-size: 21px;
			line-height: 45px;
			height: 45px;
			text-align: center;
		}
		
		.price__btn {margin-top: 30px;}
		
		.sidebar__container {
			background: #f7f7f5;
			padding: 16px 10px 15px;
			width: 260px;
			min-height: 219px;
		}
		
		.sidebar__container .section-title {
			border-bottom: 1px solid #d0d0cb;
			font-size: 18px;
			padding-bottom: 15px;
			margin-bottom: 15px;
		}
		.sidebar__section {
			position: relative;
			font-size: 16px;
		}
		.button__edit {
			background-color: #2a65ba;
			border-radius: 17px;
			cursor: pointer;
			color: #fff;
			font-size: 14px;
			line-height: 14px;
			padding: 10px 15px;
			height: 34px;
		}
		.button__edit:hover, .button__edit:focus {background-color: #22549c;color: #FFF;}
		.sidebar__container .button__edit {
			display: inline-block;
			position: absolute;
			right: 0;
		}
		.sidebar__toggle {
			cursor: pointer;
			color: #2a65ba;
			line-height: 36px;
			height: 35px;
			font-size: 16px;
		}
		.sidebar__toggle--open {
			display: inline-block;
			margin-right: 10px;
		}
		.sidebar__toggle--close {
			display: none;
			margin-right: 10px;
		}
		.sidebar__toggle.open .sidebar__toggle--open {
			display: none;
		}
		.sidebar__toggle.open .sidebar__toggle--close {
			display: inline-block;
		}
		.sidebar__overview {
			padding: 0;
			margin: 0;
			list-style: none;
			overflow: hidden;
		}
		.sidebar__overview li {
			padding-left: 31px;
		}
		.sidebar__overview--title {
			display: block;
			line-height: 18px;
			margin-top: 10px;
		}
		.sidebar__overview--prefix {
			display: inline;
		}
		.sidebar__overview--value {
			color: #999;
			font-size: 14px;
			line-height: 1.3em;
		}
		.structure--top-border {
			border-top: 1px solid #d0d0cb;
			padding-top: 15px;
			margin-top: 15px;
		}
		.col-form-label {padding-top: 0;padding-bottom: 0;text-align: right;}
		.form__label--subtitle {
			display: block;
			color: #999;
			font-size: 13px;
			line-height: 14px;
			margin-top: 10px;
		}
		.description__global--text {
			line-height: 1.4em;
			font-size: 13px;
		}
		.description--placeholder:empty:before {
			content: attr(data-default);
			color: #999;
		}
		.description__global--toggle {
			display: block;
			margin-top: 15px;
		}
		.description__global--inputs {
			display: none;
			padding-top: 15px;
		}
		.description__global--toggle span:last-child {display: none;}
		
		.description__global--toggle.is-open span:first-child {display: none;}
		.description__global--toggle.is-open span:last-child {display: block;}
		
		.is-open+.description__global--inputs {display: block;}
		
		
		
		.features__list {margin: 0;padding: 0;list-style: none;}
		.features__list--item {
			display: inline-table;
			table-layout: fixed;
			vertical-align: top;
			margin-right: 1%;
			width: 48%;
			height: 30px;
		}
		.form__textarea {
			height: 130px;
			resize: none;
		}
		.btn--plain {
			background: transparent;
			border: none;
			text-decoration: none;
			cursor: pointer;
			padding: 0 30px 0 0;
			margin: 0;
			font-size: 1em;
		}
		.images__later-button {margin-top: 10px;}
		
		.form-switch {
			position: relative;
			padding-left: 2px;
		}
		.form-switch__label {
			float: left;
			margin-bottom: 0;
		}
		.form__control-input {
			position: absolute;
			left: -99999px;
		}
		.form-switch__option {
			position: relative;
			border: 2px solid #d0d0cb;
			cursor: pointer;
			color: #CCC;
			line-height: 38px;
			text-align: center;
			margin-left: -2px;
			width: 60px;
			height: 40px;
		}
		.form-switch__label:first-child .form-switch__option {
			border-radius: 4px 0 0 4px;
		}
		.form-switch__input:checked+.form-switch__option {
			z-index: 1;
			border: 2px solid #5d7199;
			border-radius: 3px;
			color: #2a65ba;
			line-height: 35px;
		}
		.hide, .is-hidden {display: none;}
	</style>
	<?php
	
	
	
	
	 // $regnum = intval($_GET['regnum']);
    if (isset($_SESSION['customer_id']))
		{
			@$customer_id = $_SESSION['customer_id'];
		}
		else
		{
			@$customer_id = $_SESSION['customer_id2'];
			echo $customer_id;
		}
	
	
	?>
	<hr />
	<section class="steps mb-4">
		<div class="container">
			<div class="steps_wrapper" data-current="3"> 
				<div class="step" data-step="1">Vehicle details</div>
				<div class="step" data-step="2">Your Advert</div>
				<div class="step" data-step="3">Package & Payment</div>
			</div>
		</div>
	</section>
	<section class="page-header mb-4">
		<div class="container">
			<span class="page-header__number">3</span>
            <h1 class="page-header__title">Choose your Package</h1>
		</div>
	</section>

	<section class="main">
		<div class="container">
			<div id="packagesList" class="row">		
					<form id="formPackage" method="POST" action="../payment-details/">
					    <input type="hidden" id="pkgSelected_id" name="pkgSelected_id" value="">
						<input type="hidden" id="pkgSelected_week" name="pkgSelected_week" value="">
						<input type="hidden" id="pkgSelected_price" name="pkgSelected_price" value="">
					</form>
				    <!-- <div class="col-md-3">
					<div class="card  text-center" style="width: 18rem;">
					   <div class="card-header">
							<h1>Featured</h1>
					   </div>
					  <div class="card-body text-center align-items-center">
						<h3 class="card-title mt-2"><b>$78.95</b></h3>
						<a href="#" class="btn btn-primary mt-3">Go somewhere</a>
						<p class="card-text mt-3"><b>Attract buyers - show off your <span style="color: #06a09d;">up to 20 photos</span></b></p>
					  
					  </div>
					     <h5 class="card-title"><b>Promote Your Car</b></h5>
					  <ul class="list-group list-group-flush">
						<li class="list-group-item">Cras justo odio</li>
						<li class="list-group-item">Dapibus ac facilisis in</li>
						<li class="list-group-item">Vestibulum at eros</li>
					  </ul>
					  <div class="card-body">
						<a href="#" class="card-link">Card link</a>
						<a href="#" class="card-link">Another link</a>
					  </div>
					</div>
				</div>	-->
				

				
			</div>

				
				  
					
					
					
					
					<style>
						.buttons {position: relative;}
						.back-link {
							position: absolute;
							left: 0;
							line-height: 41px;
						}
					</style>
					
				<div class="form-footer mt-5 mb-4">
						<div class="buttons text-center">
							<a href="../description/" id="BtnNext" name="BtnNext" class="back-link"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
							
						</div>
					</div>
		
		</div>
	</section>
	
	
	<script>
	
	var package_id = '';
	
    $(document).ready(function(){
		//get_data();
		
		
					
			$.ajax({
            type: "GET",
            url:"../ajax/ajax_get_carpackages.php",
            dataType: "json",
            success: function (data) {
				// console.log(data);
						// selecter = "<select id='selectOptions'>";
						// options = "";
						//data = JSON.parse(data);
						
						 $.each(data,function(i,obj)
							{	//alert(obj.controltypeid);
							       //package_id = obj.id;
							      
									var comma = "'";
									var pkg_id = obj.id;
									var name = obj.name;
									var week = obj.adDisplayWeek;
									var price = obj.price;

							  
							   if(week == 100){
								   
								   var weektxt = "<b><span style='color: #56b847;'>Advertised until sold </span><br/></b><span style='font-size:14px; '>free to rebook</span>";
								            pkg_id = obj.id;
											
								        var div_list = '<div class="col-md-3"><div class="card  text-center" style="width: 18rem;"><div class="card-header"><h1>'+name+'</h1><h5>'+weektxt+'</h5></div><div class="card-body text-center align-items-center"><h3 class="card-title mt-2"><b>$'+price+'</b></h3><a href="#" data-package-id="'+pkg_id+'" onclick="payment_page('+pkg_id+','+week+','+price+')" class="btn btn-primary mt-3">Go select</a><p class="card-text mt-3"><b>Attract buyers - show off your car'+comma+'s best features <span style="color: #06a09d;">up to 20 photos</span></b></p></div><h5 class="card-title"><b>Promote Your Car</b></h5><ul class="list-group list-group-flush" "id="pkg_features_list">';
									       
										   var featuresList ='';
										   
											$.each(obj.package_feature,function(i,obj1){
										         var features = obj1.name;
												 
										        featuresList = featuresList + '<li class="list-group-item" style="font-size:12px;"><i class="fa fa-check fa-lg" aria-hidden="true"></i>&nbsp; &nbsp;  '+features+'</li>';
									            //$('#pkg_features_list').append(featuresList);
											});
											
										var div_list2 = '</ul><div class="card-body"><a href="#" class="card-link">Card link</a><a href="#" class="card-link">Another link</a></div></div></div>';
									
									  var div_pkg = div_list+featuresList+div_list2;
									
									$('#packagesList').append(div_pkg);
							   }
							   else{
								   
								    
									var featuresList ='';
									     var pkg_id = obj.id;
										 
										 
										 
									 var div_list = '<div class="col-md-3"><div class="card  text-center" style="width: 18rem;"><div class="card-header"><h1>'+name+'</h1><h5>'+week+' weeks</h5></div><div class="card-body text-center align-items-center"><h3 class="card-title mt-2"><b>$'+price+'</b></h3><a href="#" data-package-id="'+pkg_id+'"  onclick="payment_page('+pkg_id+','+week+','+price+')"  class="btn btn-primary mt-3">Go select</a><p class="card-text mt-3"><b>Attract buyers - show off your car'+comma+'s best features <span style="color: #06a09d;">up to 20 photos</span></b></p></div><h5 class="card-title"><b>Promote Your Car</b></h5><ul class="list-group list-group-flush" "id="pkg_features_list">';
									
											$.each(obj.package_feature,function(i,obj1){
										         var features = obj1.name;
												 
										        featuresList = featuresList + '<li class="list-group-item" style="font-size:12px;"><i class="fa fa-check fa-lg" aria-hidden="true"></i>&nbsp; &nbsp; '+features+'</li>';
									            //$('#pkg_features_list').append(featuresList);
											});
											
										var div_list2 = '</ul><div class="card-body"><a href="#" class="card-link">Card link</a><a href="#" class="card-link">Another link</a></div></div></div>';
									
									  var div_pkg = div_list+featuresList+div_list2;
									
									$('#packagesList').append(div_pkg);
									
								}
								
										
								
						});
							
						
				
					
				}
			});
			
			
			            
	});
	
	 function payment_page(pkg_id,week,price)
	 {
		 document.getElementById('pkgSelected_id').value = pkg_id;
		 document.getElementById('pkgSelected_week').value = week;
         document.getElementById('pkgSelected_price').value = price;		 
		  $('#formPackage').submit();
		}
	
		

						
	</script>
<?php include_once('../includes/footer.php'); ?>

