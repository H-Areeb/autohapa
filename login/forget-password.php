<?php
header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
  include_once('../includes/header.php');

echo'<hr>';

?>


<style>
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
</style>



            <section class="main mt-5 mb-5">
		        <div class="container">
                    <div class="row justify-content-center">
    			        <div class="col-lg-6">
					<h1>Forgot Password?</h1>
                        	
                        	<!--<div class="success_message"></div>-->
                        	<div class="alert alert-success alert-dismissible fade show" role="alert" id="successs" style="display:none;"></div>
                        
                
        					<div class="alert alert-danger alert-dismissible fade show" role="alert" id="recapchaError" style="display:none;"></div>
                
					
					
					
    			    <div class="card" style="border:none !important;">
    		            <div class="card-body">
		                    <form method="POST">
		                          <div id="section-register">
        		                            
        		                                
                						    <div class="form-group row">
                                                <label for="Remail" class="col-sm-4 col-form-label">Email*</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control " id="Remail"  name="Remail"  type="email" >
        						                </div>
                                                <div id="RemailError" class="error"></div>
                                            </div>
                                            
                                            <div class="form-group row justify-content-end">
                                                <div class="col-sm-8">
                                                      <a href="javascript:void(0)" id="submitbtn1"  class="btn btn-success" type="submit" onclick="validate_forgot()">&nbsp; Submit &nbsp;</a>
                                                      <!--<a href="javascript:void(0)" id="submitbtn2" type="submit" class="btn btn-success" style="display:none;"></a>-->
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


  $('#Remail').focusout(function(){
      
   var email = $('#Remail').val();
    
   var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
	var validEmail = regEx.test(email);
			  
			  
    if (email.length < 1) {
		 $('#RemailError').html("Please enter a  Login email address.");	
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
});




function validate_forgot() {

 var email = $('#Remail').val();
 

    var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
    	var validEmail = regEx.test(email);

 if (email.length < 1) {
		 $('#RemailError').html("Please enter a  Login email address.");	
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


               
				 $('#submitbtn1').html('&nbsp; Loading.... &nbsp;');

        var datastring = "email="+email;

         $.ajax({
        	  
        	type:"POST",
        	url:"ajax_password_recovery.php",
        	data: datastring,
        	cache: false,
        	success: function(result){
        	    
        	    if(result == 'successfull')
        	    {
        	        $('#successs').css('display','block');  
					$('#successs').html('Please check your email to reset password! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
					
					 $('#successs').on('closed.bs.alert', function () {
                                        //window.location.href="../login/register.php"; 
                                        location.reload();
                                    })
        	    }
        	    else
        	    {
        	        $('#recapchaError').css('display','block');  
					$('#recapchaError').html('NO USER FOUND<strong>Try Again</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
					 $('#recapchaError').on('closed.bs.alert', function () {
                                        //window.location.href="../login/register.php"; 
                                        location.reload();
                                    })	
        	    }
        	    
        	    
        	    $('#submitbtn1').html('&nbsp; forget Password &nbsp;');
        	},
         });




}
</script>


<?php
include_once('../includes/footer.php');
?>


