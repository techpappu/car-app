@extends('frontend.home.layout')
@section('title', 'Conatct Us')
@push('css')
    <link href="https://www.jquery-az.com/jquery/css/intlTelInput/demo.css" rel="stylesheet" />
    <link href="https://www.jquery-az.com/jquery/css/intlTelInput/intlTelInput.css" rel="stylesheet" />
    <style>
        .contact-step {
            text-align: center;
        }

        .title {
            font-weight: bold;
            margin-top: 53px;
            font-size: 24px;
            font-size: 2.4rem;
        }

        .wcm {
            margin: auto;
            padding: 0 25px;
        }

        .txt01 {
            max-width: 605px;
            margin: 24px auto 0;
            line-height: 24px;
            font-size: 16px;
            font-size: 1.6rem;
        }

        .main-contact {
            background: #F4F4F4;
            padding: 30px 0 46px;
            margin-top: 10px;
        }

        .block-main {
            max-width: 630px;
            margin: 0 auto;
        }

        .ttl1 {
            max-width: 168px;
            width: 100%;
            font-weight: bold;
            position: relative;
            /*  padding-left: 8px;
                            letter-spacing: 0.4px;
                            font-size: 16px;
                            font-size: 1.6rem; */
            text-align: right;
            white-space: nowrap;
            margin-top: 4px;
        }


        .block-input {
            width: calc(100% - 104px);
            float: right;
        }

        flag.jp {
            background: url(../../img/contactus/icn_japan.svg) no-repeat center;
        }

        .btn_submit {
            min-width: 300px;
            font-size: 20px;
            border: none !important;
        }

        .no-confirm {
            background: #ccc;
            pointer-events: none;
        }

        .intl-tel-input {
            position: relative;
            display: block;

        }

        .intl-tel-input.allow-dropdown input, .intl-tel-input.allow-dropdown input[type=text], .intl-tel-input.allow-dropdown input[type=tel], .intl-tel-input.separate-dial-code input, .intl-tel-input.separate-dial-code input[type=text], .intl-tel-input.separate-dial-code input[type=tel] {
    padding-right: 6px;
    padding-left: 7px;
    margin-left: 0;
    width: 150px;
}

        #is_received_news {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: block;
            opacity: 1;
            width: 30px;
            height: 30px;
           /*  z-index: 99999; */
            cursor: pointer;
        }

        #is_agreed {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: block;
            opacity: 1;
            width: 30px;
            height: 30px;
          /*   z-index: 99999; */
            cursor: pointer;
        }

        .cmn-checkbox {
            margin: 3px 0 35px 50px;
            position: relative;
            margin-bottom: 8px;
            letter-spacing: 0.3px;
            left: -22px;
        }

        .ui-form-3 .form-control {
            margin-bottom: 19px;
            padding-top: 10px;
        }

        .col-md-2 {
            position: relative;
            min-height: 1px;
            padding-left: 0px;
            padding-right: 0px;
        }

        .agree00 {
            margin-right: 130px;
            margin-top: 7px;
        }

        .agree {
            margin-right: 250px;
        }

        .sbnButton {
            min-width: 300px;
            margin-top: 20px;
            left: -100px;
        }


        @media only screen and (max-width: 767px) {
            .contactus .main-contact .block-main .block-input .cmn-checkbox label {
                padding-left: 19px;
            }
        }

        @media only screen and (max-width: 767px) {
            .cmn-checkbox {
                margin: -6px 0 42px -69px !important;
            }

            .agree00 {
                margin-right: 0px;
            }

            .agree {
                margin-right: 120px !important;
            }
        }
    </style>
@endpush

