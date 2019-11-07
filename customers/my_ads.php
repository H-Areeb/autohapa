<?php
header("Cache-Control: no-cache, must-revalidate");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");	

include_once('../includes/header.php');
?>
<link rel="stylesheet" href="../searchCar/searchCarStyleCode.css"> 
<link rel="stylesheet" href="customers.css">

<style>
    .status {
   
    float:right;
}
</style>

<section class="main mt-5 mb-5">
		<div class="container">
                  <!-- Errors div -->
                  <div style="max-width:400px;margin: 0 auto;">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="Errors" style="display:none;"></div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMsg" style="display:none;"></div>
                  </div>
    	    <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card bg-card mt-2" style="width: 18rem;">
                        <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16def44aded%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16def44aded%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                        <div class="card-body">
                            <a class="btn btn-link">manage</a>
                               <div class="form-group row">
                                    <label class="col-sm-5  col-form-label" >UserName:</label>
                                    <label  class="col-sm-7 col-form-label"style="color:black!important;"><?= $customer_name;?></label>
                                    <label class="col-sm-6  col-form-label" >Account Type:</label>
                                    <label  class="col-sm-6 col-form-label"style="color:black!important;">Dealer</label>
                               </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-danger">Remove Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div><h2 class="mt-3">My ADS</h2></div>
                         <input type="hidden" id="idcustomer" value="<?= $customer_id;?>">
                        <div  id="nav-tabContent">
                                <ul id="searchCarsList" class="">
                    				
                    				
                    			</ul>
                           
                        </div>
                    <div>
                </div>
                
            </div>
        </div>
</section>


<script>
    
    
    
    
    $(document).ready(function(){
        
        
        var idcustomer = "idcustomer="+$('#idcustomer').val();
    
      
       
       	$.ajax({
			type:"POST",
			url:"ajax_ads_getById.php",
			data:idcustomer,
			dataType:"JSON",
			success: function(result){
				
			
        				$.each(result,function(i,obj){
                					var div_data ='<li class="search-page__result"><div class="card">';
                					               div_data +='<div class="card-body">';
                					              
                							div_data +='  <div class="row"><div class="col-lg-4"><a href="../ad-details/?ad-id='+obj.id+'&title='+obj.title+'&price='+obj.price+'" ><img src="../assets/'+obj.image+'" alt="" class="img-fluid" /></a></div>';
                								
                								div_data +='<div class="col-lg-8"><div class="row"><div class="col-lg-9" style="border-right:1px solid #ccc">';
                								
                								    if(obj.approved == 1) 
                                                    {
                                                         div_data+='<div class="badge status badge-success">Approved</div>';
                                                    }
                    					            else if(obj.rejected == 1)
                    					            {
                    					                 div_data+='<div class="badge status badge-danger">Rejected</div>';
                    					            }
                    					            else
                    					            {
                    					                div_data+='<div class="badge status badge-warning">On Waiting</div>';
                    					            }
                								
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
        				    
        				            });
			        },
	        });
       
        
    });
    
</script>






<?php include_once('../includes/footer.php'); ?>