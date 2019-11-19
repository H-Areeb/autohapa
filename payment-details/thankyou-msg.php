<?php
include_once("../includes/config.php");
include_once("../includes/Auth.php");
include_once("../includes/checkSession.php");
include_once('../includes/header.php');
?>




<style>
html,
body {
      font-size: 14px;
}

.steps_wrapper {
      position: relative;
      height: 30px;
}

.steps_wrapper:before,
.steps_wrapper:after {
      position: absolute;
      top: 14px;
      content: "";
      border-top: 1px solid #e8e8e3;
      width: 50%;
}

.steps_wrapper:before {
      left: 0;
}

.steps_wrapper:after {
      right: 0;
}

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

.col-form-label {
      font-weight: bold;
      text-align: right;
}


.advert-heading__title {
      color: #313c53;
      padding: 0;
      margin: 0 0 4px;
}
</style>

<hr />
<?php
if (isset($_REQUEST['pkgSelected_id'])) {

      $pkgSelected_id = $_REQUEST['pkgSelected_id'];
}

if (isset($_REQUEST['pkgSelected_week'])) {

      $pkgSelected_week = $_REQUEST['pkgSelected_week'];

      if ($pkgSelected_week == 100) {
            $pkgSelected_week = "<b><span style='color: #56b847;'>Advertised until sold </span><br/></b><span style='font-size:14px; '>free to rebook</span>";
      } else {
            $pkgSelected_week = $pkgSelected_week . " week";
      }
}
if (isset($_REQUEST['pkgSelected_price'])) {

      $pkgSelected_price = $_REQUEST['pkgSelected_price'];
}

if (isset($_SESSION['customer_id'])) {
      @$customer_id = $_SESSION['customer_id'];
} else {
      @$customer_id = $_SESSION['customer_id2'];
      echo $customer_id;
}

$query = "select car_ad.id AS id , car_ad.contactnumber AS number , car_ad.locationofcarpostalcode AS postcode, car_user.name AS customer_name from car_ad
                  LEFT OUTER JOIN  car_user ON car_user.id = car_ad.customer_id
				  where customer_id = " . $customer_id;

$result = mysqli_query($conni, $query);
while ($row = mysqli_fetch_assoc($result)) {
      $carad_id = $row['id'];
      $contact_num = $row['number'];
      $postcode = $row['postcode'];
      $customer_name = $row['customer_name'];
}



?>
<input type="hidden" id="hcarad_id" name="hcarad_id" value="<?php echo $carad_id; ?>" />
<input type="hidden" id="hpkg_id" name="hpkg_id" value="<?php echo $pkgSelected_id; ?>" />





<section class="main mb-5">
      <div class="container">
            <div class="row justify-content-center">
                  <div class="col-md-7 card" style="border:none!important;">

                        <h3 class="mt-3 "></h3>

                        <h1 class="advert-heading__title text-center atc-type-insignia atc-type-insignia--medium">Thank
                              you For subscribe</h1>
                        <h4 class="mt-3 advert-heading__title text-center">We will Contact you soon!</h4>

                  </div>


            </div>
            <div class="form-footer mb-4 mt-5">
                  <div class="buttons text-center">
                        <a href="javascript:void(0);" id="BtnNext" name="BtnNext" onclick="validateForm()"
                              class="btn btn-blue">Back to Home</a>
                  </div>
            </div>
      </div>
      </div>
</section>


<script>
function validateForm() {


      document.location.href = '../';

}
</script>
<?php include_once('../includes/footer.php'); ?>
<script>
$("#txtCarRegistrationDate").datepicker();
</script>