@section('content')
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">Contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end .b-title-page-->
    <div class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="icon fa fa-home"></i></a>
                        </li>
                        <li>Contact Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container contact-step">
        <div class="wcm">

            <h2 class="title">Thank you very much for contacting us.</h2>
            <p class="txt01">
                KMC Japan is run by PROTO Corporation, and <a href="http://kmcjapan.co.jp/" target="_blank">KMC Japan
                    Ltd</a>. is entrusted with the operations regarding purchasing and exporting. <br>As KMC Japan Ltd.
                handles your inquiry, PROTO Corporation provides your contact details and personal information for KMC Japan
                LTD.
            </p>
            <p class="txt01">
                Please send us your support requests from the following request form.
            </p>
        </div>

        <section class="main-contact">
            <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
            <div class="alert alert-success" id="alertsuccess"></div>
            <div class="wcm">
                <div class="block-main">
                    <form class="ui-form-3" id="contactForm" action="#" method="post">
                        @csrf
                        <input type="hidden" name="contactType" id="contactType" value="2" />
                        <div class="row">
                            <div class="col-md-2">
                                <p class="ttl1">Name</p>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input class="form-control" id="user_name" type="text" name="user_name"
                                        placeholder="Your Name" required="required" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <p class="ttl1">Company Name</p>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input class="form-control" id="company_name" type="text" name="company_name"
                                        placeholder="Company name" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <p class="ttl1 mask">Country</p>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <select class='form-control' name="country_code" id="country_code" data-width="100%"
                                        required>
                                        <option value="">Please choose your country</option>
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

                        <div class="row">
                            <div class="col-md-2">
                                <p class="ttl1 mask">Email</p>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input class="form-control" id="email" type="text" name="email"
                                        placeholder="Your email" required="required" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <p class="ttl1 mask">Phone</p>
                            </div>
                            <div class="col-md-10">
                                <input type="tel" id="phone" name="phone" placeholder="e.g. +1 702 123 4567"
                                    style="margin-right: 265px">
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-2">
                                <p class="ttl1">
                                    Comment
                                </p>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control" id="comment" name="comment" rows="2" placeholder="Comment"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <p class="ttl1 pc"></p>
                            <div class="block-input">
                                <div class="cmn-checkbox">
                                    <input id="is_received_news" name="is_received_news" type="checkbox" value="1">
                                    <label for="is_received_news" class="agree00">Receive news, coupons and special
                                        deals</label>
                                </div>
                                <div class="cmn-checkbox agree">
                                    <input id="is_agreed" type="checkbox" name="is_agreed" value="1"
                                        class="validate[required] agree_active">
                                    <label for="is_agreed" class="mask" style="margin-top: 7px">I agree to
                                    </label> <a href="/policy/" target="_blank">Privacy Policy</a>
                                </div>
                                <input type="hidden" name="phone_country_name" id="phone_country_name">
                                <input type="hidden" name="phone_country_code" id="phone_country_code">
                                <button type="submit" id="submitBtn" class="btn btn-primary sbnButton">Send</button>
                                <button type="button" class="ajax-load">
                                    <center><img src={{ URL::to('/') }}/ajax-loader2.gif alt="Loading..." /></center>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('js')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script --}}>
    <script src="https://www.jquery-az.com/jquery/js/intlTelInput/intlTelInput.js"></script>
    <script>
        $(document).ready(function() {
            $("div#alertdanger").hide();
            $("div#alertsuccess").hide();
            $(".ajax-load").hide();

        });

        $("#phone").intlTelInput({
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                    init();
                });
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js" // just for formatting/placeholders etc
        });

        function init() {
           // $(".selected-flag").css("width", "150px");
            $(".selected-flag").append($("<div id='country-name'>" + name + "</div>").css({
                "position": "absolute",
                "top": "0",
                "bottom": "0",
                "right": "0",
                "width": "100",
                "display": "flex",
                "align-items": "center",
                "overflow": "hidden",
                "white-space": "nowrap"
            }));
            $("#phone").css({
               // "padding-left": "150px",
               // "width": "300px"
            });
            showCountryAndCode();
        };
        $(".country-list li").click(function() {
            showCountryAndCode();
        });

        function showCountryAndCode() {
            setTimeout(() => {
                let name = $("li.active span.country-name").text();
                name = name.indexOf('(') > 0 ? name.substr(0, name.indexOf('(') - 1) : name;
                const code = $("li.active span.dial-code").text();
                $("#phone_country_name").val(name);
                $("#phone_country_code").val(code);
                $("#phone").val(code + " ");
            }, 0);
        }
        $('#contactForm').on('submit', function(event) {
            event.preventDefault();
            var url = "{{ route('add-contact-us') }}";
            var country = $("#country_code :selected").text();
            var data = $('#contactForm').serialize();
            data = data + "&country=" + country;

            $(".ajax-load").show();
            $('#submitBtn').attr('disabled', 'disabled');
            $.ajax({
                data: data,
                url: url,
                type: "POST",
                dataType: "json",
                success: function(response) {
                    if (response.hasError == false) {
                        $("div#alertdanger").hide();
                        $("div#alertsuccess").show();
                        $("#alertsuccess").text(response.result.status);
                        $(".ajax-load").hide();
                        $('#submitBtn').removeAttr('disabled');
                    } else {
                        $(".ajax-load").hide();
                        $('#submitBtn').removeAttr('disabled');
                        $("div#alertsuccess").hide();
                        $("div#alertdanger").show();
                        $("#alertdanger").text(response.result.status);
                    }

                },
                error: function(er) {
                    $(".ajax-load").hide();
                    $('#submitBtn').removeAttr('disabled');
                    $("div#alertsuccess").hide();
                    $("div#alertdanger").show();
                    $("#alertdanger").text(er.responseJSON.errors.name);
                }
            });
        });
    </script>
@endpush
