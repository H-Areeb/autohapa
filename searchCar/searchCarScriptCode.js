
	
	// for show a div in popover.....
	$(document).ready(function(){
		
	
//	alert($('#type_ids').val());
		
		
		$('.popper').popover({
		placement: 'right',
		container: 'body',
		html: true,
		content: function () {
        return $(this).next('.popper-content').html();
         }
	});
	 //for one is show another is hide.....
			$('.popper').on('click', function (e) {
				 
		$('.popper').not(this).popover('hide');
		});
		
		
		
	// for getting filter types values......
		
	filtertypeValues();
		
		
		var searchPost =  document.getElementById('Postcode').value;
		var searchMake =  document.getElementById('searchMake').value;
		var searchModel = document.getElementById('searchModel').value;        
		var searchMinprice = document.getElementById('MinPrice').value;
		var type_id = $('#type_ids').val();
		
		   var datastring = "postcode="+searchPost
							+"&make="+searchMake
							+"&model="+searchModel
							+"&MinPrice="+searchMinprice
							+"&type_id="+type_id;
		
		
		
//---------------- for showing cars card bring with search ......
		
        	
         if(searchPost === '' && searchMake === '' && searchModel === '' )
         {
        		//------ show all listings in desc order ---
        		        filter_data();	
            }
          else{	
             
             	//------ show according to search parameters------ 
             
        	    getBySeacrh(datastring);
        	
        	}	
	
});
	
	
	
	
//-------------- show according to search parameters------ 	
	
function getBySeacrh(datastring)
    {
        
        
        
        	$.ajax({
			type:"POST",
			url:"../ajax/ajax_get_filter_data.php",
			data:datastring,
			dataType:"JSON",
			success: function(result){
				
			
        				$.each(result,function(i,obj){
        				    
        				        if(obj.Approved == 1){
        				            
                        					var div_data ='<li class="search-page__result"><div class="card"><div class="card-body">';
                        							div_data +='  <div class="row"><div class="col-lg-4"><a href="../ad-details/?ad-id='+obj.id+'&title='+obj.title+'&price='+obj.price+'" ><img src="../assets/'+obj.image+'" alt="" class="img-fluid" /></a></div>';
                        								
                        								div_data +='<div class="col-lg-8"><div class="row"><div class="col-lg-9" style="border-right:1px solid #ccc">';
                        									div_data +=' <h4 class="title text-left"><a href="../ad-details/?ad-id='+obj.id+'&title='+obj.title+'&price='+obj.price+'" >'+obj.title.substr(0, 20)+'...</a></h4>';
                        									div_data +=' <p class="blockquote mt-2 tagss" >'+obj.milage+' miles | '+obj.color+' | '+obj.variant+' |'+obj.Transmission+' | '+obj.FuelType+'</p>';
                        								div_data +=' <p style="font-size:12px;">'+obj.Detail+'</p><p style="font-size:12px;">Four wheel-drive, Grey...</p></div>';
                        								
                        								div_data +=' <div class="col-lg-3"><span class="badge price-badge w-100" style="font-size:18px;">$'+obj.price+'</span></div>';
                        							div_data +='</div> </div>';
                        							
                        							div_data +='<div id="image_preview" class="row mt-2 ml-1">';
                        								           $.each(obj.Images,function(i,obj1){
                        											div_data +='<img id="'+obj1.id+'" src="../assets/'+obj1.name+'"/>';
                        												//$('#image_preview').append(img);
                        											});
                        								div_data +='</div>';
                        						div_data +=' </div> </div></div><ul class="car_div_ul"><li><a href="#" >Get an insurance quote </a></li><li><a href="#"> Check its history</a></li></ul></li>';
                        				
                        				        $('#searchCarsList').append(div_data);     
        				        }
        				        else if(obj.Approved == 2){
        				                
        				        }else{
        				            var div_not = '<h1 style="color:#c4c4c4; text-align:center;">Records Not Found!</h1>';
							                $('#searchCarsList').append(div_not);
        				        }
        				            
        				    
        				});
        				            
			        },
	        });
	        
    }	
	
	
	
	
	
	
	
	
	
	
