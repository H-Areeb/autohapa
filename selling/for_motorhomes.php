
<!---------------------------------------------- Selling form for Motor Home ------------------------------------------------------->


<link rel="stylesheet" href="sellingPageStyle.css" />
	
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
                    <h1 class="page-header__title">Enter the basic details about the motorhome you want to sell</h1>
        		</div>
        	</section>

	<section class="main mb-5">
		<div class="container">
		
			<div class="row justify-content-center">
				<div class="col-md-7 mt-5">
					<form>
					    
					    <input type="hidden" id="vtype_id" name="vtype_id" value="<?= $type_id;?>">
						<div class="form-group row">
							<label for="txtCarNumber" class="col-sm-4 col-form-label">* Reg. No:</label>
							<div class="col-sm-8">
								<input type="text" id="txtCarNumber" name="txtCarNumber" class="form-control"  placeholder="e.g Ak24Q700"/>
							</div>
							<div id="txtCarNumberError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="txtMilage" class="col-sm-4 col-form-label">* Milage:</label>
							<div class="col-sm-8">
								<input type="text" id="txtMilage" name="txtMilage" class="form-control" placeholder="e.g 2000" />
							</div>							
							<div id="txtMilageError" class="error">
							</div>
						</div>
						<div class="form-group row">
							<label for="cmbMake" class="col-sm-4 col-form-label">* Make:</label>
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
                                <label for="txtenginecc" class="col-sm-4 col-form-label">* Engine (cc):</label>
                                <div class="col-sm-8">
                                    <input type="text" id="txtenginecc" name="txtenginecc" class="form-control"  placeholder="e.g 125"/>
                                </div>
                                <div id="txtengineccError" class="error">
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
							<label for="txtCarRegistrationNumber" class="col-sm-4 col-form-label">* Date of first registration:</label>
							<div class="col-sm-8 input-date" data-provide="datepicker">
								<i class="fa fa-calendar icon" aria-hidden="true"></i>
								<input type="text" id="txtCarRegistrationDate" data-date-format="yyyy-mm-dd" name="txtCarRegistrationDate"  class="form-control" />
							</div>	
							<div id="txtCarRegistrationDateError" class="error">
							</div>
						</div>
						<div class="form-group row">
    						    <label for="NewOrUsed" class="col-sm-4 col-form-label">* New OR Used:</label>
        						<div class="col-sm-8">
                                      <div class="form-switch">
										<label for="option1" class="form-switch__label tracking-standard-link">
											<input type="radio" id="option1"
												class="form__control-input form-switch__input"
												name="NewOrUsed" value="1">
											<div class="form-switch__option">New</div>
										</label>
										<label for="option2" class="form-switch__label tracking-standard-link">
											<input type="radio" id="option2"
												class="form__control-input form-switch__input"
												name="NewOrUsed" value="2" checked="">
											<div class="form-switch__option">Used</div>
										</label>
									</div>
                                </div>
                                
    						</div>
						
					</form>
				
					<div class="form-footer  mt-5 mb-4">
						<div class="buttons text-center">
							<a href="javascript:void(0);" id="BtnNext" name="BtnNext" onclick="validateForm()" class="btn btn-blue submitbtn ">Next Step</a>
						</div>
					</div>
					
				</div>
			</div>
		 </div>
	</section>
	