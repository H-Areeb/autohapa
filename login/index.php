<?php

include_once("../includes/config.php");
include_once("../includes/Auth.php");
// // Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["customer_id2"]) && isset($_SESSION["customer_id"])) {
    header("Location: ../index.php");
   }
include_once('../includes/header.php');



// $http_referer = $_SERVER['HTTP_REFERER'];
$description = '../description/';
?>



<hr />
<?php

if (isset($_POST['hdregnum'])) {
   $regnum = $_POST['hdregnum'];
   $type_id = $_POST['type_id'];
   echo $type_id;
   echo $regnum;
}

if (isset($_POST['customer_id'])) {
   $_SESSION['customer_id'] = $_POST['customer_id'];
   //echo $_SESSION['customer_id'];
}
if (isset($_SESSION['customer_id'])) {
   $_SESSION['customer_id'];
}

?>


<form id="formlogin_description" method="post" action="../description/">
      <input type="hidden" id="hdregnum" name="hdregnum" value="<?php echo $regnum; ?>">
      <input type="hidden" id="customer_id" name="customer_id" value="">
      <input type="hidden" id="typeid_L" name="typeid_L" value="<?php echo $type_id; ?>">
</form>

<form id="formlogin2_description" method="post" action="<?= $http_referer; ?>">
      <input type="hidden" id="hdregnum2" name="regnum2" value="<?php echo $regnum; ?>">
      <input type="hidden" id="customer_id2" name="customer_id2" value="">
</form>


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

.login-google:hover,
.login-google:focus {
      background: #E74B37;
      color: #fff;
}

.login-facebook {
      background-color: #4C69BA;
      background-image: linear-gradient(#4C69BA, #3B55A0);
      text-shadow: 0 -1px 0 #354C8C;
}

.login-facebook:hover,
.login-facebook:focus {
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
      border-right: 1px solid rgba(0, 0, 0, 0.2);
}


.col-form-label {
      font-weight: bold;
      text-align: right;
}
</style>


<section class="main mb-5">
      <div class="container">
            <div class="row justify-content-center">
                  <div class="col-lg-6">
                        <div class="  text-center alert-success" id="success">
                              <p class="p*-5 my-5 text-success"></p>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="invalids"
                              style="display:none;">
                        </div>

                        <div class="card" style="border:none !important;">
                              <!--<img src='../assets/images/loader.gif' style='height:200px; width:200px;' class='text-center' />-->

                              <div class="card-body">

                                    <form method="POST" style="max-width: 300px;margin: 0 auto;">

                                          <div id="section-email">
                                                <div class="form-group">
                                                      <input class="form-control mb-2" id="email" maxlength="50"
                                                            minlength="6" name="email" placeholder="e.g. name@email.com"
                                                            type="email">
                                                      <div id="emailError" class="text-center mb-2"></div>
                                                </div>
                                                <div class="form-group">
                                                      <input class="form-control mb-2" id="pwd" name="pwd"
                                                            placeholder="*******" type="password">
                                                      <div id="pwdError" class="text-center mb-2"></div>
                                                </div>
                                                <div class="form-group">
                                                      <a href="javascript:void(0)" class="btn btn-blue mb-2 "
                                                            id="signin" type="submit" onclick="validateForm()">Sign in
                                                      </a>
                                                      <a href="<?= $site_url; ?>autohapa/login/register/?regnum=<?= $regnum; ?>&type_id=<?= $type_id; ?>"
                                                            class="btn btn-green mb-2">Register Now</a>
                                                </div>
                                          </div>




                                          <p class=" text-center">----------------------- OR -----------------------</p>

                                          <style>
                                          a.disabled {
                                                pointer-events: none;
                                                cursor: default;
                                          }
                                          </style>


                                          <div class="form-group">
                                                <a href="javascript:void(0)"
                                                      class="btn mb-4 login-social login-facebook disabled"
                                                      type="button"
                                                      onclick="window.location.href='../login/facebook-auth/oauth.php'">
                                                      <i class="fa fa-facebook "></i> Continue with Facebook</a>
                                                <a href="javascript:void(0)"
                                                      class="btn login-social login-google disabled" type="button"
                                                      onclick="window.location.href='../login/googleOauth/oauth.php'">
                                                      <i class="fa fa-google "></i> Continue with Google</a>
                                          </div>

                                    </form>

                              </div>
                              <!--/.card-body-->

                        </div>
                        <!--/.card-->

                  </div>
            </div>
      </div>
</section>




<script>
// for entr key disable.....
$(document).keypress(
      function(event) {
            if (event.which == '13') {
                  event.preventDefault();
            }
      });


$('#email').change(function() {


      var email = $('#email').val();
      var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
      var validEmail = regEx.test(email);

      if (email < 1) {
            $('#emailError').html("Please enter a email address.");
            document.getElementById('emailError').style.color = 'red';
      } else if (!validEmail) {
            $('#emailError').html("Please enter a Valid email address.");
            document.getElementById('emailError').style.color = 'red';

      } else {
            $('#emailError').remove();
      }

});




function validateForm() {
      var errorCount = 0;

      var email = $('#email').val();
      var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
      var validEmail = regEx.test(email);

      if (email < 1) {
            $('#emailError').html("Please Enter an Email Address.");
            document.getElementById('emailError').style.color = 'red';
      } else if (!validEmail) {
            $('#emailError').html("Please Enter a Valid Email Address.");
            document.getElementById('emailError').style.color = 'red';

      } else {
            check_email();
      }

}



function check_email() {

      var emailString = "user_email=" + document.getElementById('email').value +
            "&user_pwd=" + document.getElementById('pwd').value;

      var image = "<?= $site_url; ?>autohapa/assets/images/loader.gif";
      $('#signin').text('Loading....');
      $.ajax({

            type: "POST",
            url: "<?= $site_url; ?>autohapa/login/ajax_login.php",
            data: emailString,
            cache: false,
            dataType: "json",
            success: function(result) {
                  //result = JSON.parse(result);
                  // console.log(result);
                  // alert(result.status);
                  if (result.status == 'success') {

                        document.getElementById('customer_id').value = result.id;
                        document.getElementById('customer_id2').value = result.id;

                        // $("#section-email").hide();
                        // $("#section-pwd").show();
                        alert(result.id);

                        if (document.getElementById('hdregnum').value == '') {

                              $('.card-body').html("<img  id='gif'  src='" + image +
                                    "' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />"
                              );

                            //   alert('Not description'+$('#typeid_L').val());

                              setTimeout(function() {

                                    $('#formlogin2').submit();

                              }, 1000);

                        } else {


                              $('.card-body').html("<img  id='gif'  src='" + image +
                                    "' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />"
                              );

                              	alert('description'+$('#hdregnum').val());
                              
                              setTimeout(function() {
                                    
                                    $('#formlogin_description').submit();


                              }, 1000);
                        }


                  } else {


                        $('#signin').text('Loading....');

                        setTimeout(function() {



                              $('#invalids').css('display', 'block');
                              $('#invalids').html(
                                    'Your Email Or password is worng please <strong>try Again</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                              );

                              $('#signin').text('Sign in');

                        }, 1000);




                  }


            },

      });

}
</script>
<?php include_once('../includes/footer.php'); ?>