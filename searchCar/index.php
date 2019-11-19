<?php
include_once("../includes/config.php");
// include_once("../includes/Auth.php");
include_once('../includes/header.php');

if(isset($_REQUEST['Postcode']) || isset($_REQUEST['searchMake']) || isset($_REQUEST['searchModel']) ){
	
		@$type_id = $_REQUEST['type_id'];
		@$postcode= $_REQUEST['Postcode'];
		@$make= $_REQUEST['searchMake'];
		@$model= $_REQUEST['searchModel'];
		@$MinPrice= $_REQUEST['MinPrice'];
		@$MaxPrice= $_REQUEST['MaxPrice'];
		
	}
	else{
		
		
		echo'<input type="hidden" id="check_id" value="1">';
		
	}


?>


<link rel="stylesheet" href="searchCarStyleCode.css"> 



    <input type="hidden" id="carad_id" value="">
     <input type="hidden" id="type_ids" value="<?= @$type_id;?>">
	<input type="hidden" id="Postcode" value="<?= @$postcode;?>">
	<input type="hidden" id="searchMake" value="<?= @$make;?>">
	<input type="hidden" id="searchModel" value="<?= @$model;?>">
	<input type="hidden" id="MinPrice" value="<?= @$MinPrice;?>">
	<input type="hidden" id="MaxPrice" value="<?= @$MaxPrice;?>">
	
	


	

	<div id="featured-cars" class="cars-grid" >
		<div class="container-fluid " >
			<div class="row">
				<div class="col">
				    <hr>
					<!--<header class="section-header bg-color-blue">-->
					<!--	<h2>Featured Almost New Cars</h2>-->
					<!--	<a href="#" class="view-all-link">View All</a>-->
					<!--</header>-->
				</div>
			</div>
			<div class="row" id="featured_carsList">
			<div class="col-lg-2">
				<ul class="filter-list mb-5">
							<li>
						         <div class="">
										 <a href="javascript:void(0)" tabindex="0" data-trigger="focus"  class="popper options-button" data-toggle="popover">

											 <span class="options-button_name option-button ">Make</span>
											 <span class="options-button__icon">
											 <span id="value_any" class="value_any">any</span>
												<i class="fa fa-angle-right icon-arrow-right" aria-hidden="true"></i>
											 </span>
										 </a>
										<div  class="popper-content hide" style="display: none;">
										   <div class="row" >
												   <div class="column" id="makeList">
												   
												   </div>
											</div>
										</div>
								  </div>
							</li>
							<li>
								<div class="">
										 <a href="javascript:void(0)" tabindex="0" data-trigger="focus"  class="popper options-button" data-toggle="popover">

											 <span class="options-button_name option-button ">Model</span>
											 <span class="options-button__icon">
											 <span id="value_any" class="value_any">any</span>
												<i class="fa fa-angle-right icon-arrow-right" aria-hidden="true"></i>
											 </span>
										 </a>
										<div  class="popper-content hide" style="display: none;">
										   <div class="row" >
												   <div class="column" id="modelList">
												   
												   </div>
											</div>
										</div>
								  </div>
							</li>
							<li>
								<div class="">
										<a href="javascript:void(0)" tabindex="0" data-trigger="focus"  class="popper options-button" data-toggle="popover">

											 <span class="options-button_name option-button ">Model Variant</span>
											 <span class="options-button__icon">
											 <span id="value_any" class="value_any">any</span>
												<i class="fa fa-angle-right icon-arrow-right" aria-hidden="true"></i>
											 </span>
										 </a>
										<div  class="popper-content hide" style="display: none;">
										   <div class="row" >
												   <div class="column" id="variantList">
												   
												   </div>
											</div>
										</div>
								  </div>
							</li>
							<li>
								 <div class="">
										 <a  href="#priceList" class="" data-toggle="collapse">
										   
												<span class="options-button_name option-button ">Price</span>
												 <span class="options-button__icon">
												 <span id="value_any" class="value_any">any</span>
													<i class="fa fa-angle-down icon-arrow-right" aria-hidden="true"></i>
												 </span>
											
										 </a>
										 <div id="priceList" class="collapse">
											   <select id="MinPriceList" class="form-control mt-3">
												   <option value="0" >(any)</option>
											   </select>
											   <select id="MaxPriceList" class="form-control mt-2 mb-2">
												   <option value="0" >(any)</option>
											   </select>
										 </div>
								  </div>
							</li>
							<li>
								<div class="">
										 <a  href="#YearList" class="" data-toggle="collapse">
										    
												<span class="options-button_name option-button ">Year</span>
												 <span class="options-button__icon">
												 <span id="value_any" class="value_any">any</span>
													<i class="fa fa-angle-down icon-arrow-right" aria-hidden="true"></i>
												 </span>
										
										 </a>
										 <div id="YearList" class="collapse">
											   <select id="MinPriceList" class="form-control mt-3">
												   <option value="0" >(any)</option>
											   </select>
											   <select id="MaxPriceList" class="form-control mt-2 mb-2">
												   <option value="0" >(any)</option>
											   </select>
										 </div>
								  </div>
							</li>
							<li>
								<div class="">
										 <a  href="#milage" class="" data-toggle="collapse">
										    
												<span class="options-button_name option-button ">milage</span>
												 <span class="options-button__icon">
												 <span id="value_any" class="value_any">any</span>
													<i class="fa fa-angle-down icon-arrow-right" aria-hidden="true"></i>
												 </span>
											
										 </a>
										 <div id="milage" class="collapse">
											   <select id="MinPriceList" class="form-control mt-3">
												   <option value="0" >(any)</option>
											   </select>
											   <select id="MaxPriceList" class="form-control mt-2 mb-2">
												   <option value="0" >(any)</option>
											   </select>
										 </div>
								  </div>
							</li>
							<li>
								<div class="">
										<a href="javascript:void(0)" class="popper options-button" data-toggle="popover">

											 <span class="options-button_name option-button ">Body Type</span>
											 <span class="options-button__icon">
											 <span id="value_any" class="value_any">any</span>
												<i class="fa fa-angle-right icon-arrow-right" aria-hidden="true"></i>
											 </span>
										 </a>
										<div  class="popper-content hide" style="display: none;">
										   <div class="row" >
												   <div class="col-md-4" id="bodyList">
												   
												   </div>
											</div>
										</div>
								  </div>
							</li>
							<li>
								<div class="">
										 <a href="javascript:void(0)" class="popper options-button" data-toggle="popover">

											 <span class="options-button_name option-button ">Fuel Type</span>
											 <span class="options-button__icon">
											 <span id="value_any" class="value_any">any</span>
												<i class="fa fa-angle-right icon-arrow-right" aria-hidden="true"></i>
											 </span>
										 </a>
										<div  class="popper-content hide" style="display: none;">
										   <div class="row" >
												   <div class="col-md-4" id="fuelList">
												   
												   </div>
											</div>
										</div>
								  </div>
							</li>
							<li>
								<div class="">
										 <a href="javascript:void(0)" tabindex="0" data-trigger="focus"   class="popper options-button" data-toggle="popover">

											 <span class="options-button_name option-button ">Colour</span>
											 <span class="options-button__icon">
											 <span id="value_any" class="value_any">any</span>
												<i class="fa fa-angle-right icon-arrow-right" aria-hidden="true"></i>
											 </span>
										 </a>
										<div  class="popper-content hide" style="display: none;">
										   <div class="row" >
												   <div class="col-md-4" id="colourList">
												   
												   </div>
											</div>
										</div>
								  </div>
							</li>
							<li>
								<div class="">
										 <a href="javascript:void(0)" tabindex="0" data-trigger="focus"   class="popper options-button" data-toggle="popover">

											 <span class="options-button_name option-button ">Transmission</span>
											 <span class="options-button__icon">
											 <span id="value_any" class="value_any">any</span>
												<i class="fa fa-angle-right icon-arrow-right" aria-hidden="true"></i>
											 </span>
										 </a>
										<div  class="popper-content hide" style="display: none;">
										   <div class="row">
												   <div class="col-md-4" id="transmissionList">
												   
												   </div>
											</div>
										</div>
								  </div>
							</li>
							<li>
								<div class="">
										 <a  href="#Enginesize" class="" data-toggle="collapse">
										    
												<span class="options-button_name option-button ">Engine size</span>
												
												 <span class="options-button__icon">
												 <span id="value_any" class="value_any">any</span>
													<i class="fa fa-angle-down icon-arrow-right" aria-hidden="true"></i>
												 </span>
										
										 </a>
										 <div id="Enginesize" class="collapse">
											   <select id="MinPriceList" class="form-control mt-3">
												   <option value="0" >(any)</option>
											   </select>
											   <select id="MaxPriceList" class="form-control mt-2 mb-2">
												   <option value="0" >(any)</option>
											   </select>
										 </div>
								  </div>
							</li>
							<li>
								<div class="">
										 <a href="#demo" class="" data-toggle="collapse">
											 <span class="options-button_name option-button ">Doors</span>
											 <span class="options-button__icon">
												<i class="fa fa-angle-down icon-arrow-right" aria-hidden="true"></i>
											 </span>
										</a>
										<div id="demo" class="collapse">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit,
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										</div>
								  </div>
							</li>
							<li>
								<div class="">
										 <a href="#demo" class="" data-toggle="collapse">
											 <span class="options-button_name option-button ">Seats</span>
											 <span class="options-button__icon">
												<i class="fa fa-angle-down icon-arrow-right" aria-hidden="true"></i>
											 </span>
										</a>
										<div id="demo" class="collapse">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit,
										sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										</div>
								  </div>
							</li>
							
					  </ul> 
			
				
			</div>
			<ul id="searchCarsList" class="col-lg-8">
				<!--<div class="col-lg-3 col-sm-6 car-item">
					<div class="card">
						<img src="assets/images/car1.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>-->
				
				</ul>
<div class="col-lg-2"></div>
			</div>
		</div>
	</div> <!-- /.cars-grid -->


				<form id="getCarsList" action="">
				<input type="hidden" name="getmake" id="getmake" value="">
				<input type="hidden" name="getmodel" id="getmodel" value="">
				<input type="hidden" name="getvariant" id="getvariant" value="">
				<input type="hidden" name="getminPrice" id="getminPrice" value="">
				<input type="hidden" name="getmaxPrice" id="getmaxPrice" value="">
				<input type="hidden" name="getcolour" id="getcolour" value="">
				<input type="hidden" name="getbodyType" id="getbodyType" value="">
				<input type="hidden" name="getfuelType" id="getfuelType" value="">
			
				</form>






<script src="searchCarScriptCode.js" ></script>
	
	

<?php include_once('../includes/footer.php'); ?>