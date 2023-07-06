@extends('frontend.home.layout')
@section('title', 'My Profile')
@push('css')
<link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />

<style>
    .form-control {
        display: block;
        width: 100%;
        background-color: #fff;
        background-image: none;
        border: 1px solid #eaeaeb;
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        margin-bottom: 20px;
        padding: 0px 16px 0px;
        color: #222;
        font-size: 14px;
        font-family: Hind;
    }
</style>
@endpush

@section('content')
<div class="section-title-page area-bg area-bg_dark area-bg_op_70">
    <div class="area-bg__inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="b-title-page bg-primary_a">My Profile</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" style="margin: 0 auto;">

        <div class="col-md-12" style="background: #F4F4F4;padding: 20px;">
            <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
            <div class="alert alert-success" id="alertsuccess"></div>
            <form class="ui-form-3" action="#" method="post" id="profileForm" enctype="multipart/form-data" style="margin-top: 15px;">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" id="user_country" value="{{ Auth::user()->country }}"/>
                        <input type="hidden" id="user_port" value="{{ Auth::user()->port }}"/>
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="Your first name" value="{{ Auth::user()->name }}" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" id="address_line_1" type="text" name="address_line_1" placeholder="Address" value="{{ Auth::user()->address_line_1 }}"/>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input class="form-control" id="city" type="text" name="city" placeholder="Your city" value="{{ Auth::user()->city }}"/>
                        </div>
                        <div class="form-group">
                            <label>Zipe code</label>
                            <input class="form-control" id="zipe_code" type="text" name="zipe_code" placeholder="Zipe code" value="{{ Auth::user()->zipe_code }}"/>
                        </div>
                        <div class="form-group">
                            <label>Port</label>
                            <select class='form-control' name="port" id="port" data-width="100%">
                                <option value="">Select port</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" id="last_name" type="text" name="last_name" placeholder="Your last name" value="{{ Auth::user()->last_name }}" />
                        </div>
                        <div class="form-group">
                            <label>Address (contd)</label>
                            <input class="form-control" id="address_line_2" type="text" name="address_line_2" placeholder="Address(contd)" value="{{ Auth::user()->address_line_2 }}"/>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input class="form-control" id="state" type="text" name="state" placeholder="Your state" value="{{ Auth::user()->state }}"/>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <select class='form-control' name="country" id="country" data-width="100%">
                                <option value="">Country</option>
                                <option value="AW">Aruba</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="AD">Andorra</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AS">American Samoa</option>
                                <option value="AQ">Antarctica</option>
                                <option value="TF">French Southern and Antarctic Lands</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BI">Burundi</option>
                                <option value="BE">Belgium</option>
                                <option value="BJ">Benin</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BH">Bahrain</option>
                                <option value="BS">Bahamas</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BL">Saint Barthélemy</option>
                                <option value="BY">Belarus</option>
                                <option value="BZ">Belize</option>
                                <option value="BM">Bermuda</option>
                                <option value="BO">Bolivia</option>
                                <option value="BR">Brazil</option>
                                <option value="BB">Barbados</option>
                                <option value="BN">Brunei</option>
                                <option value="BT">Bhutan</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BW">Botswana</option>
                                <option value="CF">Central African Republic</option>
                                <option value="CA">Canada</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CH">Switzerland</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CI">Ivory Coast</option>
                                <option value="CM">Cameroon</option>
                                <option value="CD">DR Congo</option>
                                <option value="CG">Republic of the Congo</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CV">Cape Verde</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CX">Christmas Island</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DE">Germany</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DK">Denmark</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="DZ">Algeria</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="ER">Eritrea</option>
                                <option value="EH">Western Sahara</option>
                                <option value="ES">Spain</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FI">Finland</option>
                                <option value="FJ">Fiji</option>
                                <option value="FK">Falkland Islands</option>
                                <option value="FR">France</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FM">Micronesia</option>
                                <option value="GA">Gabon</option>
                                <option value="GB">United Kingdom</option>
                                <option value="GE">Georgia</option>
                                <option value="GG">Guernsey</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GN">Guinea</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GM">Gambia</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="GR">Greece</option>
                                <option value="GD">Grenada</option>
                                <option value="GL">Greenland</option>
                                <option value="GT">Guatemala</option>
                                <option value="GF">French Guiana</option>
                                <option value="GU">Guam</option>
                                <option value="GY">Guyana</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="HN">Honduras</option>
                                <option value="HR">Croatia</option>
                                <option value="HT">Haiti</option>
                                <option value="HU">Hungary</option>
                                <option value="ID">Indonesia</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IN">India</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="IE">Ireland</option>
                                <option value="IR">Iran</option>
                                <option value="IQ">Iraq</option>
                                <option value="IS">Iceland</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="JP">Japan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="KH">Cambodia</option>
                                <option value="KI">Kiribati</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="KR">South Korea</option>
                                <option value="XK">Kosovo</option>
                                <option value="KW">Kuwait</option>
                                <option value="LA">Laos</option>
                                <option value="LB">Lebanon</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="LS">Lesotho</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="LV">Latvia</option>
                                <option value="MO">Macau</option>
                                <option value="MF">Saint Martin</option>
                                <option value="MA">Morocco</option>
                                <option value="MC">Monaco</option>
                                <option value="MD">Moldova</option>
                                <option value="MG">Madagascar</option>
                                <option value="MV">Maldives</option>
                                <option value="MX">Mexico</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MK">Macedonia</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MM">Myanmar</option>
                                <option value="ME">Montenegro</option>
                                <option value="MN">Mongolia</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MS">Montserrat</option>
                                <option value="MQ">Martinique</option>
                                <option value="MU">Mauritius</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="YT">Mayotte</option>
                                <option value="NA">Namibia</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NE">Niger</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="NG">Nigeria</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NU">Niue</option>
                                <option value="NL">Netherlands</option>
                                <option value="NO">Norway</option>
                                <option value="NP">Nepal</option>
                                <option value="NR">Nauru</option>
                                <option value="NZ">New Zealand</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PA">Panama</option>
                                <option value="PN">Pitcairn Islands</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PW">Palau</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PL">Poland</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="KP">North Korea</option>
                                <option value="PT">Portugal</option>
                                <option value="PY">Paraguay</option>
                                <option value="PS">Palestine</option>
                                <option value="PF">French Polynesia</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Réunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russia</option>
                                <option value="RW">Rwanda</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SD">Sudan</option>
                                <option value="SN">Senegal</option>
                                <option value="SG">Singapore</option>
                                <option value="GS">South Georgia</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SV">El Salvador</option>
                                <option value="SM">San Marino</option>
                                <option value="SO">Somalia</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="RS">Serbia</option>
                                <option value="SS">South Sudan</option>
                                <option value="ST">São Tomé and Príncipe</option>
                                <option value="SR">Suriname</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SE">Sweden</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SX">Sint Maarten</option>
                                <option value="SC">Seychelles</option>
                                <option value="SY">Syria</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TD">Chad</option>
                                <option value="TG">Togo</option>
                                <option value="TH">Thailand</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TK">Tokelau</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TV">Tuvalu</option>
                                <option value="TW">Taiwan</option>
                                <option value="TZ">Tanzania</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="UM">United States Minor Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="US">United States</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VA">Vatican City</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="VE">Venezuela</option>
                                <option value="VG">British Virgin Islands</option>
                                <option value="VI">United States Virgin Islands</option>
                                <option value="VN">Vietnam</option>
                                <option value="VU">Vanuatu</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="WS">Samoa</option>
                                <option value="YE">Yemen</option>
                                <option value="ZA">South Africa</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        </div>

                    </div>

                </div>

                <h3>Phone</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" style="margin-top: 25px;">
                            <input type="radio" id="choice1" name="choice" value="choice1"/>
                            <label for="choice1">Default</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact name</label>
                            <input class="form-control" id="name_1" type="text" name="name_1" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact number</label>
                            <input class="form-control" id="number_1" type="text" name="number_1" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact type</label>
                            <select class='form-control' name="type_1" id="type_1" data-width="100%">
                                <option value="comapny">Company</option>
                                <option value="mobile">Mobile</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" style="margin-top: 25px;">
                            <input type="radio" id="choice2" name="choice" value="choice2"/>
                            <label for="choice2">Default</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact name</label>
                            <input class="form-control" id="name_2" type="text" name="name_2" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact number</label>
                            <input class="form-control" id="number_2" type="text" name="number_2" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact type</label>
                            <select class='form-control' name="type_2" id="type_2" data-width="100%">
                                <option value="comapny">Company</option>
                                <option value="mobile">Mobile</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" style="margin-top: 25px;">
                            <input type="radio" id="choice3" name="choice" value="choice3"/>
                            <label for="choice3">Default</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact name</label>
                            <input class="form-control" id="name_3" type="text" name="name_3" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact number</label>
                            <input class="form-control" id="number_3" type="text" name="number_3" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact type</label>
                            <select class='form-control' name="type_3" id="type_3" data-width="100%">
                                <option value="comapny">Company</option>
                                <option value="mobile">Mobile</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <label>Change email</label> <button type="button" class="toggleEmailBtn span1" style="margin-left: 10px;background: #e9dede;"><i class="icon-plus"></i></button>
                        <div id="changeEmail" style="display: none">
                            <label for="currentEmail">
                                Current email
                            </label>
                            <input class="form-control" type="email" name="currentEmail" id="currentEmail" placeholder="Enter your email" value="{{ Auth::user()->email }}" readonly>
                            <label for="currentPasswordInEmail">
                                Password
                            </label>
                            <input class="form-control" type="password" name="currentPasswordInEmail" id="currentPasswordInEmail" placeholder="Enter your password">
                            <label for="newEmail">
                                New email
                            </label>
                            <input class="form-control" type="email" name="newEmail" id="newEmail" placeholder="Enter your new email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Change password</label> <button type="button" class="togglePasswordBtn span1" style="margin-left: 10px;background: #e9dede;"><i class="icon-plus"></i></button>
                        <div id="changePassword" style="display: none;">
                            <label for="currentPassword">
                                Current password
                            </label>
                            <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="Enter your current password">
                            <label for="currentPassword">
                                New password
                            </label>
                            <input class="form-control" type="password" name="newPassword" id="newPassword" placeholder="Enter new password">
                            <label for="confirmPassword">
                                Confirm password
                            </label>
                            <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm password">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="">
                            Profile picture
                        </label>

                        <div class="text-center">
                            <img src="{{ config('constant.profile_image_base_url') . '/images/' . Auth::user()->image }}" style="width: 180px;height: 180px; object-fit: cover" class="avatar img-circle img-thumbnail" alt="avatar">
                            <input type="file" class="text-center center-block file-upload" name="image" id="image">
                        </div>
                    </div>

                </div>
                <div class="col-md-12" style="text-align: center">
                    <br>
                    <button id="submitBtn" class="btn btn-lg btn-primary" type="submit" style="width: 100px; margin-bottom: 2px"><i class="glyphicon glyphicon-ok-sign"></i>
                        Update</button>
                    <button type="button" class="ajax-load">
                        <center><img src={{ URL::to('/') }}/ajax-loader2.gif alt="Loading..." /></center>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>







