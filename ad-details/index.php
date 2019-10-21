<?php 


include_once('../includes/header.php');
include "../includes/config.php";
if(isset($_REQUEST['ad-id'])){
	
		$carad_id= $_REQUEST['ad-id'];
		$title= $_REQUEST['title'];
		//$main_img = $_REQUEST['main_img'];
		//$images= json_decode($_POST['images']);
		$price= $_REQUEST['price'];
		
	}



		
$Query = 
"SELECT car_ad.`id` AS id , car_ad.`adtitle` AS title , car_ad.`adverttext` AS Detail ,   car_lkptColour.`name` AS color , car_variant.`name`  AS variant ,
 car_images.`name` AS image ,car_images.`ordinal`,
 car_derivative.`name` AS derivative , car_lkptfuel_type.`name` AS FuelType , 
 car_lkpttransmission.`name` AS Transmission , car_ad.`price` AS price , car_ad.`car_milage` AS milage ,
 car_ad.`contactnumber` AS contact ,car_ad.`adsubtitle` AS subtitle , car_user.`name`AS sellerName
 FROM car_ad
INNER JOIN car_lkptColour ON car_lkptColour.`id` = car_ad.`car_colourid`
INNER JOIN car_variant ON car_ad.`car_variantid` = car_variant.`id`
INNER JOIN car_derivative ON car_ad.`car_derivativeid` = car_derivative.`id`
INNER JOIN car_lkptfuel_type ON car_ad.`car_fueltypeid` = car_lkptfuel_type.`id`
INNER JOIN car_lkpttransmission ON car_ad.`car_transmissionid` = car_lkpttransmission.`id`
INNER JOIN car_user ON car_ad.`customer_id` = car_user.`id`
INNER JOIN car_images ON car_images.`carad_id` = car_ad.`id` AND car_images.`ordinal` = 0
 WHERE car_ad.`id` = $carad_id ";
		
		
	$CarSearchQuery = mysqli_query($conni,$Query);
		
		//$data_arr = array();
		
	while($data = mysqli_fetch_assoc($CarSearchQuery))
	{	
			@$details =	$data['Detail'];
			@$color =	$data['color'];
			@$variant =	$data['variant'];
			@$main_img =	$data['image'];
			@$derivative =	$data['derivative'];
			@$FuelType =	$data['FuelType'];
			@$Transmission =	$data['Transmission'];
			@$milage =	$data['milage'];
			@$contact =	$data['contact'];
			@$subtitle =	$data['subtitle'];	
			@$sellerName =	$data['sellerName'];		

				
	}
	
	
	
	 

	






?>


