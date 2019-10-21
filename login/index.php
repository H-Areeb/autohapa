<?php

 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["customer_id2"])){
    header("location: ../sellmycar/");
   exit();
}


 header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");	

include_once('../includes/header.php');

		$http_referer =$_SERVER['HTTP_REFERER'];
		$description = '../description/';
	?>

	<style>
	    .login-social {
            position: relative;
            padding: 0 15px 0 40px;
            border: none;
            text-align: center;
            line-height: 34px;
            white-space: nowrap;
            border-radius: 0.2em;
            color: #fff;
		}
		
		.login-social i {
		    position: absolute;
            left: 15px;
            top: 10px;
		}
	    
	    .login-google {
	        background: #DD4B39;
	    }
	    .login-google:hover, .login-google:focus {
            background: #E74B37;
            color: #fff;
        }
	
		.login-facebook {
			background-color: #4C69BA;
            background-image: linear-gradient(#4C69BA, #3B55A0);
            text-shadow: 0 -1px 0 #354C8C;
		}
		.login-facebook:hover, .login-facebook:focus {
            background-color: #5B7BD5;
            background-image: linear-gradient(#5B7BD5, #4864B1);
            color: #fff;
        }

		

		.btn-social:hover {
			color: #eee;
		}

		.btn-social :first-child {
			position: absolute;
			left: 0;
			top: 0;
			bottom: 0;
			width: 40px;
			padding: 7px;
			font-size: 1.6em;
			text-align: center;
			border-right: 1px solid rgba(0,0,0,0.2);
		}

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
		.steps_wrapper[data-current='1'] div:nth-child(1):before {
			color: #56b847;
			border-color: #56b847;
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
		
		.col-form-label {font-weight: bold;text-align: right;}

	</style>
	
	<hr />
	<?php
	 $regnum= '';
	if (isset($_POST['regnum']))
		{
			$regnum = $_POST['regnum'];
			//echo $regnum;
		}
	
	if(isset($_POST['customer_id'])){
	$_SESSION['customer_id'] = $_POST['customer_id'];
	//echo $_SESSION['customer_id'];
	}
	if(isset($_SESSION['customer_id']))
	{
		$_SESSION['customer_id'];
	}
		
	?>
	
	
	<form id="formlogin" method="post" action="../description/">
	<input type="hidden" id="hdregnum" name="regnum" value="<?php echo $regnum;?>">
	<input type="hidden" id="customer_id" name="customer_id" value="">
	</form>
	
	<form id="formlogin2" method="post" action="<?= $http_referer;?>">
	<input type="hidden" id="hdregnum2" name="regnum2" value="<?php echo $regnum;?>">
	<input type="hidden" id="customer_id2" name="customer_id2" value="">
	</form>
	
	
	

	<section class="main mb-5">
		<div class="container">
    	    <div class="row justify-content-center">
    			<div class="col-lg-6">
					<div class="  text-center alert-success" id="success">
					    <p class="p*-5 my-5 text-success"></p>
					</div>
					<div class="alert alert-danger alert-dismissible fade show" role="alert" id="invalids" style="display:none;">
                     </div>
					
    			    <div class="card" style="border:none !important;">
    		            <!--<img src='../assets/images/loader.gif' style='height:200px; width:200px;' class='text-center' />-->
    		
		                <div class="card-body">
		                    
		                    <form method="POST"  style="max-width: 300px;margin: 0 auto;">
		                    
        						<div id="section-email">
        							<div class="form-group">
        								<input  class="form-control mb-2" id="email" maxlength="50" minlength="6" name="email" placeholder="e.g. name@email.com"  type="email" >
        								<div id="emailError" class="text-center mb-2"></div>
        							 </div>	
        							<div class="form-group">	
        								<input  class="form-control mb-2"  id="pwd"  name="pwd" placeholder="*******"  type="password" >
        							   <div id="pwdError" class="text-center mb-2"></div>
        							 </div>  
        							 <div class="form-group">
        								<a href="javascript:void(0)" class="btn btn-blue mb-2 " id="signin" type="submit" onclick="validateForm()">Sign in </a>
        								<a href="http://autohapa.oneviewcrm.com/autohapa/login/register.php" class="btn btn-green mb-2" >Register Now</a>
        							</div>
        						</div>	
        						
        					
        					
                <!--    			<div id="section-pwd" style="display:none;">-->
                <!--				  <div class="form-group">-->
        						    
        							 <!--  <a href="javascript:void(0)" id="submitbtn" class="btn btn-blue mb-2" type="submit" onclick="check_pwd()">-->
        								<!--Sign in -->
        								<!--</a>-->
                <!--					</div>-->
                <!--    			 </div>	 -->
        						
        				
                <!--				<div id="section-register" style="display:none;">-->
            				<!--		<div class="form-group">-->
        								<!--<input  class="form-control " id="Remail"  name="Remail" required placeholder="name@email.com"  type="email" >-->
        								<!--<div id="RemailError" class="text-center mb-2 mt-2"></div>-->
        								<!--<input  class="form-control" id="name"  name="name" required placeholder="Enter your name" required="" type="text" value="">-->
        								<!--<div id="nameError" class="text-center mb-2 mt-2"></div>-->
        								<!--<input  class="form-control mb-4" id="Rpwd"  name="Rpwd" placeholder="*******"  type="password" >-->
        								<!--<div id="RpwdError" class="text-center mb-2 mt-2"></div>-->
        								<!--<a href="javascript:void(0)" class="btn btn-green" type="submit" onclick="RegisterNow()">-->
        								<!-- Register Now-->
        								<!--</a>-->
            				<!--		</div>-->
                <!--				</div>-->
        				 
        				        <p class=" text-center">----------------------- OR -----------------------</p>
        						 
        						 <style>
            				  a.disabled {
                                      pointer-events: none;
                                      cursor: default;
                                    }
                                            						     
        						 </style>
        						 
        						 
                				<div class="form-group">
            						<a href="javascript:void(0)" class="btn mb-4 login-social login-facebook disabled"  type="button" onclick="window.location.href='../login/facebook-auth/oauth.php'">
            						<i class="fa fa-facebook "></i> Continue with Facebook</a>
            						<a href="javascript:void(0)" class="btn login-social login-google disabled"  type="button" onclick="window.location.href='../login/googleOauth/oauth.php'">
            						<i class="fa fa-google "></i> Continue with Google</a>
                				</div>
            				
            				</form>
            				
        			    </div> <!--/.card-body-->
    		            		
    		        </div>	<!--/.card-->
    					
    	        </div>
            </div>
        </div>
    </section>
	
					
	
	
	<script>
	
	// for entr key disable.....
	$(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
		}
	});
	
		
		$('#email').change(function() {
			
		
			var email = $('#email').val();
		 var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
			  var validEmail = regEx.test(email);
		
		if (email < 1)
		{
			$('#emailError').html("Please enter a email address.");	
             document.getElementById('emailError').style.color = 'red';			
		}
		else if (!validEmail)
		{
			$('#emailError').html("Please enter a Valid email address.");	
             document.getElementById('emailError').style.color = 'red';	
			  
		}
		else
		{
			$('#emailError').remove();
		}
			
			});
		
		
		
		
function validateForm()
	{
		var errorCount = 0;
		
		var email = $('#email').val();
		 var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
			  var validEmail = regEx.test(email);
		
		if (email < 1)
		{
			$('#emailError').html("Please Enter an Email Address.");	
             document.getElementById('emailError').style.color = 'red';			
		}
		else if (!validEmail)
		{
			$('#emailError').html("Please Enter a Valid Email Address.");	
             document.getElementById('emailError').style.color = 'red';	
			  
		}
		else
		{
			check_email();
		}
		
	}
	
			
	
function check_email(){
	
	var emailString = "user_email="+document.getElementById('email').value
	                   +"&user_pwd="+document.getElementById('pwd').value;
	                   
	                   var image = "http://autohapa.oneviewcrm.com/autohapa/assets/images/loader.gif";
	
	$.ajax({
		
		type:"POST",
		url:"http://autohapa.oneviewcrm.com/autohapa/login/ajax_login.php",
		data:emailString,
		cache:false,
		dataType:"json",
		success: function(result){
			//result = JSON.parse(result);
			// console.log(result);
			// alert(result.status);
			if(result.status == 'success'){
			    
				document.getElementById('customer_id').value =result.id;
				 document.getElementById('customer_id2').value =result.id;
			  
			 // $("#section-email").hide();
			 // $("#section-pwd").show();
			 
			 
			if(document.getElementById('hdregnum').value == ''){
                					 
                	$('.card-body').html("<img  id='gif'  src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");   
                					 
                					 	setTimeout(function(){ 
                					 	  
                					$('#formlogin2').submit();
                					
                					 	}, 1000);
                				  
                }else{
                					
                				
                		$('.card-body').html("<img  id='gif'  src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");   
                		//alert('description');
                					setTimeout(function(){ 
                					    
                					$('#formlogin').submit();
                					
                					
                					 	}, 1000);
                	}
				
			  
			 }else{
				
				
				        $('#signin').text('Loading....');
				        
				    setTimeout(function(){ 
						
						//window.location.href="http://autohapa.oneviewcrm.com/autohapa/login/"; 
						
						$('#invalids').css('display','block');  
						$('#invalids').html('Your Email Or password is worng please <strong>try Again</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
					
					    $('#signin').text('Sign in');	
					        	
				    }, 1000);
			
				
        				// $('#emailError').html("Email OR password Incorrect! ");	
            //             document.getElementById('emailError').style.color = 'red';	
				
			}
			
			
		},
		
	});
	
}	



// function check_pwd(){
	
// 	var pwdString = "user_pwd="+document.getElementById('pwd').value+
// 	                 "&user_id="+document.getElementById('customer_id').value;
	                 
// 	     var image = "../assets/images/loader.gif";
                                   
	
// 	$.ajax({
		
// 		type:"POST",
// 		url:"../login/ajax_login.php",
// 		data:pwdString,
// 		cache:false,
// 		success: function(result){
// 			result = JSON.parse(result);
// 			console.log(result);
// 			if(result.status == 'success'){
// 				 //alert(result.status);
				
// 				if(document.getElementById('hdregnum').value == ''){
                					 
//                 	$('.card-body').html("<img  id='gif'  src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");   
                					 
//                 					 	setTimeout(function(){ 
                					 	  
//                 					$('#formlogin2').submit();
                					
//                 					 	}, 1000);
                				  
//                 }else{
                					
                				
//                 		$('.card-body').html("<img  id='gif'  src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");   
//                 		//alert('description');
//                 					setTimeout(function(){ 
                					    
//                 					$('#formlogin').submit();
                					
                					
//                 					 	}, 1000);
//                 	}
				
// 			}else
// 		    	{
				 
				 
// 				        $('#submitbtn').text('Loading....');
// 							setTimeout(function(){ 
						
// 						       $('#invalid').css('display','block');  
// 							  $('#invalid').html('Your password is worng please <strong>try Again</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
// 						         $('#submitbtn').text('Sign in');
					        
// 					        $('#invalid').on('closed.bs.alert', function () {
//                                         window.location.href="../login/"; 
//                                     })
					        	
						
// 							}, 1000);
			
				
// 				// $('#pwdError').html("The password is incorrect!");
// 				// document.getElementById('pwdError').style.color = 'red';	
				
// 			}
			
			
// 		},
		
// 	});
	
// }


// function showRegForm(){
	
// 	 $("#section-email").hide();
// 	 $("#section-pwd").hide();
// 	 $("#section-register").show();
	
// }




// function RegisterNow(){
	
	
	
   
//     var email = $('#Remail').val();
// 	var name = $('#name').val();
//     var password = $('#Rpwd').val();
	
// 	// 
// 	// $("#nameError").remove();
// 	// 
//  var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
// 			  var validEmail = regEx.test(email);
			  
			  
//     if (email.length < 1) {
// 		 $('#RemailError').html("Please enter a email address.");	
// 			document.getElementById('RemailError').style.color = 'red';	
// 			return;
//     } 
// 	else if (!validEmail) 
// 	{
// 				  $('#RemailError').html("Please enter a valid email address.");	
// 					 document.getElementById('RemailError').style.color = 'red';	
// 				return;	
// 	}
// 	else{
		
// 		$("#RemailError").remove();
// 	}
    
 
//     if (name.length < 1) {
//       $('#nameError').html("Please enter your name.");	
//              document.getElementById('nameError').style.color = 'red';	
//             return;
//     }
// 	else{
// 		$("#nameError").remove();
// 	}
  

//     if (password.length < 8) {
//       $('#RpwdError').html("Please Enter A Password & password length should be 8 character.");	
//              document.getElementById('RpwdError').style.color = 'red';	
// 			 return;
//           }
// 	else{
// 		$("#RpwdError").remove();
// 	}
	
	
	
	



	
// 	  var datastring = "RegEmail="+document.getElementById('Remail').value
// 					  +"&RegName="+document.getElementById('name').value
// 					  +"&RegPwd="+document.getElementById('Rpwd').value;
					  
					  
// 					  var image = "../assets/images/loader.gif";
                      
					  
					  
// 			  $.ajax({
				  
// 				type:"POST",
// 				url:"../login/ajax_register.php",
// 				data: datastring,
// 				cache: false,
// 				success: function(result){
// 						result = JSON.parse(result);
				 
					
// 			if(result.status == 'success'){
						
					
//                 	if(document.getElementById('hdregnum').value == ''){
                	    
//                 	      $('.card-body').html("<img src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");
                					
//                 			setTimeout(function(){ 
                					 	  
//                 					$('#formlogin2').submit();
                					
//                 				}, 1000);
                				  
//     				}else{
                					
//                 			document.getElementById('customer_id').value = result.id;
                		
//                 				 $('.card-body').html("<img src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");	
//                 					setTimeout(function(){ 
                					    
//                 					$('#formlogin').submit();
                					
                					
//                 					 	}, 1000);
//                 		}
                
                
                
                
                
// 					}
// 					else{
							
// 						 $('.card-body').html("<img src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");	
							
// 							setTimeout(function(){ 
					
// 						$('#invalid p').html("Your Account already exists please sign in! ");	
							
							
// 						window.location.href="../login/"; 
							
							    
// 							}, 1000);
// 							//window.location.href="../login/";
						
// 					}
					
// 				},
// 			});
	   
	
	
	
	
	
	
	
	
	
	
	
	
	
// }







	
	</script>
<?php include_once('../includes/footer.php'); ?>

