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
								<!-- This Ad  registration number  -->
								<input type="hidden" id="hdregnum" value="<?php echo $regnum;?>">
								<!-- This Ad  id  -->
								<input type="hidden" id="hdcaradid" value="">
								<!-- This user id  -->
								<input type="hidden" id="user_id" value="<?php echo $customer_id;?>">
								<!--  category type id  -->
								<input type="hidden" id="type_ids" value="<?php echo $type_id;?>">
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
						<p class="section--subtitle mb-4">Change or add to your car's details. You can see how your ad will look on
							the right.</p>
					</div>
					<section id="" class="attention-grabber mb-4">
						<div class="form-group row align-items-center">
							<label id="details" for="attentionGrabberSelect" class="col-sm-4 col-form-label">Title:</label>

							<div class="col-sm-8">
								<div class="attention-grabber__title description__global--text"><strong id="adTitle">Ford Fiesta 1.25
										Freestyle 3dr</strong></div>
							</div>
						</div>

						<div class="form-group row">
							<label id="details" for="attentionGrabberSelect" class="col-sm-4 col-form-label">Subtitle:
								<span class="form__label--subtitle">Use this to grab buyers' attention from the search results
									page.</span>
							</label>

							<div class="col-sm-8">
								<div class="attention-grabber__container">
									<input id="attentionGrabberText" class="form-control" placeholder="e.g. Full service history"
										type="text" maxlength="30" name="attentionGrabberForm.text" value="">
								</div>
							</div>
						</div>
					</section>

					<section id="featuresSection" class="structure--spacing features" data-channel="car" data-features="false">
						<div class="form-group row align-items-start">
							<label class="col-sm-4 col-form-label">
								Features:
								<span class="form__label--subtitle">These will appear in your ad. You can change them using the
									Add/Remove option.</span>
							</label>

							<div class="col-sm-8">
								<p id="selectedFeaturesWrapper"
									class="description__global--text description--placeholder js-features-text"
									data-default="Select your car's features here, be as specific as you can as this will help buyers to find your car.">
								</p>
								<a id="addFeatures" class="description__global--toggle js-details-toggle" onclick="getCarFeatures()"
									href="#">
									<span><i class="fa fa-edit"></i> Add/Remove features</span>
									<span><i class="fa fa-times-circle"></i> Close features</span>
								</a>
								<div id="availableFeatures" class="description__global--inputs pt-3">
									<ul id="featuresList" class="features__list js-feature-list">

										<li class="features__list--item">
											<label for="feature1" class="form__control-label form__control-label--check"
												title="Electric sunroof">
												<input id="feature1" class="form__control-input" type="radio" name="featuresForm.sunroof"
													value="Electric sunroof" data-displayname="Electric sunroof">

												<span class="form__control-text">&nbsp;Electric sunroof</span></label>
										</li>

										<li class="features__list--item"><select id="selectfeature"></select></li>

										<li class="features__list--item"><label for="feature3"
												class="form__control-label form__control-label--check" title="Electric windows"><input
													id="feature3" class="form__control-input" type="checkbox" name="featuresForm.selectedFeatures"
													value="Electric windows" data-displayname="Electric windows"><span
													class="form__control-text">&nbsp;Electric windows</span></label></li>

										<li class="features__list--item"><label for="feature4"
												class="form__control-label form__control-label--check" title="Air conditioning"><input
													id="feature4" class="form__control-input" type="checkbox" name="featuresForm.selectedFeatures"
													value="Air conditioning" data-displayname="Air conditioning"><span
													class="form__control-text">&nbsp;Air conditioning</span></label></li>
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
								<p id="selectedSellingPoints"
									class="description__global--text description--placeholder js-selling-points-text"
									data-default="No details selected">1 Owners</p>

								<a id="addSellingPoints" class="description__global--toggle js-details-toggle" href="#">
									<span><i class="fa fa-edit"></i> Add/Remove details</span>
									<span><i class="fa fa-times-circle"></i> Close details</span>
								</a>

								<div id="availableSellingPoints" class="description__global--inputs">

									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Owners: <small class="form__field--subtitle">Include
												yourself</small></label>
										<div class="col-sm-8 form__select-container">
											<select id="sellingPointsOwners" name="sellingPoints.previousOwners"
												class="form__select form-control">
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
											<select id="sellingPointsHistory" name="sellingPoints.serviceHistory"
												class="form__select form-control">
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
											<input id="sellingPointsMotDate" data-date-format="yyyy-mm-dd" name="sellingPoints.motExpiryDate"
												type="text" value="" class="input-field form__date form-control isDatePicker2 " title="MOT due">

										</div>
									</div>
								</div>

							</div>

						</div>
					</section>

					<section id="descriptionSection" class="mb-4">
						<div class="form-group row">
							<label id="details" for="desc" class="col-sm-4 col-form-label description__label">Advert text:
								<span class="form__label--subtitle">This will appear at the top of your ad. Use it to persuade buyers to
									read further.</span>
							</label>

							<div class="col-sm-8">
								<textarea id="desc" name="description" class="form__textarea form-control"></textarea>
							</div>
						</div>
						<button type="submit" id="descriptionButton" onclick="update_car_ad_data()"
							class="btn  btn-blue description__button" style="margin-left:34.5%;">Continue</button>
					</section>

					<section id="imagesSectionNew" class="imagesSectionNew mb-4">
						<input type="hidden" value="trade" class="js-trade-images">
						<h2 class="section-title">Photos of your car</h2>
						<p class="section-title--subtitle mb-4">
							Your advert can contain up to 30 photos. Free adverts are limited to the first 5 photos.
						</p>

						<div class="form-group row">

							<label class="col-sm-4 col-form-label">Photos:</label>


							<div class="col-sm-8 images__section">
								<section id="photos_section">
									<div id="uploadPhotoContainer" class="photoInfo " style="position: relative;">
										<form id="formImage" method="post" enctype="multipart/form-data">
											<input type="hidden" id="hdcaradids" name="hdcaradids" value="">
											<!--<input type="hidden" id="imgOrdinal" name="imgOrdinal" value="">-->
											<button type="button" class="btn btn-outline-success images__add-button js-add-photos"
												id="uploadPhoto" style="z-index: 1;"><i class="fa fa-camera"
													style="font-size: 14px;"></i>&nbsp;Add photos</button>
											<input id="uploadImage" type="file" accept="image/*" name="uploadImage[]" class="file" multiple />

									</div>


									<!-- Modal -->

									<div id="uploadImageError" class="error"></div>
								</section>


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



								<button type="submit" id="imagesButton" class="btn  btn-blue">Next step &nbsp;<i
										class="fa fa-arrow-right"></i></button>
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
									<input type="tel" id="contactNumber1"
										class="form-control js-keypadInput js-phone js-phone-primary adq-contact-number"
										name="contactDetails.contactNumber1" value="" maxlength="12">
									<a id="secondNumber" class="contact__second-number-link js-add-number ">Add a second number</a>
								</div>
								<div id="contactNumber1Error" class="error"> </div>
							</div>


							<div id="secondNumberRow" class="form-group row hide js-secondary-container">
								<label for="contactNumber2" id="contactNumber2Label" class="col-sm-4 col-form-label">
									Secondary number:
								</label>
								<div class="col-sm-8">
									<input type="tel" id="contactNumber2"
										class="form-control js-keypadInput js-phone js-phone-secondary adq-secondary-number"
										name="contactDetails.contactNumber2" value="" maxlength="12">
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
										<p><strong>For your safety and security, we'll show a unique Auto Trader phone number in place of
												your contact number.</strong></p>
										<p>Calls will be forwarded to your contact number without charging customers extra. <a
												href="https://www.autotrader.co.uk/secure/safety_and_security_centre/protect_your_number"
												class="tracking-standard-link" target="_blank">Find out more</a></p>
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
											<input type="radio" id="includeInAd"
												class="form__control-input form-switch__input js-email-include"
												name="contactDetails.includeEmailInAdvert" value="true">
											<div class="form-switch__option">Yes</div>
										</label>
										<label for="excludeFromAd" class="form-switch__label tracking-standard-link">
											<input type="radio" id="excludeFromAd"
												class="form__control-input form-switch__input js-email-exclude"
												name="contactDetails.includeEmailInAdvert" value="false" checked="">
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
									<input type="email" id="contactEmail" name="contactEmail"
										class="form-control adq-contact-email js-email" value="" maxlength="50" data-savedemail="">
								</div>
							</div>

							<div class="form-group row">
								<label for="postcode" class="col-sm-4 col-form-label is-invalid" id="postcodeLabel">
									* Location of car:
									<span class="form__label--subtitle">(Postcode)</span>
								</label>
								<div class="col-sm-8">
									<input id="postcode" type="text" name="contactDetails.postcode"
										class="form-control adq-contact-postcode js-postcode" value="" maxlength="8">
								</div>
								<div id="postcodeError" class="error"> </div>
							</div>

						</section>
					</div>


				</div>

				<div class="form-footer mt-5 mb-4">
					<div class="buttons text-center">
						<a href="../sellmycar" id="BtnCancel" name="BtnCancel" class="back-link"><i
								class="fa fa-arrow-left"></i>&nbsp;Back</a>
						<a href="javascript:void(0)" id="BtnNext" onclick="update_car_contactDetails()" name="BtnNext"
							class="btn btn-blue">Next Step</a>
					</div>
				</div>

			</div>

			<div class="col-md-4">
				<aside id="runningSummary" class="sidebar__container">
					<h2 class="section-title section-title--spacing">Your advert</h2>
					<div class="sidebar__section">
						<a href="/sidebar-cardetails/2c9299cf6c664f55016c70e926be464d" id="summaryEdit"
							class="button__edit">Edit</a>
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
						<a href="/sidebar-advertdetails/2c9299cf6c664f55016c70e926be464d" id="advertEdit"
							class="button__edit sidebar__advert-edit">Edit</a>
						<h4 class="sidebar__toggle js-sidebar__toggle open" id="advertHeader">
							<span class="sidebar__toggle--open"><i class="fa fa-minus"></i></span>
							<span class="sidebar__toggle--close"><i class="fa fa-plus"></i></span>
							Your advert
						</h4>
						<ul class="sidebar__overview sidebar__overview--advert">
							<li>
								<div class="sidebar__overview--title">Asking price</div>
								<div class="sidebar__overview--value sidebar__overview--prefix">&pound;</div>
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
								<div class="sidebar__overview--title">Photos</div> <span id="adq-photos" data-limit="20"
									class="sidebar__overview--value"></span>
							</li>
							<li class="keepHidden" style="display: none;">
								<div class="sidebar__overview--title">Contact number</div> <span id="adq-contact-number"
									class="sidebar__overview--value"></span>
								<span id="adq-primary-telesafe" class="sidebar__overview--value">(Protected)</span>
							</li>
							<li class="keepHidden" style="display: none;">
								<div class="sidebar__overview--title">Secondary number</div> <span id="adq-secondary-number"
									class="sidebar__overview--value"></span><span id="adq-secondary-telesafe"
									class="sidebar__overview--value"> (Protected)</span>
							</li>
							<li class="keepHidden" style="display: none;">
								<div class="sidebar__overview--title">Email address</div> <span id="adq-contact-email"
									class="element__no-wrap sidebar__overview--value"></span>
							</li>
							<li class="keepHidden" style="display: none;">
								<div class="sidebar__overview--title">Postcode</div> <span id="adq-contact-postcode"
									class="sidebar__overview--value"></span><span class="sidebar__overview--value"> (not shown in
									ad)</span>
							</li>
						</ul>
					</div>


				</aside>

			</div>

		</div>
	</div>
</section>