<link rel="stylesheet" href="ad-detailsStyleCode.css" />

   <input type="hidden" id="carad_id" value="<?= @$carad_id;?>">

	<input type="hidden" id="Postcode" value="<?= @$postcode;?>">
	<input type="hidden" id="searchMake" value="<?= @$make;?>">
	<input type="hidden" id="searchModel" value="<?= @$model;?>">
	<input type="hidden" id="MinPrice" value="<?= @$MinPrice;?>">
	<input type="hidden" id="MaxPrice" value="<?= @$MaxPrice;?>">
	
	
	
	
	
	
	

	
 <div class="container-fluid " style="background-color:#fff !important;">
 <hr>
      <div class="row section-gap mx-xs-0 mb-5">
	  
		<header class="fpa__heading col-md-12">
			<div class="advert-heading fpa__title">
				  <div class="advert-heading__condition ">Used car</div>
					  <h1 class="advert-heading__title "><?= @$title;?></h1>
					  <p class="advert-heading__attention-grabber "><?= @$subtitle;?></p>
			</div>
			<div class="advert-price fpa__price">
				  <div class="advert-price__cash">
						<span class="advert-price__cash-price mt-3">$<?= @$price;?></span>
				  </div>
				  
			</div>
		</header>
		
        <div class="col-md-7">
			<div class="row" data-lightbox="photos">
				
				<a href="../assets/<?= @$main_img;?>" data-lightbox="photos" class="w-100 main-img">
					<img src="../assets/<?= @$main_img;?>" alt="" srcset="" class="w-100 main-img" />
				</a>
			</div>
			<div id="image_preview" class="row mt-2 ml-1 mb-2">
				
				<?php 
					$CarImageQuery = mysqli_query($conni,'Select name From car_images where carad_id = "'.$carad_id.'" and isadminApproved_ynid=1 and isdeleted_ynid=2  ;');
		
						while($Imagedata = mysqli_fetch_assoc($CarImageQuery))
						{
							$img = $Imagedata['name'];
					?>
					<div id="image_preview">
					<a href="../assets/<?= @$img;?>"  data-lightbox="photos">
						<img class="img-fluid" src="../assets/<?= @$img;?>">
					</a>
					</div>
				<?php 		
					 }
					
				?>
				
			</div>
			
		<div class="row">
				<div class="heading mt-2">
					<h3 class="advert-price__cash-price">Overview</h3>
				</div>
			<div class="fpa__overview mt-3">
				<div class="fpa__key-specs">
					<ul class="key-specifications">
						<li>
							<svg class="key-specifications__icon">
							<use xlink:href="/images/svg/key-specifications/cars.svg#ks-manufactured-year"></use>
							</svg><?= @substr($variant,6);?>
						</li>
						<li>
							<svg class="key-specifications__icon">
							<use xlink:href="/images/svg/key-specifications/cars.svg#ks-body-type"></use>
							</svg><?= @$color;?>
						</li>
						<li>
							<svg class="key-specifications__icon">
							<use xlink:href="/images/svg/key-specifications/cars.svg#ks-mileage"></use>
							</svg><?= @$milage;?> miles
						</li>
						<li>
							<svg class="key-specifications__icon">
							<use xlink:href="/images/svg/key-specifications/cars.svg#ks-engine-size"></use>
							</svg><?= @substr($derivative, 0, 3);?>L
						</li>
						<li>
							<svg class="key-specifications__icon">
							<use xlink:href="/images/svg/key-specifications/cars.svg#ks-transmission"></use>
							</svg><?= @$Transmission; ?>
						</li>
						<li>
							<svg class="key-specifications__icon">
							<use xlink:href="/images/svg/key-specifications/cars.svg#ks-fuel-type"></use>
							</svg><?= @$FuelType;?>
						</li>
						<li>
							<svg class="key-specifications__icon">
							<use xlink:href="/images/svg/key-specifications/cars.svg#ks-doors"></use>
							</svg>4 doors
						</li>
					</ul>
				</div>
				<p class=" mt-5  atc-type-picanto">
					<?= @$details;?>
				</p>
			</div>
		</div>
			
	</div>
		
		
		
        <div class="col-md-5">
          <aside class="side_content">
            <div class="card w-100 dealer_details">
				<div class="content_1  card-body">
					  
                    <!--<img class="dealer_details_img" src="https://dealerlogo.atcdn.co.uk/at2/adbranding/10014293/images/fpa_logo.gif" alt="">-->
                    <a href="#"><h3 class="dealer_details_link"><?= @$sellerName;?></h3></a>
					  
					  
					
					<div class="chat-with-seller offline">
					  <span class="svg-holder chat-with-seller__icon">
						<span>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							<path d="M0 0h24v24H0V0z" fill="none"></path>
							<path
							  d="M2.8 2.4a.9.9 0 0 1 1.53-.76L19.8 17.09a.9.9 0 0 1-1.27 1.27l-.36-.36H6l-4 4V4a2 2 0 0 1 .8-1.6zM4.17 4H4v13.17L5.17 16h10.99l-2.38-2.38A1 1 0 0 1 13 14H7a1 1 0 0 1-1-1 1 1 0 0 1 1-1h5.16l-1-1H7a1 1 0 1 1 0-2h2.16l-1-1H7a1 1 0 0 1-.62-1.78L4.16 4zM20 14.73V4H9.27l-2-2H20a2 2 0 0 1 2 2v12c0 .22-.04.43-.1.63l-1.9-1.9zM14.27 9H17a1 1 0 1 1 0 2h-.73l-2-2zm-3-3H17a1 1 0 1 1 0 2h-3.73l-2-2z"
							></path>
						  </svg>
						 <!-- <i class="fa fa-comments-o fa-2x" aria-hidden="true"></i>-->
						</span>
					  </span>
					  <div class="chat-with-seller__label-container">
						<div class="chat-with-seller--status atc-type-smart">
						  seller offline
						</div>
						<span class="chat-with-seller__label atc-type-picanto"
						  >Chat unavailable</span
						>
					  </div>
					</div>
					<div class="dealer_detail_tel">
					  <p>
						Or call:
						<a href="#"><span><?= @$contact;?></span></a>
					  </p>
					</div>
					
					<div class="btn-row">
					  <a href="contact-seller.php?ad-id=<?=$carad_id?>&title=<?=$title?>&price=<?=$price;?>" class="cs-button cs-btn-tertiary">Email seller</a>
					  <!--<a class="cs-button cs-btn-primary">Visit Website</a>-->
					</div>
					
					
					
				</div>
          </div>
		  
            <div class="card w-100 mt-5 mb-5 dealer_details">
                <div class="card-body">
                    <h5 class="card-title">About this seller</h5>
                    <!--<img class="dealer_details_img" src="https://dealerlogo.atcdn.co.uk/at2/adbranding/10014293/images/fpa_logo.gif" alt="">-->
                    <!--<a href="#"><h3 class="dealer_details_link">Startin Peugeot (Worcester)</h3></a>-->
                </div>
            </div>
			
			
          </aside>
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