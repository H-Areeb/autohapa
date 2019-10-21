<?php
session_start();

$http_referer = @$_SERVER['HTTP_REFERER'];


if(isset($_REQUEST['customer_id2'])){
		
		 $user_id  = $_REQUEST['customer_id2'];
		 $_SESSION['customer_id2'] = $user_id ;
	}

if(isset($_POST['customer_id'])){
$_SESSION['customer_id'] = $_POST['customer_id'];

}





// echo 'cusA'.@$_SESSION['customer_id'];
// echo'<br>';
// echo 'cusB'.@$_SESSION['customer_id2'];




	if (isset($_SESSION['customer_id']))
		{
			@$customer_id = $_SESSION['customer_id'];
			 //echo '<br>customer throgh price page id'.@$customer_id;
		}
		else
		{
			@$customer_id = $_SESSION['customer_id2'];
// 			echo '<br>customer direct login page id'.@$customer_id;
		}
		



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://127.0.0.1/autohapa/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://127.0.0.1/autohapa/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="http://127.0.0.1/autohapa/assets/css/owl.theme.default.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="http://127.0.0.1/autohapa/assets/css/style.css"> 
	
	
	<link rel="stylesheet" href="http://127.0.0.1/autohapa/assets/libs/bootstrap-datepicker/css/datepicker.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
  
  
<script src="http://127.0.0.1/autohapa/assets/js/jquery-2.2.4.min.js"></script>
<script src="http://127.0.0.1/autohapa/assets/libs/jquery-ui/jquery-ui.min.js"></script>
<!--
<script src="http://127.0.0.1/autohapa/assets/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
-->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>AutoHapa</title>
</head>
<body >
    <div id="wrapper">

        <header id="site-header"  >
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-auto">
                        <nav id="top-navigation" class="navigation">
                            <div class="menu-container">
                                <ul id="top-menu" class="menu">                            
                                    <li><a href="http://127.0.0.1/autohapa/">Cars</a></li>
													<li><a href="#">Prestige cars</a></li>
													<li><a href="#">Vans</a></li>
													<li><a href="/bikes">Bikes</a></li>
													<li><a href="#">Motorhomes</a></li>
													<li><a href="#">Caravans</a></li>
													<li><a href="#">Trucks</a></li>
													<li><a href="#">Farm</a></li>
													<li><a href="#">Plant</a></li>
													<li class="link-separator">|</li>
													<li><a href="#">Safety Advice</a></li>
													<li><a href="http://127.0.0.1/autohapa/sellmycar" class="btn btn-blue">SELL MY CAR</a></li>
							    
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row align-items-end justify-content-between">
                    <div class="col-lg-3">
                        <div class="header-logo">
                           <a href="http://127.0.0.1/autohapa/">
								<img src="http://127.0.0.1/autohapa/assets/images/logo.png" alt="AutoHapa" class="custom-logo img-fluid" />
							</a>
						</div>
                    </div>
                    <div class="col-lg-9">
                        <nav id="site-navigation" class="navigation">
                            <div class="menu-container">
                                <ul id="primary-menu" class="menu">                           
                                    <li><a href="#">Buying new & used</a></li>
                                    <li><a href="#">Sell your car</a></li>
                                    <li><a href="#">Car reviews & more</a></li>
                                    <li><a href="#">Finance, insurance & more</a></li>
                                    
									<?php
	 
	
									 if(isset($_SESSION['customer_id'])|| isset($_SESSION['customer_id2']))
									 {
										 
										     echo '<li><a href="http://127.0.0.1/autohapa/login/logout/">Sign Out<span class="user-icon"><i class="fa fa-user"></i></span></a></li>';
									
									 }
									 else{
										  
									
									?>
										   <li class="dropdown">
										                 <a href="#" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign In<span class="user-icon"><i class="fa fa-user"></i></span></a>
										                 <div class="dropdown-menu dropdown-menu-right" style="min-width: 18rem!important ;" >
										                     
										                     <div style="max-width:400px;margin: 0 auto;">
                                                		   	         <div class="alert alert-danger alert-dismissible fade show" role="alert" id="invalid" style="display:none;">
                                                                     </div>
                                                                     <div class="alert alert-success alert-dismissible fade show" role="alert" id="success" style="display:none;">
                                                                     </div>
		                                                      </div>
										                     
										                     
										                     
										                     
                                                              <form class="px-4 py-3 "  method="POST"  >
                                                                <div class="form-group">
                                                                  <label for="emailLogin">Email address</label>
                                                                  <input  class="form-control mb-2" id="emailLogin" maxlength="250" minlength="6" name="emailLogin" placeholder="e.g. name@email.com"  type="email" >
        								                                <div id="emailLoginError" class="text-center mb-2"></div>
        								                                
								                                  <label for="pwdLogin">Password</label>
								                                  <input  class="form-control mb-2"  id="pwdLogin"  name="pwdLogin" placeholder="*******"  type="password" >
        							                                    <div id="pwdLoginError" class="text-center mb-2"></div>
                                            							   
                                                                </div>
                                                                <div class="form-group">
                                                                  
                                                                  <a href="javascript:void(0)" id="submitbtn" class="btn btn-blue " type="submit" onclick="validateLogin()">
                                            								Sign in 
                                            					  </a>
                                            					   
                                                                </div>
                                                                
                                                                
                                                                
                                                                <p class=" text-center">---------------- OR ----------------</p>
                                        						 
		 <style>
	  a.disabled {
              pointer-events: none;
              cursor: default;
            }
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
          						     
	 </style>
                                        						 
                                        						 
                                                				<div class="form-group">
                                            						<a href="javascript:void(0)" class="btn mb-2 login-social login-facebook disabled"  type="button" onclick="window.location.href='../login/facebook-auth/oauth.php'">
                                            						<i class="fa fa-facebook "></i> Continue with Facebook</a>
                                            						<a href="javascript:void(0)" class="btn login-social login-google disabled"  type="button" onclick="window.location.href='../login/googleOauth/oauth.php'">
                                            						<i class="fa fa-google "></i> Continue with Google</a>
                                                				</div>
                                                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                <a class="dropdown-item"  href="http://127.0.0.1/autohapa/login/register.php"> Sign up</a>
                                                              <a class="dropdown-item" href="#">Forgot password?</a>
                                                             <style>
                                                             .dropdown-item{
                                                                 color:#2573c2 !important;
                                                                 padding:0px !important;
                                                                 font-size:.9rem !important;
                                                                 
                                                             }
                                                             </style>
                                                                
                                                              </form>
                                                            
                                                        </div>
										            </li>
                                             
										  <?php
										      
										  }
										  ?>
									
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header> <!-- /#masthead -->
		
		<div id="main" class="content">
	
	<?php
	
	$regnum= '';
	if (isset($_POST['regnum']))
		{
			$regnum = $_POST['regnum'];
			//echo $regnum;
		}
	
	?>
	
		    
	
	
	
	<form id="formlogin" method="post" action="http://127.0.0.1/autohapa/description/">
	<input type="hidden" id="hdregnum1" name="regnum" value="<?php echo $regnum;?>">
	<input type="hidden" id="customer_id" name="customer_id" value="">
	</form>
	<!---->
	<form id="formlogin2" method="post" action="<?= $http_referer;?>">
	<input type="hidden" id="hdregnum2" name="regnum2" value="<?php echo $regnum;?>">
	<input type="hidden" id="customer_id2" name="customer_id2" value="">
	</form>	    
		    
		    
	    
		    
	<script>
	

	
		
		$('#emailLogin').change(function() {
			
		
			var email = $('#emailLogin').val();
		 var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
			  var validEmail = regEx.test(email);
		
		if (email < 1)
		{
			$('#emailLoginError').html("Please enter a email address.");	
             document.getElementById('emailLoginError').style.color = 'red';			
		}
		else if (!validEmail)
		{
			$('#emailLoginError').html("Please enter a Valid email address.");	
             document.getElementById('emailLoginError').style.color = 'red';	
			  
		}
		else
		{
			$('#emailLoginError').remove();
		}
			
			});
		
		
		
		
