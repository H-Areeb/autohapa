<?php

include_once("../includes/config.php");
include_once("../includes/Auth.php");
include_once("../includes/checkSession.php");
include_once('../includes/header.php');
?>
<style>
      a:not([href]):not([tabindex]),
      a:not([href]):not([tabindex]):focus,
      a:not([href]):not([tabindex]):hover {
            color: #104896;
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

      .steps_wrapper[data-current='2']::before {
            border-color: #154a96;
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

      .steps_wrapper[data-current='2'] div:nth-child(2):before {
            color: #56b847;
            border-color: #56b847;
      }

      .steps_wrapper[data-current='2'] div:nth-child(1)::before {
            content: "\f00c";
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background: #104896;
            border-color: #104896;
            color: #fff;
            font-size: 13px;
            line-height: 30px;
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

      .section-title {
            border-bottom: 1px solid #d0d0cb;
            font-size: 18px;
            padding-bottom: 15px;
      }

      .price__container {
            background: #f7f7f5;
            padding: 20px 20px 20px;
      }

      .price__input-container {
            position: relative;
            width: 270px;
      }

      .price__input-container .js-price-adjust {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 45px;
            height: 100%;
      }

      .price__input-container .js-price-adjust[data-increment=true] {
            left: unset;
            right: 2px;
      }

      .price__input-container span i {
            display: block;
            background: #e8e8e3;
            color: #555;
            cursor: pointer;
            border-radius: 2px 0 0 2px;
            line-height: 41px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            width: 45px;
      }

      .price__input-container span:last-child:before {
            border-radius: 0 2px 2px 0;
      }

      .price__input {
            border-radius: 4px;
            border: 2px solid #e8e8e3;
            color: #666;
            padding: 0 8px;
            margin: 0;
            width: 270px;
            font-size: 21px;
            line-height: 45px;
            height: 45px;
            text-align: center;
      }

      .price__btn {
            margin-top: 50px;
      }

      .sidebar__container {
            background: #f7f7f5;
            padding: 16px 10px 15px;
            width: 260px;
            min-height: 219px;
      }

      .sidebar__container .section-title {
            border-bottom: 1px solid #d0d0cb;
            font-size: 18px;
            padding-bottom: 15px;
            margin-bottom: 15px;
      }

      .sidebar__section {
            position: relative;
            font-size: 16px;
      }

      .button__edit {
            background-color: #2a65ba;
            border-radius: 17px;
            cursor: pointer;
            color: #fff;
            font-size: 14px;
            line-height: 14px;
            padding: 10px 15px;
            height: 34px;
      }

      .button__edit:hover,
      .button__edit:focus {
            background-color: #22549c;
            color: #FFF;
      }

      .sidebar__container .button__edit {
            display: inline-block;
            position: absolute;
            right: 0;
      }

      .sidebar__toggle {
            cursor: pointer;
            color: #2a65ba;
            line-height: 36px;
            height: 35px;
            font-size: 16px;
      }

      .sidebar__toggle--open {
            display: inline-block;
            margin-right: 10px;
      }

      .sidebar__toggle--close {
            display: none;
            margin-right: 10px;
      }

      .sidebar__toggle.open .sidebar__toggle--open {
            display: none;
      }

      .sidebar__toggle.open .sidebar__toggle--close {
            display: inline-block;
      }

      .sidebar__overview {
            padding: 0;
            margin: 0;
            list-style: none;
            overflow: hidden;
      }

      .sidebar__overview li {
            padding-left: 31px;
      }

      .sidebar__overview--title {
            display: block;
            line-height: 18px;
            margin-top: 10px;
      }

      .sidebar__overview--prefix {
            display: inline;
      }

      .sidebar__overview--value {
            color: #999;
            font-size: 14px;
            line-height: 1.3em;
      }

      .structure--top-border {
            border-top: 1px solid #d0d0cb;
            padding-top: 15px;
            margin-top: 15px;
      }

      .col-form-label {
            padding-top: 0;
            padding-bottom: 0;
            text-align: right;
      }

      .form__label--subtitle {
            display: block;
            color: #999;
            font-size: 13px;
            line-height: 14px;
            margin-top: 10px;
      }

      .description__global--text {
            line-height: 1.4em;
            font-size: 13px;
      }

      .description--placeholder:empty:before {
            content: attr(data-default);
            color: #999;
      }

      .description__global--toggle {
            display: block;
            margin-top: 15px;
      }

      .description__global--inputs {
            display: none;
            padding-top: 15px;
      }

      .description__global--toggle span:last-child {
            display: none;
      }

      .description__global--toggle.is-open span:first-child {
            display: none;
      }

      .description__global--toggle.is-open span:last-child {
            display: block;
      }

      .is-open+.description__global--inputs {
            display: block;
      }



      .features__list {
            margin: 0;
            padding: 0;
            list-style: none;
      }

      .features__list--item {
            display: inline-table;
            table-layout: fixed;
            vertical-align: top;
            margin-right: 1%;
            width: 48%;
            height: 30px;
      }

      .form__textarea {
            height: 130px;
            resize: none;
      }

      .btn--plain {
            background: transparent;
            border: none;
            text-decoration: none;
            cursor: pointer;
            padding: 0 30px 0 0;
            margin: 0;
            font-size: 1em;
      }

      .images__later-button {
            margin-top: 10px;
      }

      .form-switch {
            position: relative;
            padding-left: 2px;
      }

      .form-switch__label {
            float: left;
            margin-bottom: 0;
      }

      .form__control-input {
            position: absolute;
            left: -99999px;
      }

      .form-switch__option {
            position: relative;
            border: 2px solid #d0d0cb;
            cursor: pointer;
            color: #CCC;
            line-height: 38px;
            text-align: center;
            margin-left: -2px;
            width: 60px;
            height: 40px;
      }

      .form-switch__label:first-child .form-switch__option {
            border-radius: 4px 0 0 4px;
      }

      .form-switch__input:checked+.form-switch__option {
            z-index: 1;
            border: 2px solid #5d7199;
            border-radius: 3px;
            color: #2a65ba;
            line-height: 35px;
      }

      .hide,
      .is-hidden {
            display: none;
      }

      .form-group {
            position: relative;
      }

      .error {
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

      .error::before {
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
<?php

if (isset($_GET['regnum'])) {

      $regnum = $_GET['regnum'];
      $type_id = $_GET['type_id'];
}

if (isset($_SESSION['customer_id2'])) {
      $check_session = 1;
}

?>
<input type="hidden" name="check_session" id="check_session" value="<?php echo $check_session; ?>">
<hr />

<form id="formDescription" method="POST" action="../description/">
      <input type="hidden" id="hdregnum" name="regnum" value="<?php echo $regnum; ?>">
      <input type="hidden" id="hdcaradid" value="">
      <input type="hidden" id="type_id" name="type_id" value="<?php echo $type_id; ?>">
</form>



<section class="steps mb-4">
      <div class="container">
            <div class="steps_wrapper" data-current="2">
                  <div class="step" data-step="1">Vehicle details</div>
                  <div class="step" data-step="2">Your Advert</div>
                  <div class="step" data-step="3">Package & Payment</div>
            </div>
      </div>
</section>
<section class="page-header mb-4">
      <div class="container">
            <span class="page-header__number">2</span>
            <h1 class="page-header__title">Now tell us your price and some more about the car</h1>
      </div>
</section>

<section class="main mt-5 mb-5">
      <div class="container">
            <div class="row justify-content-center">
                  <div class="col-md-8">

                        <div class="price__container mb-5">
                              <div class="form-group row">
                                    <label id="priceLabel" for="askingPrice" class="col-md-4 ">
                                          <strong>* </strong>Price:
                                    </label>
                                    <span class="col-md-8">
                                          <h2 class="section-title">What's your asking price?</h2>
                                          <div class="price__input-container">
                                                <form id="formLogin" method="post" action="../login/">

                                                      <input type="hidden" id="hdregnum" name="hdregnum" value="<?php echo $regnum; ?>">
                                                      <input type="hidden" id="hdcaradid" value="">
                                                      <input type="hidden" id="vtype_id" name="type_id" value="<?php echo $type_id; ?>">
                                                </form>
                                                <input id="askingPrice" name="askingPrice.price" maxlength="8" class="price__input" type="tel" value="">
                                                <span class="js-price-adjust"><i class="fa fa-minus"></i></span>
                                                <span class="js-price-adjust" data-increment="true"><i class="fa fa-plus"></i></span>
                                                <div id="askingPriceError" class="error"> </div>
                                          </div>

                                          <div class="price__info">
                                                <button type="button" id="setPriceButton" onclick="update_car_ad_data()" class="btn btn-lg btn-green price__btn ">Sell for this much</button>
                                          </div>
                                    </span>
                              </div>
                        </div>


                        <style>
                              .buttons {
                                    position: relative;
                              }

                              .back-link {
                                    position: absolute;
                                    left: -500px;
                                    line-height: 41px;
                              }
                        </style>



                  </div>

                  <div class="col-md-4">
                        <aside id="runningSummary" class="sidebar__container">
                              <h2 class="section-title section-title--spacing">Your advert</h2>
                              <div class="sidebar__section">
                                    <a href="/sidebar-cardetails/2c9299cf6c664f55016c70e926be464d" id="summaryEdit" class="button__edit">Edit</a>
                                    <h4 class="sidebar__toggle open" id="detailsHeader">
                                          <span class="sidebar__toggle--open"><i class="fa fa-minus"></i></span>
                                          <span class="sidebar__toggle--close"><i class="fa fa-plus"></i></span>
                                          Car details</h4>
                                    <ul class="sidebar__overview sidebar__overview--details" style="overflow: hidden; display: block;">
                                          <li>
                                                <div id="summaryPrimaryImage"></div>
                                          </li>
                                          <li>
                                                <div id="summaryReg" class="sidebar__overview--title"><?php echo $regnum; ?></div>
                                          </li>
                                          <li>
                                                <div id="summaryMMV" class="sidebar__overview--value">
                                                      <span id="summaryMake"></span>
                                                      <span id="summaryModel"></span>
                                                      <span id="summaryDerivative"></span>
                                                </div>
                                          </li>
                                          <li>
                                                <div class="sidebar__overview--title">Asking price</div>
                                                <div class="sidebar__overview--value sidebar__overview--prefix">&pound;</div>
                                                <span id="adq-asking-price" class="sidebar__overview--value"></span>
                                          </li>
                                    </ul>
                              </div>

                        </aside>

                  </div>




                  <div class="form-footer mt-5 mb-4">
                        <div class="buttons text-center">
                              <a href="../selling/" id="BtnNext" name="BtnNext" class="back-link"><i class="fa fa-arrow-left"></i>&nbsp;Back</a>
                              <a href="#" id="BtnNext" name="BtnNext" class="disabled btn btn-blue">Next Step</a>
                        </div>
                  </div>


            </div>


      </div>
</section>



<?php include_once('../includes/footer.php'); ?>



<script>
      $(document).ready(function() {
            get_data();


      });


      $('.js-details-toggle').click(function(e) {
            e.preventDefault();
            $(this).toggleClass('is-open');
      });
      $('.contact__second-number-link').click(function(e) {
            e.preventDefault();
            $(this).css({
                  'display': 'none'
            });
            $('#secondNumberRow').css({
                  'display': 'flex'
            });
      });
      $('input[name="contactDetails.includeEmailInAdvert"]').bind('change', function() {
            var showOrHide = $(this).val();
            jQuery.fx.off = true;
            $('.js-email-section').toggle(showOrHide);
      });
      $('.sidebar__toggle').click(function() {
            $(this).toggleClass('open');
            $(this).next('.sidebar__overview').slideToggle('fast');
      })




      var adTitle = '';

      function get_data() {


            var carregnum = $('#hdregnum').val();
            var type_id = $('#vtype_id').val();

            var dataString = 'carregnum=' + carregnum +
                  '&type_id=' + type_id;


            $.ajax({
                  type: "GET",
                  url: "../ajax/ajax_get_carbyregistrationnumber.php",
                  data: dataString,
                  datatype: 'json',
                  cache: false,
                  async: false,
                  success: function(result) {
                        result = JSON.parse(result);
                        //alert(result);
                        console.log(result.data.make);
                        document.getElementById('summaryMake').innerHTML = result.data.make;
                        document.getElementById('summaryModel').innerHTML = result.data.model;
                        document.getElementById('summaryDerivative').innerHTML = result.data.derivative;
                        document.getElementById('adq-asking-price').innerHTML = result.data.price;
                        document.getElementById('askingPrice').value = result.data.price;
                        document.getElementById('hdcaradid').value = result.data.id;
                        //document.getElementById('hdcaradids').value =result.data.id;
                        // adTitle = result.data.make+result.data.model+result.data.derivative;
                        // document.getElementById('adTitle').innerHTML =adTitle;

                        //update_car_ad_data(adTitle);
                        //$('#city').selectpicker('refresh');

                  }

            });
      }





      function update_car_ad_data() {

            errorCount = 0;

            if ($('#askingPrice').val() == '') {
                  $('#askingPriceError').html("Please enter your vehicle's Price.");
                  //document.getElementById('askingPriceError').style.color = 'red';
                  $('#askingPriceError').css({
                        'display': 'block'
                  });
                  return;
            } else {
                  $('#askingPriceError').html('');
                  $('#askingPriceError').css({
                        'display': 'none'
                  });
                  errorCount = errorCount + 1;
            }


            //alert('update Successfully');


            var dataStrings = "askingPrice=" + document.getElementById('askingPrice').value +
                  "&hdcaradid=" + document.getElementById('hdcaradid').value;

            $('#setPriceButton').html('Loading....');

            $.ajax({
                  type: "POST",
                  url: "../ajax/ajax_insert_ad_data.php",
                  data: dataStrings,
                  cache: false,
                  success: function(result) {



                        if ($('#check_session').val() == 1) {
                              //alert("description");
                              setTimeout(function() {

                                    $('#formDescription').submit();

                                    //  $('#setPriceButton').html('Sell for this much');

                              }, 1000);

                        } else {
                              setTimeout(function() {

                                    $('#formLogin').submit();

                              }, 1000);

                        }

                  },
            });

            // insert_checkboxes();
            // get_data();	
      }
</script>


<script type="text/javascript">
      $('#sellingPointsMotDate').datepicker();
</script>