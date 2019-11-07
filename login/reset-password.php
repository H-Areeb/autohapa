<?php
header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
  include_once('../includes/header.php');

echo'<hr>';

if(isset($_POST["reset-password"])){

// AND isset($_GET['token']) && !empty($_GET['token'])
if(isset($_GET['email']) && !empty($_GET['email'])){
    // Verify data
    $email = $_GET['email']; // Set email variable
    $token = $_GET['token']; // Set token variable
                 
    $search = mysqli_query($conni,"SELECT email  FROM car_user WHERE email='".$email."'   AND isActive_ynid='1'") or die(mysqli_error($conni)); 
    $match  = mysqli_num_rows($search);
           
        //   echo'<h1>'.$match.'</h1>';
                 
    if($match > 0){
        // We have a match, activate the account
        $regPass = $_POST['newPassword'];
        $password_string = mysqli_real_escape_string($conni,$regPass);
           $password_hash = password_hash($password_string, PASSWORD_DEFAULT);
        
        mysqli_query($conni,"UPDATE car_user SET password='".$password_hash."' WHERE email='".$email."'  AND isActive_ynid='1'") or die(mysqli_error($conni));
    
        $success_message = "Your password Successfully Updated!";
    }
     else
     {
          $error_message= 'The url is either invalid or user Email Not matched!.';
     }  

}
else
{
   $error_message= 'Invalid approach, please use the link that has been send to your email.';
}

}




?>
<link rel="stylesheet" href="http://autohapa.oneviewcrm.com/autohapa/assets/css/passwordcheck.css" />
	    <script src="http://autohapa.oneviewcrm.com/autohapa/assets/js/passwordcheck.js"></script>

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
					<h1>Reset Password</h1>
                        	<?php if(!empty($success_message)) { ?>
                        	<!--<div class="success_message"></div>-->
                        	<div class="alert alert-success alert-dismissible fade show" role="alert" id="success" style="display:block;">
                        	    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        	    <?php echo $success_message; ?>
                             </div>
                        	<?php } ?>
                
                	
                		<?php if(!empty($error_message)) { ?>
                	
					<div class="alert alert-danger alert-dismissible fade show" role="alert" id="recapchaError" style="display:block;">
					    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					    <?php echo $error_message; ?>
                     </div>
                	<?php } ?>
                	
					
					
					
    			    <div class="card" style="border:none !important;">
    		            <div class="card-body">
		                    <form method="POST" onsubmit=" return passwordChange();">
		                          <div id="section-register">
        		                            
        		                                
                						     
                                                    <div class="form-group row row justify-content-end">
                                                        <label for="newPassword" class="col-sm-4 col-form-label">New Password</label>
                                                        <div class="col-sm-8">
                                                        <input type="password" class="form-control " size="30" id="newPassword" name="newPassword" placeholder="New Password" >
                                                        <span id="result"><span id="meter">Strength(<span id="strengthcount">0</span> of 5)</span></span>
                                                        </div>
                                                        
                                       
                                                        <div  id="newPasswordError" class="error"></div>
                                                    </div>
                                                    <div class="form-group row row justify-content-end">
                                                        <label for="confirmPassword" class="col-sm-4 col-form-label">Confirm Password</label>
                                                        <div class="col-sm-8">
                                                        <input type="password" class="form-control " size="30" id="confirmPassword" placeholder="Confirm Password" >
                                                        </div>
                                                        <div id="confirmPasswordError" class="error"></div>
                                                    </div>
                                                    <div class="form-group row row justify-content-end">
                                                            
                                                            <div class="col-sm-8">
                                                                <button type="submit" name="reset-password"  class="btn btn-success">&nbsp; CHANGE &nbsp;</button>
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




 $('#confirmPassword').focusout(function(){
   
    var Password = $('#newPassword').val();
    var confirmPassword = $('#confirmPassword').val();
    
    if (confirmPassword != Password ) {
            $('#confirmPasswordError').html("Your password doesn't match");
            $('#confirmPasswordError').css({ 'display': 'block' });
          
          }
     else{
           $("#confirmPasswordError").remove();
           $('#confirmPasswordError').css({ 'display': 'none' });
     }
});


function passwordChange(){
    
    var errorCount = 0;
    
    
    
    // if($('#currentPassword').val() == '')
    // {
    //     $('#currentPasswordError').html("Please Enter A Current Password & password length should be 8 character.");
    //     $('#currentPasswordError').css({ 'display': 'block' });
    //     return;
    // }
    // else 
    // {
    //     //$('#currentPasswordError').remove();
    //     $('#currentPasswordError').css({ 'display': 'none' });
    //     errorCount = errorCount + 1;
    // }
    
    if($('#newPassword').val() == '' &&  $('#newPassword').val().length < 8)
     {
        // $('#currentPasswordError').remove();
        $('#newPasswordError').html("Please Enter A New Password & password length should be 8 character.");
        $('#newPasswordError').css({ 'display': 'block' });	
           	 return false;
    }
    else
     {
         
        //$('#newPasswordError').remove();
        $('#newPasswordError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
        
     } 
     
    if($('#confirmPassword').val() == '' &&  $('#confirmPassword').val() != $('#newPassword').val()) 
     {
         
        //$('#currentPasswordError').remove();
        //$('#newPasswordError').remove();
        // $('#confirmPasswordError').html("Confirm Password should not Empty! ");
        $('#confirmPasswordError').html("Your Password isn't Matched ");
        $('#confirmPasswordError').css({ 'display': 'block' });	
        return false;
        
        
    }
     else
     {
           
        //$('#confirmPasswordError').remove();
        $('#confirmPasswordError').css({ 'display': 'none' });	
        errorCount = errorCount + 1;
        
     }
     
     return true;
    
}

</script>


<?php
include_once('../includes/footer.php');
?>


