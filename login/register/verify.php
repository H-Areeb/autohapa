<?php
header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../../includes/config.php";
  include_once('../../includes/header.php');

echo'<hr>';



if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['token']) && !empty($_GET['token'])){
    // Verify data
    $email = $_GET['email']; // Set email variable
    $token = $_GET['token']; // Set token variable
                 
    $search = mysqli_query($conni,"SELECT email, remember_token, isActive_ynid FROM car_user WHERE email='".$email."' AND remember_token='".$token."' AND isActive_ynid='0'") or die(mysqli_error($conni)); 
    $match  = mysqli_num_rows($search);
           
        //   echo'<h1>'.$match.'</h1>';
                 
    if($match > 0){
        // We have a match, activate the account
        mysqli_query($conni,"UPDATE car_user SET isActive_ynid='1' WHERE email='".$email."' AND remember_token='".$token."' AND isActive_ynid='0'") or die(mysqli_error($conni));
       
       
        echo '<section class="main mt-5 mb-5">
		        <div class="container">
    	            <div class="row justify-content-center">
    			        <div class="col-lg-12">
                <div class="statusmsg">Your account has been activated, you can now login</div>
                        </div>
                    </div>
                </div>
              </section>';
              
              
    }else{
        // No match -> invalid url or account has already been activated.
        echo '<section class="main mt-5 mb-5">
		        <div class="container">
    	            <div class="row justify-content-center">
    			        <div class="col-lg-12">
    			        <div class="statusmsg">The url is either invalid or you already have activated your account.</div>
    			         </div>
                    </div>
                </div>
              </section>';
    }
                 
}else{
    // Invalid approach
    echo '<section class="main mt-5 mb-5">
		        <div class="container">
    	            <div class="row justify-content-center">
    			        <div class="col-lg-12">
    			        <div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>
    			         </div>
                    </div>
                </div>
              </section>';
}

include_once('../../includes/footer.php');
?>

<style>
    
    .statusmsg{
    font-size: 16px; /* Set message font size  */
    padding: 30px; /* Some padding to make some more space for our text  */
    background: #EDEDED; /* Add a background color to our status message   */
    border: 1px solid #DFDFDF; /* Add a border arround our status message   */
}
</style>