//-------------------- for getting filter types values......


function filtertypeValues()
    {
        	$.ajax({
            type: "GET",
            url:"../ajax/ajax_get_carregistrationstep1data.php?type_id="+$('#type_ids').val(),
            dataType: "json",
            success: function(data){
				
                $.each(data.make,function(i,obj)
                {					
						var div_data ='<button class="popover__options " onclick="FillCarModels('+obj.id+');for_makes('+obj.id+');" id="'+obj.id+'">'+obj.name+'</button>';
						$('#makeList').append(div_data);
                });
				
				$.each(data.bodytype,function(i,obj)
                {			
						var div_data ='<span class="popover__options" >';
						  div_data +='<label class="ml-2 " ><input type="checkbox" onchange="filter_data()" id="check'+obj.id+'" name="'+obj.name+'" class="bodytype common_selector" value="'+obj.id+'" > '+obj.name+'</label>';
						    div_data +='</span>';
						$('#bodyList').append(div_data);
                });
				
				$.each(data.fueltype,function(i,obj)
                {			
						var div_data ='<span class="popover__options" >';
						  div_data +='<label class="ml-2 " ><input type="checkbox" onchange="filter_data()" id="check'+obj.id+'" name="'+obj.name+'" class="fueltype common_selector" value="'+obj.id+'"> '+obj.name+'</label>';
						    div_data +='</span>';
						$('#fuelList').append(div_data);
                });
				
				$.each(data.colour,function(i,obj)
                {			
						var div_data ='<span class="popover__options" >';
						  div_data +='<label class="ml-2 " ><input type="checkbox" onchange="filter_data()" id="check'+obj.id+'" name="'+obj.name+'" class="colour common_selector" value="'+obj.id+'"> '+obj.name+'</label>';
						    div_data +='</span>';
						$('#colourList').append(div_data);
                });
				
				$.each(data.transmission,function(i,obj)
                {			
						var div_data ='<span class="popover__options" >';
						  div_data +='<label class="ml-2 " ><input type="checkbox" onchange="filter_data()" id="check'+obj.id+'" name="'+obj.name+'" class="transmission common_selector" value="'+obj.id+'"> '+obj.name+'</label>';
						    div_data +='</span>';
						$('#transmissionList').append(div_data);
                });
				
				
				$.each(data.MinPrice,function(i,obj)
					{					
					var div_data='<option id=  value="'+obj.MinPrice+'">$'+obj.MinPrice+'</option>';					
					$(div_data).appendTo('#MinPriceList'); 
					
                });
				
				$.each(data.MaxPrice,function(i,obj)
                {					
					var div_data='<option   value="'+obj.MaxPrice+'">$'+obj.MaxPrice+'</option>';					
					$(div_data).appendTo('#MaxPriceList'); 
					
                });
				
				
			}
		});
    }	
	
	
	
	
	
