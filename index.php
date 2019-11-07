<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once('./includes/header.php');





?>
	<input type="hidden" id="type_ids" name="type_id" value="1">

	<div class="home-slider-wrapper">
		<div class="home-slider-outer">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home-slider owl-carousel owl-theme">
<?php //echo $_SESSION['customer_id2'];?>
							<div class="item">
								<img src="assets/images/slider-image.jpg" alt="Showroom of cars" class="slide-image" />
								<div class="slider-content">
									<div class="row align-items-center slider-content-inner m-0">
		
										<div class="col-lg-7 pr-2">
											<div class="text-block">
												<h1>Go All In AutoHapa</h1>
												<p>Auto dealers, vehicle owners, for sale by owner, all kind of auto including trucks, cars, moto pikes, trailers, boats, vans and so on.</p>
												<a href="" class="btn btn-blue">Find Out More <i class="fa fa-long-arrow-right"></i></a>
											</div>
										</div>
		
										<div class="col-lg-5 pl-2">
											<form  id="search-form" method="POST" action="searchCar/">
											      
												  <input type="hidden" id="carad_id" value="">
												  <input type="hidden" id="type_id" name="type_id" value="1">
												<h3>New & Used Cars</h3>
												<div class="form-row">
		
													<div class="form-group col-sm-6">
														<input type="text" class="form-control" id="Postcode" name="Postcode" placeholder="Enter Postcode*">
													</div>
													<div class="form-group col-sm-6">
														<select name="Distance" id="Distance" class="form-control">
															<option value="">Distance(National)*</option>
														</select>
													</div>
		
													<div class="form-group col-sm-6">
														<select name="searchMake" id="searchMake" name="searchMake" onchange="FillCarModels();" class="form-control">
															<option value="">Make(Any)*</option>
														</select>
													</div>
													<div class="form-group col-sm-6">
														<select name="searchModel" id="searchModel" name="searchModel" class="form-control">
															<option value="">Model(Any)*</option>
														</select>
													</div>
		
													<div class="form-group col-sm-6">
														<input type="text" class="form-control" id="TotalPrice" name="TotalPrice" placeholder="Total Price*">
													</div>
													<div class="form-group col-sm-6">
														<input type="text" class="form-control" id="MonthlyPrice" name="MonthlyPrice" placeholder="Monthly Price*">
													</div>
		
													<div class="form-group col-sm-6">
														<select name="MinPrice" id="MinPrice" name="MinPrice" class="form-control">
															<option value="">Min Price*</option>
														</select>
													</div>
													<div class="form-group col-sm-6">
														<select name="MaxPrice" id="MaxPrice" name="MaxPrice" class="form-control">
															<option value="">Max Price*</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<input type="submit" class="btn btn-green"  value="Search 500,000 Cars"> 
												</div>
												<div class="form-row bottom-buttons">
													<div class="col-sm-6">
														<button type="reset" class="btn btn-default">Reset Search</button>
													</div>
													<div class="col-sm-6">
														<button type="button" class="btn btn-default">More Options</button>
													</div>
												</div>
											</form> <!-- /.search-form -->
										</div>
		
									</div> <!-- /.slider-content-inner -->
								</div> <!-- /.slider-content-outer -->
							</div> <!-- /.item -->

							

						</div> <!-- /.home-slider -->
					</div>
				</div>
			</div>
		</div>
		<!--
		<div class="slider-content">

			<div class="container">
				<div class="slider-content-outer">
					<div class="row align-items-center slider-content-inner m-0">

						<div class="col-md-7">
							<div class="text-block">
								<h1>Go All In AutoHapa</h1>
								<p>Auto dealers, vehicle owners, for sale by owner, all kind of auto including trucks, cars, moto pikes, trailers, boats, vans and so on.</p>
								<a href="" class="btn btn-blue">Find Out More <i class="fa fa-long-arrow-right"></i></a>
							</div>
						</div>

						<div class="col-md-5">
							<form action="" id="search-form">
								<h3>New & Used Cars</h3>
								<div class="form-row">

									<div class="form-group col-md-6">
										<input type="text" class="form-control" id="" placeholder="Enter Postcode*">
									</div>
									<div class="form-group col-md-6">
										<select name="" id="" class="form-control">
											<option value="">Distance(National)*</option>
										</select>
									</div>

									<div class="form-group col-md-6">
										<select name="" id="" class="form-control">
											<option value="">Make(Any)*</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<select name="" id="" class="form-control">
											<option value="">Model(Any)*</option>
										</select>
									</div>

									<div class="form-group col-md-6">
										<input type="text" class="form-control" id="" placeholder="Total Price*">
									</div>
									<div class="form-group col-md-6">
										<input type="text" class="form-control" id="" placeholder="Monthly Price*">
									</div>

									<div class="form-group col-md-6">
										<select name="" id="" class="form-control">
											<option value="">Min Price*</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<select name="" id="" class="form-control">
											<option value="">Max Price*</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-green" value="Search 500,000 Cars"> 
								</div>
								<div class="form-row">
									<div class="col-md-6">
										<button type="reset" class="btn btn-default">Reset Search</button>
									</div>
									<div class="col-md-6">
										<button type="button" class="btn btn-default">More Options</button>
									</div>
								</div>
							</form> <!-- /.search-form --
						</div>

					</div> <!-- /.slider-content-inner --
				</div> <!-- /.slider-content-outer --
			</div>
		</div> <!-- /.slider-content -->

	</div> <!-- /.home-slider-wrapper -->

	<div id="featured-cars" class="vehicle-grid">
		<div class="container">
			<div class="row">
				<div class="col">
					<header class="section-header bg-color-blue">
						<h2>Featured Almost New Cars</h2>
						<a href="/autohapa/searchCar" class="view-all-link">View All</a>
					</header>
				</div>
			</div>
			<div class="row vehicle-grid--inner" id="featured_carsList">
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
				</div>
				<div class="col-lg-3 col-sm-6 car-item">
					<div class="card">
						<img src="assets/images/car2.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>
				<div class="col-lg-3 col-sm-6 car-item">
					<div class="card">
						<img src="assets/images/car3.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>
				<div class="col-lg-3 col-sm-6 car-item">
					<div class="card">
						<img src="assets/images/car4.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>-->

			</div>
		</div>
	</div> <!-- /.vehicle-grid -->

	<div id="brand-new-cars" class="vehicle-grid">
		<div class="container">
			<div class="row">
				<div class="col">
					<header class="section-header bg-color-green">
						<h2>Latest Brand New Car Deals</h2>
						<a href="/autohapa/searchCar" class="view-all-link">View All</a>
					</header>
				</div>
			</div>
			<div class="row vehicle-grid--inner">
				<div class="col-lg-3 col-sm-6 item-vehicle">
					<div class="card">
						<img src="assets/images/car5.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>
				<div class="col-lg-3 col-sm-6 item-vehicle">
					<div class="card">
						<img src="assets/images/car6.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>
				<div class="col-lg-3 col-sm-6 item-vehicle">
					<div class="card">
						<img src="assets/images/car7.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>
				<div class="col-lg-3 col-sm-6 item-vehicle">
					<div class="card">
						<img src="assets/images/car8.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>

			</div>
		</div>
	</div> <!-- /.vehicle-grid -->

	<div id="featured-used-cars" class="vehicle-grid">
		<div class="container">
			<div class="row">
				<div class="col">
					<header class="section-header bg-color-blue">
						<h2>Featured Used Cars</h2>
						<a href="/autohapa/searchCar" class="view-all-link">View All</a>
					</header>
				</div>
			</div>
			<div class="row vehicle-grid--inner">
				<div class="col-lg-3 col-sm-6 item-vehicle">
					<div class="card">
						<img src="assets/images/car9.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>
				<div class="col-lg-3 col-sm-6 item-vehicle">
					<div class="card">
						<img src="assets/images/car10.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>
				<div class="col-lg-3 col-sm-6 item-vehicle">
					<div class="card">
						<img src="assets/images/car11.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>
				<div class="col-lg-3 col-sm-6 item-vehicle">
					<div class="card">
						<img src="assets/images/car12.jpg" alt="" class="img-fluid" />
						<div class="card-body">
							<h5 class="title">Hyundai Kona 1.6T</h5>
							<div class="price">&pound;25,495</div>
							<div class="tags">SUV | Automatic | 1.6L | Petrol</div>
							<a href="#" class="btn btn-blue">View Details</a>
						</div>
					</div> 
				</div>

			</div>
		</div>
	</div> <!-- /.vehicle-grid -->

	<div id="sell-your-car">
		<div class="container">
			<div class="bordered-box">
				<div class="row">
					<div class="col-lg-6">
						<div>
							<h2><span style="color:#59b747;">Sell</span> Your <span style="color:#59b747;">Car</span> Easily</h2>
							<p style="font-size:1.375rem;">Every 60 seconds someone chooses to sell on Auto Trader</p>
							<form action="" id="sell-form">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="inputReg">Registration*</label>
										<input type="text" class="form-control" id="inputReg" placeholder="e.g. AT68SEL">
									</div>
									<div class="form-group col-md-6">
										<label for="inputMiles">Mileage*</label>
										<input type="text" class="form-control" id="inputMiles" placeholder="e.g. 1000">
									</div>
								</div>
								<input type="submit" class="btn btn-green" value="Sell Your Car"> 
							</form>
						</div>
					</div>
					<div class="col-md-6">
						<img src="assets/images/sell-your-car.png" alt="cars" class="img-fluid" />
					</div>
				</div>
			</div>
		</div>
	</div> <!-- /.sell-your-car -->

	<div id="buying-essentials" class="">
		<div class="container">
			<div class="row">
				<div class="col">
					<header class="section-header bg-color-blue">
						<h2>Car Buying Essentials</h2>
					</header>
				</div>
			</div>
			<div class="row m-0">
				<div class="col-lg-3 col-sm-6 essential-col">
					<div class="essential">
						<a href="#"><img src="assets/images/essentials1.jpg" alt="" class="img-fluid" /></a>
						<h4><a href="#">What it's Worth?</a></h4>
					</div> 
				</div>
				<div class="col-lg-3 col-sm-6 essential-col">
					<div class="essential">
						<a href="#"><img src="assets/images/essentials2.jpg" alt="" class="img-fluid" /></a>
						<h4><a href="#">Car Insurance</a></h4>
					</div> 
				</div>
				<div class="col-lg-3 col-sm-6 essential-col">
					<div class="essential">
						<a href="#"><img src="assets/images/essentials3.jpg" alt="" class="img-fluid" /></a>
						<h4><a href="#">Car Finances & Loans</a></h4>
					</div> 
				</div>
				<div class="col-lg-3 col-sm-6 essential-col">
					<div class="essential">
						<a href="#"><img src="assets/images/essentials4.jpg" alt="" class="img-fluid" /></a>
						<h4><a href="#">Check a car's History</a></h4>
					</div> 
				</div>

			</div>
		</div>
	</div> <!-- /.buying-essentials -->

	<div id="blog" class="">
		<div class="container">
			<div class="row">
				<div class="col">
					<header class="section-header bg-color-green">
						<h2>The latest from Auto Trader</h2>
					</header>
				</div>
			</div>
			<div class="row m-0">
				<div class="col-12 blog-col two-fourth">
					<div class="blog-item">
						<img src="assets/images/blog1.jpg" alt="" class="img-fluid" />
						<div class="content-outer">
							<div class="content d-flex flex-wrap align-items-end justify-content-between">
								<div>
									<h4>Auto Trader Latest</h4>
									<h3>Coming Soon 2019 Ferrari 360</h3>
								</div>
								<a href="#" class="btn">Read</a>
							</div>
						</div>
					</div> 
				</div>
				<div class="col-12 col-sm-6 blog-col one-fourth">

					<div class="blog-item">
						<a href="#"><img src="assets/images/blog2.jpg" alt="" class="img-fluid" />
						<div class="content-outer">
							<div class="content">
								<h6>Most Expensive Cars</h6>
							</div>
						</div></a>
					</div>

					<div class="blog-item">
						<a href="#"><img src="assets/images/blog4.jpg" alt="" class="img-fluid" />
						<div class="content-outer">
							<div class="content">
								<h6>Drive Experience</h6>
							</div>
						</div></a>
					</div>

					

				</div>
				<div class="col-12 col-sm-6 blog-col one-fourth">
						
						<div class="blog-item">
							<a href="#"><img src="assets/images/blog3.jpg" alt="" class="img-fluid" />
							<div class="content-outer">
								<div class="content">
									<h6>How To Drive Your Car Abroad</h6>
								</div>
							</div></a>
						</div>

						<div class="blog-item">
							<a href="#"><img src="assets/images/blog5.jpg" alt="" class="img-fluid" />
							<div class="content-outer">
								<div class="content">
									<h6>Upcoming New Models</h6>
								</div>
							</div></a>
						</div>

				</div>


			</div>
		</div>
	</div> <!-- /.buying-essentials -->
	
	<script>
	
	
	
	$(document).ready(function(){
		
		//alert($('#type_ids').val());
		
		$.ajax({
            type: "GET",
            url:"ajax/ajax_get_carregistrationstep1data.php?type_id="+$('#type_ids').val(),
            dataType: "json",
            success: function (data) {
				
                $.each(data.make,function(i,obj)
                {					
					var div_data="<option value="+obj.id+">"+obj.name+"</option>";					
					$(div_data).appendTo('#searchMake'); 
                });
				
				//i= 0;
				
				$.each(data.MinPrice,function(i,obj)
                {					
					var div_data="<option value="+obj.MinPrice+">$"+obj.MinPrice+"</option>";					
					$(div_data).appendTo('#MinPrice'); 
					//i = i+1;
                });
				
				$.each(data.MaxPrice,function(i,obj)
                {					
					var div_data="<option value="+obj.MaxPrice+">$"+obj.MaxPrice+"</option>";					
					$(div_data).appendTo('#MaxPrice'); 
					//i = i+1;
                });
				
				
			}
		});
		
		
		
	 $.ajax({
			
		type:"GET",
		url: "ajax/ajax_get_ad_data.php?type_id="+$('#type_ids').val(),
		dataType:"json",
        success: function(result){
			//console.log(result);
			
			$.each(result,function(i,obj){
				
				//document.getElementById('carad_id').value = obj.id;

				
		var div1 ='	<div class="col-lg-3 col-sm-6 item-vehicle">';
		    var div2 ='  <div class="card">';
				var div3 ='<a href="ad-details/?ad-id='+obj.id+'&title='+obj.title+'&price='+obj.price+'&main_img='+obj.image+'&images='+obj.Images+'" >  <img src="assets/'+obj.image+'" alt="" class="img-fluid" /></a>';
					var div4 =' <div class="card-body">';
					    var div5 =' <h5 class="title">'+obj.title.substr(0, 20)+'...</h5>';
					    var div6 =' <div class="price">$'+obj.price+'</div>';
						var div7 =' <div class="tags">'+obj.milage+' miles | '+obj.color+' | '+obj.variant+' |'+obj.Transmission+' | '+obj.FuelType+'</div>';
					var div8 =' <a href="ad-details/?ad-id='+obj.id+'&title='+obj.title+'&price='+obj.price+'&main_img='+obj.image+'&images='+obj.Images+'" class="btn btn-blue" >View Details</a>';
				var div4_end =' </div>';
			var div2_end =' </div> ';
		var div1_end =' </div>';
				
				var all_div = div1+div2+div3+div4+div5+div6+div7+div8+div4_end+div2_end+div1_end;
				$('#featured_carsList').append(all_div);
			
			});
			
			
		},		
	});	
		
});
	
	
	function FillCarModels()
		{						
			$.ajax({
            type: "GET",
            url:"ajax/ajax_get_carmodel.php?makeid="+$("#searchMake").val()+"&type_id="+$('#type_ids').val(),
            dataType: "json",
            success: function (data) {
					var dropdown=$('#searchModel');
					//dropdown.empty(); 
					//$('<option value="0">Please select</option>').appendTo('#searchModel');
					$.each(data.model,function(i,obj)
					{					
						var div_data="<option value="+obj.id+">"+obj.name+"</option>";					
						$(div_data).appendTo('#searchModel');
					});
				},
			});
		}
	
	// function FilterCars(){
		
		    // var datastring = "postcode="+document.getElementById('Postcode').value 
							// +"&make="+document.getElementById('searchMake').value
							// +"&model="+document.getElementById('searchModel').value	
							// +"&MinPrice="+document.getElementById('MinPrice').value	
							// +"&MaxPrice="+document.getElementById('MaxPrice').value	;
		
		
		// /* $.ajax({
			// type:"POST",
			// url:"ajax/ajax_get_filter_data.php",
			// data:datastring,
			
			// success: function(result){
				// alert('success');
				// //window.location.href="searchCar/";
				
				
			// }
		// }); */
		
		
		
	// }
	
	</script>

<?php include_once('includes/footer.php'); ?>