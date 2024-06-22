<!DOCTYPE html>
<html lang="en">
<?php
    ob_start();
    session_start();
    require_once 'admin/config/db.php';
    if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
        header('location: login.php');
    }
$uid = $_SESSION['customerid'];
$cart = $_SESSION['cart'];

if(isset($_POST) & !empty($_POST)){
    if($_POST['agree'] == true){
        $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
        $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
        $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
        $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
        $address1 = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
        $address2 = filter_var($_POST['address2'], FILTER_SANITIZE_STRING);
        $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
        $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
        $zip = filter_var($_POST['zipcode'], FILTER_SANITIZE_NUMBER_INT);

        $sql = "SELECT * FROM usersmeta WHERE uid=$uid";
        $res = mysqli_query($con, $sql);
        $r = mysqli_fetch_assoc($res);
        $count = mysqli_num_rows($res);
        if($count == 1){
            //update data in usersmeta table
            $usql = "UPDATE usersmeta SET country='$country', firstname='$fname', lastname='$lname', address1='$address1', address2='$address2', city='$city', state='$state',  zip='$zip', company='$company', mobile='$phone' WHERE uid=$uid";
            $ures = mysqli_query($con, $usql) or die(mysqli_error($con));
            if($ures){

                $total = 0;
                foreach ($cart as $key => $value) {
                    //echo $key . " : " . $value['quantity'] ."<br>";
                    $ordsql = "SELECT * FROM products WHERE product_id=$key";
                    $ordres = mysqli_query($con, $ordsql);
                    $ordr = mysqli_fetch_assoc($ordres);

                    $total = $total + ($ordr['product_price']*$value['quantity']);
                }

                echo $iosql = "INSERT INTO orders (uid, totalprice, orderstatus, paymentmode) VALUES ('$uid', '$total', 'Order Placed', '$payment')";
                $iores = mysqli_query($con, $iosql) or die(mysqli_error($con));
                if($iores){
                    //echo "Order inserted, insert order items <br>";
                    $orderid = mysqli_insert_id($con);
                    foreach ($cart as $key => $value) {
                        //echo $key . " : " . $value['quantity'] ."<br>";
                        $ordsql = "SELECT * FROM products WHERE product_id=$key";
                        $ordres = mysqli_query($con, $ordsql);
                        $ordr = mysqli_fetch_assoc($ordres);

                        $pid = $ordr['product_id'];
                        $productprice = $ordr['product_price'];
                        $quantity = $value['quantity'];


                        $orditmsql = "INSERT INTO orderitems (pid, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
                        $orditmres = mysqli_query($con, $orditmsql) or die(mysqli_error($con));
                        //if($orditmres){
                            //echo "Order Item inserted redirect to my account page <br>";
                        //}
                    }
                }
                unset($_SESSION['cart']);
                header("location: customer-account.php");
            }
        }else{
            //insert data in usersmeta table
            $isql = "INSERT INTO usersmeta (country, firstname, lastname, address1, address2, city, state, zip, company, mobile, uid) VALUES ('$country', '$fname', '$lname', '$address1', '$address2', '$city', '$state', '$zip', '$company', '$phone', '$uid')";
            $ires = mysqli_query($con, $isql) or die(mysqli_error($con));
            if($ires){

                $total = 0;
                foreach ($cart as $key => $value) {
                    //echo $key . " : " . $value['quantity'] ."<br>";
                    $ordsql = "SELECT * FROM products WHERE id=$key";
                    $ordres = mysqli_query($con, $ordsql);
                    $ordr = mysqli_fetch_assoc($ordres);

                    $total = $total + ($ordr['price']*$value['quantity']);
                }

                echo $iosql = "INSERT INTO orders (uid, totalprice, orderstatus, paymentmode) VALUES ('$uid', '$total', 'Order Placed', '$payment')";
                $iores = mysqli_query($con, $iosql) or die(mysqli_error($con));
                if($iores){
                    //echo "Order inserted, insert order items <br>";
                    $orderid = mysqli_insert_id($con);
                    foreach ($cart as $key => $value) {
                        //echo $key . " : " . $value['quantity'] ."<br>";
                        $ordsql = "SELECT * FROM products WHERE product_id=$key";
                        $ordres = mysqli_query($con, $ordsql);
                        $ordr = mysqli_fetch_assoc($ordres);

                        $pid = $ordr['product_id'];
                        $productprice = $ordr['product_price'];
                        $quantity = $value['quantity'];


                        $orditmsql = "INSERT INTO orderitems (pid, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
                        $orditmres = mysqli_query($con, $orditmsql) or die(mysqli_error($con));
                        //if($orditmres){
                            //echo "Order Item inserted redirect to my account page <br>";
                        //}
                    }
                }
                unset($_SESSION['cart']);
                header("location: customer-orders.php");
            }

        }
    }

}