//------------ for filter & search by bodytype ,color, and 	
function filter_data()
    {
      
	   $('#searchCarsList').html('');
	    //$('#searchCarsList').html('<div id="loading" style="" ></div>');
        var action = 'filter_car_data';
        //var minimum_price = $('#hidden_minimum_price').val();
        //var maximum_price = $('#hidden_maximum_price').val();
        var bodytype = get_filter('bodytype');
        var fueltype = get_filter('fueltype');
        var colour = get_filter('colour');
		 var transmission = get_filter('transmission');
		 
        $.ajax({
            url:"../ajax/ajax_search_car_data.php?type_id="+$('#type_ids').val(),
            method:"POST",
            data:{action:action,   bodytype:bodytype, fueltype:fueltype, colour:colour, transmission:transmission},
            dataType:"json",
			success: function(result){
				
				//console.log(result);
				 if(result != ''){
				$.each(result,function(i,obj){
					
				var	imgarray = JSON.stringify(obj.Images);
					
						var div_data ='<li class="search-page__result"><div class="card"><div class="card-body">';
							div_data +='  <div class="row"><div class="col-lg-4"><a href="../ad-details/?ad-id='+obj.id+'&title='+obj.title+'&price='+obj.price+'&main_img='+obj.image+'" ><img src="../assets/'+obj.image+'" alt="" class="img-fluid" /></a></div>';
								
								div_data +='<div class="col-lg-8"><div class="row"><div class="col-lg-9" style="border-right:1px solid #ccc">';
									div_data +=' <h4 class="title text-left"><a href="../ad-details/?ad-id='+obj.id+'&title='+obj.title+'&price='+obj.price+'&main_img='+obj.image+'" >'+obj.title.substr(0, 20)+'...</a></h4>';
									div_data +=' <p class="blockquote mt-2 tagss" >'+obj.milage+' miles | '+obj.color+' | '+obj.variant+' |'+obj.Transmission+' | '+obj.FuelType+'</p>';
								div_data +=' <p style="font-size:12px;">'+obj.Detail+'</p><p style="font-size:12px;">Four wheel-drive, Grey...</p></div>';
								
								div_data +=' <div class="col-lg-3"><span class="badge price-badge w-100" style="font-size:18px;">$'+obj.price+'</span></div>';
							div_data +='</div> </div>';
							
							div_data +='<div id="image_preview" class="row mt-2 ml-1">';
								           $.each(obj.Images,function(i,obj1){
											div_data +='<img id="'+obj1.id+'" src="../assets/'+obj1.name+'"/>';
												//$('#image_preview').append(img);
											});
								div_data +='</div>';
						div_data +=' </div> </div></div><ul class="car_div_ul"><li><a href="#" >Get an insurance quote </a></li><li><a href="#"> Check its history</a></li></ul></li>';
				
					
				
				var all_div = div_data;
				$('#searchCarsList').append(all_div);
				
						});
				
				}else{
							
							var div_not = '<h1 style="color:#c4c4c4; text-align:center;">Records Not Found!</h1>';
							$('#searchCarsList').append(div_not);
						
							
						}	
					
					
				
			
				
				
			},
        });
    }
	



		
	
	
		$('.common_selector').click(function(){
				filter_data();
			});


function get_filter(class_name)
    {	
		$('#value_any').text('');
		var selectedtext = "";
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
           // selectedtext = selectedtext + ", " + $($(this).parent()).text();
		   selectedtext =  $($(this).parent()).text();
		 
		   
        });
		 $('#value_any').text(selectedtext);
			
		
        return filter;
    }
	
		
		










function FillCarModels(make_id)
		{	
                 //alert(model_id);
				//var datastring = $(element).id();		
			$.ajax({
            type: "GET",
            url:"../ajax/ajax_get_carmodel.php?makeid="+make_id+"&type_id="+$('#type_ids').val(),
            dataType: "json",
            success: function (data) {
				
				//alert(data);
					$('#modelList').html('');
					  $.each(data.model,function(i,obj)
				    {					
						var  div_data ='<button  id="'+obj.id+'"   onclick="FillCarVariant('+obj.id+');for_models('+obj.id+');" class="popover__options">'+obj.name+'</button>';
						$('#modelList').append(div_data);
						});
					},
			});
		}
	


function FillCarVariant(model_id)
		{	
                 	
			$.ajax({
            type: "GET",
            url:"../ajax/ajax_get_carvariant.php?modelid="+model_id,
            dataType: "json",
            success: function (data) {
				
				$('#variantList').html('');
				
					  $.each(data.variant,function(i,obj)
				    {					
						var  div_data ='<button  id="'+obj.id+'" onclick="" class="popover__options">'+obj.name+'</button>';
						$('#variantList').append(div_data);
						});
					},
			});
		}


   // GetCarsCard('+obj.id+');
	
	





