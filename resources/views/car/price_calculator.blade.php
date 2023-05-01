@extends('layouts.backend.app')
@section('title', 'Price Calculator')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">

@endpush
@section('content')
    <h3>Car Price Calculator</h3>

    <!-- Button trigger modal -->
    <div class="modal-header">
        <button type="button" id="_add" class="btn btn-primary mr-auto" style="float: right" data-toggle="modal"
            data-target="#priceCalculatorModal">Add New
        </button>
    </div>
    <div class="clearfix"></div>
    <!-- Modal -->
    <div class="modal fade" id="priceCalculatorModal" tabindex="-1" role="dialog" aria-labelledby="priceCalculatorModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class='col-12 modal-title text-center'>Add Price Calculator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
                <div class="alert alert-success" id="alertsuccess"></div>
                <form action="" id="price_calculator_form" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="text" id="id" name="id" style="display: none" />
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class='form-control' name="country" id="country" required>
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
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="port">Destination Port</label>
                            <input type="text" name="port" class="form-control is-invalid" id="port"
                                placeholder="Destination port" required>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="delivery_charge">Delivery Charge</label>
                            <input type="text" name="delivery_charge" class="form-control is-invalid" id="delivery_charge"
                                placeholder="Delivery Charge" required>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="marine_insurance">Marine insurance</label>
                            <input type="text" name="marine_insurance" class="form-control is-invalid" id="marine_insurance"
                                placeholder="Marine insurance" required>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="pre_export_inspection">Pre export inspection</label>
                            <input type="text" name="pre_export_inspection" class="form-control is-invalid"
                                id="pre_export_inspection" placeholder="Marine insurance" required>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submitBtn" class="btn btn-primary">SUBMIT</button>
                            <button type="button" class="ajax-load">
                                <center><img src={{ URL::to('/') }}/ajax-loader2.gif alt="Loading..." /></center>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">

                <div class="x_content">
                    <div id="table_data">
                        @include('car.price_calculator_pagination_data')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>
    <script>
        $('#_add').click(function() {
            $("div#alertdanger").hide();
            $("div#alertsuccess").hide();
            $('#price_calculator_form')[0].reset();

        });

        $(document).ready(function() {
            $("div#alertdanger").hide();
            $("div#alertsuccess").hide();
            $(".ajax-load").hide();
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });



        });

        function fetch_data(page) {
            $.ajax({
                url: "/admin/car/price-calculator/fetchbyPage?page=" + page,
                success: function(data) {
                    $('#table_data').html(data);
                }
            });
        }
        $('#price_calculator_form').on('submit', function(event) {
            event.preventDefault();
            var id = $("#id").val();
            var url = "{{ route('price-calculator.add') }}";
            if (id) {
                url = "{{ route('price-calculator.update') }}";
            }

            $(".ajax-load").show();
            $('#submitBtn').attr('disabled', 'disabled');
            $.ajax({
                data: $('#price_calculator_form').serialize(),
                url: url,
                type: "POST",
                dataType: "json",

                success: function(response) {
                    console.log(response);
                    if (response.hasError == false) {
                        $("div#alertdanger").hide();
                        $("div#alertsuccess").show();
                        $("#alertsuccess").text(response.result.status);
                        $(".ajax-load").hide();
                        $('#submitBtn').removeAttr('disabled');
                        fetch_data(1);
                    } else {
                        $(".ajax-load").hide();
                        $('#submitBtn').removeAttr('disabled');
                        $("div#alertsuccess").hide();
                        $("div#alertdanger").show();
                        $("#alertdanger").text(response.result.status);
                    }

                },
                error: function(er) {
                    console.log(er);
                    $(".ajax-load").hide();
                    $('#submitBtn').removeAttr('disabled');
                    $("div#alertsuccess").hide();
                    $("div#alertdanger").show();
                    $("#alertdanger").text(er.responseJSON.message);
                }
            });
        });

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: "/admin/car/price-calculator/show/" + id,
                dataType: "json",
                success: function(response) {
                    $("div#alertdanger").hide();
                    $("div#alertsuccess").hide();
                    $('#id').val(response.data.id);
                    $('#country').val(response.data.country);
                    $('#port').val(response.data.port);
                    $('#delivery_charge').val(response.data.delivery_charge);
                    $('#marine_insurance').val(response.data.marine_insurance);
                    $('#pre_export_inspection').val(response.data.pre_export_inspection);
                    $('.modal-title').text("Edit Price Calculator");
                    $('#priceCalculatorModal').modal('show');
                }
            });
        });

        $(document).on('click', '.delete', function() {
            id = $(this).attr('id');
            swal({
                title: "Are you sure?",
                text: "To delete this Info!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            }).then(
                function() {
                    $.ajax({
                        type: 'get',
                        url: '/admin/car/price-calculator/delete/' + id,
                        cache: false,
                        success: function(response) {
                            if (response.hasError == false) {
                                fetch_data(1);
                            }

                        }
                    });
                },
                function() {
                    return false;
                });
        });
    </script>
@endpush
