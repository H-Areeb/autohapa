<?php


$http_referer = @$_SERVER['HTTP_REFERER'];

//echo'active '.@$_REQUEST['customer_id'];
$page = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// $page = 'http://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
  echo $page;
  




if (isset($_SESSION['customer_id'])) {
   @$customer_id = $_SESSION['customer_id'];
//    echo '<br>customerid session active'.@$customer_id;
} else if (isset($_SESSION['customer_id2'])) {
   @$customer_id = $_SESSION['customer_id2'];
//    echo '<br>customerid2 session active '.@$customer_id;
}
else if (isset($_SESSION['Hcustomer_id'])) {
    @$customer_id = $_SESSION['Hcustomer_id'];
    // echo '<br>Hcustomerid session active '.@$customer_id;
 }else if (isset($_SESSION['Hcustomer_id2'])) {
    @$customer_id = $_SESSION['Hcustomer_id2'];
    // echo '<br>Hcustomerid2 session active '.@$customer_id;
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
<link rel="stylesheet" href="<?= $site_url; ?>autohapa/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= $site_url; ?>autohapa/assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?= $site_url; ?>autohapa/assets/css/owl.theme.default.css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="<?= $site_url; ?>autohapa/assets/css/style.css">


<link rel="stylesheet" href="<?= $site_url; ?>autohapa/assets/libs/bootstrap-datepicker/css/datepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">


<script src="<?= $site_url; ?>autohapa/assets/js/jquery-2.2.4.min.js"></script>
<script src="<?= $site_url; ?>autohapa/assets/libs/jquery-ui/jquery-ui.min.js"></script>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<title>AutoHapa</title>
</head>

<body>
<div id="wrapper">

<header id="site-header">
<div class="container">
<div class="row justify-content-end">
<div class="col-lg-auto">
<nav id="top-navigation" class="navigation">
<div class="menu-container">
<ul id="top-menu" class="menu">

<?php
// $query = "select id , name  from type";

// @$result = mysqli_query($conni,$query);
//     while($row = mysqli_fetch_assoc($result));
//           {   
   //               $type_id = $row['id'];
   //               $type_name = $row['name'];
   
   //           }
//    $vtype_id = 1;
   ?>
   <li><a href="<?= $site_url; ?>autohapa/">Cars</a>
   </li>
   <li><a href="<?= $site_url; ?>prestige-cars">Prestige
   cars</a></li>
   <li><a href="<?= $site_url; ?>vans">Vans</a></li>
   <li><a href="<?= $site_url; ?>bikes">Bikes</a></li>
   <li><a href="<?= $site_url; ?>motorhomes">Motorhomes</a>
   </li>
   <li><a href="<?= $site_url; ?>caravans">Caravans</a>
   </li>
   <li><a href="<?= $site_url; ?>trucks">Trucks</a>
   </li>
   <li><a href="<?= $site_url; ?>farm">Farm</a></li>
   <li><a href="<?= $site_url; ?>plant">Plant</a></li>
   <li class="link-separator">|</li>
   <li><a href="#">Safety Advice</a></li>
<?php 
        if($page == $site_url.'autohapa/')
        {
            $vtype_id = 1;
            echo'<li><a href='.$site_url.'autohapa/selling/?vtype='.$vtype_id.'" class="btn btn-blue">SELL MY CAR</a></li>';
        }
        else if($page == $site_url.'bikes/')
        {
            $vtype_id = 2; 
            echo'<li><a href='.$site_url.'autohapa/selling/?vtype='.$vtype_id.'" class="btn btn-blue">SELL MY BIKE</a></li>';
        }
        else if($page == $site_url.'vans/')
        {
            $vtype_id = 3; 
            echo'<li><a href='.$site_url.'autohapa/selling/?vtype='.$vtype_id.'" class="btn btn-blue">SELL MY VAN</a></li>';
        }
        else if($page == $site_url.'motorhomes/')
        {
            $vtype_id = 4; 
            echo'<li><a href='.$site_url.'autohapa/selling/?vtype='.$vtype_id.'" class="btn btn-blue">SELL MOTORHOME</a></li>';
        }
 ?>
   
   </ul>
   </div>
   </nav>
   </div>
   </div>
   <div class="row align-items-end justify-content-between">
   <div class="col-lg-3">
   <div class="header-logo">
   <a href="<?= $site_url; ?>autohapa/">
   <img src="<?= $site_url; ?>autohapa/assets/images/logo.png" alt="AutoHapa" class="custom-logo img-fluid" />
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
   if (isset($_SESSION['customer_id']) || isset($_SESSION['customer_id2']) || isset($_SESSION['Hcustomer_id']) || isset($_SESSION['Hcustomer_id2'])) {
      
      $query = "select name AS customer_name , type_id  from car_user where id = " . @$customer_id;
      
      @$result = mysqli_query($conni, $query);
      
      
      while ($row = mysqli_fetch_assoc($result)) {
         // $carad_id = $row['id'];
         // $contact_num = $row['number'];
         $acc_type = $row['type_id'];
         $customer_name = $row['customer_name'];
      }
      
      
      if (@$acc_type == '1') {
         echo '<li class="dropdown">
         <button class="my-2 btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         ' . @$customer_name . ' <span class="user-icon"><i class="fa fa-user"></i></span>
         </button>
         <div class="bg-default dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width: 13rem!important ;">
         <h6 class="dropdown-header"> <span class="badge badge-primary">Dealer Account</span></h6>
         <a class="dropdown-item" href="'.$site_url.'autohapa/customers/my_profile.php">My Profile</a>
         <a class="dropdown-item" href="'.$site_url.'autohapa/customers/my_ads.php">My Ads</a>
         <a class="dropdown-item" href="#">My packages</a>
         <a class="dropdown-item" href="#">Favourites</a>
         <a class="dropdown-item" href="#">Recently viewed</a>
         <a class="dropdown-item" href="'.$site_url.'autohapa/login/logout/">Sign Out</a>
         </div>
         </li>';
      } else {
         echo '<li class="dropdown">
         <button class="my-2 btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         ' . $customer_name . ' <span class="user-icon"><i class="fa fa-user"></i></span>
         </button>
         <div class="bg-default dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width: 13rem!important ;">
         <h6 class="dropdown-header"> <span class="badge badge-secondary">Buyer Account</span></h6>
         <a class="dropdown-item" href="'.$site_url.'autohapa/customers/my_profile.php">My Profile</a>
         <a class="dropdown-item" href="#">Favourites</a>
         <a class="dropdown-item" href="#">Recently viewed</a>
         <a class="dropdown-item" href="'.$site_url.'autohapa/login/logout/">Sign Out</a>
         </div>
         </li>';
      }
   } else {
      
      ?>
      <li class="dropdown">
      <a href="#" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Sign In <span class="user-icon"><i class="fa fa-user"></i></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" style="min-width: 18rem!important;">
      <!-- Errors div -->
      <div style="max-width:400px;margin: 0 auto;">
      <div class="alert alert-danger alert-dismissible fade show" role="alert" id="invalid" style="display:none;"></div>
      <div class="alert alert-success alert-dismissible fade show" role="alert" id="success" style="display:none;"></div>
      </div>
      <!-- sign in form starts -->
      <form class="px-3 py-2" method="POST">
      <div class="form-group">
      <input class="form-control mb-2" id="emailLogin" maxlength="250" minlength="6" name="emailLogin" placeholder="Email Address" type="email">
      <div id="emailLoginError" class="text-center mb-2"></div>
      </div>
      <div class="form-group">
      <input class="form-control mb-2" id="Hpassword" name="Hpassword" placeholder="Password" type="password">
      <a class="link" id="forgotpassword-link" href="<?= $site_url; ?>autohapa/login/forget-password.php">Forgot
      password?</a>
      <div id="HpasswordError" class="text-center mb-2"></div>
      </div>
      <div class="form-group">
      <a href="javascript:void(0)" id="submitbtn" class="btn btn-blue " type="submit" onclick="validateLogin()">
      Sign in </a>
      </div>
      <hr />
      <div class="form-group">
      <a href="javascript:void(0)" class="btn mb-2 login-social login-facebook disabled" type="button" onclick="window.location.href='../login/facebook-auth/oauth.php'">
      <i class="fa fa-facebook "></i>
      Continue with Facebook
      </a>
      <a href="javascript:void(0)" class="btn login-social login-google disabled" type="button" onclick="window.location.href='../login/googleOauth/oauth.php'">
      <i class="fa fa-google "></i>
      Continue with Google
      </a>
      </div>
      <style>
      .menu .dropdown a.link {
         display: inline-block;
         color: #2573c2;
         font-size: 1rem;
      }
      
      #forgotpassword-link {
         font-size: 0.75rem;
      }
      </style>
      <div class="text-center">
      <a class="link" id="signup-link" href="<?= $site_url; ?>autohapa/login/register/">Sign
      Up</a>
      </div>
      
      </form>
      <!-- sign in form end -->
      </div>
      </li>
      <?php } ?>
      </ul>
      </div>
      </nav>
      </div>
      </div>
      </div>
      </header> <!-- /#masthead -->
      
      <div id="main" class="content">
      
      <?php
      
      $regnum = '';
      if (isset($_POST['regnum'])) {
         $regnum = $_POST['regnum'];
         $type_id = $_POST['type_id'];
         echo 'header'.$regnum;
      }
    
      ?>
      
      
      
      
      
      <form id="formlogin" method="post" action="<?= $site_url; ?>autohapa/description/">
        <input type="hidden" id="hdregnum1" name="regnum" value="<?php echo $regnum; ?>">
        <input type="hidden" id="Htype_id" name="Htype_id" value="<?php echo $type_id; ?>">
        <input type="hidden" id="Hcustomer_id" name="customer_id" value="">
      </form>
      <!---->
      <form id="formlogin2" method="post" action="<?= $http_referer; ?>">
      <input type="hidden" id="hdregnum2" name="regnum2" value="<?php echo $regnum; ?>">
      <input type="hidden" id="Hcustomer_id2" name="customer_id2" value="">
      </form>
      
      
      
      
      <script>
      $('#emailLogin').change(function() {
         
         
         var email = $('#emailLogin').val();
         var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
         var validEmail = regEx.test(email);
         
         if (email < 1) {
            $('#emailLoginError').html("Please enter a email address.");
            document.getElementById('emailLoginError').style.color = 'red';
         } else if (!validEmail) {
            $('#emailLoginError').html("Please enter a Valid email address.");
            document.getElementById('emailLoginError').style.color = 'red';
            
         } else {
            $('#emailLoginError').remove();
         }
         
      });
      
      
      
      
      function validateLogin() {
         var errorCount = 0;
         
         var email = $('#emailLogin').val();
         var pass = $('#Hpassword').val();
         
         var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
         var validEmail = regEx.test(email);
         
         if (email < 1) {
            $('#emailLoginError').html("Please Enter an Email Address.");
            document.getElementById('emailLoginError').style.color = 'red';
         } else if (!validEmail) {
            $('#emailLoginError').html("Please Enter a Valid Email Address.");
            document.getElementById('emailLoginError').style.color = 'red';
            
         } else if (pass < 1) {
            $('#HpasswordError').html("Please Enter Password.");
            document.getElementById('HpasswordError').style.color = 'red';
         } else {
            check_login_credientials();
         }
         
      }
      
      
      
      function check_login_credientials() {
         
         
         
         var emailString = "user_email=" + $('#emailLogin').val() +
         "&user_pwd=" + $('#Hpassword').val();
         
         $('#submitbtn').text('Loading....');
         
         $.ajax({
            
            type: "POST",
            url: "<?= $site_url; ?>autohapa/login/ajax_login.php",
            data: emailString,
            cache: false,
            dataType: "json",
            success: function(result) {
               
               if (result.status == 'success') {
                  
                  document.getElementById('Hcustomer_id').value = result.id;
                  document.getElementById('Hcustomer_id2').value = result.id;
                  
                  
                  if ($('#hdregnum1').val() == '') {
                     $('#success').css('display', 'block');
                     $('#success').html(
                        'you are Login <strong>Successfully</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                     );
                     
                     $('#success').on('closed.bs.alert', function() {
                        $('#formlogin2').submit();
                     })
                     
                     setTimeout(function() {
                        
                        $('#formlogin2').submit();
                        $('#submitbtn').text('sign in');
                     }, 3000);
                  } else {
                     $('#success').css('display', 'block');
                     $('#success').html(
                        'you are Login <strong>Successfully</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                     );
                     
                     $('#success').on('closed.bs.alert', function() {
                        $('#formlogin').submit();
                     })
                     
                     setTimeout(function() {
                        
                        $('#formlogin').submit();
                        $('#submitbtn').text('sign in');
                     }, 3000);
                  }
                  
               } else {
                  setTimeout(function() {
                     
                     $('#invalid').css('display', 'block');
                     $('#invalid').html(
                        'Your password is worng please <strong>try Again</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                     );
                     $('#submitbtn').text('Sign in');
                  }, 1000);
               }
            },
            
         });
         
      }
      </script>