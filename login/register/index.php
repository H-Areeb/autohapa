<?php  header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");	

include_once('../../includes/header.php');

		$http_referer =$_SERVER['HTTP_REFERER'];
		$description = '../../description/';
?>
		
		 <!--<link rel="stylesheet" href="http://autohapa.oneviewcrm.com/autohapa/assets/css/passtrength.css" />
	    <script src="http://autohapa.oneviewcrm.com/autohapa/assets/js/jquery.passtrength.js"></script>-->
	    
	    <link rel="stylesheet" href="http://autohapa.oneviewcrm.com/autohapa/assets/css/passwordcheck.css" />
	    <script src="http://autohapa.oneviewcrm.com/autohapa/assets/js/passwordcheck.js"></script>
	    
	    <script src="https://www.google.com/recaptcha/api.js?render=6Ldb5b0UAAAAAG3g_sNkQdsBXgzKMqfkmKNLCXzk"></script>
<hr />

<style>
    #section-register .col-form-label {
    color: #161717a3;
    font-weight: 700;
    font-size: 0.9rem;
    padding-top: calc(.475rem + 1px);
}
#section-register .btn {
    width: auto;
    font-size: 0.9rem;
}
#section-register .bg-card{
    background-color: #6c757d2;
}

#section-register .form-group {
    position: relative;
}
#section-register .form-control {
    padding: .75rem .75rem;
    font-size: 0.9rem;
   
}

#section-register .error {
    color: red;
    position: absolute;
    border: 1px solid red;
    padding: 7px;
    border-radius: 5px;
    background-color: #fff;
    left: 100.6%;
    font-size: 12px;
    width: 300px;
    top: 0;
    z-index: 5;
    display: none;
}
#section-register .error::before {
    width: 10px;
    height: 10px;
    top: 9px;
    border-top: 1px solid #ff4436;
    border-left: 1px solid #ff4436;
    background-color: #fff;
    content: '';
    position: absolute;
    left: -6px;
    transform: rotate(-45deg);
}

ul.steps {
    box-shadow: inset 0 0 0 2px #e1e1e1;
    height: 44px;
    margin: 0 0 25px 0;
    padding: 0;
    list-style: none;
    white-space: nowrap;
    overflow: hidden;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
}
ul.steps>li {
    display: inline-block;
    height: 44px;
    line-height: 44px;
    text-align: center;
    position: relative;
    -webkit-flex: 1;
    -ms-flex: 1;
    flex: 1;
}


ul.steps>li.past, ul.steps>li.current {
    background: #e1e1e1;
}
ul.steps>li a {
    cursor: default;
    padding: 0 0 0 15px;
}
ul.steps > li:not(.past) a {
    color: #5c5c5c;
}
ul.steps > li:not(:last-child):not(.past):after, ul.steps > li:not(:last-child):not(.past):before {
    left: 100%;
    top: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}
ul.steps > li:not(:last-child):not(.past):before {
    border-color: transparent;
    border-left-color: #e1e1e1;
    border-width: 24px 0 24px 13px;
    margin-top: -24px;
}
</style>



