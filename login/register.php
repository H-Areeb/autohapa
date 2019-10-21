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
		<link rel="stylesheet" href="http://autohapa.oneviewcrm.com/autohapa/assets/css/passtrength.css" >
	<script src="https://www.google.com/recaptcha/api.js?render=6Ldb5b0UAAAAAG3g_sNkQdsBXgzKMqfkmKNLCXzk"></script>
	


        <script src="http://autohapa.oneviewcrm.com/autohapa/assets/js/jquery.passtrength.js"></script>
	
	
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
					
					
					<div class="alert alert-danger alert-dismissible fade show" role="alert" id="invalid" style="display:none;">
                     </div>
					<div class="alert alert-danger alert-dismissible fade show" role="alert" id="recapchaError" style="display:none;">
                     </div>
					
					
    			    <div class="card" style="border:none !important;">
    		            
    		
		                <div class="card-body">
		                    
		                    <form method="POST"  style="max-width: 300px;margin: 0 auto;">
		                   
        						<div id="section-register" >
            						<div class="form-group">
        								<input  class="form-control " id="Remail"  name="Remail" required placeholder="name@email.com"  type="email" >
        								<div id="RemailError" class="text-center mb-2 mt-2"></div>
        								
        								
        								<input  class="form-control" id="name"  name="name" required placeholder="Enter your name"  type="text" value="">
        								<div id="nameError" class="text-center mb-2 mt-2"></div>
        								
        								
        								<input  class="form-control " id="Rpwd"  name="Rpwd"  placeholder="Enter Password"  type="password" >
        								<div id="RpwdError" class="text-center mb-2 mt-2"></div>
        								
        								<input  class="form-control mb-4" id="confirmpwd"  name="confirmpwd" placeholder="Confirm password"   type="password" >
        								<div id="confirmpwdError" class="text-center mb-2 mt-2"></div>
        								
        								<input type="hidden" id="token" name="token" value="">
        								
        								
        								<a href="javascript:void(0)" id="submitbtn" class="btn btn-green" type="submit" onclick="RegisterNow()">
        								 Register Now
        								</a>
            						</div>
                				</div>
        				 
        			
            				
            				</form>
            				
        			    </div> <!--/.card-body-->
    		            		
    		        </div>	<!--/.card-->
    					
    	        </div>
            </div>
        </div>
    </section>
	
					

<script>




$('#Rpwd').passtrength({
  minChars: 8,
   passwordToggle: true,
  eyeImg : "http://autohapa.oneviewcrm.com/autohapa/assets/css/eye.svg", // toggle icon
  tooltip: true,
  textWeak: "Weak",
  textMedium: "Medium",
  textStrong: "Strong",
  textVeryStrong: "Very Strong",
});









//---------- Start For Google ReCapctha V3 -------------// 

grecaptcha.ready(function() {
    grecaptcha.execute('6Ldb5b0UAAAAAG3g_sNkQdsBXgzKMqfkmKNLCXzk', {action: 'Autohapa'}).then(function(token) {
       //console.log(token);
       document.getElementById('token').value = token;
    });
});

//---------- End For Google ReCapctha V3 -------------// 	





//------------ Start for entr key disable -----------//
	$(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
		}
	});
//------------ End for entr key disable -----------//	

    
    
    
    
    
    
    
//------------ Start For register  function -----------//    
    
    
function RegisterNow(){
   
    var email = $('#Remail').val();
	var name = $('#name').val();
    var password = $('#Rpwd').val();
	var Cpassword = $('#confirmpwd').val();
	// 
	// $("#nameError").remove();
	// 
 var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
			  var validEmail = regEx.test(email);
			  
			  
    if (email.length < 1) {
		 $('#RemailError').html("Please enter a email address.");	
			document.getElementById('RemailError').style.color = 'red';	
			return;
    } 
	else if (!validEmail) 
	{
				  $('#RemailError').html("Please enter a valid email address.");	
					 document.getElementById('RemailError').style.color = 'red';	
				return;	
	}
	else{
		
		$("#RemailError").remove();
	}
    
 
    if (name.length < 1) {
      $('#nameError').html("Please enter your name.");	
             document.getElementById('nameError').style.color = 'red';	
            return;
    }
	else{
		$("#nameError").remove();
	}
  

    if (password.length < 8) {
      $('#RpwdError').html("Please Enter A Password & password length should be 8 character.");	
             document.getElementById('RpwdError').style.color = 'red';	
			 return;
           }
	else{
		$("#RpwdError").remove();
	}
	
	 if (Cpassword != password) {
      $('#confirmpwdError').html("Your Password isn't Matched");	
             document.getElementById('confirmpwdError').style.color = 'red';	
			 return;
           }
	else{
		$("#confirmpwdError").remove();
	}
	
	



	
	  var datastring = "RegEmail="+document.getElementById('Remail').value
					  +"&RegName="+document.getElementById('name').value
					  +"&RegPwd="+document.getElementById('Rpwd').value
					  +"&token="+document.getElementById('token').value;
					  
					  
					  var image = "../assets/images/loader.gif";
                        //$('.card-body').html("<img src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");
					  
					  
  $.ajax({
	  
	type:"POST",
	url:"../login/ajax_register.php",
	data: datastring,
	cache: false,
	success: function(result){
				
				result = JSON.parse(result);
				 
					
			if(result.status == 'success'){
						
				
						
                	if(document.getElementById('hdregnum').value == ''){
                	    
                	     $('.card-body').html("<img src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");
                					
                					 	setTimeout(function(){ 
                					 	  
                					$('#formlogin2').submit();
                					
                					 	}, 1000);
                				  
    				}else
    				    {
                			
                			document.getElementById('customer_id').value = result.id;
                		$('.card-body').html("<img src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");	
                				
                					setTimeout(function(){ 
                					    
                					$('#formlogin').submit();
                					
                					
                					 	}, 1000);
                		}
                
                
                
                
                
				}
				else if(result.status == 'recapchaError')
    				{
    				    
    				    $('#submitbtn').text('Loading....');
							setTimeout(function(){ 
						
						      $('#recapchaError').css('display','block');  
							 $('#recapchaError').html('Something went wrong  please <strong>Try Again</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
						
					         $('#submitbtn').text('Register Now');
					        
					        
					        $('#recapchaError').on('closed.bs.alert', function () {
                                        window.location.href="../login/register.php"; 
                                    })
					        
					        	//window.location.href="../login/"; 
						
							}, 1000);
							
    			}
				else{
					    
					   
					    $('#submitbtn').text('Loading....');
							setTimeout(function(){ 
						
						      $('#invalid').css('display','block');  
							 $('#invalid').html('Your Account already exists please <strong>sign in</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
						
					        
					        $('#submitbtn').text('Register Now');
					        
					        	//window.location.href="../login/"; 
						
							}, 1000);
							
						
					}
					
				},
			});
	   
}
	

//------------ End fo register  function -----------//    	
	
	
	
	
	
	
	
	
	








	
	</script>
<?php include_once('../includes/footer.php'); ?>