function for_makes(getmake)
    {
			
			
			$.ajax({
			type:"GET",
			url:"../ajax/ajax_get_filter_data.php?getmake_id="+getmake+"&type_id="+$('#type_ids').val(),
			dataType:"json",
			success: function(result){
				
				
				$('#searchCarsList').html('');
				
				 if(result != ''){
					 
				$.each(result,function(i,obj){
				    
						var div_data ='<li class="search-page__result"><div class="card"><div class="card-body">';
							div_data +='  <div class="row"><div class="col-lg-4"><a href="../ad-details/?ad-id='+obj.id+'&title='+obj.title+'&price='+obj.price+'&main_img='+obj.image+'" ><img src="../assets/'+obj.image+'" alt="" class="img-fluid" /></a></div>';
								
								div_data +='<div class="col-lg-8"><div class="row"><div class="col-lg-9" style="border-right:1px solid #ccc">';
									div_data +=' <h4 class="title text-left"><a href="../ad-details/?ad-id='+obj.id+'&title='+obj.title+'&price='+obj.price+'&main_img='+obj.image+'" >'+obj.title.substr(0, 20)+'...</a></h4>';
									div_data +=' <p class="blockquote mt-2 tagss" >'+obj.milage+' miles | '+obj.color+' | '+obj.variant+' |'+obj.Transmission+' | '+obj.FuelType+'</p>';
								div_data +=' <p style="font-size:12px;">'+obj.Detail+'</p><p style="font-size:12px;">Four wheel-drive, Grey...</p></div>';
								
								div_data +=' <div class="col-lg-3"><span class="badge price-badge w-100" style="font-size:18px;">$'+obj.price+'</span></div>';
							div_data +='</div> </div>';
							
							div_data +='<div id="image_preview" class="row mt-2 ml-1">';
								           $.each(obj.Images,function(i,obj1){
											div_data +='<img id="'+obj1.id+'" src="../assets/'+obj1.name+'"/>';
												//$('#image_preview').append(img);
											});
								div_data +='</div>';
						div_data +=' </div> </div></div><ul class="car_div_ul"><li><a href="#" >Get an insurance quote </a></li><li><a href="#"> Check its history</a></li></ul></li>';
				
					
				
							var all_div = div_data;
							$('#searchCarsList').append(all_div);
				
								});
						}else
						{
							
							var div_not = '<h1 style="color:#c4c4c4; text-align:center;">Records Not Found!</h1>';
							$('#searchCarsList').append(div_not);
						
							
						}		
								
								
							},
						});
			
			
		}


