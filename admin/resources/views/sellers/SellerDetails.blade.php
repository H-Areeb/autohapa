@extends('layouts.admin.app')
@section('content')

<link rel="stylesheet" href="{{ asset('admin_assets/dist/css/searchCarStyleCode.css')}}" />

<style>
    .content .nav-tabs {margin-bottom: 15px;}
    ul#searchCarsList {padding-left: 0;}
</style>

<section class="content-header">
    <h1>
        Seller Details
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{ route('Sellers')}}">Sellers List</a></li>
    </ol>
</section>

<div class="row">
    
    <div class="col-md-4 col-sm-12 col-md-offset-4">
        @if(Session::has('success'))

        <div class="alert alert-success alert-dismissible" role="alert" id="success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('success') }}
        </div>
        @endif
    </div>
    
</div>

<!--$seller_info-->


<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h1>Seller Profile</h1>
                </div>
                        
                <div class="box-body">
                     <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Account settings</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                        <li role="presentation"><a href="#sellerAds" aria-controls="sellerAds" role="tab" data-toggle="tab">Seller Ads</a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                        
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="col-md-6 col-sm-12">
                                <div class="profileForm">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                        <input type="text" readonly class="form-control" id="staticEmail" value="{{$seller_info[0]->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                        <input type="text" readonly class="form-control" id="staticEmail" value="{{$seller_info[0]->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <a class="" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Manage Passwords</a>
                                        </div>
                                    </div>
                                    <!--<div class="form-group row">-->
                                    <!--    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>-->
                                    <!--    <div class="col-sm-10">-->
                                    <!--    <input type="password" class="form-control" id="inputPassword" placeholder="Password">-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="form-group row">-->
                                    <!--    <div class="col-sm-2"></div>-->
                                    <!--    <div class="col-sm-10">-->
                                    <!--        <div class="custom-control custom-checkbox mr-sm-2">-->
                                    <!--            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">-->
                                    <!--            <label class="custom-control-label" for="customControlAutosizing">Remember my preference</label>-->
                                    <!--        </div>-->
                                    <!--        <div class="custom-control custom-checkbox mr-sm-2">-->
                                    <!--            <input type="checkbox" class="custom-control-input" id="customControlAutosizing">-->
                                    <!--            <label class="custom-control-label" for="customControlAutosizing">Remember my preference</label>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="form-group row">-->
                                    <!--    <div class="col-sm-2"></div>-->
                                    <!--    <div class="col-sm-10">-->
                                    <!--    <button type="submit" class="btn btn-success">&nbsp; SAVE &nbsp;</button>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                                
                                
                                
                    
                                

                                <div class="card">
                                    
                                    <div class="card-body">
                                        <div class="collapse" id="collapseExample">
                                          <div class="well">
                                            <div class="form">
                                                <div class="form-group row">
                                                <label for="currentPassword" class="col-sm-4 col-form-label">Current Password</label>
                                                <div class="col-sm-8">
                                                <input type="password" class="form-control passwordCheck" size="30" id="currentPassword"  value="">
                                                </div>
                                                <div id="currentPasswordError" class="error"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newPassword" class="col-sm-4 col-form-label">New Password</label>
                                                <div class="col-sm-8">
                                                <input type="password" class="form-control " size="30" id="newPassword" placeholder="New Password" >
                                                </div>
                                                <div  id="newPasswordError" class="error"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="confirmPassword" class="col-sm-4 col-form-label">Confirm Password</label>
                                                <div class="col-sm-8">
                                                <input type="password" class="form-control " size="30" id="confirmPassword" placeholder="Confirm Password" >
                                                </div>
                                                <div id="confirmPasswordError" class="error"></div>
                                            </div>
                                            <div class="form-group row">
                                                    <div class="col-sm-8 col-sm-offset-4">
                                                          <button type="submit" onclick="passwordChange()" class="btn btn-success">CHANGE</button>
                                                    </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div> <!-- /.collapse -->
                                    </div> <!-- /.card-body -->

                                </div> <!-- /.card -->
                            </div>
                            
                        </div> <!-- /.tab-pane -->
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <div class="col-md-6">
                                <form>
                                    <input type="hidden" id="idcustomer" value="">
                                    <div class="form-group row">
                                        <label for="companyName" class="col-sm-3 col-form-label">Company Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" size="50" maxlength="50" class="form-control" id="companyName" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="firstName" class="col-sm-3 col-form-label">First Name*</label>
                                        <div class="col-sm-9">
                                            <input type="text" size="50" maxlength="50" class="form-control" id="firstName" value="">
                                        </div>
                                        <div id="firstNameError" class="error"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lastName" class="col-sm-3 col-form-label">Last Name*</label>
                                        <div class="col-sm-9">
                                            <input type="text" size="50" maxlength="50" class="form-control" id="lastName" value="">
                                        </div>
                                        <div id="lastNameError" class="error"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="tel" name="phone"   size="12" maxlength="12" class="form-control" id="phone" value="">
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
                                            <select id="Country" name="country" class="form-control">
                                                  <option value="choose">Choose</option>
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
                                        <div id="countryError" class="error"></div>
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
                                        <div id="addressError" class="error"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="zipCode" class="col-sm-3 col-form-label">Zip code</label>
                                        <div class="col-sm-9">
                                            <input type="text" size="8" maxlength="8" class="form-control" id="zipCode" value="">
                                        </div>
                                        <div id="zipCodeError" class="error"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="aboutMe" class="col-sm-3 col-form-label">About me</label>
                                        <div class="col-sm-9">
                                            <textarea rows="5" size="400" maxlength="400"  class="form-control" id="aboutMe" value=""></textarea>
                                            <p>400 characters allowed</p>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                        <a href="javascript:void(0)" type="submit" id="saveBtn" onclick="" class="btn btn-success">&nbsp; EDIT &nbsp;</a>
                                        </div>
                                    </div>
                                </form>
                          </div>
                        </div> <!-- /.tab-pane -->
                        <div role="tabpanel" class="tab-pane" id="sellerAds">
                        <div class="col-md-12">
                         @if(isset($sellerads[0]->sellerName))
                            
                            <!--<h2>{{$sellerads[0]->sellerName }}</h2>--> 
                                            
                            <ul id="searchCarsList">
            
                                    @foreach($sellerads as $sellerad)
            
                                    <li class="search-page__result">
                                        <div class="well">
                                                <div class="row">
                                                    <div class="col-lg-4"><a href="{{ route('show',$sellerad->id) }}"><img src="{{ env('APP_URL')}}assets/{{$sellerad->image}}" alt="" class="img-responsive"></a></div>
                                                    <div class="col-lg-8">
                                                        <div class="row">
                                                            <div class="col-lg-9" style="border-right:1px solid #ccc">
                                                                <h4 class="title text-left"><a href="{{ route('show',$sellerad->id) }}">{{$sellerad->title}}</a></h4>
                                                                <!-- <p class="blockquote mt-2 tagss">{{$sellerad->milage}} miles | {{$sellerad->color}} | {{substr($sellerad->derivative, 0, 3)}} L | {{$sellerad->Transmission}} | {{$sellerad->FuelType}} </p>
                                                                <p style="font-size:12px;">{{substr($sellerad->Detail, 0, 50)}}.</p>-->
                                                                <br>
                                                                @if($sellerad->Approved_id == '1')
                                                                    <span class="label label-success" style="font-size:18px;">Approved</span> 
                                                                @else
                                                                    <span class="label label-danger" style="font-size:18px;">Not Approved</span> 
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-3"><span class="badge price-badge w-100" style="font-size:18px;">${{$sellerad->price}}</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- <div id="image_preview" class="row mt-2 ml-5">
                                                    {{--@foreach($adimg as $img)
                                                        <img id="" src="http://localhost/autohapa/assets/{{$img->name}}" class="img-responsive">
                                                    endforeach --}}
            
                                                    </div> -->
                                                </div>
                                        </div>
                                        <!-- <ul class="car_div_ul">
                                            <li><a href="#">Get an insurance quote </a></li>
                                            <li><a href="#"> Check its history</a></li>
                                        </ul> -->
                                    </li>
                                @endforeach
                            </ul>
                            @else
    
                                <h5>There are currently no ads from this user.</h5> 
                            @endif
                            </div>
                        </div> <!-- /.tab-pane -->
                        
                    </div> <!-- /.tab-content -->
                      
                </div>
            </div>
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</section>

@endsection