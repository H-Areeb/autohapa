<?php 

header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");	
	 
    include_once('../includes/header.php');

if(!isset($_SESSION['customer_id']) && !isset($_SESSION['customer_id2']) ){
	
	header("location: ../login/");
}

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
		.price__input-container .js-price-adjust {
			position: absolute;
			top: 2px;
			left: 2px;
			width: 45px;
			height: 100%;
		}
		.price__input-container .js-price-adjust[data-increment=true] {
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
	<?php
	
	
	
	if(isset($_REQUEST['regnum'])){
		
		 $regnum = $_REQUEST['regnum'];
	}
	
// 	if(isset($_REQUEST['customer_id'])){
		
// 		 $user_id  = $_REQUEST['customer_id'];
// 		 $_SESSION['customer_id'] = $user_id ;
// 	}
	
	
// 	if (isset($_SESSION['customer_id']))
// 		{
// 			@$customer_id = $_SESSION['customer_id'];
// 			 //echo $customer_id;
// 		}
// 		else
// 		{
// 			@$customer_id = $_SESSION['customer_id2'];
// 		}
    
	

	?>
	<hr />
	
	
	 
	<section class="steps mb-4">
		<div class="container">
			<div class="steps_wrapper" data-current="2"> 
				<div class="step" data-step="1">Vehicle details</div>
				<div class="step" data-step="2">Your Advert</div>
				<div class="step" data-step="3">Package & Payment</div>
			</div>
		</div>
	</section>
	<section class="page-header mb-4">
		<div class="container">
			<span class="page-header__number">2</span>
            <h1 class="page-header__title">Now tell us your price and some more about the car</h1>
		</div>
	</section>

	<section class="main">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					
					<div class="price__container mb-5">
						<div class="form-group row">
							<label id="priceLabel" for="askingPrice" class="col-md-4 text-right">
								<strong>* </strong>Price:
							</label>
							<span class="col-md-8">
								<h2 class="section-title">What's your asking price?</h2>
								<div class="price__input-container">
									<input type="hidden" id="hdregnum" value="<?php echo $regnum;?>">
									<input type="hidden" id="hdcaradid" value="">
									<input type="hidden" id="user_id" value="<?php echo $customer_id;?>">
									<input id="askingPrice" name="askingPrice.price" maxlength="8" class="price__input" type="tel" value="">
									<span class="js-price-adjust"><i class="fa fa-minus"></i></span>
									<span class="js-price-adjust" data-increment="true"><i class="fa fa-plus"></i></span>
									<div id="askingPriceError"> </div> 
								</div>
                                 
							<!--	<div class="price__info">
									<button type="submit" id="setPriceButton" onclick="update_car_ad_data()" class="btn btn-lg btn-green price__btn ">Sell for this much</button>
								</div>-->
							</span>
						</div>
					</div>
					
					<div class="vehicle__details" id="vehicle__details">
						<div id="descriptionHeading" data-init="FeaturesView">
							<h2 class="section-title">About your car</h2>
							<p class="section--subtitle mb-4">Change or add to your car's details. You can see how your ad will look on the right.</p>
						</div>
						<section id="" class="attention-grabber mb-4">
							<div class="form-group row align-items-center">
								<label id="details" for="attentionGrabberSelect" class="col-sm-4 col-form-label">Title:</label>

								<div class="col-sm-8">
									<div  class="attention-grabber__title description__global--text"><b><p id="adTitle">Ford Fiesta 1.25 Freestyle 3dr</p></b></div>
								</div>
							</div>

							<div class="form-group row">
								<label id="details" for="attentionGrabberSelect" class="col-sm-4 col-form-label">Subtitle:
									<span class="form__label--subtitle">Use this to grab buyers' attention from the search results page.</span>
								</label>

								<div class="col-sm-8">
									<div class="attention-grabber__container">
										<input id="attentionGrabberText" class="form-control" placeholder="e.g. Full service history" type="text" maxlength="30" name="attentionGrabberForm.text" value="">
									</div>
								</div>
							</div>
						</section>
						
						<section id="featuresSection" class="structure--spacing features" data-channel="car" data-features="false">
							<div class="form-group row align-items-start">
								<label class="col-sm-4 col-form-label">
									Features:
									<span class="form__label--subtitle">These will appear in your ad. You can change them using the Add/Remove option.</span>
								</label>

								<div class="col-sm-8">
									<p id="selectedFeaturesWrapper" class="description__global--text description--placeholder js-features-text" data-default="Select your car's features here, be as specific as you can as this will help buyers to find your car."></p>
									<a id="addFeatures" class="description__global--toggle js-details-toggle" onclick="getCarFeatures()" href="#">
										<span><i class="fa fa-edit"></i> Add/Remove features</span>
										<span><i class="fa fa-times-circle"></i> Close features</span>
									</a>
									<div id="availableFeatures" class="description__global--inputs pt-3">
										<ul id="featuresList" class="features__list js-feature-list">
											
											<li class="features__list--item">
												<label for="feature1" class="form__control-label form__control-label--check" title="Electric sunroof">
												<input id="feature1" class="form__control-input" type="radio" name="featuresForm.sunroof" value="Electric sunroof" data-displayname="Electric sunroof">
												
												<span class="form__control-text">&nbsp;Electric sunroof</span></label>
											</li>
											
											<li class="features__list--item"><select id="selectfeature"></select></li>
											
											<li class="features__list--item"><label for="feature3" class="form__control-label form__control-label--check" title="Electric windows"><input id="feature3" class="form__control-input" type="checkbox" name="featuresForm.selectedFeatures" value="Electric windows" data-displayname="Electric windows"><span class="form__control-text">&nbsp;Electric windows</span></label></li>
											
											<li class="features__list--item"><label for="feature4" class="form__control-label form__control-label--check" title="Air conditioning"><input id="feature4" class="form__control-input" type="checkbox" name="featuresForm.selectedFeatures" value="Air conditioning" data-displayname="Air conditioning"><span class="form__control-text">&nbsp;Air conditioning</span></label></li>
										</ul>
									</div>
								</div>

							</div>
						</section>
						
						<section id="sellingPointsSection" class="mb-4">

							<div class="form-group row">
							
								<label class="col-sm-4 col-form-label">History &amp; maintenance:
									<span class="form__label--subtitle">Tell buyers about your car's history and MOT.</span>
								</label>

								<div class="col-sm-8">
									<p id="selectedSellingPoints" class="description__global--text description--placeholder js-selling-points-text" data-default="No details selected">1 Owners</p>

									<a id="addSellingPoints" class="description__global--toggle js-details-toggle" href="#">
										<span><i class="fa fa-edit"></i> Add/Remove details</span>
										<span><i class="fa fa-times-circle"></i> Close details</span>
									</a>

									<div id="availableSellingPoints" class="description__global--inputs">

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Owners: <small class="form__field--subtitle">Include yourself</small></label>
											<div class="col-sm-8 form__select-container">
												<select id="sellingPointsOwners" name="sellingPoints.previousOwners" class="form__select form-control">
													<option value="">Select</option>
													<option value="1" selected="">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5+</option>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-sm-4 col-form-label">Service history:</label>
											<div class="col-sm-8 form__select-container">
												<select id="sellingPointsHistory" name="sellingPoints.serviceHistory" class="form__select form-control">
													<option value="">Select</option>
													<option value="1">Full service history</option>
													<option value="2">Part service history</option>
													<option value="3">No service history</option>
													<option value="4">First service is not due</option>
												</select>
											</div>
										</div>
    
										<div class="form-group row">
											<label class="col-sm-4 col-form-label">MOT due:</label>
											<div class="col-sm-8 form__date-container input-date" data-provide="datepicker">
												<i class="fa fa-calendar icon" aria-hidden="true"></i>
												<input id="sellingPointsMotDate" data-date-format="yyyy-mm-dd" name="sellingPoints.motExpiryDate" type="text" value="" class="input-field form__date form-control isDatePicker2 " title="MOT due">
												
											</div>
										</div>
									</div>

								</div>

							</div>
						</section>
						
						<section id="descriptionSection" class="mb-4">
							<div class="form-group row">
								<label id="details" for="desc" class="col-sm-4 col-form-label description__label">Advert text:
									<span class="form__label--subtitle">This will appear at the top of your ad. Use it to persuade buyers to read further.</span>
								</label>

								<div class="col-sm-8">
									<textarea id="desc" name="description" class="form__textarea form-control"></textarea>
								</div>
							</div>
							<button type="submit" id="descriptionButton"  onclick="update_car_ad_data()" class="btn  btn-blue description__button" style="margin-left:34.5%;">Continue</button>
						</section>
						
						<section id="imagesSectionNew" class="imagesSectionNew mb-4">
							<input type="hidden" value="trade" class="js-trade-images">
							<h2 class="section-title">Photos of your car</h2>
							<p class="section-title--subtitle mb-4">
								Your advert can contain up to 30 photos. Free adverts are limited to the first 5 photos.
							</p>

							<div class="form-group row">
							
								<label class="col-sm-4 col-form-label">Photos:</label>

<style>
.photoInfo{
	position;relative;
	cursor:pointer;
}

.photoInfo input[type="file"]{
    -webkit-appearance:none; 
    position:absolute;
    top:0;
    left:0;
    opacity:0;
    width: 100%;
    height: 100%;
	cursor:pointer;
}</style>
								<div class="col-sm-8 images__section">
									<section id="photos_section">
										<div id="uploadPhotoContainer" class="photoInfo " style="position: relative;">
											<form id="formImage" method="post"  enctype="multipart/form-data">
											<input type="hidden" id="hdcaradids" name="hdcaradids" value="">
											<!--<input type="hidden" id="imgOrdinal" name="imgOrdinal" value="">-->
											<button type="button" class="btn btn-outline-success images__add-button js-add-photos"  id="uploadPhoto" style="z-index: 1;"><i class="fa fa-camera" style="font-size: 14px;"></i>&nbsp;Add photos</button>
										     <input id="uploadImage"  type="file" accept="image/*" name="uploadImage[]" class="file"  multiple />
										      
										</div>
									

									 <!-- Modal -->

									   <div id="uploadImageError" class="error"></div>
									</section>
									<style>
									.image_preview img{
										
										width:100px;
										display:inline-block;
										padding:5px;
										vertical-align:middle;
										
									}
									.pip {
									  display: inline-block;
									  margin: 10px 10px 0 0;
									}
									.remove {
									  display: block;
									  background: #444;
									  border: 1px solid black;
									  color: white;
									  text-align: center;
									  cursor: pointer;
									}
									.remove:hover {
									  background: white;
									  color: black;
									}
									
									</style>
									
                                         <div class="image_preview"></div>
										 <br>
	
										 
										 
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <div class="image_preview"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
										 
										 
										 
									<button type="submit"  id="imagesButton" class="btn  btn-blue">Next step &nbsp;<i class="fa fa-arrow-right" ></i></button>
								</form>
								</div>

							</div>	
						</section>
						
						<div class="js-load-container element__slider" style="overflow: visible;"> 
						
							<section id="contactDetailsSection" class="mb-4 js-contact-details-section" data-init="ContactDetailsView">
								<h2 class="section-title">Contact details</h2>
								<p class="section-title--subtitle mb-4">How would you like buyers to contact you?</p>

								<div id="tradeDetails">
									<div class="form-group row">
										<label for="tradingName" class="col-sm-4 col-form-label">
											* Trading Name:
										</label>
										<span class="col-sm-8">
											<span id="tradingName" class="contact__trade--static">DriveInn</span>
										</span>
									</div>
								</div>

								<div class="form-group row">
									<label for="contactNumber1" class="col-sm-4 col-form-label">
										* Contact number:
									</label>
									<div class="col-sm-8 contact__number">
										<input type="tel" id="contactNumber1" class="form-control js-keypadInput js-phone js-phone-primary adq-contact-number" name="contactDetails.contactNumber1" value="" maxlength="12">
										<a id="secondNumber" class="contact__second-number-link js-add-number ">Add a second number</a>
									</div>
									<div id="contactNumber1Error" class="error"> </div>  
								</div>


								<div id="secondNumberRow" class="form-group row hide js-secondary-container">
									<label for="contactNumber2" id="contactNumber2Label" class="col-sm-4 col-form-label">
										Secondary number:
									</label>
									<div class="col-sm-8">
										<input type="tel" id="contactNumber2" class="form-control js-keypadInput js-phone js-phone-secondary adq-secondary-number" name="contactDetails.contactNumber2" value="" maxlength="12">
									</div>
									<div id="contactNumber2Error" class="error"> </div> 
								</div>

								<div class="form-group row is-hidden">
									<label class="col-sm-4 col-form-label" id="telesafeContactNumber1Label">
										Protect your number:
										<span class="form__label--subtitle">(It's free)</span>
									</label>
									<div class="col-sm-8">
										<div id="protectOnMessage" class="contact__pyn-info bubble is-bubble--info bubble--server">
											<p><strong>For your safety and security, we'll show a unique Auto Trader phone number in place of your contact number.</strong></p>
											<p>Calls will be forwarded to your contact number without charging customers extra. <a href="https://www.autotrader.co.uk/secure/safety_and_security_centre/protect_your_number" class="tracking-standard-link" target="_blank">Find out more</a></p>
										</div>
										<div class="element__clear--left"></div>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-4 col-form-label" id="includeInAdLabel">
										Let buyers contact me by email:
										<span class="form__label--subtitle">(Your email will be protected)</span>
									</label>
									<div class="col-sm-8">
										<div class="form-switch">
											<label for="includeInAd" class="form-switch__label tracking-standard-link">
												<input type="radio" id="includeInAd" class="form__control-input form-switch__input js-email-include" name="contactDetails.includeEmailInAdvert" value="true">
												<div class="form-switch__option">Yes</div>
											</label>
											<label for="excludeFromAd" class="form-switch__label tracking-standard-link">
												<input type="radio" id="excludeFromAd" class="form__control-input form-switch__input js-email-exclude" name="contactDetails.includeEmailInAdvert" value="false" checked="">
												<div class="form-switch__option">No</div>
											</label>
										</div>
									</div>
								</div>

								<div class="form-group row email__container js-email-section js-form__fieldset" style="display:none;">
									<label for="contactEmail" class="col-sm-4 col-form-label" id="contactEmailLabel">
										Contact email:
									</label>
									<div class="col-sm-8">
										<input type="email" id="contactEmail" name="contactEmail" class="form-control adq-contact-email js-email" value="" maxlength="50" data-savedemail="">
									</div>
								</div>

								<div class="form-group row">
									<label for="postcode" class="col-sm-4 col-form-label is-invalid" id="postcodeLabel">
										* Location of car:
										<span class="form__label--subtitle">(Postcode)</span>
									</label>
									<div class="col-sm-8">
										<input id="postcode" type="text" name="contactDetails.postcode" class="form-control adq-contact-postcode js-postcode" value="" maxlength="8">
									</div>
									<div id="postcodeError" class="error"> </div> 
								</div>

							 </section>
							</div>
						
						
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
							<a href="../sellmycar" id="BtnCancel" name="BtnCancel" class="back-link"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
							<a href="javascript:void(0)" id="BtnNext" onclick="update_car_contactDetails()" name="BtnNext" class="btn btn-blue">Next Step</a>
						</div>
					</div>
					
				</div>
				
				<div class="col-md-4">
					<aside id="runningSummary" class="sidebar__container">
						<h2 class="section-title section-title--spacing">Your advert</h2>
						<div class="sidebar__section">
							<a href="/sidebar-cardetails/2c9299cf6c664f55016c70e926be464d" id="summaryEdit" class="button__edit">Edit</a>
							<h4 class="sidebar__toggle open" id="detailsHeader">
								<span class="sidebar__toggle--open"><i class="fa fa-minus"></i></span>
								<span class="sidebar__toggle--close"><i class="fa fa-plus"></i></span>
							Car details</h4>
							<ul class="sidebar__overview sidebar__overview--details" style="overflow: hidden; display: block;">
								<li>
									<div id="summaryPrimaryImage"></div>
								</li>
								<li>
									<div id="summaryReg" class="sidebar__overview--title"><?php echo $regnum;?></div>
								</li>
								<li>
									<div id="summaryMMV" class="sidebar__overview--value">
										<span id="summaryMake"></span>
										<span id="summaryModel"></span>
										<span id="summaryDerivative"></span>
									</div>
								</li>
							</ul>
						</div>
						<div class="sidebar__section structure--top-border" id="sbAdvertDetails">
							<a href="/sidebar-advertdetails/2c9299cf6c664f55016c70e926be464d" id="advertEdit" class="button__edit sidebar__advert-edit">Edit</a>
							<h4 class="sidebar__toggle js-sidebar__toggle open" id="advertHeader">
								<span class="sidebar__toggle--open"><i class="fa fa-minus"></i></span>
								<span class="sidebar__toggle--close"><i class="fa fa-plus"></i></span>
								Your advert
							</h4>
							<ul class="sidebar__overview sidebar__overview--advert">
								<li>
									<div class="sidebar__overview--title">Asking price</div> <div class="sidebar__overview--value sidebar__overview--prefix">&pound;</div>
									<span id="adq-asking-price" class="sidebar__overview--value"></span>
								</li>
								<li style="display: none;">
									<div class="sidebar__overview--title">Subtitle</div>
									<span id="adq-attention-grabber" class="sidebar__overview--value"></span>
								</li>
								<li id="featuresAndDescription" style="display: none;">
									<div class="sidebar__overview--title">Features &amp; Description</div>
									<span id="adq-description" class="sidebar__overview--value"></span>
									<span id="adq-sellingPoints" class="sidebar__overview--value"></span>
									<span id="adq-floorplanDetails" class="sidebar__overview--value"></span>
									<span id="adq-technicalDetails" class="sidebar__overview--value"></span>
									<span id="adq-features" class="sidebar__overview--value"></span>
								</li>
								<li style="display: none;">
									<div class="sidebar__overview--title">Photos</div> <span id="adq-photos" data-limit="20" class="sidebar__overview--value"></span>
								</li>
								<li class="keepHidden" style="display: none;">
									<div class="sidebar__overview--title">Contact number</div> <span id="adq-contact-number" class="sidebar__overview--value"></span>
									<span id="adq-primary-telesafe" class="sidebar__overview--value">(Protected)</span>
								</li>
								<li class="keepHidden" style="display: none;">
									<div class="sidebar__overview--title">Secondary number</div> <span id="adq-secondary-number" class="sidebar__overview--value"></span><span id="adq-secondary-telesafe" class="sidebar__overview--value"> (Protected)</span>
								</li>
								<li class="keepHidden" style="display: none;">
									<div class="sidebar__overview--title">Email address</div> <span id="adq-contact-email" class="element__no-wrap sidebar__overview--value"></span>
								</li>
								<li class="keepHidden" style="display: none;">
									<div class="sidebar__overview--title">Postcode</div> <span id="adq-contact-postcode" class="sidebar__overview--value"></span><span class="sidebar__overview--value"> (not shown in ad)</span>
								</li>
							</ul>
						</div>


					</aside>
					
				</div>
			</div>
			
			
		</div>
	</div>
	<script src="http://autohapa.oneviewcrm.com/autohapa/assets/libs/jquery-ui/jquery-ui.min.js"></script>
	
	<script>
	
	
	
    $(document).ready(function(){
		get_data();
		
	        //$("#vehicle__details").hide();
			  $("#imagesSectionNew").hide();
			  
				$("#contactDetailsSection").hide();
			  	$(".form-footer").hide();
			    // $("#descriptionButton").click(function(){
				// $("#vehicle__details").show("slow");
			// });
			  
			  
			  $("#descriptionButton").click(function(){
				$("#imagesSectionNew").show("slow");
			});
// 					$("#imagesButton").click(function(){
// 				$("#contactDetailsSection").show("slow");
				
// 					$(".form-footer").show("slow");
// 			});
	});
	
	
		$('.js-details-toggle').click(function(e) {
			e.preventDefault();
			$(this).toggleClass('is-open');
		});
		$('.contact__second-number-link').click(function(e) {
			e.preventDefault();
			$(this).css({'display': 'none'});
			$('#secondNumberRow').css({'display': 'flex'});
		});
		$('input[name="contactDetails.includeEmailInAdvert"]').bind('change', function() {
			var showOrHide = $(this).val();
			jQuery.fx.off = true;
			$('.js-email-section').toggle(showOrHide);
		});
		$('.sidebar__toggle').click(function() {
			$(this).toggleClass('open');
			$(this).next('.sidebar__overview').slideToggle('fast');
		})
		
		
		
		
		  $("#uploadImage").change(function(){
        $('.image_preview').html("");
     var total_file= document.getElementById("uploadImage").files.length;

     var dropIndex;
        $(".image_preview").sortable({
            	update: function(event, ui) { 
            		dropIndex = ui.item.index();
            }
        });

     for(var i=0;i<total_file;i++)
     {
		  
		 
      $('.image_preview').append("<span class=\"pip\"><img id='image_"+i+"' src='"+URL.createObjectURL(event.target.files[i])+"'><br/><span class=\"remove\">Remove image</span></span>");
	 
	    
     }
	 
	   //var imageIdsArray = [];
            // $('#image_preview img').each(function (index) {
                // if(index <= dropIndex) {
                    // var id = $(this).attr('id');
                    // var split_id = id.split("_");
					
					
					
                    // imageIdsArray.push(split_id[1]);
                // }
				
				// // document.getElementById('imgOrdinal').value = imageIdsArray;
            // });
	 
	        // var data = "imageOrdinal=" + JSON.stringify(imageIdsArray);
	        // $.ajax({
                // url: "../ajax/ajax_upload_carImage.php",
                // dataType: 'json',  
                // cache: false,
                // contentType: false,
                // processData: false,
                // data: data,
                // type: 'POST',
                // success: function(result) {
                                // return;
                // },
                // });

			
			
			
			
	 
            $('#myModal').modal('show');
        	$(".remove").click(function(){
        		 $(".pip").remove();
        		 $('#uploadImage').val('');
            });
		});
		
		
		
		
		
		
		//function for Insert_Image		   
		$(document).ready(function (e){
			$("#formImage").on('submit',(function(e){
				e.preventDefault();
						
				var extension = $('#uploadImage').val().split('.').pop().toLowerCase();
					   
					   if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
					   {
								$('#uploadImageError').html("Please Select Images");
								$('#uploadImageError').css({'display': 'block'});
								//document.getElementById('uploadImageError').style.color = 'red';	
								$('#uploadImage').val('');
								return false;
					   }
					   else
					   {
					       
					       $('#imagesButton').text('Loading....'); 
					       
						  /*  formd = new FormData();
						   formd.append("files",$('#uploadImage')) */
						   //thisElem = $(this);
							$.ajax({
								 url: "../ajax/ajax_upload_carImage.php",
								 type:"POST",
								 data: new FormData(this),
								 contentType:false,
								 processData:false,
								 success:function(data)
								 {
								     	
								     	
								     	$('#uploadImageError').css({'display': 'none'});
								     
                    				 //alert(' description');
                    	            setTimeout(function(){  
								     
                        				$("#contactDetailsSection").show("fast");
                        				
                        					$(".form-footer").show("fast");
                        					
                        						$('#imagesButton').html('Next step &nbsp;<i class="fa fa-arrow-right" ></i>'); 
                        					
                    
                    	                    }, 1000);
								  
									},
								});
					   }
						
				}));
			});
								
				
	// condition for checking when one element is checked another Unchecked 
	
		function checking(element)
		{
			var test = $(element).val();
			
			if(test == '1'){
				
				//$('input[name="Electric sunroof"]').prop('checked',true);
		      $('input[name="Manual sunroof"]').prop('checked',false);

			}
			if(test == '2'){
					$('input[name="Electric sunroof"]').prop('checked',false);
		      //$('input[name="Manual sunroof"]').prop('checked',false);
				
			}
			
			if(test == '18'){
				
				$('input[name="Pearlescent paint"]').prop('checked',false);
				
			}else{
				
				$('input[name="Metallic paint"]').prop('checked',false);
				
			}
			
		}
		
		
		var controltype = '';
		
		function getCarFeatures()
		{
			var list = $('#featuresList');
					list.empty(); 

					
			$.ajax({
            type: "GET",
            url:"../ajax/ajax_get_carfeatures.php",
            dataType: "json",
            success: function (data) {
				
						selecter = "<select id='selectOptions'>";
						options = "";
						$.each(data.Features,function(i,obj)
							{	
							   
							   controltype = obj.controltypeid;
							   
								if(obj.controltypeid == 3)
								{
									// if(obj.name == 'Alloy Wheels'){
										
										// var options = options + "<option value='"+obj.id+"'>"+obj.name+"</option>";
									    // selecter = selecter + options;
									// }
									
									var options = options + "<option value='"+obj.id+"'>"+obj.name+"</option>";
									selecter = selecter + options;
									
									// var div_list = '<li class="features__list--item" id="featuresListItem"><select><option value="'+obj.id+'">'+obj.name+'</option></select></li>';
									// $('#featuresList').append(div_list);
									
								}
								else if(obj.controltypeid == 2)
								{
										
									var div_list = '<li class="features__list--item" id="featuresListItem"><input id="feature1" onclick="checking(this)"  type="radio" name="'+ obj.name+'"  value="'+ obj.id+'" data-displayname="'+ obj.name+'"><label  class="form__control-label form__control-label--check" title="'+ obj.name+'"><span class="form__control-text">&nbsp;'+ obj.name+'</span></label></li>';
									$('#featuresList').append(div_list);
									
								}
								else
								{
									
									var div_list = '<li class="features__list--item" id="featuresListItem"><input id="feature1" onclick="checking(this)"  type="checkbox" name="'+ obj.name+'"  value="'+ obj.id+'" data-displayname="'+ obj.name+'"><label  class="form__control-label form__control-label--check" title="'+ obj.name+'"><span class="form__control-text">&nbsp;'+ obj.name+'</span></label></li>';
									$('#featuresList').append(div_list);
									
								}
							
								
								
							});
							if(selecter.indexOf("</select>") != "-1") {
								selecter = selecter + "</select>";
							}
							$('#featuresList').append(selecter);
					
				}
			});
		}
		
	
		var adTitle = '';
		
		function get_data()
		{
					
					var carregnum = $('#hdregnum').val();
					
					
					var dataString = 'carregnum='+carregnum;
							$.ajax({
							type: "GET",
							url: "../ajax/ajax_get_carbyregistrationnumber.php",
							data: dataString,
							datatype:'json',
							cache: false,
							
							success: function(result){ 
							result = JSON.parse(result);
							
							//alert(result);
							//console.log(result.data.make);
							
							//alert(result.data.email);
							document.getElementById('summaryMake').innerHTML =result.data.make;
							document.getElementById('summaryModel').innerHTML =result.data.model;
							document.getElementById('summaryDerivative').innerHTML =result.data.derivative;
							document.getElementById('adq-asking-price').innerHTML =result.data.price;
							document.getElementById('askingPrice').value =result.data.price;
							document.getElementById('hdcaradid').value =result.data.id;
							document.getElementById('hdcaradids').value =result.data.id;
							adTitle = result.data.make+result.data.model+result.data.derivative;
							document.getElementById('adTitle').innerHTML =adTitle;
							document.getElementById('contactEmail').value =result.data.email;
							
							
							
							}
							
							});
				}


        function deleteCarFeatures()
		{
			   var dataString = "hdcaradid="+document.getElementById('hdcaradid').value;
				
				$.ajax({
				   type: "POST",
				   url: "../ajax/ajax_delete_Carfeatures.php",
				   data: dataString ,
				   cache: false,
				   success: function(result){
					   
					   
					 },
				});			
			
			   
		  }


		function insert_checkboxes()
		{
			
			deleteCarFeatures();
			
			  
				var names_array = [];
			    $("input[type='checkbox']:checked").each(function() {
				   var checkOption = $(this).val(); 
				   names_array.push(checkOption);
				  
				});
				
				 $("#featuresListItem input[type='radio']:checked").each(function(i, el) {
				   //var radioOption = $(this).val(); 
				   var radioOption = $(el).val(); 
				   names_array.push(radioOption);
				 });
				 
				  $("#selectOptions option:selected").each(function(i, em) {
				   //var radioOption = $(this).val(); 
				   var selectOption = $(em).val(); 
				   names_array.push(selectOption);
				 });
				
				
				var dataString = "options="+JSON.stringify(names_array)
				+"&hdcaradid="+document.getElementById('hdcaradid').value;
				
				$.ajax({
				   type: "POST",
				   url: "../ajax/ajax_insert_features.php",
				   data: dataString ,
				   cache: false,
				   success: function(result){
					   
					   
				   },
				});			
			
		}
			
			
			
		function update_car_ad_data()
		{ 
		   
		   errorCount= 0;
			
		if ($('#askingPrice').val() == '')
		{
			$('#askingPriceError').html("Please enter your vehicle's  Price.");	
             document.getElementById('askingPriceError').style.color = 'red';	
            return;			 
		}
		else
		{
			$('#askingPriceError').html('');
			errorCount = errorCount + 1;
		}
			
		//var id = document.getElementById('user_id').value;
			
			
			
			var dataString = "askingPrice="+document.getElementById('askingPrice').value
										  +"&hdcaradid="+document.getElementById('hdcaradid').value
										   +"&customer_id="+document.getElementById('user_id').value
										  +"&adTitle="+adTitle
										  +"&txtSubtitle="+document.getElementById('attentionGrabberText').value
										  +"&OwnersQuantity="+document.getElementById('sellingPointsOwners').value
										  +"&ServiceHistory="+document.getElementById('sellingPointsHistory').value
										  +"&MotDate="+document.getElementById('sellingPointsMotDate').value
										  +"&txtdesc="+document.getElementById('desc').value
										   +"&contactNumber1="+document.getElementById('contactNumber1').value
										  +"&contactNumber2="+document.getElementById('contactNumber2').value
										 +"&contactEmail="+document.getElementById('contactEmail').value
										  +"&postcode="+document.getElementById('postcode').value;
										 
			
			
			   // alert('customer_id  '+id);
			
                $.ajax({
				   type: "POST",
				   url: "../ajax/ajax_insert_ad_data.php",
				   data: dataString ,
				   cache: false,
				   success: function(result){
				       
				       
				       
				        $('#descriptionButton').text('Loading....');   
                    				
                    				 //alert(' description');
                    	 setTimeout(function(){ 	$('#descriptionButton').text('continue');  }, 1000);
				       
					
				   },
				});			
						
						insert_checkboxes();
						get_data();	
		}



		function update_car_contactDetails()
				{ 
				   
				   errorCount= 0;
					
				if ($('#contactNumber1').val() == '')
				{
					$('#contactNumber1Error').html("Please enter contact Number.");
					$('#contactNumber1Error').css({'display': 'block'});
					//document.getElementById('contactNumber1Error').style.color = 'red';	
					return;			 
				}
				else
				{
					$('#contactNumber1Error').html('');
					$('#contactNumber1Error').css({'display': 'none'});
					errorCount = errorCount + 1;
				}
					
				

				if ($('#postcode').val() == '')
				{
					$('#postcodeError').html("Please enter postcode.");
					$('#postcodeError').css({'display': 'block'});
					//document.getElementById('postcodeError').style.color = 'red';	
					return;			 
				}
				else
				{
					$('#postcodeError').html('');
					$('#postcodeError').css({'display': 'none'});
					errorCount = errorCount + 1;
				}
					
					//alert('update Successfully');
					
					
					var dataString = "hdcaradid="+document.getElementById('hdcaradid').value
										+"&contactNumber1="+document.getElementById('contactNumber1').value
										+"&contactNumber2="+document.getElementById('contactNumber2').value
										+"&contactEmail="+document.getElementById('contactEmail').value
										 +"&postcode="+document.getElementById('postcode').value;
												 
					
						$.ajax({
						   type: "POST",
						   url: "../ajax/ajax_update_contact_details.php",
						   data: dataString ,
						   cache: false,
						   success: function(result){
						       
						       $('#BtnNext').text('Loading....');   
                    				
                    				 //alert(' description');
                    	 setTimeout(function(){ 	$('#BtnNext').text('continue'); 
                    	 
                    	     window.location.href="../package/";
                    	     
                    	 }, 1000);
						       
							   
							   
							},
						});			
								
								// insert_checkboxes();
								// get_data();	
				}

						
	</script>
<?php include_once('../includes/footer.php'); ?>

<script type="text/javascript">
$('#sellingPointsMotDate').datepicker();
												
</script>