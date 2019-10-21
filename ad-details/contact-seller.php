<?php 


include_once('../includes/header.php');
include "../includes/config.php";
if(isset($_REQUEST['ad-id'])){
	
		$carad_id= $_REQUEST['ad-id'];
		$title= $_REQUEST['title'];
		//$main_img = $_REQUEST['main_img'];
		//$images= json_decode($_POST['images']);
		$price= $_REQUEST['price'];
		// $MaxPrice= $_REQUEST['MaxPrice'];
		//echo $images;
	}



		
// $Query = 
// "SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_ad.`adverttext` AS Detail ,   car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
 // car_images.`name` AS image ,car_images.`ordinal`,
 // car_derivative.`name` AS derivative , car_lkptfuel_type.`name` AS FuelType , 
 // car_lkpttransmission.`name` AS Transmission , car_ad.`price` AS price , car_ad.`car_milage` AS milage ,
 // car_ad.`contactnumber` AS contact ,car_ad.`adsubtitle` AS subtitle , car_user.`name`AS sellerName
 // FROM car_ad
// INNER JOIN car_lkptColour ON car_lkptColour.`id` = car_ad.`car_colourid`
// INNER JOIN car_variant ON car_ad.`car_variantid` = car_variant.`id`
// INNER JOIN car_derivative ON car_ad.`car_derivativeid` = car_derivative.`id`
// INNER JOIN car_lkptfuel_type ON car_ad.`car_fueltypeid` = car_lkptfuel_type.`id`
// INNER JOIN car_lkpttransmission ON car_ad.`car_transmissionid` = car_lkpttransmission.`id`
// INNER JOIN car_user ON car_ad.`customer_id` = car_user.`id`
// INNER JOIN car_images ON car_images.`carad_id` = car_ad.`id` AND car_images.`ordinal` = 0
 // WHERE car_ad.`id` = $carad_id ";
		
		
	// $CarSearchQuery = mysqli_query($conni,$Query);
		
		// //$data_arr = array();
		
	// while($data = mysqli_fetch_assoc($CarSearchQuery))
	// {	
			// @$details =	$data['Detail'];
			// @$color =	$data['color'];
			// @$variant =	$data['variant'];
			// @$derivative =	$data['derivative'];
			// @$FuelType =	$data['FuelType'];
			// @$Transmission =	$data['Transmission'];
			// @$milage =	$data['milage'];
			// @$contact =	$data['contact'];
			// @$subtitle =	$data['subtitle'];	
			// @$sellerName =	$data['sellerName'];		

				
	// }
	
	
	
	 

	






?>


<link rel="stylesheet" href="contact-sellerStyleCode.css" />

   <input type="hidden" id="carad_id" value="<?= @$carad_id;?>">

	<input type="hidden" id="Postcode" value="<?= @$postcode;?>">
	<input type="hidden" id="searchMake" value="<?= @$make;?>">
	<input type="hidden" id="searchModel" value="<?= @$model;?>">
	<input type="hidden" id="MinPrice" value="<?= @$MinPrice;?>">
	<input type="hidden" id="MaxPrice" value="<?= @$MaxPrice;?>">
	
	
	
	
	
	
	

	
 <div class="container " style="background-color:#fff !important;">
 <hr>
      <div class="row section-gap mx-xs-0 mb-5">
	  
		<div class="lead__holder">
						<header class="back-title-link">
							<div class="back-title-link__title-container">
							<a class="back-title-link__link"href="../ad-details/?ad-id=<?= $carad_id;?>&title=<?= $title;?>&price=<?= $price;?>" rel="external" title="Back to advert link">
									<span class="icon-svg back-title-link__icon"><svg
											xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12">
											<path
												d="M3.4 7H12a1 1 0 0 0 0-2H3.4l3.3-3.3a1 1 0 0 0 0-1.4 1 1 0 0 0-1.4 0l-5 5a1 1 0 0 0 0 1.4l5 5a1 1 0 0 0 1.4-1.4z">
											</path>
										</svg></span></a>
								<h1 class="back-title-link__title atc-type-phantom atc-type-phantom--medium">Your enquiry</h1>
							</div>
						</header>
				<div class="leads-form">
					<h2 class="leads-form--title atc-type-fiesta atc-type-fiesta--medium"><?= $title;?>
					</h2>
					<form novalidate="">
						<div class="field-holder field-holder--inline-fields">
							<div class="atc-field">
							<label for="firstName" class="atc-field__label atc-field__label-floating">First name</label>
							<input class="atc-field__input atc-field__input--floating" id="firstName"
									maxlength="50" placeholder="e.g. John" type="text" value="">
							</div>
							<div class="atc-field">
							<label for="lastName" class="atc-field__label atc-field__label-floating">Last name</label>
								<input class="atc-field__input atc-field__input--floating" id="lastName"
									maxlength="50" placeholder="e.g. Smith" type="text" value="">
									
									</div>
						</div>
						<div class="field-holder">
							<div class="atc-field">
								<label for="email" class="atc-field__label atc-field__label-floating">Email</label>
								<input class="atc-field__input atc-field__input--floating" id="email"
									maxlength="100" placeholder="e.g. name@email.com" required="" type="email" value="">
							</div>
						</div>
						<div class="field-holder">
							<div class="atc-field">
							<label for="phoneNumber" class="atc-field__label atc-field__label-floating">Phone number (optional)</label>
							<input class="atc-field__input atc-field__input--floating" id="phoneNumber"
									maxlength="20" placeholder="e.g. 07770 000 000" type="text" value="">
							</div>
						</div>
						<div class="field-holder">
							<div class="atc-field">
							<label for="message" class="atc-field__label atc-field__label-floating">Your message (optional)</label>
							<textarea id="message" name="message-text-area"
									class="tracking-standard-link atc-field__input atc-field__input--floating" maxlength="250"
									aria-label="Your message (optional)" spellcheck="true" data-label="enquiry message"
									style="margin: 0px; height: 109px; width: 491px;">Hi, I'm interested in this <?= $title;?> for <?= '$'.$price;?>. Please could you contact me back.</textarea>
									
								<p class="c-form__textarea__character-count"><span>83</span> / 250</p>
							</div>
						</div>
						<p class="atc-type-smart leads-form__privacy leads-form__privacy--gdprtest">By hitting "Send to seller",
							you're happy for us to pass your details to the seller in accordance with our 
							<a class="privacy-policy_link" href="#" target="_blank" rel="nofollow noopener">privacy policy</a>.</p>
						<div class="leads-form__actions-panel">
							<button class="atc-button atc-button--primary leads-form__button"
									type="submit">Send to seller</button>
						</div>
						
					</form>
				</div>
			</div>
			
         
       </div>
  </div>






				<form id="getCarsList" action="">
				<input type="hidden" name="getmake" id="getmake" value="">
				<input type="hidden" name="getmodel" id="getmodel" value="">
				<input type="hidden" name="getvariant" id="getvariant" value="">
				<input type="hidden" name="getminPrice" id="getminPrice" value="">
				<input type="hidden" name="getmaxPrice" id="getmaxPrice" value="">
				<input type="hidden" name="getcolour" id="getcolour" value="">
				<input type="hidden" name="getbodyType" id="getbodyType" value="">
				<input type="hidden" name="getfuelType" id="getfuelType" value="">
				<input type="hidden" name="getfuelType" id="getfuelType" value="">
				<input type="hidden" name="getfuelType" id="getfuelType" value="">
				</form>





<!-- <script src="searchCarScriptCode.js" ></script>-->
	
	

<?php include_once('../includes/footer.php'); ?>