function validateLogin()
	{
		var errorCount = 0;
		
		var email = $('#emailLogin').val();
		 var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
			  var validEmail = regEx.test(email);
		
		if (email < 1)
		{
			$('#emailLoginError').html("Please Enter an Email Address.");	
             document.getElementById('emailLoginError').style.color = 'red';			
		}
		else if (!validEmail)
		{
			$('#emailLoginError').html("Please Enter a Valid Email Address.");	
             document.getElementById('emailLoginError').style.color = 'red';	
			  
		}
		else
		{
			check_login_credientials();
		}
		
	}
	
			
	
function check_login_credientials(){
	
	var emailString = "user_email="+document.getElementById('emailLogin').value
	                   +"&user_pwd="+document.getElementById('pwdLogin').value;
	
	$.ajax({
		
		type:"POST",
		url:"http://127.0.0.1/autohapa/login/ajax_login.php",
		data:emailString,
		cache:false,
		dataType:"json",
		success: function(result){
			//result = JSON.parse(result);
		console.log(result);
		 //alert(result.status);
			if(result.status == 'success'){
			    
            				 document.getElementById('customer_id').value =result.id;
            				 document.getElementById('customer_id2').value =result.id;
			  
			  
            			  if(document.getElementById('hdregnum1').value == '')
            			    {
                            					 
                    	              $('#submitbtn').text('Loading....');   
                    				
                    				 //alert(' description');
                    				 
                    				  $('#success').css('display','block');  
						                $('#success').html('you are Login <strong>Successfully</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
					
					                $('#success').on('closed.bs.alert', function () {
                                        $('#formlogin2').submit(); 
                                    })
                    					 
            		         setTimeout(function(){ 	
                    		         
                    		         $('#formlogin2').submit(); 
                    		             
                    		             $('#submitbtn').text('sign in'); 
                    		             
                    		             
                    		         }, 3000);
                    		         
                    		      
                    		         
                            				  
                            }
                            else
                            {
                                
                            		 $('#submitbtn').text('Loading....');  
                            		 
                            		 
                            		 $('#success').css('display','block');  
						$('#success').html('you are Login <strong>Successfully</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
					                    
					                    $('#success').on('closed.bs.alert', function () {
                                        $('#formlogin').submit(); 
                                    })
					                    
                            		 //alert('not description');
                            	
                            		 setTimeout(function(){    
                            		 
                            
                            		     $('#formlogin').submit(); 
                            		      $('#submitbtn').text('sign in'); 
                            		     
                            		 }, 3000);
                            		 
                            	
                    		         
                            		 
                            }
			  
			 }else{
				
				
				        $('#submitbtn').text('Loading....');
				        
				    setTimeout(function(){ 
						
						//window.location.href="http://127.0.0.1/autohapa/login/"; 
						
						$('#invalid').css('display','block');  
						$('#invalid').html('Your password is worng please <strong>try Again</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
					
					    $('#submitbtn').text('Sign in');	
					        	
				    }, 1000);
			
				
        				// $('#emailError').html("Email OR password Incorrect! ");	
            //             document.getElementById('emailError').style.color = 'red';	
				
			}
			
			
		},
		
	});
	
}	
	




</script>	    
		    
		