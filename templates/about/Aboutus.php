



<?php
//index.php

$error = '';
$Name = '';
$Email = '';
$MobileNumber = '';
$Company = '';
$Product = '';
$Location = '';
$Message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["Name"]))
 {
  $error .= '<p><label class="alert alert-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $Name = clean_text($_POST["Name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$Name))
  {
   $error .= '<p><label class="alert alert-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["Email"]))
 {
  $error .= '<p><label class="alert alert-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $Email = clean_text($_POST["Email"]);
  if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="alert alert-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["MobileNumber"]))
 {
  $error .= '<p><label class="alert alert-danger">MobileNumber is required</label></p>';
 }
 else
 {
  $MobileNumber = clean_text($_POST["MobileNumber"]);
 }

if(empty($_POST["Company"]))
 {
  $error .= '<p><label class="alert alert-danger">Company is required</label></p>';
 }
 else
 {
  $Company = clean_text($_POST["Company"]);
 }
 
 

 if(empty($_POST["Product"]))
 {
  $error .= '<p><label class="alert alert-danger">Product is required</label></p>';
 }
 else
 {
  $Product = clean_text($_POST["Product"]);
 }
 
 if(empty($_POST["Location"]))
 {
  $error .= '<p><label class="alert alert-danger">Location is required</label></p>';
 }
 else
 {
  $Location = clean_text($_POST["Location"]);
 }
 if(empty($_POST["Message"]))
 {
  $error .= '<p><label class="alert alert-danger">Message is required</label></p>';
 }
 else
 {
  $Message = clean_text($_POST["Message"]);
 }

 if($error == '')
 {
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Chemall";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO quote (Name, Email, MobileNumber, Company, Product,  Location, Message)
VALUES ('$Name', '$Email', '$MobileNumber', '$Company', '$Product', '$Location', '$Message')";

if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

  $error = '<label class="alert alert-success">New record created successfully </label>';
  $Name = '';
  $Email = '';
  $MobileNumber = '';
  $Company = '';
  $Product = '';
  $Location = '';
  $Message = '';
 }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ABOUT US</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="/Ccss/Header.css">
    <link rel="stylesheet" href="/Ccss/form.css">
  </head>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header">
      <div class="nav-bar">
        <div class="brand">
          <a href="index.php">
          <img src="/img/logo.png">
          </a>
        </div>
        <div class="nav-list">
          <ul>
            <li><a href="index.php" data-after="Home">Home</a></li>
                    <li><a href="Aboutus.php" data-after="About">About</a></li>
                    <li><a href="product.php" data-after="Products">Products</a></li>
                    <li><a href="partner.php" data-after="Partners">Partners</a></li>
                    <li><a href="contact-form/contact.php" data-after="Contact">Contact</a></li>
                    <li><a href="#" id="modal-btn" data-after="Get a Quote">Get a Quote</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->
  <!-- -------------------------------------parallax effect------------------------------------------------------------->
    <div class="primg1">

        <div class="prtext">
            <span class="img-size">
               
            </span>
        </div>

    </div>
    <!-- --------------------------------end parallax effect--------------------------------------------------------------- -->
    <div id="my-modal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
      
        <h2>GET A QUOTE</h2>
        <span class="close">&times;</span>
      </div>
      <div class="modal-body">
       
      
      <!-- <div class="container7"> -->
      
        <div>
         <form method="post" class="col-lg-6 offset-lg-3">
          
          <?php if(!empty($error)) {
              echo '<div class="text-danger" role="alert">'.$error.'</div>';
          }
          ?>
            <div class="form-group "  >
        <input type="text" name="Name" placeholder="Contact Person" class="form-control" value="<?php echo $Name; ?>" />
          </div>
         
        
        
          <div class="form-group">
          <input type="text" name="Company" class="form-control" placeholder="Company Name" value="<?php echo $Company; ?>" />
          </div> 

          <div class="form-group ">
      <select id="inputState" name="Location" class="form-control"  value="<?php echo $Location; ?>" >
        <option selected>Select Country</option>
        <option data-countryCode="DZ" value="213">Algeria (+213)</option>
		<option data-countryCode="AD" value="376">Andorra (+376)</option>
		<option data-countryCode="AO" value="244">Angola (+244)</option>
		<option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
		<option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
		<option data-countryCode="AR" value="54">Argentina (+54)</option>
		<option data-countryCode="AM" value="374">Armenia (+374)</option>
		<option data-countryCode="AW" value="297">Aruba (+297)</option>
		<option data-countryCode="AU" value="61">Australia (+61)</option>
		<option data-countryCode="AT" value="43">Austria (+43)</option>
		<option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
		<option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
		<option data-countryCode="BH" value="973">Bahrain (+973)</option>
		<option data-countryCode="BD" value="880">Bangladesh (+880)</option>
		<option data-countryCode="BB" value="1246">Barbados (+1246)</option>
		<option data-countryCode="BY" value="375">Belarus (+375)</option>
		<option data-countryCode="BE" value="32">Belgium (+32)</option>
		<option data-countryCode="BZ" value="501">Belize (+501)</option>
		<option data-countryCode="BJ" value="229">Benin (+229)</option>
		<option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
		<option data-countryCode="BT" value="975">Bhutan (+975)</option>
		<option data-countryCode="BO" value="591">Bolivia (+591)</option>
		<option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
		<option data-countryCode="BW" value="267">Botswana (+267)</option>
		<option data-countryCode="BR" value="55">Brazil (+55)</option>
		<option data-countryCode="BN" value="673">Brunei (+673)</option>
		<option data-countryCode="BG" value="359">Bulgaria (+359)</option>
		<option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
		<option data-countryCode="BI" value="257">Burundi (+257)</option>
		<option data-countryCode="KH" value="855">Cambodia (+855)</option>
		<option data-countryCode="CM" value="237">Cameroon (+237)</option>
		<option data-countryCode="CA" value="1">Canada (+1)</option>
		<option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
		<option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
		<option data-countryCode="CF" value="236">Central African Republic (+236)</option>
		<option data-countryCode="CL" value="56">Chile (+56)</option>
		<option data-countryCode="CN" value="86">China (+86)</option>
		<option data-countryCode="CO" value="57">Colombia (+57)</option>
		<option data-countryCode="KM" value="269">Comoros (+269)</option>
		<option data-countryCode="CG" value="242">Congo (+242)</option>
		<option data-countryCode="CK" value="682">Cook Islands (+682)</option>
		<option data-countryCode="CR" value="506">Costa Rica (+506)</option>
		<option data-countryCode="HR" value="385">Croatia (+385)</option>
		<option data-countryCode="CU" value="53">Cuba (+53)</option>
		<option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
		<option data-countryCode="CY" value="357">Cyprus South (+357)</option>
		<option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
		<option data-countryCode="DK" value="45">Denmark (+45)</option>
		<option data-countryCode="DJ" value="253">Djibouti (+253)</option>
		<option data-countryCode="DM" value="1809">Dominica (+1809)</option>
		<option datxa-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
		<option data-countryCode="EC" value="593">Ecuador (+593)</option>
		<option data-countryCode="EG" value="20">Egypt (+20)</option>
		<option data-countryCode="SV" value="503">El Salvador (+503)</option>
		<option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
		<option data-countryCode="ER" value="291">Eritrea (+291)</option>
		<option data-countryCode="EE" value="372">Estonia (+372)</option>
		<option data-countryCode="ET" value="251">Ethiopia (+251)</option>
		<option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
		<option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
		<option data-countryCode="FJ" value="679">Fiji (+679)</option>
		<option data-countryCode="FI" value="358">Finland (+358)</option>
		<option data-countryCode="FR" value="33">France (+33)</option>
		<option data-countryCode="GF" value="594">French Guiana (+594)</option>
		<option data-countryCode="PF" value="689">French Polynesia (+689)</option>
		<option data-countryCode="GA" value="241">Gabon (+241)</option>
		<option data-countryCode="GM" value="220">Gambia (+220)</option>
		<option data-countryCode="GE" value="7880">Georgia (+7880)</option>
		<option data-countryCode="DE" value="49">Germany (+49)</option>
		<option data-countryCode="GH" value="233">Ghana (+233)</option>
		<option data-countryCode="GI" value="350">Gibraltar (+350)</option>
		<option data-countryCode="GR" value="30">Greece (+30)</option>
		<option data-countryCode="GL" value="299">Greenland (+299)</option>
		<option data-countryCode="GD" value="1473">Grenada (+1473)</option>
		<option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
		<option data-countryCode="GU" value="671">Guam (+671)</option>
		<option data-countryCode="GT" value="502">Guatemala (+502)</option>
		<option data-countryCode="GN" value="224">Guinea (+224)</option>
		<option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
		<option data-countryCode="GY" value="592">Guyana (+592)</option>
		<option data-countryCode="HT" value="509">Haiti (+509)</option>
		<option data-countryCode="HN" value="504">Honduras (+504)</option>
		<option data-countryCode="HK" value="852">Hong Kong (+852)</option>
		<option data-countryCode="HU" value="36">Hungary (+36)</option>
		<option data-countryCode="IS" value="354">Iceland (+354)</option>
		<option data-countryCode="IN" value="91">India (+91)</option>
		<option data-countryCode="ID" value="62">Indonesia (+62)</option>
		<option data-countryCode="IR" value="98">Iran (+98)</option>
		<option data-countryCode="IQ" value="964">Iraq (+964)</option>
		<option data-countryCode="IE" value="353">Ireland (+353)</option>
		<option data-countryCode="IL" value="972">Israel (+972)</option>
		<option data-countryCode="IT" value="39">Italy (+39)</option>
		<option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
		<option data-countryCode="JP" value="81">Japan (+81)</option>
		<option data-countryCode="JO" value="962">Jordan (+962)</option>
		<option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
		<option data-countryCode="KE" value="254">Kenya (+254)</option>
		<option data-countryCode="KI" value="686">Kiribati (+686)</option>
		<option data-countryCode="KP" value="850">Korea North (+850)</option>
		<option data-countryCode="KR" value="82">Korea South (+82)</option>
		<option data-countryCode="KW" value="965">Kuwait (+965)</option>
		<option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
		<option data-countryCode="LA" value="856">Laos (+856)</option>
		<option data-countryCode="LV" value="371">Latvia (+371)</option>
		<option data-countryCode="LB" value="961">Lebanon (+961)</option>
		<option data-countryCode="LS" value="266">Lesotho (+266)</option>
		<option data-countryCode="LR" value="231">Liberia (+231)</option>
		<option data-countryCode="LY" value="218">Libya (+218)</option>
		<option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
		<option data-countryCode="LT" value="370">Lithuania (+370)</option>
		<option data-countryCode="LU" value="352">Luxembourg (+352)</option>
		<option data-countryCode="MO" value="853">Macao (+853)</option>
		<option data-countryCode="MK" value="389">Macedonia (+389)</option>
		<option data-countryCode="MG" value="261">Madagascar (+261)</option>
		<option data-countryCode="MW" value="265">Malawi (+265)</option>
		<option data-countryCode="MY" value="60">Malaysia (+60)</option>
		<option data-countryCode="MV" value="960">Maldives (+960)</option>
		<option data-countryCode="ML" value="223">Mali (+223)</option>
		<option data-countryCode="MT" value="356">Malta (+356)</option>
		<option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
		<option data-countryCode="MQ" value="596">Martinique (+596)</option>
		<option data-countryCode="MR" value="222">Mauritania (+222)</option>
		<option data-countryCode="YT" value="269">Mayotte (+269)</option>
		<option data-countryCode="MX" value="52">Mexico (+52)</option>
		<option data-countryCode="FM" value="691">Micronesia (+691)</option>
		<option data-countryCode="MD" value="373">Moldova (+373)</option>
		<option data-countryCode="MC" value="377">Monaco (+377)</option>
		<option data-countryCode="MN" value="976">Mongolia (+976)</option>
		<option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
		<option data-countryCode="MA" value="212">Morocco (+212)</option>
		<option data-countryCode="MZ" value="258">Mozambique (+258)</option>
		<option data-countryCode="MN" value="95">Myanmar (+95)</option>
		<option data-countryCode="NA" value="264">Namibia (+264)</option>
		<option data-countryCode="NR" value="674">Nauru (+674)</option>
		<option data-countryCode="NP" value="977">Nepal (+977)</option>
		<option data-countryCode="NL" value="31">Netherlands (+31)</option>
		<option data-countryCode="NC" value="687">New Caledonia (+687)</option>
		<option data-countryCode="NZ" value="64">New Zealand (+64)</option>
		<option data-countryCode="NI" value="505">Nicaragua (+505)</option>
		<option data-countryCode="NE" value="227">Niger (+227)</option>
		<option data-countryCode="NG" value="234">Nigeria (+234)</option>
		<option data-countryCode="NU" value="683">Niue (+683)</option>
		<option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
		<option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
		<option data-countryCode="NO" value="47">Norway (+47)</option>
		<option data-countryCode="OM" value="968">Oman (+968)</option>
		<option data-countryCode="PW" value="680">Palau (+680)</option>
		<option data-countryCode="PA" value="507">Panama (+507)</option>
		<option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
		<option data-countryCode="PY" value="595">Paraguay (+595)</option>
		<option data-countryCode="PE" value="51">Peru (+51)</option>
		<option data-countryCode="PH" value="63">Philippines (+63)</option>
		<option data-countryCode="PL" value="48">Poland (+48)</option>
		<option data-countryCode="PT" value="351">Portugal (+351)</option>
		<option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
		<option data-countryCode="QA" value="974">Qatar (+974)</option>
		<option data-countryCode="RE" value="262">Reunion (+262)</option>
		<option data-countryCode="RO" value="40">Romania (+40)</option>
		<option data-countryCode="RU" value="7">Russia (+7)</option>
		<option data-countryCode="RW" value="250">Rwanda (+250)</option>
		<option data-countryCode="SM" value="378">San Marino (+378)</option>
		<option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
		<option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
		<option data-countryCode="SN" value="221">Senegal (+221)</option>
		<option data-countryCode="CS" value="381">Serbia (+381)</option>
		<option data-countryCode="SC" value="248">Seychelles (+248)</option>
		<option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
		<option data-countryCode="SG" value="65">Singapore (+65)</option>
		<option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
		<option data-countryCode="SI" value="386">Slovenia (+386)</option>
		<option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
		<option data-countryCode="SO" value="252">Somalia (+252)</option>
		<option data-countryCode="ZA" value="27">South Africa (+27)</option>
		<option data-countryCode="ES" value="34">Spain (+34)</option>
		<option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
		<option data-countryCode="SH" value="290">St. Helena (+290)</option>
		<option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
		<option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
		<option data-countryCode="SD" value="249">Sudan (+249)</option>
		<option data-countryCode="SR" value="597">Suriname (+597)</option>
		<option data-countryCode="SZ" value="268">Swaziland (+268)</option>
		<option data-countryCode="SE" value="46">Sweden (+46)</option>
		<option data-countryCode="CH" value="41">Switzerland (+41)</option>
		<option data-countryCode="SI" value="963">Syria (+963)</option>
		<option data-countryCode="TW" value="886">Taiwan (+886)</option>
		<option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
		<option data-countryCode="TH" value="66">Thailand (+66)</option>
		<option data-countryCode="TG" value="228">Togo (+228)</option>
		<option data-countryCode="TO" value="676">Tonga (+676)</option>
		<option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
		<option data-countryCode="TN" value="216">Tunisia (+216)</option>
		<option data-countryCode="TR" value="90">Turkey (+90)</option>
		<option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
		<option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
		<option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
		<option data-countryCode="TV" value="688">Tuvalu (+688)</option>
		<option data-countryCode="UG" value="256">Uganda (+256)</option>
		<!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
		<option data-countryCode="UA" value="380">Ukraine (+380)</option>
		<option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
		<option data-countryCode="UY" value="598">Uruguay (+598)</option>
		<!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
		<option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
		<option data-countryCode="VU" value="678">Vanuatu (+678)</option>
		<option data-countryCode="VA" value="379">Vatican City (+379)</option>
		<option data-countryCode="VE" value="58">Venezuela (+58)</option>
		<option data-countryCode="VN" value="84">Vietnam (+84)</option>
		<option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
		<option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
		<option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
		<option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
		<option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
		<option data-countryCode="ZM" value="260">Zambia (+260)</option>
		<option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
      </select>
    </div>
          <div class="form-group">
          <input type="text" name="Email" class="form-control" placeholder="Email ID" value="<?php echo $Email; ?>" />
          </div>
          <div class="form-group">
          <input type="text" name="MobileNumber" class="form-control" placeholder="Contact Number" value="<?php echo $MobileNumber; ?>" />
          </div>
          <div class="form-group">
          <input type="text" name="Product" class="form-control" placeholder="Product" value="<?php echo $Product; ?>" />
          </div>
         
          <div class="form-group">
          <input type="text" name="Message" class="form-control" placeholder="Message" value="<?php echo $Message; ?>" />
          </div>
         
         
         
         
         
         
          <div class="form-group text-center">
           <input type="submit" name="submit" class="btn btn-dark" value="SUBMIT" />
          </div>
         </form>
        </div>
        </div>
        <!-- </div> -->
    </div>
  </div>
    <!-- ------------------------------------start who are we------------------------------------------------------ -->

    <section id="service" class="section section-light">
       <b> <h2>-----WHO ARE WE-----</h2></b>
        <p class="arewe">Chemall Industries is a full service, nationally recognized, NACD approved chemical distributor operating in the heart of West Palm Beach, FL. Ranked 40th among the Top 100 Chemical Distributors in North America by ICIS, GreenChem integrates a diverse range of products with numerous stocking locations across all of North America and Canada, combined with a commitment to exceptional customer-care, enabling us to become an integral extension of your organization.</p>

<!-- -----------------------------------------end who are we-------------------------------------------------------------- -->

<!-- ----------------------------what people are saying------------------------------------------------------------------ -->

        <b> <h2>--WHAT PEOPLE ARE SAYING--</h2></b>
     

         
    </section>
    <div class="slideshow-container">

      <div class="mySlides">
        <q>This is the reason I love dealing with GreenChem - you guys are always on the ball and always one step ahead of the game! Keep up the good work!" </q>
        <p class="author">- Dhaval</p>
      </div>
      
      <div class="mySlides">
        <q>I appreciate the attention to detail, my orders with Green Chem flow</q>
        <p class="author">- Andrew</p>
      </div>
      
      <div class="mySlides">
        <q>Thank you for getting us taken care of so quickly, as usual!"</q>
        <p class="author">- Jesica</p>
      </div>
      
      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>
      
      </div>
 <!-- -----------------------------------------------------services card start------------------------------------------ -->
 <section class="header-extradiv">
    <div class="container">
      <div class="row">
  
        <div class="extra-div col-lg-6 col-md-6 col-12">
          <a href="#"> <i class="fa-3x fa fa-usb" style="color:red" aria-hidden="true"></i></a>
          <h2>SERVICE</h2>
          <p>Our organization runs 24/7, 365 days a year. We are committed to being the first responder for all of your industry needs.</p>
        </div>
  
  
        <div class=" extra-div col-lg-6 col-md-6 col-12">
          <a href="#"><i class=" fa-3x fa fa-cogs" style="color:red" aria-hidden="true"></i></a>
          <h2>SOLUTIONS</h2>
          <p>Time-tested and innovative procedures that ensure the prompt fulfillment of your business requirements.</p>
        </div>
        <div class=" extra-div col-lg-6 col-md-6 col-12">
            <a href="#"><i class=" fa-3x fa fa-leaf" style="color:red" aria-hidden="true"></i></a>
            <h2>SUSTAINABILITY</h2>
            <p>Staying ahead by incorporating powerful ideas that aim to leave our planet a little better than we found it.</p>
          </div>
  
  
        <div class=" extra-div col-lg-6 col-md-6 col-12">
          <a href="#"><i class="fa-3x fa fa-cubes" style="color:red" aria-hidden="true"></i></a>
          <h2>INTEGRITY</h2>
          <p>We forge thoughtful alliances with like minded vendors and producers who respect our commitment to honest business practices.</p>
        </div>
      </div>
    </div>
  </section> 
  <!-- -------------------------------------------services card end----------------------------------------------- -->

<!-- ------------------------------how we work ----------------------------------->
<section class="serviceoffer" id="servicediv">
    <div class="container headings text-center">
      
      <h1 class="text-center font-weight-bold"> -----HOW WE WORK!!!-----</h1>
    
    </div>
    

    
            <div class="container-fluid">
 
 <div class="row">
   <div class="col">
     
   <p class="paragraph"><span style="background-color: red ;padding: 1%;margin-right: 1%;" >1. </span>   Competitive Pricing. Anticipating market fluctuations and passing the savings on to you.</p>
   </div>
   <div class="col" >
   <p class="paragraph"><span style="background-color: red ;padding: 1%;margin-right: 1%;" >2. </span>Testing Chemicals and testing to all match Customer Specification.</p>
   </div>
  
 </div>
  <div class="row">
   <div class="col" style="text-align:center;">
   <p class="paragraph" style="margin-bottom:35px;margin-top:24px"><span style="background-color: red ;padding: 0.5%;margin-right: 1%;" >3. </span>Quality Sourcing. Leveraging worldwide partnerships to fulfill any product requirement.</p>
  </div>
   
 </div>
  <div class="row">
   <div class="col">
   <p class="paragraph"><span style="background-color: red ;padding: 1%;margin-right: 1%;" >4. </span>Product Availability. Stocking the products you need to ensure prompt delivery.</p>
   </div>
   <div class="col">
   <p class="paragraph"><span style="background-color: red ;padding: 1%;margin-right: 1%;" >5. </span>Personalized Service. Tailoring our services to meet your unique needs.</p>
   </div>
  
 </div>
</div>

<!-- 
          </div>

      </div>
    </div> -->
  </section>
  
  <!-- ---------------------------------------------how we work end----------------------------------------------------------------- -->

  <!-- ----------------chemall international start-------------------------------- -->
  <section id="about">
    <div class="about container1">
      <div class="col-left">
        <div class="about-img">
          <img src="img/2.jpg" alt="img">
        </div>
      </div>
      <div class="col-right">
        <h1 class="section-title">Chemall International Pvt. Ltd.</h1>
        <p>A local organization with a global footprint, Chemall international provides all in-house logistics specialists, servicing all of your raw material needs. Find out your options today!
        </p>
        <a href="import.php" class="btn cta-btn">Import and Export</a>
        
      </div>
    </div>
  </section>
  

<!-- ------------------------------chemall international end----------------------------------------->
<!-- -------------second parallax---------------------- -->
    <div class="primg2">
        <!-- <div class="prtext">
            <span class="border trans">
                image two text
            </span>
        </div> -->
    </div>
    <!-- ----------------------second parallax complete-------------------------------------- -->

<!-- ---------------------------team partner-------------------- -->

    <section class="section section-dark">
        <h2>
          ----------BECOME A PART OF OUR TEAM----------
        </h2>

        <p>
          Think you have what it takes?<br>
          Click to see the roles currently available.
        </p>
        <a href="partner.php" class="btn cta-btn">Career At Chemall International</a>
    </section> 
    <!-- -------------------------team partner end------------------------------- -->
<!-- ----------------------scroller-------------- -->

<!-- -------------------scroller end--------------------------- -->
   
    
 <!--footer-->

 <footer>
  <div class="footer-content">
      <ul class="socials">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
      </ul>
  </div>  
  <div class="footer-bottom">
      <p>Copyright &copy;2021 Chemall International. designed by <span1>IT PEOPLE</span1></p>
  </div>
</footer>
<!-- -------------------footer end---------------- -->


    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    

    <script>
        // Select all links with hashes
        $('a[href*="#"]')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function (event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function () {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });
    </script>
    <script>
  if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href)
  }
  </script>

<script type="text/javascript" src="/JS/1.js"></script>
 <script src="/JS/app.js"></script>
 <script src="/JS/modal.js"></script>
</body>

</html>