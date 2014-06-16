          	<div class="row mt dashboard-panels">
          		<div class="col-lg-12">
					<div class="row content-panel">						
						<div class="col-md-8 profile-text">
                            <h4 class="mb text-center">Google Maps GPS Data</h4>
                            <p class="text-center">
                                <a class = "sub-link" target="_blanc" href="http://www.gps-coordinates.net/">You can get this data from here</a>
                            </p>
							<form id="gps-form" action="/register" method="POST" class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="company-latitude" class="col-sm-2 control-label">
                                        Latitude
                                    </label>
                                    <div class="col-sm-8">
                                        <input name="company-latitude" id ="company-latitude" type="text" placeholder="Your Company Latitude like 40.6700" class="form-control">
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label for="company-longitude" class="col-sm-2 control-label">
                                        Longitude
                                    </label>
                                    <div class="col-sm-8">
                                        <input name="company-longitude" id ="company-longitude" type="text" placeholder="Your Company Longitude like -73.9400" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4"> 
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-theme"><i class="fa fa-text-width"></i> Change Company Office GPS Location</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                           
						</div><!--/col-md-4 -->
						
						<div class="col-md-4 centered">
							<div class="profile-pic">
								<p><img src="../bootstrap/assets/img/ui-sam.jpg" class="img-circle"></p>
                                <div class="row">
                                    <div class="col-sm-offset-2 col-sm-8" id="logo-upload-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                <span class="sr-only">0% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<p>
									<button class="btn btn-theme" id="logo-upload-trigger"><i class="fa fa-arrow-up"></i> Upload New Company Logo </button>
								</p>
                                <form id = "logo-upload-form" action="/company/owner/profile_update/logo" enctype="multipart/form-data" method="POST">
                                    <input id="logo-upload" type="file" name="photo">
                                    <button type="submit">submit</button>
                                </form>
							</div>
						</div><!--/col-md-4 -->
					</div><!-- /row -->	   
          		</div><!--/col-lg-12 -->
				
				<div class="col-lg-12 mt">		
					<div class="row content-panel">
						<div id="edit" class="tab-pane">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2 detailed">
                                    <h4 class="mb">Company Information</h4>
                                    <form id="company-info-form" action="/register" method="POST" class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="company-name-input" class="col-sm-3 control-label">
                                                Company Name
                                            </label>
                                            <div class="col-sm-8">
                                                <input name="name" id ="company-name-input" type="text" placeholder="Company Name" class="form-control">
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label for="country-name-input" class="col-sm-3 control-label">
                                                Residence Country
                                            </label>
                                            <div class="col-sm-8">
                                                <select id ="country-name-input" name = "country" class="form-control">
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AX">Åland Islands</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AQ">Antarctica</option>
                                                        <option value="AG">Antigua and Barbuda</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD">Bangladesh</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia, Plurinational State of</option>
                                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                        <option value="BA">Bosnia and Herzegovina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BV">Bouvet Island</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="IO">British Indian Ocean Territory</option>
                                                        <option value="BN">Brunei Darussalam</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="CF">Central African Republic</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CN">China</option>
                                                        <option value="CX">Christmas Island</option>
                                                        <option value="CC">Cocos (Keeling) Islands</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CG">Congo</option>
                                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CI">Côte d'Ivoire</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CW">Curaçao</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="GQ">Equatorial Guinea</option>
                                                        <option value="ER">Eritrea</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="ET">Ethiopia</option>
                                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                                        <option value="FO">Faroe Islands</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="GF">French Guiana</option>
                                                        <option value="PF">French Polynesia</option>
                                                        <option value="TF">French Southern Territories</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GH">Ghana</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GG">Guernsey</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HM">Heard Island and McDonald Islands</option>
                                                        <option value="VA">Holy See (Vatican City State)</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran, Islamic Republic of</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IM">Isle of Man</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JE">Jersey</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                                        <option value="KR">Korea, Republic of</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Lao People's Democratic Republic</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macao</option>
                                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="YT">Mayotte</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="FM">Micronesia, Federated States of</option>
                                                        <option value="MD">Moldova, Republic of</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="ME">Montenegro</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="MM">Myanmar</option>
                                                        <option value="NA">Namibia</option>
                                                        <option value="NR">Nauru</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="NC">New Caledonia</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="MP">Northern Mariana Islands</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PW">Palau</option>
                                                        <option value="PS">Palestinian Territory, Occupied</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PN">Pitcairn</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="RE">Réunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russian Federation</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="BL">Saint Barthélemy</option>
                                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                        <option value="LC">Saint Lucia</option>
                                                        <option value="MF">Saint Martin (French part)</option>
                                                        <option value="PM">Saint Pierre and Miquelon</option>
                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                        <option value="WS">Samoa</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="ST">Sao Tome and Principe</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                        <option value="SS">South Sudan</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syrian Arab Republic</option>
                                                        <option value="TW">Taiwan, Province of China</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania, United Republic of</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TL">Timor-Leste</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TK">Tokelau</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TT">Trinidad and Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="TC">Turks and Caicos Islands</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="US" selected="selected">United States</option>
                                                        <option value="UM">United States Minor Outlying Islands</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                        <option value="VN">Viet Nam</option>
                                                        <option value="VG">Virgin Islands, British</option>
                                                        <option value="VI">Virgin Islands, U.S.</option>
                                                        <option value="WF">Wallis and Futuna</option>
                                                        <option value="EH">Western Sahara</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div><!-- form group end -->   
                                        
                                        <div class="form-group">
                                            <label for="company-description" class="col-sm-3 control-label">Company Description</label>
                                            <div class="col-sm-8">
                                                <textarea name = "about" class="form-control" name="description" id="company-description" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4"> 
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="submit" class="btn btn-block btn-theme" value="Update Company Information">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </form>

                                    <h4 class="mb">Contact Information</h4>
                                    <form method="POST" class="form-horizontal" role="form" id="contact-info-form">
                                        <div class="form-group">
                                            <label for="company-address1" class="col-sm-3 control-label">
                                                Address
                                            </label>
                                            <div class="col-sm-8">
                                                <input name="address1" id ="company-address1" type="text" placeholder="Company Address" class="form-control">
                                            </div>
                                        </div>  

                                        <div class="form-group">
                                            <label for="company-phone" class="col-sm-3 control-label">
                                                Phone
                                            </label>
                                            <div class="col-sm-8">
                                                <input name="name" id ="company-phone" type="text" placeholder="Phone" class="form-control">
                                            </div>
                                        </div>  

                                        <div class="form-group">
                                            <label for="company-skype" class="col-sm-3 control-label">
                                                Skype
                                            </label>
                                            <div class="col-sm-8">
                                                <input name="name" id ="company-skype" type="text" placeholder="Company Skype" class="form-control">
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <div class="col-sm-4"> 
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="submit" class="btn btn-block btn-theme" value="Change Contact Information">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </form>

                                    <h4 class="mb">Change Password</h4>
                                    <form method="POST" class="form-horizontal" role="form" id="change-password-form">
                                        <div class="form-group">
                                            <label for="old-password" class="col-sm-3 control-label">Old Password</label>
                                            <div class="col-sm-8">
                                                <input name = "password" type="password" id="old-password" class="form-control" placeholder="Old Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-8">
                                                <input name = "password" type="password" id="password" class="form-control" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm" class="col-sm-3 control-label">Confirm Password</label>
                                            <div class="col-sm-8">
                                                <input name = "password-confirm" type="password" id="password-confirm" class="form-control" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4"> 
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="submit" class="btn btn-block btn-theme" value="Change Password">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </form>

                                    <h4 class="mb">Change Email</h4>
                                    <form method="POST" class="form-horizontal" role="form" id="change-email-form">
                                        <div class="form-group">
                                            <label for="company-email" class="col-sm-3 control-label">New Email</label>
                                            <div class="col-sm-8">
                                                <input name = "email" type="email" id="company-email" class="form-control" placeholder="Email" data-toggle="tooltip">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="company-email-confirm" class="col-sm-3 control-label">Confirm Email</label>
                                            <div class="col-sm-8">
                                                <input name="email-confirm" type="email" id="company-email-confirm" class="form-control" placeholder="Confirm Email" data-toggle="tooltip">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-4"> 
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="submit" class="btn btn-block btn-theme" value="Change Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                            </div><!--/row -->
                        </div><!--/tab-pane -->
							
							
					</div><!--/row -->
          	</div><!--/container -->

      <!--main content end-->