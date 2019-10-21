
<?php
    header("Cache-Control: no-cache, must-revalidate");
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

	include "../includes/config.php";
	
    require_once 'google-api-php-client/src/Google/autoload.php';

        session_start();



//$secure    = "http://www.judaicconnection.com/";
		$secure    = "http://judaic.logoinn.me/jc/"; //test server path


		$client = new Google_Client();
		$client->setAuthConfig('client_secret_key.json');

		$client->addScope(array("https://www.googleapis.com/auth/userinfo.email",
			"https://www.googleapis.com/auth/userinfo.profile"
		));
//$client->addScope("https://www.googleapis.com/auth/userinfo.email");

if(isset($_GET['code'])){
	
	
     $client->authenticate($_GET['code']);
     $_SESSION['access_token'] = $client->getAccessToken();
     $arr = $client->getAccessToken();
 
//----------- make an HTTP request
    
    $result = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?access_token='.$arr['access_token'],false);
    $user_detail = json_decode($result);
   
    if(isset($user_detail->id)){    
/**
 * my code checking is user exists in database
 * start
 * if no then insert into database
 */
     $check_query = 'select * from car_users where email = "'.$user_detail->email.'";';
     $check_query_exec =  mysqli_query($check_query, $conni);
	 
     if (mysqli_num_rows($check_query_exec) == 0) {
		 
//----------- create an user_identity table to store external user info
	
	 $insert_query = 'INSERT INTO car_users (name,email,google_id)  VALUES ("'.$user_detail->name.'","'.$user_detail->email.'","'.$user_detail->id.'")';
       $insert_query_exec =  mysqli_query($insert_query, $conni);
     }     
     
    
/**
 * my code checking is user exists in database
 * end
 * if no then insert into database
 */
  
      $query ='select * from car_users where email="'.$user_detail->email.'";';
    
  //  var_dump($query);
    
      $result = mysqli_query($query, $conni) or die(mysql_error());
    
      while($row = mysqli_fetch_array($result)){
    
      $user_id = $row['id'];
	  $user_google_id = $row['google_id'];
    
      $user_name = $row['name'];
    
   // $customer_password = $row['customer_password'];
    
      $user_email = $row['email'];
	  
  }
    
    
    
      // if (mysql_num_rows($result) > 0 ) {
    
     // // if they are in the database register the user information
    
        // $user_name_cart = $customer_username;
    
        // setcookie("usernamecart", $user_name_cart);
    
        // setcookie("customer_username", $customer_username);
    
        // setcookie("email_address", $email_address);
    
        // $query_string = htmlentities($_SESSION['query_string']);
         
         
          // echo "=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>";    
          // var_dump($customer_username);
   
         // echo "=>";     
        // var_dump($_COOKIE);
   
        
      // //  header("Location: $nonsecure"."buyfav.php?".urldecode($query_string));
      // //header("Location: http://judaic.logoinn.me/jc/buyfav.php?".urldecode($query_string));
    	
    // //	header("Location: http://judaic.logoinn.me/jc/favbasket.php?".$query_string);
    // //		header("Location: http://judaic.logoinn.me/jc/");
    // //	unset($_SESSION['query_string']);
   
      // } 
    
    
     /* copy from sysmain2.php for login and set cookie logic
    * copy end
    */
    
    
    
       die("end"); 
        
    }else{
        echo "Error Occur";
    }
    
    
    
    
}
//var_dump($_REQUEST);

// if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    // $client->setAccessToken($_SESSION['access_token']);
    // $drive = new Google_Service_Drive($client);
    // $files = $drive->files->listFiles(array())->getItems();
    // echo json_encode($files);
// } else {
    // $redirect_uri = 'http://judaic.logoinn.me/jc/googleOauth/oauth.php';
    // header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
// }
// echo "final page;";