$sql = "SELECT * FROM usersmeta WHERE uid=$uid";
$res = mysqli_query($con, $sql);
$r = mysqli_fetch_assoc($res);
?>

<?php

include 'layout/head.php';
?>


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Address</li>
                    </ul>
                </div>

                <div class="col-md-12" id="checkout">

                    <div class="box">
                       <!-- SHOP CONTENT -->
    <section id="content">
        <div class="content-blog">
                    <div class="page_header text-center">
                        <h2>Shop - Checkout</h2>
                        <p>Get the best kit for smooth shave</p>
                    </div>
<form method="post">

            <div class="row">
                <div class="col-md-12">
                    <div class="billing-details">
                        <h3 class="uppercase">Billing Details</h3>
                        <div class="space30"></div>
                            <label class="">Country </label>
                            <select name="country" class="form-control">
                                <option value="">Select Country</option>
        <option value="AF" countrynum="93">Afghanistan</option>
          <option value="ALA" countrynum="358">Aland Islands</option>
          <option value="AL" countrynum="355">Albania</option>
          <option value="GBA" countrynum="493">Alderney</option>
          <option value="DZ" countrynum="213">Algeria</option>
          <option value="AS" countrynum="684">American Samoa</option>
          <option value="AD" countrynum="376">Andorra</option>
          <option value="AO" countrynum="244">Angola</option>
          <option value="AI" countrynum="1-264">Anguilla</option>
          <option value="AQ" countrynum="672">Antarctica</option>
          <option value="AG" countrynum="1-268">Antigua and Barbuda</option>
          <option value="AR" countrynum="54">Argentina</option>
          <option value="AM" countrynum="374">Armenia</option>
          <option value="AW" countrynum="297">Aruba</option>
          <option value="ASC" countrynum="247">Ascension Island</option>
          <option value="AU" countrynum="61">Australia</option>
          <option value="AT" countrynum="43">Austria</option>
          <option value="AZ" countrynum="994">Azerbaijan</option>
          <option value="BS" countrynum="1-242">Bahamas</option>
          <option value="BH" countrynum="973">Bahrain</option>
          <option value="BD" countrynum="880">Bangladesh</option>
          <option value="BB" countrynum="1-246">Barbados</option>
          <option value="BY" countrynum="375">Belarus</option>
          <option value="BE" countrynum="32">Belgium</option>
          <option value="BZ" countrynum="501">Belize</option>
          <option value="BJ" countrynum="229">Benin</option>
          <option value="BM" countrynum="1-441">Bermuda</option>
          <option value="BT" countrynum="975">Bhutan</option>
          <option value="BO" countrynum="591">Bolivia</option>
          <option value="BA" countrynum="387">Bosnia and Herzegovina</option>
          <option value="BW" countrynum="267">Botswana</option>
          <option value="BV" countrynum="47">Bouvet Island</option>
          <option value="BR" countrynum="55">Brazil</option>
          <option value="IO" countrynum="1-284">British Indian Ocean Territory</option>
          <option value="BN" countrynum="673">Brunei Darussalam</option>
          <option value="BG" countrynum="359">Bulgaria</option>
          <option value="BF" countrynum="226">Burkina Faso</option>
          <option value="BI" countrynum="257">Burundi</option>
          <option value="KH" countrynum="855">Cambodia</option>
          <option value="CM" countrynum="237">Cameroon</option>
          <option value="CA" countrynum="1">Canada</option>
          <option value="CV" countrynum="238">Cape Verde</option>
          <option value="KY" countrynum="1-345">Cayman Islands</option>
          <option value="CF" countrynum="236">Central African Republic</option>
          <option value="TD" countrynum="235">Chad</option>
          <option value="CL" countrynum="56">Chile</option>
          <option value="CX" countrynum="61">Christmas Island</option>
          <option value="CC" countrynum="61">Cocos (Keeling) Islands</option>
          <option value="CO" countrynum="57">Colombia</option>
          <option value="KM" countrynum="269">Comoros</option>
          <option value="ZR" countrynum="243">Congo, The Democratic Republic Of The</option>
          <option value="CG" countrynum="242">Congo, The Republic of Congo</option>
          <option value="CK" countrynum="682">Cook Islands</option>
          <option value="CR" countrynum="506">Costa Rica</option>
          <option value="CI" countrynum="225">Cote D'Ivoire</option>
          <option value="HR" countrynum="385">Croatia (local name: Hrvatska)</option>
          <option value="CU" countrynum="53">Cuba</option>
          <option value="CY" countrynum="357">Cyprus</option>
          <option value="CZ" countrynum="420">Czech Republic</option>
          <option value="DK" countrynum="45">Denmark</option>
          <option value="DJ" countrynum="253">Djibouti</option>
          <option value="DM" countrynum="1-767">Dominica</option>
          <option value="DO" countrynum="1-809">Dominican Republic</option>
          <option value="TP" countrynum="670">East Timor</option>
          <option value="EC" countrynum="593">Ecuador</option>
          <option value="EG" countrynum="20">Egypt</option>
          <option value="SV" countrynum="503">El Salvador</option>
          <option value="GQ" countrynum="240">Equatorial Guinea</option>
          <option value="ER" countrynum="291">Eritrea</option>
          <option value="EE" countrynum="372">Estonia</option>
          <option value="ET" countrynum="251">Ethiopia</option>
          <option value="FK" countrynum="500">Falkland Islands (Malvinas)</option>
          <option value="FO" countrynum="298">Faroe Islands</option>
          <option value="FJ" countrynum="679">Fiji</option>
          <option value="FI" countrynum="358">Finland</option>
          <option value="FR" countrynum="33">France</option>
          <option value="FX" countrynum="33">France Metropolitan</option>
          <option value="GF" countrynum="594">French Guiana</option>
          <option value="PF" countrynum="689">French Polynesia</option>
          <option value="TF" countrynum="33">French Southern Territories</option>
          <option value="GA" countrynum="241">Gabon</option>
          <option value="GM" countrynum="220">Gambia</option>
          <option value="GE" countrynum="995">Georgia</option>
          <option value="DE" countrynum="49">Germany</option>
          <option value="GH" countrynum="233">Ghana</option>
          <option value="GI" countrynum="350">Gibraltar</option>
          <option value="GR" countrynum="30">Greece</option>
          <option value="GL" countrynum="299">Greenland</option>
          <option value="GD" countrynum="1-473">Grenada</option>
          <option value="GP" countrynum="590">Guadeloupe</option>
          <option value="GU" countrynum="1-671">Guam</option>
          <option value="GT" countrynum="502">Guatemala</option>
          <option value="GGY" countrynum="44">Guernsey</option>
          <option value="GN" countrynum="224">Guinea</option>
          <option value="GW" countrynum="245">Guinea-Bissau</option>
          <option value="GY" countrynum="592">Guyana</option>
          <option value="HT" countrynum="509">Haiti</option>
          <option value="HM" countrynum="61">Heard and Mc Donald Islands</option>
          <option value="HN" countrynum="504">Honduras</option>
          <option value="HK" countrynum="852">Hong Kong</option>
          <option value="HU" countrynum="36">Hungary</option>
          <option value="IS" countrynum="354">Iceland</option>
          <option value="IN" countrynum="91">India</option>
          <option value="ID" countrynum="62">Indonesia</option>
          <option value="IR" countrynum="98">Iran (Islamic Republic of)</option>
          <option value="IQ" countrynum="964">Iraq</option>
          <option value="IE" countrynum="353">Ireland</option>
          <option value="IM" countrynum="44">Isle of Man</option>
          <option value="IL" countrynum="972">Israel</option>
          <option value="IT" countrynum="39">Italy</option>
          <option value="JM" countrynum="1-876">Jamaica</option>
          <option value="JP" countrynum="81">Japan</option>
          <option value="JEY" countrynum="44">Jersey</option>
          <option value="JO" countrynum="962">Jordan</option>
          <option value="KZ" countrynum="7">Kazakhstan</option>
          <option value="KE" countrynum="254">Kenya</option>
          <option value="KI" countrynum="686">Kiribati</option>
          <option value="KS" countrynum="381">Kosovo</option>
          <option value="KW" countrynum="965">Kuwait</option>
          <option value="KG" countrynum="996">Kyrgyzstan</option>
          <option value="LA" countrynum="856">Lao People's Democratic Republic</option>
          <option value="LV" countrynum="371">Latvia</option>
          <option value="LB" countrynum="961">Lebanon</option>
          <option value="LS" countrynum="266">Lesotho</option>
          <option value="LR" countrynum="231">Liberia</option>
          <option value="LY" countrynum="218">Libya</option>
          <option value="LI" countrynum="423">Liechtenstein</option>
          <option value="LT" countrynum="370">Lithuania</option>
          <option value="LU" countrynum="352">Luxembourg</option>
          <option value="MO" countrynum="853">Macau</option>
          <option value="MK" countrynum="389">Macedonia</option>
          <option value="MG" countrynum="261">Madagascar</option>
          <option value="MW" countrynum="265">Malawi</option>
          <option value="MY" countrynum="60">Malaysia</option>
          <option value="MV" countrynum="960">Maldives</option>
          <option value="ML" countrynum="223">Mali</option>
          <option value="MT" countrynum="356">Malta</option>
          <option value="MH" countrynum="692">Marshall Islands</option>
          <option value="MQ" countrynum="596">Martinique</option>
          <option value="MR" countrynum="222">Mauritania</option>
          <option value="MU" countrynum="230">Mauritius</option>
          <option value="YT" countrynum="269">Mayotte</option>
          <option value="MX" countrynum="52">Mexico</option>
          <option value="FM" countrynum="691">Micronesia</option>
          <option value="MD" countrynum="373">Moldova</option>
          <option value="MC" countrynum="377">Monaco</option>
          <option value="MN" countrynum="976">Mongolia</option>
          <option value="MNE" countrynum="382">Montenegro</option>
          <option value="MS" countrynum="1-664">Montserrat</option>
          <option value="MA" countrynum="212">Morocco</option>
          <option value="MZ" countrynum="258">Mozambique</option>
          <option value="MM" countrynum="95">Myanmar</option>
          <option value="NA" countrynum="264">Namibia</option>
          <option value="NR" countrynum="674">Nauru</option>
          <option value="NP" countrynum="977">Nepal</option>
          <option value="NL" countrynum="31">Netherlands</option>
          <option value="AN" countrynum="599">Netherlands Antilles</option>
          <option value="NC" countrynum="687">New Caledonia</option>
          <option value="NZ" countrynum="64">New Zealand</option>
          <option value="NI" countrynum="505">Nicaragua</option>
          <option value="NE" countrynum="227">Niger</option>
          <option value="NG" countrynum="234">Nigeria</option>
          <option value="NU" countrynum="683">Niue</option>
          <option value="NF" countrynum="672">Norfolk Island</option>
          <option value="KP" countrynum="850">North Korea</option>
          <option value="MP" countrynum="1670">Northern Mariana Islands</option>
          <option value="NO" countrynum="47">Norway</option>
          <option value="OM" countrynum="968">Oman</option>
          <option value="Other" countrynum="">Other Country</option>
          <option value="PK" countrynum="92">Pakistan</option>
          <option value="PW" countrynum="680">Palau</option>
          <option value="PS" countrynum="970">Palestine</option>
          <option value="PA" countrynum="507">Panama</option>
          <option value="PG" countrynum="675">Papua New Guinea</option>
          <option value="PY" countrynum="595">Paraguay</option>
          <option value="PE" countrynum="51">Peru</option>
          <option value="PH" countrynum="63">Philippines</option>
          <option value="PN" countrynum="872">Pitcairn</option>
          <option value="PL" countrynum="48">Poland</option>
          <option value="PT" countrynum="351">Portugal</option>
          <option value="PR" countrynum="1-787">Puerto Rico</option>
          <option value="QA" countrynum="974">Qatar</option>
          <option value="RE" countrynum="262">Reunion</option>
          <option value="RO" countrynum="40">Romania</option>
          <option value="RU" countrynum="7">Russian Federation</option>
          <option value="RW" countrynum="250">Rwanda</option>
          <option value="BLM" countrynum="590">Saint Barthelemy</option>
          <option value="KN" countrynum="1">Saint Kitts and Nevis</option>
          <option value="LC" countrynum="1">Saint Lucia</option>
          <option value="MAF" countrynum="590">Saint Martin</option>
          <option value="VC" countrynum="1">Saint Vincent and the Grenadines</option>
          <option value="WS" countrynum="685">Samoa</option>
          <option value="SM" countrynum="378">San Marino</option>
          <option value="ST" countrynum="239">Sao Tome and Principe</option>
          <option value="SA" countrynum="966">Saudi Arabia</option>
          <option value="SCT" countrynum="">Scotland</option>
          <option value="SN" countrynum="221">Senegal</option>
          <option value="SRB" countrynum="381">Serbia</option>
          <option value="SC" countrynum="248">Seychelles</option>
          <option value="SL" countrynum="232">Sierra Leone</option>
          <option value="SG" countrynum="65">Singapore</option>
          <option value="SK" countrynum="421">Slovakia (Slovak Republic)</option>
          <option value="SI" countrynum="386">Slovenia</option>
          <option value="SB" countrynum="677">Solomon Islands</option>
          <option value="SO" countrynum="252">Somalia</option>
          <option value="SOM" countrynum="252" selected="">Kenya</option>
          <option value="ZA" countrynum="27">South Africa</option>
          <option value="SGS" countrynum="44">South Georgia and the South Sandwich Islands</option>
          <option value="KR" countrynum="82">South Korea</option>
          <option value="SS" countrynum="">South Sudan</option>
          <option value="ES" countrynum="34">Spain</option>
          <option value="LK" countrynum="94">Sri Lanka</option>
          <option value="SH" countrynum="290">St. Helena</option>
          <option value="PM" countrynum="508">St. Pierre and Miquelon</option>
          <option value="SD" countrynum="249">Sudan</option>
          <option value="SR" countrynum="597">Suriname</option>
          <option value="SJ" countrynum="47">Svalbard and Jan Mayen Islands</option>
          <option value="SZ" countrynum="268">Swaziland</option>
          <option value="SE" countrynum="46">Sweden</option>
          <option value="CH" countrynum="41">Switzerland</option>
          <option value="SY" countrynum="963">Syrian Arab Republic</option>
          <option value="TW" countrynum="886">Taiwan</option>
          <option value="TJ" countrynum="992">Tajikistan</option>
          <option value="TZ" countrynum="255">Tanzania</option>
          <option value="TH" countrynum="66">Thailand</option>
          <option value="TLS" countrynum="670">Timor-Leste</option>
          <option value="TG" countrynum="228">Togo</option>
          <option value="TK" countrynum="690">Tokelau</option>
          <option value="TO" countrynum="676">Tonga</option>
          <option value="TT" countrynum="1-868">Trinidad and Tobago</option>
          <option value="TN" countrynum="216">Tunisia</option>
          <option value="TR" countrynum="90">Turkey</option>
          <option value="TM" countrynum="993">Turkmenistan</option>
          <option value="TC" countrynum="1-649">Turks and Caicos Islands</option>
          <option value="TV" countrynum="688">Tuvalu</option>
          <option value="UG" countrynum="256">Uganda</option>
          <option value="UA" countrynum="380">Ukraine</option>
          <option value="AE" countrynum="971">United Arab Emirates</option>
          <option value="UK" countrynum="44">United Kingdom</option>
          <option value="US" countrynum="1">United States</option>
          <option value="UM" countrynum="1">United States Minor Outlying Islands</option>
          <option value="UY" countrynum="598">Uruguay</option>
          <option value="UZ" countrynum="998">Uzbekistan</option>
          <option value="VU" countrynum="678">Vanuatu</option>
          <option value="VA" countrynum="39">Vatican City State (Holy See)</option>
          <option value="VE" countrynum="58">Venezuela</option>
          <option value="VN" countrynum="84">Vietnam</option>
          <option value="VG" countrynum="1284">Virgin Islands (British)</option>
          <option value="VI" countrynum="1340">Virgin Islands (U.S.)</option>
          <option value="WF" countrynum="681">Wallis And Futuna Islands</option>
          <option value="EH" countrynum="685">Western Sahara</option>
          <option value="YE" countrynum="967">Yemen</option>
          <option value="YU" countrynum="381">Yugoslavia</option>
          <option value="ZM" countrynum="260">Zambia</option>
          <option value="EAZ" countrynum="255">Zanzibar</option>
          <option value="ZW" countrynum="263">Zimbabwe</option>
                            </select>
                            <div class="clearfix space20"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name </label>
                                    <input name="fname" class="form-control" placeholder="" value="<?php if(!empty($r['firstname'])){ echo $r['firstname']; } elseif(isset($fname)){ echo $fname; } ?>" type="text">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name </label>
                                    <input name="lname" class="form-control" placeholder="" value="<?php if(!empty($r['lastname'])){ echo $r['lastname']; }elseif(isset($lname)){ echo $lname; } ?>" type="text">
                                </div>
                            </div>
                            <div class="clearfix space20"></div>
                            <label>Company Name</label>
                            <input name="company" class="form-control" placeholder="" value="<?php if(!empty($r['company'])){ echo $r['company']; }elseif(isset($company)){ echo $company; } ?>" type="text">
                            <div class="clearfix space20"></div>
                            <label>Address </label>
                            <input name="address1" class="form-control" placeholder="Street address" value="<?php if(!empty($r['address1'])){ echo $r['address1']; } elseif(isset($address1)){ echo $address1; } ?>" type="text">
                            <div class="clearfix space20"></div>
                            <input name="address2" class="form-control" placeholder="Apartment, suite, unit etc. (optional)" value="<?php if(!empty($r['address2'])){ echo $r['address2']; }elseif(isset($address2)){ echo $address2; } ?>" type="text">
                            <div class="clearfix space20"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>City </label>
                                    <input name="city" class="form-control" placeholder="City" value="<?php if(!empty($r['city'])){ echo $r['city']; }elseif(isset($city)){ echo $city; } ?>" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label>State</label>
                                    <input name="state" class="form-control" value="<?php if(!empty($r['state'])){ echo $r['state']; }elseif(isset($state)){ echo $state; } ?>" placeholder="State" type="text">
                                </div>
                                <div class="col-md-4">
                                    <label>Postcode </label>
                                    <input name="zipcode" class="form-control" placeholder="Postcode / Zip" value="<?php if(!empty($r['zip'])){ echo $r['zip']; }elseif(isset($zip)){ echo $zip; } ?>" type="text">
                                </div>
                            </div>
                            <div class="clearfix space20"></div>
                            <label>Phone </label>
                            <input name="phone" class="form-control" id="billing_phone" placeholder="" value="<?php if(!empty($r['mobile'])){ echo $r['mobile']; }elseif(isset($phone)){ echo $phone; } ?>" type="text">
                        
                    </div>
                </div>
                
            </div>
            
            <div class="space30"></div>
            <h4 class="heading">Your order</h4>
            
            <table class="table table-bordered extra-padding">
                <tbody>
                        <?php
                    //print_r($cart);
                $total = 0;
                    foreach ($cart as $key => $value) {
                        //echo $key . " : " . $value['quantity'] ."<br>";
                        $cartsql = "SELECT * FROM products WHERE product_id=$key";
                        $cartres = mysqli_query($con, $cartsql);
                        $cartr = mysqli_fetch_assoc($cartres);

                    
                 ?>
                    <?php 
                    $total = $total + ($cartr['product_price']*$value['quantity']);
                } ?>
                    <tr>
                        <th>Cart Subtotal</th>
                        <td><span class="amount">Kshs:<?php echo number_format($total, 2) ;?></span></td>
                    </tr>
                    <tr>
                        <th>Shipping and Handling</th>
                        <td>
                            Free Shipping               
                        </td>
                    </tr>
                    <tr>
                        <th>Order Total</th>
                        <td><strong><span class="amount">Kshs:<?php echo number_format($total, 2) ;?></span></strong> </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="clearfix space30"></div>
            <h4 class="heading">Payment Method</h4>
            <div class="clearfix space20"></div>
            
            <div class="payment-method">
                <div class="row">
                    
                        <div class="col-md-4">
                            <input name="payment" id="radio1" class="css-checkbox" type="radio" value="cod"><span>Cash On Delivery</span>
                            <div class="space20"></div>
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
                        </div>
                        <div class="col-md-4">
                            <input name="payment" id="radio2" class="css-checkbox" type="radio"><span value="cheque">Cheque Payment</span>
                            <div class="space20"></div>
                            <p>Please send your cheque to SAMAKO Enterprices, Malaba Road, KITALE, KENYA</p>
                        </div>
                        <div class="col-md-4">
                            <input name="payment" id="radio3" class="css-checkbox" type="radio"><span value="paypal">Paypal</span>
                            <div class="space20"></div>
                            <p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account</p>
                        </div>
                    
                </div>
                <div class="space30"></div>
                
                    <input name="agree" id="checkboxG2" class="css-checkbox" type="checkbox" value="true"><span>I've read and accept the <a href="#">terms &amp; conditions</a></span>
                
                <div class="space30"></div>
                <input type="submit" class="button btn-lg" value="Pay Now">
            </div>
        </div>      
</form>     
        </div>
    </section>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-12 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
      <?php include 'layout/footer.php';?>



    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>


</body>

</html>