@endsection

@push('js')
<script>
    $(document).ready(function() {
        $("div#alertdanger").hide();
        $("div#alertsuccess").hide();
        $(".ajax-load").hide();
        $(".toggleEmailBtn").on('click', function() {

            $(this).children('.icon-minus, .icon-plus').toggleClass("icon-minus icon-plus");
            if ($(this).children().is('.icon-plus')) {
                $("#changeEmail").hide();
            } else {
                $("#changeEmail").show();
            }

        });

        $(".togglePasswordBtn").on('click', function() {

            $(this).children('.icon-minus, .icon-plus').toggleClass("icon-minus icon-plus");
            if ($(this).children().is('.icon-plus')) {
                $("#changePassword").hide();
            } else {
                $("#changePassword").show();
            }

        });


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function() {
            readURL(this);
        });
        getUserContacts();
        var user_country = $("#user_country").val();
        $('#country').val(user_country);
        if (user_country) {
            getPortByCountry(user_country);
        }
       
    });

    $('#profileForm').on('submit', function(event) {
        event.preventDefault();

        var url = "{{ route('profile-update') }}";

        var formdata = new FormData(this);
        $(".ajax-load").show();
        $('#submitBtn').attr('disabled', 'disabled');
        $.ajax({
            url: url,
            type: 'POST',
            data: formdata,
            mimeTypes: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,

            success: function(response) {
                //console.log(response);
                if (response.hasError == false) {
                    $("div#alertdanger").hide();
                    $("div#alertsuccess").show();
                    $("#alertsuccess").text(response.result.status);
                    $(".ajax-load").hide();
                    $('#submitBtn').removeAttr('disabled');
                    resetField();

                } else {
                    $(".ajax-load").hide();
                    $('#submitBtn').removeAttr('disabled');
                    $("div#alertsuccess").hide();
                    $("div#alertdanger").show();
                    $("#alertdanger").text(response.result.status);
                }
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            },
            error: function(er) {
                $(".ajax-load").hide();
                $('#submitBtn').removeAttr('disabled');
                $("div#alertsuccess").hide();
                $("div#alertdanger").show();
                $("#alertdanger").text(er.responseJSON.message);
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            }
        });
    });

    function resetField() {
        $("#currentPasswordInEmail").val("");
        $("#newEmail").val("");
        $("#currentPassword").val("");
        $("#newPassword").val("");
        $("#confirmPassword").val("");
    }


    $('#country').change(function() {
            var country = $(this).val();
            if (country) {
                getPortByCountry(country);
            } else {
              
               
                $("#port").empty();
                $("#port").append('<option value="">Select port</option>');             
              
            }

        });

        function getPortByCountry(country) {
            $.ajax({
                type: "get",
                url: "/port-list/" + country,
                success: function(res) {
                    if (res) {
                        $("#port").empty();
                        $("#port").append('<option value="">Select port</option>');
                        var user_port = $("#user_port").val();
                        res.data.forEach(function(ports) {
                            if(user_port && user_port == ports.port){
                                $("#port").append('<option value="' + ports.port + '" selected>' + ports.port +
                                '</option>');
                            }else{
                                $("#port").append('<option value="' + ports.port + '">' + ports.port +
                                '</option>');
                            }
                         
                        });
                        
                       
                    }
                }
            });
        }

        function getUserContacts() {
            $.ajax({
                type: "get",
                url: "/user/contacts",
                success: function(res) {
                    console.log(res);
                    if (res) {
                      
                       var i = 0;
                        res.forEach(function(contacts) {
                            i = i+1;
                            if(contacts.active == 1){
                                $("#choice"+i).prop("checked", true);
                            }
                            $("#name_"+i).val(contacts.name);
                            $("#number_"+i).val(contacts.number);
                            $("#type_"+i).val(contacts.type);
                        });
                        
                       
                    }
                }
            });
        }
</script>
@endpush