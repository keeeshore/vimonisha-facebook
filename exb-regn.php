<?php session_start(); ?>
<?php

$imgResponse = "Please insert proper code as in the picture";
$succesMsg = "";
	
if(isset($_POST["submitBtn"])){
	
	//extract($_POST);
	//include_once $_SERVER['DOCUMENT_ROOT'] . '../securimage/securimage.php';
	include("securimage/securimage.php");
	$securimage = new Securimage();
	
	
	if ($securimage->check($_POST['captcha_code']) == false) {
  		// the code was incorrect
		// handle the error accordingly with your other error checking
  		// or you can do something really basic like this
  		$imgResponse = "|  Please insert proper code as in the picture";
		$succesMsg = "There was an error in sending your mail, Please verify the image code properly and try again";
		//exit;
  		//die('The code you entered was incorrect.  Go back and try again.');
	}
	else{
	
	$succesMsg = "Your mail has been successfully sent!";
	$imgResponse = "Success";
	$name=$_POST['name'];	
	$coName=$_POST['coName'];	
	$designation=$_POST['designation'];	
	$telNo=$_POST['telNo'];	
	$mobileNo=$_POST['mobileNo'];	
	$fax=$_POST['fax'];			
	$mailId=$_POST['mailId'];	
	$address=$_POST['address'];
	$city=$_POST['city'];	
	$pinCode=$_POST['pinCode'];
	$country=$_POST['country'];		
	$siteFeedback = $_POST['siteFeedback'];
	$fromWhere = $_POST['fromWhere'];
	
	//sys date

	$tmp=time();

	$date=date("Y-m-d H:i:s",$tmp);		
	
		{

 			$to="keeeshore@gmail.com, mahesh@expoconsult.co.in , motivimal@gmail.com, vimonisha@vimonisha.com"; 
 			$subject = "Exhibition Registration from Vimonisha"; 
		}
		

$msg = "
<HTML>
<BODY>
<table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\">
  <tr>
   <td colspan=\"2\">Exhibition Registration for Vimonisha</td>
  </tr>
  
<tr>
    <td width=\"26%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">Name</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$name</font></td>
  </tr>
  
  <tr>
    <td width=\"26%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">Company Name</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$coName</font></td>
  </tr>
  
  
  <tr>
    <td width=\"26%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">Designation</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$designation</font></td>
  </tr>

<tr>
    <td width=\"26%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">Telephone No</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$telNo</font></td>
  </tr>
  
  
  <tr>
    <td width=\"26%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">Mobile No</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$mobileNo</font></td>
  </tr> 
  
  <tr>
    <td width=\"26%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">Fax No</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$fax</font></td>
  </tr> 
  
   
  <tr>
    <td width=\"26%\" height=\"28\" valign=\"top\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">mail Id</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$mailId</font></td>
  </tr> 
  
  
  <tr>
    <td width=\"26%\" height=\"28\" valign=\"top\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">Address</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$address</font></td>
  </tr> 
   
  <tr>
    <td width=\"26%\" height=\"28\" valign=\"top\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">City</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$city</font></td>
  </tr>
  
  
  <tr>
    <td width=\"26%\" height=\"28\" valign=\"top\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">Pin code</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$pinCode</font></td>
  </tr>
  
  <tr>
    <td width=\"26%\" height=\"28\" valign=\"top\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">Country</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$country</font></td>
  </tr>  
  
   <tr>
    <td width=\"26%\" height=\"28\" valign=\"top\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">Site Feedback</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$siteFeedback</font></td>
  </tr>  
  
   <tr>
    <td width=\"26%\" height=\"28\" valign=\"top\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">How did you come to know about us</font></td>
    <td width=\"74%\" height=\"28\"><font size=\"2\" face=\"Arial, Helvetica, sans-serif\">$fromWhere</font></td>
  </tr>  
  

  
  
    
</table>
</body>
</html> <br><br> ";

 $headers = "From: $name <$mailId>\nReply-To: $mailId\nCc:keeeshore@gmail.com\nContent-Type: text/html; charset=iso-8859-1\n";  


//echo $msg;
//exit;


//mail($toadr,$subject,$msg,$headers);
  mail($to, $subject, $msg, $headers);
  //mail($to, $sub, $msg, $headers);
  }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content=" Indian couture, pret wear, precious and fashion jewellery , accessories and home lifestyle products,export houses, boutique owners and lifestyle store, indian fashion exhibtion, chennai fashion, exhibition gallery in chennai, chennai gallery, art and fashion gallery in chennai, lifestyle fashion gallery in chennai"  />
	<meta name="description" content="designers in Pret wear, jewellery, hand bags, footwear and accessories, export houses, boutique owners and lifestyle store, Exhibitions India fashion, clothing, shoes, fabrics, leather, technology" />
	<title>Indian couture, pret wear, precious and fashion jewellery , accessories and home lifestyle products,export houses, boutique owners and lifestyle store, indian fashion exhibtion, chennai fashion, exhibition gallery in chennai, chennai gallery, art and fashion gallery in chennai, lifestyle fashion gallery in chennai</title>

     <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- <script src="js/lib/angular.min.js"></script> -->
	<script src="js/lib/jquery-min-2.1.3.js"></script>
	<script src="js/lib/FBALL.js"></script>
	<script src="js/lib/underscore-1.8.3.js"></script>
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="global.css">
	<!-- Latest compiled and minified JavaScript -->
	

</head>
<body>

	<body>

	<?php include('include/menu.html'); ?>

    <div class="container">
		
		<div class='col-sm-12'>
			<div class='row' id='eventDetailsRegion'></div>
			<div class='row' id='homeRegion'>
				<h1> Exhibition Registration</h1>
				<div class='col-sm-8'>
               			<p class="bg-warning"><?php echo $succesMsg ?></p>
						<form id="form1" name="form1" method="post" class="form-inline">
							<div class='row'>        
								<label class='col-sm-4'>Name<span class="style6">*</span></label>
								<input class='form-control' name="name" type="text" id="name" value="" />
							</div>
							
						   <div class='row'>
							   <label class='col-sm-4'>Company Name<span class="style6">*</span></label>
							  <input class='form-control'  name="coName" type="text" id="coName" value="" />
							</div>
							 <div class='row'>
							   <label class='col-sm-4'>Designation</label>
							   <input class='form-control'  type="text" name="designation" id="designation" value="" />
							 </div>
						   <div class='row'>
							  <label class='col-sm-4'>Tel No</label>
							  <input class='form-control'  type="text" name="telNo" id="telNo" value=""/> 
							</div>
							
							 <div class='row'>
								<label class='col-sm-4'>Mobile<span class="style6">*</span></label>         
							  <input class='form-control'  type="text" name="mobileNo" id="mobileNo" value="" />
							</div>
							<div class='row'>
							   <label class='col-sm-4'>Fax</label>
							   <input class='form-control'  type="text" name="fax" id="fax" value="" />
							  
							 </div>
							 
							  <div class='row'>
								<label class='col-sm-4'>Email<span class="style6">*</span></label>         
							  <input class='form-control'  type="text" name="mailId" id="mailId" value="" />
							</div>
							
							 <div class='row'>
							   <label class='col-sm-4'>Address</label>
							   <textarea class= 'form-control' name="address" id="address" cols="45" rows="5" value=""></textarea>
							 </div>
							<div class='row'>
							   <label class='col-sm-4'>City<span class="style6">*</span></label>
							  <input class='form-control'  type="text" name="city" id="city" value="" />
							</div>
							 <div class='row'>
							   <label class='col-sm-4'>Pin code<span class="style6">*</span></label>
							   <input class='form-control'  type="text" name="pinCode" id="pinCode" value="" />
							 </div>
							<div class='row'>
							   <label class='col-sm-4'>Country<span class="style6">*</span></label>
							   <select name="country" size="1" class='form-control'>
								 <option value="0" selected="selected"></option>
								 <option value="Afghanistan">Afghanistan</option>
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
								 <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
								 <option value="Botswana">Botswana</option>
								 <option value="Bouvet Island">Bouvet Island</option>
								 <option value="Brazil">Brazil</option>
								 <option value="British Indian Ocean Territory">British Indian 
								   
								   Ocean Territory</option>
								 <option value="Brunei Darussalam">Brunei Darussalam</option>
								 <option value="Bulgaria">Bulgaria</option>
								 <option value="Burkina Faso">Burkina Faso</option>
								 <option value="Burundi">Burundi</option>
								 <option value="Cambodia">Cambodia</option>
								 <option value="Cameroon">Cameroon</option>
								 <option value="Canada">Canada</option>
								 <option value="Cape Verde">Cape Verde</option>
								 <option value="Cayman Islands">Cayman Islands</option>
								 <option value="Central African Republic">Central African 
								   
								   Republic</option>
								 <option value="Chad">Chad</option>
								 <option value="Chile">Chile</option>
								 <option value="China">China</option>
								 <option value="Christmas Island">Christmas Island</option>
								 <option value="Cocos (Keeling) Islands">Cocos (Keeling) 
								   
								   Islands</option>
								 <option value="Colombia">Colombia</option>
								 <option value="Comoros">Comoros</option>
								 <option value="Congo">Congo</option>
								 <option value="Cook Islands">Cook Islands</option>
								 <option value="Costa Rica">Costa Rica</option>
								 <option value="Cote D'Ivoire">Cote D'Ivoire</option>
								 <option value="Croatia">Croatia</option>
								 <option value="Cuba">Cuba</option>
								 <option value="Cyprus">Cyprus</option>
								 <option value="Czech Republic">Czech Republic</option>
								 <option value="Denmark">Denmark</option>
								 <option value="Djibouti">Djibouti</option>
								 <option value="Dominica">Dominica</option>
								 <option value="Dominican Republic">Dominican Republic</option>
								 <option value="East Timor">East Timor</option>
								 <option value="Ecuador">Ecuador</option>
								 <option value="Egypt">Egypt</option>
								 <option value="El Salvador">El Salvador</option>
								 <option value="Equatorial Guinea">Equatorial Guinea</option>
								 <option value="Eritrea">Eritrea</option>
								 <option value="Estonia">Estonia</option>
								 <option value="Ethiopia">Ethiopia</option>
								 <option value="Falkland Islands">Falkland Islands</option>
								 <option value="Faroe Islands">Faroe Islands</option>
								 <option value="Fiji">Fiji</option>
								 <option value="Finland">Finland</option>
								 <option value="France">France</option>
								 <option value="France, Metropolitan">France, Metropolitan</option>
								 <option value="French Guiana">French Guiana</option>
								 <option value="French Polynesia">French Polynesia</option>
								 <option value="French Southern Territories">French Southern 
								   
								   Territories</option>
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
								 <option value="Guinea">Guinea</option>
								 <option value="Guinea-Bissau">Guinea-Bissau</option>
								 <option value="Guyana">Guyana</option>
								 <option value="Haiti">Haiti</option>
								 <option value="Heard and McDonald Islands">Heard and McDonald 
								   
								   Islands</option>
								 <option value="Honduras">Honduras</option>
								 <option value="Hong Kong SAR, PRC">Hong Kong SAR, PRC</option>
								 <option value="Hungary">Hungary</option>
								 <option value="Iceland">Iceland</option>
								 <option value="India">India</option>
								 <option value="Indonesia">Indonesia</option>
								 <option value="Iran">Iran</option>
								 <option value="Iraq">Iraq</option>
								 <option value="Ireland">Ireland</option>
								 <option value="Israel">Israel</option>
								 <option value="Italy">Italy</option>
								 <option value="Jamaica">Jamaica</option>
								 <option value="Japan">Japan</option>
								 <option value="Jordan">Jordan</option>
								 <option value="Kazakhstan">Kazakhstan</option>
								 <option value="Kenya">Kenya</option>
								 <option value="Kiribati">Kiribati</option>
								 <option value="D.P.R. Korea">D.P.R. Korea</option>
								 <option value="Korea">Korea</option>
								 <option value="Kuwait">Kuwait</option>
								 <option value="Kyrgyzstan">Kyrgyzstan</option>
								 <option value="Lao People's Republic">Lao People's Republic</option>
								 <option value="Latvia">Latvia</option>
								 <option value="Lebanon">Lebanon</option>
								 <option value="Lesotho">Lesotho</option>
								 <option value="Liberia">Liberia</option>
								 <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
								 <option value="Liechtenstein">Liechtenstein</option>
								 <option value="Lithuania">Lithuania</option>
								 <option value="Luxembourg">Luxembourg</option>
								 <option value="Macau">Macau</option>
								 <option value="Macedonia">Macedonia</option>
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
								 <option value="Micronesia">Micronesia</option>
								 <option value="Moldova">Moldova</option>
								 <option value="Monaco">Monaco</option>
								 <option value="Mongolia">Mongolia</option>
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
								 <option value="Northern Mariana Islands">Northern Mariana 
								   
								   Islands</option>
								 <option value="Norway">Norway</option>
								 <option value="Oman">Oman</option>
								 <option value="Pakistan">Pakistan</option>
								 <option value="Palau">Palau</option>
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
								 <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								 <option value="Saint Lucia">Saint Lucia</option>
								 <option value="Saint Vincent and the Grenadines">Saint Vincent 
								   
								   and the Grenadines</option>
								 <option value="Samoa">Samoa</option>
								 <option value="San Marino">San Marino</option>
								 <option value="Sao Tome and Principe">Sao Tome and Principe</option>
								 <option value="Saudi Arabia">Saudi Arabia</option>
								 <option value="Senegal">Senegal</option>
								 <option value="Seychelles">Seychelles</option>
								 <option value="Sierra Leone">Sierra Leone</option>
								 <option value="Singapore">Singapore</option>
								 <option value="Slovakia">Slovakia</option>
								 <option value="Slovenia">Slovenia</option>
								 <option value="Solomon Islands">Solomon Islands</option>
								 <option value="Somalia">Somalia</option>
								 <option value="South Africa">South Africa</option>
								 <option value="Spain">Spain</option>
								 <option value="Sri Lanka">Sri Lanka</option>
								 <option value="St Helena">St Helena</option>
								 <option value="St Pierre and Miquelon">St Pierre and Miquelon</option>
								 <option value="Sudan">Sudan</option>
								 <option value="Suriname">Suriname</option>
								 <option value="Svalbard and Jan Mayen Islands">Svalbard 
								   
								   and Jan Mayen Islands</option>
								 <option value="Swaziland">Swaziland</option>
								 <option value="Sweden">Sweden</option>
								 <option value="Switzerland">Switzerland</option>
								 <option value="Syrian Arab Republic">Syrian Arab Republic</option>
								 <option value="Taiwan Region">Taiwan Region</option>
								 <option value="Tajikistan">Tajikistan</option>
								 <option value="Tanzania">Tanzania</option>
								 <option value="Thailand">Thailand</option>
								 <option value="Togo">Togo</option>
								 <option value="Tokelau">Tokelau</option>
								 <option value="Tonga">Tonga</option>
								 <option value="Trinidad and Tobago">Trinidad and Tobago</option>
								 <option value="Tunisia">Tunisia</option>
								 <option value="Turkey">Turkey</option>
								 <option value="Turkmenistan">Turkmenistan</option>
								 <option value="Turks and Caicos Islands">Turks and Caicos 
								   
								   Islands</option>
								 <option value="Tuvalu">Tuvalu</option>
								 <option value="Uganda">Uganda</option>
								 <option value="Ukraine">Ukraine</option>
								 <option value="United Arab Emirates">United Arab Emirates</option>
								 <option value="United Kingdom">United Kingdom</option>
								 <option value="United States">United States</option>
								 <option value="United States Minor Outlying Islands">United 
								   
								   States Minor Outlying Islands</option>
								 <option value="Uruguay">Uruguay</option>
								 <option value="Uzbekistan">Uzbekistan</option>
								 <option value="Vanuatu">Vanuatu</option>
								 <option value="Vatican City State (Holy See)">Vatican City 
								   
								   State (Holy See)</option>
								 <option value="Venezuela">Venezuela</option>
								 <option value="Viet Nam">Viet Nam</option>
								 <option value="Virgin Islands (British)">Virgin Islands 
								   
								   (British)</option>
								 <option value="Virgin Islands (US)">Virgin Islands (US)</option>
								 <option value="Wallis and Futuna Islands">Wallis and Futuna 
								   
								   Islands</option>
								 <option value="Western Sahara">Western Sahara</option>
								 <option value="Yemen">Yemen</option>
								 <option value="Zaire">Zaire</option>
								 <option value="Zambia">Zambia</option>
								 <option value="Zimbabwe">Zimbabwe</option>
								 <option value="Other-Not Shown">Other-Not Shown</option>
							  </select>
							</div>
							 <div class='row'>
							   <label class='col-sm-4'>Feedback about the site</label>
							   <textarea name="siteFeedback" id="siteFeedback" cols="45" rows="5" class="form-control" ></textarea>
							 </div>
							<div class='row'>
							  <label>How did you come to know about Vimonisha ?<span class="style6"></span></label>
								<div class='row col-sm-offset-4'>
									<input class='form-control'  type="radio" name="fromWhere" id="radio" value="Print Media" class="radio" />          
										Newspaper/Magazines/other print media<br /> 
									<input class='form-control'  type="radio" name="fromWhere" id="radio2" value="Word of mouth"  class="radio" />
										Word of mouth<br /> 
									<input class='form-control'  type="radio" name="fromWhere" id="radio3" value="internet"  class="radio" /> 
										search engines/internet<br />
									<input class='form-control'  type="radio" name="fromWhere" id="radio4" value="Electronic Media"  class="radio" /> 
										Electronic media (TV/Radio)<br />
									<input class='form-control'  type="radio" name="fromWhere" id="radio5" value="Others"  class="radio" />
										Others
								</div>
							</div>
							<div class='row' style="background:#EBEBEB;">
								<label class="scrImgWrapper"><img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" /></label>
								  <input class='form-control'  type="text" name="captcha_code" size="10" maxlength="6" />
								  <a href="#" class="style11" onClick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">Reload Image</a> 
							  
							</div>
							<br/>
							<div class='row'>
									<label class='col-sm-4'></label>
										<input class='form-control btn-primary'  name="submitBtn" type="submit"  class="submitBtn" id="submitBtn" onclick="MM_validateForm('name','','R','mobileNo','','RisNum','mailId','','RisEmail','city','','R','pinCode','','R');return document.MM_returnValue" value="Submit"/>
							</div>
							<div class='row'><br><br>	</div>
    
						</form>
				</div>				
			</div>		
		</div>
		<div class='col-sm-12 text-left divider-top'>
			<?php include('include/footer.html'); ?>
		</div>

    </div> 
	<!-- /container -->
	
	<script type="text/javascript">
function MM_validateForm() {
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>	
	<script data-main="appconfig" src="js/lib/require-2.1.0.js"></script>
</body>
</html>	




