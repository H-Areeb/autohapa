<?php
header("Cache-Control: no-cache, must-revalidate");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");	

include_once('../includes/header.php');
?>
<link rel="stylesheet" href="http://autohapa.oneviewcrm.com/autohapa/assets/css/passtrength.css" >
	
	<script src="http://autohapa.oneviewcrm.com/autohapa/assets/js/jquery.passtrength.js"></script>
<style>
    .col-form-label {
    color: #161717a3 !important;
    font-weight: 700 !important;
    font-size: 0.9rem !important;
    padding-top: calc(.475rem + 1px)!important;
}
form .btn {
    width: auto !important;
}
.bg-card{
    background-color: #6c757d2e!important;
}
.btn {
    font-size: 0.9rem !important;
}
.form-group {
    position: relative;
}
.form-control {
    padding: .75rem .75rem!important;
    font-size: 0.9rem!important;
    width:auto!important;
}
#aboutMe{
      height: 150px!important;
      width: 450px!important;
      
}
select.form-control:not([size]):not([multiple]) {
    height: calc(2.70rem + 2px)!important;
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


<section class="main mt-5 mb-5">
		<div class="container">
                  <!-- Errors div -->
                  <div style="max-width:400px;margin: 0 auto;">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="Errors" style="display:none;"></div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMsg" style="display:none;"></div>
                  </div>
    	    <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card bg-card mt-2" style="width: 18rem;">
                        <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16def44aded%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16def44aded%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                        <div class="card-body">
                            <a class="btn btn-link">manage</a>
                               <div class="form-group row">
                                    <label class="col-sm-5  col-form-label" >UserName:</label>
                                    <label  class="col-sm-7 col-form-label"style="color:black!important;"><?= $customer_name;?></label>
                                    <label class="col-sm-6  col-form-label" >Account Type:</label>
                                    <label  class="col-sm-6 col-form-label"style="color:black!important;">Dealer</label>
                               </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-danger">Remove Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-10">
                        <div><h2 class="mb-3">My Profile</h2></div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Account settings</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile Settings</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">View Profile</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="col-md-10">
                                    <form>
                                        <div class="form-group row mt-3">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                                    <label class="custom-control-label" for="customControlAutosizing">Remember my preference</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                                    <label class="custom-control-label" for="customControlAutosizing">Remember my preference</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                            <button type="submit" class="btn btn-success">&nbsp; SAVE &nbsp;</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link dropdown-toggle " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Manage Passwords
                                                </button>
                                            </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="currentPassword" class="col-sm-4 col-form-label">Current Password</label>
                                                        <div class="col-sm-8">
                                                        <input type="password" class="form-control passwordCheck" size="30" id="currentPassword" placeholder="Password" >
                                                        </div>
                                                        <div id="currentPasswordError" class="error"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="newPassword" class="col-sm-4 col-form-label">New Password</label>
                                                        <div class="col-sm-8">
                                                        <input type="password" class="form-control passwordCheck" size="30" id="newPassword" placeholder="New Password" >
                                                        </div>
                                                        <div  id="newPasswordError" class="error"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="confirmPassword" class="col-sm-4 col-form-label">Confirm Password</label>
                                                        <div class="col-sm-8">
                                                        <input type="password" class="form-control passwordCheck" size="30" id="confirmPassword" placeholder="Confirm Password" >
                                                        </div>
                                                        <div id="confirmPasswordError" class="error"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                            <div class="col-sm-4"></div>
                                                            <div class="col-sm-8">
                                                                  <button type="submit" onclick="passwordChange()" class="btn btn-success">&nbsp; CHANGE &nbsp;</button>
                                                            </div>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="col-md-10">
                                    <form>
                                        <div class="form-group row mt-3">
                                            <label for="companyName" class="col-sm-3 col-form-label">Company Name</label>
                                            <div class="col-sm-9">
                                                <input type="text"  size="50" maxlength="50" class="form-control" id="companyName" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="firstName" class="col-sm-3 col-form-label">First Name*</label>
                                            <div class="col-sm-9">
                                                <input type="text" size="50" maxlength="50" class="form-control" id="firstName" value="">
                                            </div>
                                            <div  class="error"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lastName" class="col-sm-3 col-form-label">Last Name*</label>
                                            <div class="col-sm-9">
                                                <input type="text" size="50" maxlength="50" class="form-control" id="lastName" value="">
                                            </div>
                                            <div  class="error"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required size="12" maxlength="12" class="form-control" id="phone" value="">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label for="Website" class="col-sm-3 col-form-label">Website</label>
                                            <div class="col-sm-9">
                                                <input type="text" size="50" maxlength="50" class="form-control" id="Website" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Country" class="col-sm-3 col-form-label">Country*</label>
                                            <div class="col-sm-9">
                                                <select id="country" name="country" class="form-control">
                                                      <option value="Afghanistan">Afghanistan</option>
                                                      <option value="Åland Islands">Åland Islands</option>
                                                      <option value="Albania">Albania</option>
                                                      <option value="Algeria">Algeria</option>
                                                      <option value="American Samoa">American Samoa</option>
                                                      <option value="Andorra">Andorra</option>
                                                      <option value="Angola">Angola</option>
                                                      <option value="Anguilla">Anguilla</option>
                                                      <option value="Antarctica">Antarctica</option>
                                                      <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                      <option value="Argentina">Argentina</option>
                                                      <option value="Armenia">Armenia</option>
                                                      <option value="Aruba">Aruba</option>
                                                      <option value="Australia">Australia</option>
                                                      <option value="Austria">Austria</option>
                                                      <option value="Azerbaijan">Azerbaijan</option>
                                                      <option value="Bahamas">Bahamas</option>
                                                      <option value="Bahrain">Bahrain</option>
                                                      <option value="Bangladesh">Bangladesh</option>
                                                      <option value="Barbados">Barbados</option>
                                                      <option value="Belarus">Belarus</option>
                                                      <option value="Belgium">Belgium</option>
                                                      <option value="Belize">Belize</option>
                                                      <option value="Benin">Benin</option>
                                                      <option value="Bermuda">Bermuda</option>
                                                      <option value="Bhutan">Bhutan</option>
                                                      <option value="Bolivia">Bolivia</option>
                                                      <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                      <option value="Botswana">Botswana</option>
                                                      <option value="Bouvet Island">Bouvet Island</option>
                                                      <option value="Brazil">Brazil</option>
                                                      <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                      <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                      <option value="Bulgaria">Bulgaria</option>
                                                      <option value="Burkina Faso">Burkina Faso</option>
                                                      <option value="Burundi">Burundi</option>
                                                      <option value="Cambodia">Cambodia</option>
                                                      <option value="Cameroon">Cameroon</option>
                                                      <option value="Canada">Canada</option>
                                                      <option value="Cape Verde">Cape Verde</option>
                                                      <option value="Cayman Islands">Cayman Islands</option>
                                                      <option value="Central African Republic">Central African Republic</option>
                                                      <option value="Chad">Chad</option>
                                                      <option value="Chile">Chile</option>
                                                      <option value="China">China</option>
                                                      <option value="Christmas Island">Christmas Island</option>
                                                      <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                      <option value="Colombia">Colombia</option>
                                                      <option value="Comoros">Comoros</option>
                                                      <option value="Congo">Congo</option>
                                                      <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                      <option value="Cook Islands">Cook Islands</option>
                                                      <option value="Costa Rica">Costa Rica</option>
                                                      <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                      <option value="Croatia">Croatia</option>
                                                      <option value="Cuba">Cuba</option>
                                                      <option value="Cyprus">Cyprus</option>
                                                      <option value="Czech Republic">Czech Republic</option>
                                                      <option value="Denmark">Denmark</option>
                                                      <option value="Djibouti">Djibouti</option>
                                                      <option value="Dominica">Dominica</option>
                                                      <option value="Dominican Republic">Dominican Republic</option>
                                                      <option value="Ecuador">Ecuador</option>
                                                      <option value="Egypt">Egypt</option>
                                                      <option value="El Salvador">El Salvador</option>
                                                      <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                      <option value="Eritrea">Eritrea</option>
                                                      <option value="Estonia">Estonia</option>
                                                      <option value="Ethiopia">Ethiopia</option>
                                                      <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                      <option value="Faroe Islands">Faroe Islands</option>
                                                      <option value="Fiji">Fiji</option>
                                                      <option value="Finland">Finland</option>
                                                      <option value="France">France</option>
                                                      <option value="French Guiana">French Guiana</option>
                                                      <option value="French Polynesia">French Polynesia</option>
                                                      <option value="French Southern Territories">French Southern Territories</option>
                                                      <option value="Gabon">Gabon</option>
                                                      <option value="Gambia">Gambia</option>
                                                      <option value="Georgia">Georgia</option>
                                                      <option value="Germany">Germany</option>
                                                      <option value="Ghana">Ghana</option>
                                                      <option value="Gibraltar">Gibraltar</option>
                                                      <option value="Greece">Greece</option>
                                                      <option value="Greenland">Greenland</option>
                                                      <option value="Grenada">Grenada</option>
                                                      <option value="Guadeloupe">Guadeloupe</option>
                                                      <option value="Guam">Guam</option>
                                                      <option value="Guatemala">Guatemala</option>
                                                      <option value="Guernsey">Guernsey</option>
                                                      <option value="Guinea">Guinea</option>
                                                      <option value="Guinea-bissau">Guinea-bissau</option>
                                                      <option value="Guyana">Guyana</option>
                                                      <option value="Haiti">Haiti</option>
                                                      <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                      <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                      <option value="Honduras">Honduras</option>
                                                      <option value="Hong Kong">Hong Kong</option>
                                                      <option value="Hungary">Hungary</option>
                                                      <option value="Iceland">Iceland</option>
                                                      <option value="India">India</option>
                                                      <option value="Indonesia">Indonesia</option>
                                                      <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                      <option value="Iraq">Iraq</option>
                                                      <option value="Ireland">Ireland</option>
                                                      <option value="Isle of Man">Isle of Man</option>
                                                      <option value="Israel">Israel</option>
                                                      <option value="Italy">Italy</option>
                                                      <option value="Jamaica">Jamaica</option>
                                                      <option value="Japan">Japan</option>
                                                      <option value="Jersey">Jersey</option>
                                                      <option value="Jordan">Jordan</option>
                                                      <option value="Kazakhstan">Kazakhstan</option>
                                                      <option value="Kenya">Kenya</option>
                                                      <option value="Kiribati">Kiribati</option>
                                                      <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                      <option value="Korea, Republic of">Korea, Republic of</option>
                                                      <option value="Kuwait">Kuwait</option>
                                                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                      <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                      <option value="Latvia">Latvia</option>
                                                      <option value="Lebanon">Lebanon</option>
                                                      <option value="Lesotho">Lesotho</option>
                                                      <option value="Liberia">Liberia</option>
                                                      <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                      <option value="Liechtenstein">Liechtenstein</option>
                                                      <option value="Lithuania">Lithuania</option>
                                                      <option value="Luxembourg">Luxembourg</option>
                                                      <option value="Macao">Macao</option>
                                                      <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                      <option value="Madagascar">Madagascar</option>
                                                      <option value="Malawi">Malawi</option>
                                                      <option value="Malaysia">Malaysia</option>
                                                      <option value="Maldives">Maldives</option>
                                                      <option value="Mali">Mali</option>
                                                      <option value="Malta">Malta</option>
                                                      <option value="Marshall Islands">Marshall Islands</option>
                                                      <option value="Martinique">Martinique</option>
                                                      <option value="Mauritania">Mauritania</option>
                                                      <option value="Mauritius">Mauritius</option>
                                                      <option value="Mayotte">Mayotte</option>
                                                      <option value="Mexico">Mexico</option>
                                                      <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                      <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                      <option value="Monaco">Monaco</option>
                                                      <option value="Mongolia">Mongolia</option>
                                                      <option value="Montenegro">Montenegro</option>
                                                      <option value="Montserrat">Montserrat</option>
                                                      <option value="Morocco">Morocco</option>
                                                      <option value="Mozambique">Mozambique</option>
                                                      <option value="Myanmar">Myanmar</option>
                                                      <option value="Namibia">Namibia</option>
                                                      <option value="Nauru">Nauru</option>
                                                      <option value="Nepal">Nepal</option>
                                                      <option value="Netherlands">Netherlands</option>
                                                      <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                      <option value="New Caledonia">New Caledonia</option>
                                                      <option value="New Zealand">New Zealand</option>
                                                      <option value="Nicaragua">Nicaragua</option>
                                                      <option value="Niger">Niger</option>
                                                      <option value="Nigeria">Nigeria</option>
                                                      <option value="Niue">Niue</option>
                                                      <option value="Norfolk Island">Norfolk Island</option>
                                                      <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                      <option value="Norway">Norway</option>
                                                      <option value="Oman">Oman</option>
                                                      <option value="Pakistan">Pakistan</option>
                                                      <option value="Palau">Palau</option>
                                                      <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                      <option value="Panama">Panama</option>
                                                      <option value="Papua New Guinea">Papua New Guinea</option>
                                                      <option value="Paraguay">Paraguay</option>
                                                      <option value="Peru">Peru</option>
                                                      <option value="Philippines">Philippines</option>
                                                      <option value="Pitcairn">Pitcairn</option>
                                                      <option value="Poland">Poland</option>
                                                      <option value="Portugal">Portugal</option>
                                                      <option value="Puerto Rico">Puerto Rico</option>
                                                      <option value="Qatar">Qatar</option>
                                                      <option value="Reunion">Reunion</option>
                                                      <option value="Romania">Romania</option>
                                                      <option value="Russian Federation">Russian Federation</option>
                                                      <option value="Rwanda">Rwanda</option>
                                                      <option value="Saint Helena">Saint Helena</option>
                                                      <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                      <option value="Saint Lucia">Saint Lucia</option>
                                                      <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                      <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                      <option value="Samoa">Samoa</option>
                                                      <option value="San Marino">San Marino</option>
                                                      <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                      <option value="Saudi Arabia">Saudi Arabia</option>
                                                      <option value="Senegal">Senegal</option>
                                                      <option value="Serbia">Serbia</option>
                                                      <option value="Seychelles">Seychelles</option>
                                                      <option value="Sierra Leone">Sierra Leone</option>
                                                      <option value="Singapore">Singapore</option>
                                                      <option value="Slovakia">Slovakia</option>
                                                      <option value="Slovenia">Slovenia</option>
                                                      <option value="Solomon Islands">Solomon Islands</option>
                                                      <option value="Somalia">Somalia</option>
                                                      <option value="South Africa">South Africa</option>
                                                      <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                      <option value="Spain">Spain</option>
                                                      <option value="Sri Lanka">Sri Lanka</option>
                                                      <option value="Sudan">Sudan</option>
                                                      <option value="Suriname">Suriname</option>
                                                      <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                      <option value="Swaziland">Swaziland</option>
                                                      <option value="Sweden">Sweden</option>
                                                      <option value="Switzerland">Switzerland</option>
                                                      <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                      <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                      <option value="Tajikistan">Tajikistan</option>
                                                      <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                      <option value="Thailand">Thailand</option>
                                                      <option value="Timor-leste">Timor-leste</option>
                                                      <option value="Togo">Togo</option>
                                                      <option value="Tokelau">Tokelau</option>
                                                      <option value="Tonga">Tonga</option>
                                                      <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                      <option value="Tunisia">Tunisia</option>
                                                      <option value="Turkey">Turkey</option>
                                                      <option value="Turkmenistan">Turkmenistan</option>
                                                      <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                      <option value="Tuvalu">Tuvalu</option>
                                                      <option value="Uganda">Uganda</option>
                                                      <option value="Ukraine">Ukraine</option>
                                                      <option value="United Arab Emirates">United Arab Emirates</option>
                                                      <option value="United Kingdom">United Kingdom</option>
                                                      <option value="United States">United States</option>
                                                      <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                      <option value="Uruguay">Uruguay</option>
                                                      <option value="Uzbekistan">Uzbekistan</option>
                                                      <option value="Vanuatu">Vanuatu</option>
                                                      <option value="Venezuela">Venezuela</option>
                                                      <option value="Viet Nam">Viet Nam</option>
                                                      <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                      <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                      <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                      <option value="Western Sahara">Western Sahara</option>
                                                      <option value="Yemen">Yemen</option>
                                                      <option value="Zambia">Zambia</option>
                                                      <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                            <div  class="error"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="City" class="col-sm-3 col-form-label">City</label>
                                            <div class="col-sm-9">
                                                <input type="text" size="50" maxlength="50" class="form-control" id="City" value="">
                                            </div>
                                            <div  class="error"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Address" class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" size="50" maxlength="50" class="form-control" id="Address" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="zipCode" class="col-sm-3 col-form-label">Zip code</label>
                                            <div class="col-sm-9">
                                                <input type="text" size="8" maxlength="8" class="form-control" id="zipCode" value="">
                                            </div>
                                            <div  class="error"></div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="aboutMe" class="col-sm-3 col-form-label">About me</label>
                                            <div class="col-sm-9">
                                                <textarea rows="5" size="400" maxlength="400"  class="form-control" id="aboutMe" value=""></textarea>
                                                <p>400 caharcters allowed</p>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                            <button type="submit" class="btn btn-success">&nbsp; EDIT &nbsp;</button>
                                            </div>
                                        </div>
                                    </form>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                        </div>
                    <div>
                </div>
            </div>
        </div>
</section>


<script>
      
$('.passwordCheck').passtrength({
  minChars: 8,
  passwordToggle: true,
  eyeImg : "http://autohapa.oneviewcrm.com/autohapa/assets/css/eye.svg", // toggle icon
  tooltip: true,
  textWeak: "Weak",
  textMedium: "Medium",
  textStrong: "Strong",
  textVeryStrong: "Very Strong",
});

$('#confirmPassword').change(function(){
   
    var newPassword = $('#newPassword').val();
    var confirmPassword = $('#confirmPassword').val();
    
    if (confirmPassword != newPassword ) {
            $('#confirmPasswordError').html("Your Password isn't Matched ");
            $('#confirmPasswordError').css({ 'display': 'block' });
          
          }
     else{
           $("#confirmPasswordError").remove();
           $('#confirmPasswordError').css({ 'display': 'none' });
     }
});


function passwordChange(){
    
    var errorCount = 0;
    
    
    
    
    if($('#currentPassword').val() == '')
    {
        $('#currentPasswordError').html("Please Enter A Current Password & password length should be 8 character.");
        $('#currentPasswordError').css({ 'display': 'block' });
        return;
    }
    else 
    {
        //$('#currentPasswordError').remove();
        $('#currentPasswordError').css({ 'display': 'none' });
        errorCount = errorCount + 1;
    }
    
    if($('#newPassword').val() == '' &&  $('#newPassword').val().length < 8)
     {
        // $('#currentPasswordError').remove();
        $('#newPasswordError').html("Please Enter A New Password & password length should be 8 character.");
        $('#newPasswordError').css({ 'display': 'block' });	
           	return;
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
        return;
        
        
    }
     else
     {
           
        //$('#confirmPasswordError').remove();
        $('#confirmPasswordError').css({ 'display': 'none' });	
        errorCount = errorCount + 1;
        
     }
     
}



function profileUpdate(){
   
   var firstName = $('#firstName').val();
     var lastName = $('#lastName').val();
   var country = $('#country').val();
     var city = $('#city').val();
     var Address = $('#Address').val();
     var zipCode = $('#zipCode').val();
     
// var regEx = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
//                    var validEmail = regEx.test(email);
                   
                   
   if (firstName.length < 1) {
      $('#Errors').html("Please Enter Your Name.");	
         return;
   } 
   else if (lastName.length < 1) {
      $('#Errors').html("Please Enter Your Last Name.");	
         return;
   }
   else if (country.length < 1) {
      $('#Errors').html("Please Choose Your ccountry.");	
         return;
   }
   else if (city.length < 1) {
      $('#Errors').html("Please Enter Your City.");	
         return;
   }
   else if (zipCode.length < 1) {
      $('#Errors').html("Please Enter Zip code.");	
         return;
   }
   else{
           
       $('#Errors').remove();
     }
   

   
       var datastring = "RegEmail="+document.getElementById('Remail').value
                               +"&RegName="+document.getElementById('name').value
                               +"&RegPwd="+document.getElementById('Rpwd').value
                               +"&token="+document.getElementById('token').value;
                               
                               
                               var image = "../assets/images/loader.gif";
                       //$('.card-body').html("<img src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");
                               
                               
 $.ajax({
       
     type:"POST",
     url:"../login/ajax_register.php",
     data: datastring,
     cache: false,
     success: function(result){
                       
                       result = JSON.parse(result);
                        
                             
                 if(result.status == 'success'){
                                   
                       
                                   
                     if(document.getElementById('hdregnum').value == ''){
                         
                          $('.card-body').html("<img src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");
                                             
                                                    setTimeout(function(){ 
                                                      
                                             $('#formlogin2').submit();
                                             
                                                    }, 1000);
                                         
                           }else
                               {
                                 
                                 document.getElementById('customer_id').value = result.id;
                           $('.card-body').html("<img src='"+image+"' style='height:300px;  width:400px; margin-left:150px;' class='text-center ml-5 mb-5' />");	
                                       
                                             setTimeout(function(){ 
                                                 
                                             $('#formlogin').submit();
                                             
                                             
                                                    }, 1000);
                           }
               
               
               
               
               
                       }
                       else if(result.status == 'recapchaError')
                           {
                               
                               $('#submitbtn').text('Loading....');
                                         setTimeout(function(){ 
                                   
                                         $('#recapchaError').css('display','block');  
                                          $('#recapchaError').html('Something went wrong  please <strong>Try Again</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                                   
                                      $('#submitbtn').text('Register Now');
                                     
                                     
                                     $('#recapchaError').on('closed.bs.alert', function () {
                                       window.location.href="../login/register.php"; 
                                   })
                                     
                                           //window.location.href="../login/"; 
                                   
                                         }, 1000);
                                         
                     }
                       else{
                                 
                                
                                 $('#submitbtn').text('Loading....');
                                         setTimeout(function(){ 
                                   
                                         $('#invalid').css('display','block');  
                                          $('#invalid').html('Your Account already exists please <strong>sign in</strong>! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
                                   
                                     
                                     $('#submitbtn').text('Register Now');
                                     
                                           //window.location.href="../login/"; 
                                   
                                         }, 1000);
                                         
                                   
                             }
                             
                       },
                 });
        
}






</script>

<?php include_once('../includes/footer.php'); ?>