<?php 

// session_start();
// include_once("config.php");

    
	 
    include_once('../includes/header.php');

    
    
if(!isset($_SESSION['customer_id']) && !isset($_SESSION['customer_id2']) ){
    	header("Location: ../login/");
    }

	
	
	if(isset($_POST['regnum'])){
		
		 $regnum = $_POST['regnum'];
		 $type_id = $_POST['type_id'];
	}
	
//echo '<h1>'.$type_id.'</h1>';
	

	?>
	<hr />
	
	<link rel="stylesheet" href="descriptionPageStyleCode.css">

	
	<?php 
	
	if($type_id == '1'){
	
            include_once('for_car.php');
	}else{
	    
	        include_once('for_bikes.php');
	}
	?>
	
	
	
	
	
	<script src="http://autohapa.oneviewcrm.com/autohapa/assets/libs/jquery-ui/jquery-ui.min.js"></script>
	
	<script>
	
	
	
    $(document).ready(function(){
		get_data();
		getCarFeatures();
	        $("#imagesSectionNew").hide();
			  
				$("#contactDetailsSection").hide();
			  	$(".form-footer").hide();
			    
			  
			  
			  $("#descriptionButton").click(function(){
				$("#imagesSectionNew").show("slow");
			});

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
            url:"../ajax/ajax_get_carfeatures.php?type_id="+$('#type_ids').val(),
            dataType: "json",
            success: function (data) {
				
						selecter = '<li class="features__list--item"><select id="selectOptions" class="form-control">';
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
										
									var div_list = '<li class="features__list--item custom-control custom-radio" id="featuresListItem'+ obj.id+'"><input id="feature'+ obj.id+'" onclick="checking(this)" class="custom-control-input" type="radio" name="'+ obj.name+'"  value="'+ obj.id+'" data-displayname="'+ obj.name+'"><label class="custom-control-label" for="feature'+ obj.id+'" title="'+ obj.name+'"><span class="form__control-text">&nbsp;'+ obj.name+'</span></label></li>';
									$('#featuresList').append(div_list);
									
								}
								else
								{
									
									var div_list = '<li class="features__list--item custom-control custom-checkbox" id="featuresListItem'+ obj.id+'"><input id="feature'+ obj.id+'" onclick="checking(this)" class="custom-control-input" type="checkbox" name="'+ obj.name+'"  value="'+ obj.id+'" data-displayname="'+ obj.name+'"><label class="custom-control-label" for="feature'+ obj.id+'" title="'+ obj.name+'"><span class="form__control-text">&nbsp;'+ obj.name+'</span></label></li>';
									$('#featuresList').append(div_list);
									
								}
							
								
								
							});
							if(selecter.indexOf('</select></li>') != "-1") {
								selecter = selecter + '</select></li>';
							}
							$('#featuresList').append(selecter);
					
				}
			});
		}
		
	
		var adTitle = '';
		
		function get_data()
		{
					
					var carregnum = $('#hdregnum').val();
					var type_id = $('#type_ids').val();
					
					var dataString = 'carregnum='+carregnum
					                  +'&type_id='+type_id;
					                  
					                  
					                  //alert(type_id);
					                  
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
							
							if(result.data.type_id == 1){
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
							else
							{   
							        document.getElementById('summaryMake').innerHTML =result.data.make;
        							document.getElementById('summaryModel').innerHTML =result.data.model;
        							document.getElementById('summaryDerivative').innerHTML =result.data.bodyType;
        							document.getElementById('adq-asking-price').innerHTML =result.data.price;
        							document.getElementById('askingPrice').value =result.data.price;
        							document.getElementById('hdcaradid').value =result.data.id;
        							document.getElementById('hdcaradids').value =result.data.id;
        							adTitle = result.data.make+' '+result.data.model+' '+result.data.bodyType;  
        							document.getElementById('adTitle').innerHTML =adTitle;
        							document.getElementById('contactEmail').value =result.data.email;
							    
							}
							
							
							
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
										 
			        $('#descriptionButton').text('Loading....');  
			
			   // alert('customer_id  '+id);
			
                $.ajax({
				   type: "POST",
				   url: "../ajax/ajax_insert_ad_data.php",
				   data: dataString ,
				   cache: false,
				   success: function(result){
				       
				       
				       
				         
                    				
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
					var adcompleted = '1';
					
					var dataString = "hdcaradid="+document.getElementById('hdcaradid').value
										+"&contactNumber1="+document.getElementById('contactNumber1').value
										+"&contactNumber2="+document.getElementById('contactNumber2').value
										+"&contactEmail="+document.getElementById('contactEmail').value
										 +"&postcode="+document.getElementById('postcode').value
										 +"&adcompleted="+adcompleted;
												 
					                $('#BtnNext').text('Loading....'); 
						$.ajax({
						   type: "POST",
						   url: "../ajax/ajax_update_contact_details.php",
						   data: dataString ,
						   cache: false,
						   success: function(result){
						       
						         
                    				
                    				 //alert(result);
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