<?php
	 $regnum= '';
	if (isset($_REQUEST['regnum']))
		{
			$regnum = $_REQUEST['regnum'];
			$type_id = $_REQUEST['type_id'];
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
	
	
	<form id="formReg1" method="post" action="../../description/">
	<input type="hidden" id="hdregnum" name="regnum" value="<?php echo $regnum;?>">
	<input type="hidden" id="customer_id" name="customer_id" value="">
	<input type="hidden" id="type_id" name="type_id" value="<?php echo $type_id;?>">
	</form>
	
	
	
	<form id="formReg2" method="post" action="./done.php">
	<input type="hidden" id="hdregnum2" name="regnum2" value="<?php echo $regnum;?>">
	<input type="hidden" id="user_id2" name="user_id2" value="">
	</form>
	
		


	<section class="main mt-5 mb-5">
		<div class="container">
		    <ul class="steps mobile">
                <li id="step_profile" class="current">
                    <a href="javascript:void(0)" title="Profile"><span>Step</span> 1</a>
                </li>
                <li id="step_done" class=""><a href="javascript:void(0)" title="Done!">Done!</a>
                </li>
            </ul>
    	    <div class="row justify-content-center">
    			<div class="col-lg-6">
					<h1>Profile</h1>
					
					<div class="alert alert-success alert-dismissible fade show" role="alert" id="success" style="display:none;">
                     </div>
					<div class="alert alert-danger alert-dismissible fade show" role="alert" id="recapchaError" style="display:none;">
                     </div>
					
					
    			    <div class="card" style="border:none !important;">
    		            <div class="card-body">
		                    <form method="POST" >
		                          <div id="section-register" >
		                              
		                            <div class="form-group row">
                                        <label for="name" class="col-sm-4 col-form-label">Username*</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" id="name"  name="name" type="text" >
					                    </div>
                                        <div id="nameError" class="error"></div>
                                    </div>
		                                
        						    <div class="form-group row">
                                        <label for="Remail" class="col-sm-4 col-form-label">Email*</label>
                                            <div class="col-sm-8">
                                                <input class="form-control " id="Remail"  name="Remail"  type="email" >
						                </div>
                                        <div id="RemailError" class="error"></div>
                                    </div>
                                    
                                    <div class="form-group row justify-content-end">
                                        <div class="col-sm-8">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="publish_email" class="custom-control-input" name="publish_email">
                                                <label for="publish_email" class="custom-control-label">Publish my email</label>
                                            </div>
					                    </div>
                                    </div>
                                        
                                    <div class="form-group row">
                                        <label for="Rpwd" class="col-sm-4 col-form-label">Password</label>
                                        <div class="col-sm-8">
                                            <input  class="form-control" id="Rpwd" name="Rpwd" placeholder="Enter Password"  type="password" >
                                            <span id="result"><span id="meter">Strength(<span id="strengthcount">0</span> of 5)</span></span>
					                    </div>
                                        <div id="RpwdError" class="error"></div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="confirmpwd" class="col-sm-4 col-form-label">Confirm Password</label>
                                        <div class="col-sm-8">
                                            <input  class="form-control" id="confirmpwd"  name="confirmpwd"  type="password" >
					                    </div>
                                        <div id="confirmpwdError" class="error"></div>
                                    </div>
                                    
                                    <div class="form-group row justify-content-end">
                                        <div class="col-sm-8">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="agreePolicy" class="custom-control-input" name="agreePolicy">
                                                <label for="agreePolicy" class="custom-control-label">I agree with <a href="http://autohapa.oneviewcrm.com/autohapa/policies-terms/" target="_blank">Privacy Policy</a></label>
                                            </div>
                                            <div id="agreePolicyError" class="error"></div>
					                    </div>
                                    </div>
                                    <input type="hidden" id="token" name="token" value="">
                                    
                                    <div class="form-group row justify-content-end">
                                        <div class="col-sm-8">
                                              <a href="javascript:void(0)" id="submitbtn1"  class="btn btn-success" type="submit" onclick="RegisterNow()">&nbsp; Register Now &nbsp;</a>
                                              <a href="javascript:void(0)" id="submitbtn2" type="submit" class="btn btn-success" style="display:none;"></a>
                                        </div>
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


/*

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

*/



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

    
    $('#confirmpwd').focusout(function(){
   
    var Password = $('#Rpwd').val();
    var confirmPassword = $('#confirmpwd').val();
    
    if (confirmPassword != Password ) {
            $('#confirmpwdError').html("Your password doesn't match");
            $('#confirmpwdError').css({ 'display': 'block' });
          
          }
     else{
           $("#confirmpwdError").remove();
           $('#confirmpwdError').css({ 'display': 'none' });
     }
});
    
    
    
    
    
//------------ Start For register  function -----------//    
    
    
function RegisterNow(){
   
    var email = $('#Remail').val();
	var name = $('#name').val();
    var password = $('#Rpwd').val();
	var Cpassword = $('#confirmpwd').val();
	
	if (name.length < 1) {
      $('#nameError').html("Please enter a username.");	
             $('#nameError').css({ 'display': 'block' });		
            return;
    }
	else{
		$("#nameError").remove();
		$('#nameError').css({ 'display': 'none' });
		
	}


    var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
	var validEmail = regEx.test(email);
			  
			  
    if (email.length < 1) {
		 $('#RemailError').html("Please enter a email address.");	
			$('#RemailError').css({ 'display': 'block' });	
			return;
    } 
	else if (!validEmail) 
	{
				  $('#RemailError').html("Please enter a valid email address.");	
					$('#RemailError').css({ 'display': 'block' });	;	
				return;	
	}
	else{
		
		$("#RemailError").remove();
		$('#RemailError').css({ 'display': 'none' });	
	}
    
 
    
  

    if (password.length < 8) {
      $('#RpwdError').html("Please enter a password & password length should be 8 character.");
             $('#RpwdError').css({ 'display': 'block' });	
			 return;
           }
	else{
		$("#RpwdError").remove();
		$('#RpwdError').css({ 'display': 'none' });	
		
	}
	
	 if (Cpassword != password) {
      $('#confirmpwdError').html("Your password doesn't match");	
             $('#confirmpwdError').css({ 'display': 'block' });	
			 return;
          }
	else{
		$("#confirmpwdError").remove();
		$('#confirmpwdError').css({ 'display': 'none' });	
	}
	

	if ( $('#agreePolicy').is(":checked") ) {
        $("#agreePolicyError").remove();
		$('#agreePolicyError').css({ 'display': 'none' });
    }
	else{
	    $('#agreePolicyError').html("You must agree to our privacy policy");
		 $('#agreePolicyError').css({ 'display': 'block' });		
        return;
		
	}
	
	
	
	  var datastring = "RegEmail="+document.getElementById('Remail').value
					  +"&RegName="+document.getElementById('name').value
					  +"&RegPwd="+document.getElementById('Rpwd').value
					  +"&token="+document.getElementById('token').value;
					  
					  
					  var image = "../../assets/images/loader.gif";
                        
				 $('#submitbtn1').hide();
				 	$('#submitbtn2').show();
				 $('#submitbtn2').html('&nbsp; Loading.... &nbsp;');	  
					  
  $.ajax({
	  
	type:"POST",
	url:"ajax_register.php",
	data: datastring,
	cache: false,
	success: function(result){
				
				result = JSON.parse(result);
				 
					
			if(result.status == 'success'){
					
					
				//document.getElementById('customer_id').value =result.id;
				 document.getElementById('user_id2').value =result.id;
						
                	if(document.getElementById('hdregnum').value == ''){
                	    
                	     //$('#success').css('display','block');  
						//	 $('#success').html('Account Created  <strong>Successfully</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
					
                	     $('.card-body').html("<img src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");
                					
                			setTimeout(function(){ 
                			    
                			    $('#submitbtn2').hide();
				            	$('#submitbtn1').show();
                			    
                			    $('#formReg2').submit(); 
                			    
                			    
                			}, 1000);
                				  
    				}
    				else
    				    {
                		
                			document.getElementById('customer_id').value = result.id;
                			
                			 $('#success').css('display','block');  
							 $('#success').html('Account Created  <strong>Successfully</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
						
                			
                	    	$('.card-body').html("<img src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");	
                				
                				setTimeout(function(){ 
                				      $('#submitbtn2').hide();
				            	      $('#submitbtn1').show();
                				    $('#formReg1').submit();  
                				    
                				}, 1000);
                				
                		}
                
               }
				else if(result.status == 'recapchaError')
    				{
    				    
    				    
							setTimeout(function(){ 
						
						      $('#recapchaError').css('display','block');  
							 $('#recapchaError').html('Something went wrong please <strong>Try Again</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
						
					           $('#submitbtn2').hide();
				            	$('#submitbtn1').show();
					        
					        
					        $('#recapchaError').on('closed.bs.alert', function () {
                                        //window.location.href="../login/register.php"; 
                                        location.reload();
                                    })
					        
					        	
						
							}, 1000);
							
    			}
				else{
					    
							setTimeout(function(){ 
						
						 $('#recapchaError').css('display','block');  
							 $('#recapchaError').html('Your Account already exists please <strong>sign in</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
						
						      	
						    
					          $('#submitbtn2').hide();
				            	$('#submitbtn1').show();
					        
					        
					        $('#recapchaError').on('closed.bs.alert', function () {
                                        //window.location.href="../login/register.php";
                                        location.reload();
                                    })
					        
					        	
						
							}, 1000);
							
						
					}
					
				},
			});
	   
}
	

//------------ End fo register  function -----------//    	
	

	</script>
<?php include_once('../../includes/footer.php'); ?>