function for_models(getmodel){
			
			
			$.ajax({
			type:"GET",
			url:"../ajax/ajax_get_filter_data.php?getmodel_id="+getmodel+"&type_id="+$('#type_ids').val(),
			dataType:"json",
			success: function(result){
				
				
				$('#searchCarsList').html('');
				
			  if(result != ''){
				  
				$.each(result,function(i,obj){
					
						var div_data ='<li class="search-page__result"><div class="card"><div class="card-body">';
							div_data +='  <div class="row"><div class="col-lg-4"><a href="../ad-details/?ad-id='+obj.id+'&title='+obj.title+'&price='+obj.price+'&main_img='+obj.image+'" ><img src="../assets/'+obj.image+'" alt="" class="img-fluid" /></a></div>';
								
								div_data +='<div class="col-lg-8"><div class="row"><div class="col-lg-9" style="border-right:1px solid #ccc">';
									div_data +=' <h4 class="title text-left"><a href="../ad-details/?ad-id='+obj.id+'&title='+obj.title+'&price='+obj.price+'&main_img='+obj.image+'" >'+obj.title.substr(0, 20)+'...</a></h4>';
									div_data +=' <p class="blockquote mt-2 tagss" >'+obj.milage+' miles | '+obj.color+' | '+obj.variant+' |'+obj.Transmission+' | '+obj.FuelType+'</p>';
								div_data +=' <p style="font-size:12px;">'+obj.Detail+'</p><p style="font-size:12px;">Four wheel-drive, Grey...</p></div>';
								
								div_data +=' <div class="col-lg-3"><span class="badge price-badge w-100" style="font-size:18px;">$'+obj.price+'</span></div>';
							div_data +='</div> </div>';
							
							div_data +='<div id="image_preview" class="row mt-2 ml-1">';
								           $.each(obj.Images,function(i,obj1){
											div_data +='<img id="'+obj1.id+'" src="../assets/'+obj1.name+'"/>';
												//$('#image_preview').append(img);
											});
								div_data +='</div>';
						div_data +=' </div> </div></div><ul class="car_div_ul"><li><a href="#" >Get an insurance quote </a></li><li><a href="#"> Check its history</a></li></ul></li>';
				
					
							var all_div = div_data;
							$('#searchCarsList').append(all_div);
				
								});
								
					}else
					{
						var div_not = '<h1 style="color:#c4c4c4; text-align:center;">Records Not Found!</h1>';
							$('#searchCarsList').append(div_not);
						}			
								
								
							},
						});
			
			
		}


		// function for_bodyType(getbodyType){
	
			
			// $.ajax({
			// type:"GET",
			// url:"../ajax/ajax_get_filter_data.php?getbodyType_id="+getbodyType,
			// dataType:"json",
			// success: function(result){
				
				
				// $('#searchCarsList').html('');
				
				// if(result != ''){
				
				// $.each(result,function(i,obj){
					
						// var div2 ='  <div class="card  shadow p-3  bg-white rounded" style="border:1px solid #f5f5f5;"><div class="card-body">';
							// var div3 ='  <div class="row"><div class="col-lg-4"><img src="'+obj.image+'" alt="" class="img-fluid" /></div>';
								
								// var div4 ='<div class="col-lg-8"> <div class="row"><div class="col-lg-9" style="border-right:1px solid #00000030 !important">';
									// var div5 =' <h4 class="text-left">'+obj.title.substr(0, 20);+'...</h4>';
									// var div6 =' <p class="blockquote mt-2 tagss" >'+obj.milage+' miles | '+obj.color+' | '+obj.variant+' |'+obj.Transmission+' | '+obj.FuelType+'</p>';
								// var div7 =' <p style="font-size:14px;">'+obj.Detail+' …</p><p style="font-size:12px;">Four wheel-drive, Grey,  …</p></div>';
								
								// var div8 =' <div class="col-lg-3"><span class="badge badge-info text-left mt-2" style="font-size:18px;">$'+obj.price+'</span></div>';
							// var div4_end ='</div> </div></div>';
							
							// var div9 ='<div id="image_preview" class="row mt-2 ml-1">';
								           // $.each(obj.Images,function(i,obj1){
											// div9 +='<img id="'+obj1.id+'" src="'+obj1.name+'"/>';
												// //$('#image_preview').append(img);
											// });
								// var div9_end = '</div>';
						// var div2_end =' </div> </div><ul class="car_div_ul mb-3 text-right "><li><a href="#" >Get an insurance quote </a> |</li><li><a href="#">Check its history</a></li></ul>';
				
					
							// var all_div = div2+div3+div4+div5+div6+div7+div8+div4_end+div9+div9_end+div2_end;
							// $('#searchCarsList').append(all_div);
				
								// });
				// }else
				// {
					// var div_not = '<h1 style="color:#c4c4c4; text-align:center;">Records Not Found!</h1>';
							// $('#searchCarsList').append(div_not);
				// }		
								
								
								
						
					// },
				// });
			
			
		// }


	
		
	
	
	
