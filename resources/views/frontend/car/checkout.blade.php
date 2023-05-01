@extends('frontend.home.layout')
@section('title', 'Cart Checkout')
@push('css')
    <link href="https://www.jquery-az.com/jquery/css/intlTelInput/demo.css" rel="stylesheet" />
    <link href="https://www.jquery-az.com/jquery/css/intlTelInput/intlTelInput.css" rel="stylesheet" />
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 0 !important;
            background-color: #000000;
        }

        .modal-dialog {
            position: absolute;
            top: 50% !important;
            transform: translate(0, -50%) !important;
            -ms-transform: translate(0, -50%) !important;
            -webkit-transform: translate(0, -50%) !important;
            margin: auto 5%;
            width: 40%;
            height: 60%;
        }

        .modal-content {
            min-height: 100%;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .modal-body {
            position: absolute;
            top: 45px;
            bottom: 45px;
            left: 0;
            right: 0;
            overflow-y: auto;
        }

        .modal-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .delivery__location--title {
            font-size: 110%;
            color: #333333;
        }

        .delivery__location--home {
            margin-left: 20px;
        }

        .delivery__location--office {
            margin-left: 22px;
        }

        .delivery__location label {
            font-size: 110%;
        }

        .delivery__location input[type='radio']:checked,
        .delivery__location input[type='radio']:not(:checked) {
            position: absolute;
            left: -9999px;
        }

        .delivery__location input[type='radio']:checked+label,
        .delivery__location input[type='radio']:not(:checked)+label {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            line-height: 20px;
            display: inline-block;
            color: #333333;
        }

        .delivery__location input[type='radio']:checked+label:before,
        .delivery__location input[type='radio']:not(:checked)+label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 22px;
            height: 22px;
            border: 2px solid #0397d3;
            border-radius: 100%;
            background-color: #FFFFFF;
        }

        .delivery__location input[type='radio']:checked+label:after,
        .delivery__location input[type='radio']:not(:checked)+label:after {
            content: '';
            width: 12px;
            height: 12px;
            background: #0397d3;
            position: absolute;
            top: 5px;
            left: 5px;
            border-radius: 100%;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }

        .delivery__location input[type='radio']:not(:checked)+label:after {
            opacity: 0;
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        .delivery__location input[type='radio']:checked+label:after {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        .d-flex {
            display: -webkit-flex !important;
            display: -moz-box !important;
            display: flex !important;
        }

        .form-control {
            display: block;
            width: 80%;
            height: 35px;
            padding: 0.375rem 0.75rem;
            font-size: 1.5rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            -webkit-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #9b9d9e;
            opacity: 1;
            /* Firefox */
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }

        .card>hr {
            margin-right: 0;
            margin-left: 0;
        }

        .card>.list-group {
            border-top: inherit;
            border-bottom: inherit;
        }

        .card>.list-group:first-child {
            border-top-width: 0;
            border-top-left-radius: calc(0.25rem - 1px);
            border-top-right-radius: calc(0.25rem - 1px);
        }

        .card>.list-group:last-child {
            border-bottom-width: 0;
            border-bottom-right-radius: calc(0.25rem - 1px);
            border-bottom-left-radius: calc(0.25rem - 1px);
        }

        .card>.card-header+.list-group,
        .card>.list-group+.card-footer {
            border-top: 0;
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .card-title {
            margin-bottom: 0.75rem;
        }

        .card-subtitle {
            margin-top: -0.375rem;
            margin-bottom: 0;
        }

        .card-text:last-child {
            margin-bottom: 0;
        }

        .card-link:hover {
            text-decoration: none;
        }

        .card-link+.card-link {
            margin-left: 1.25rem;
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }

        .card-header:first-child {
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
        }

        .card-footer {
            padding: 0.75rem 1.25rem;
            background-color: rgba(0, 0, 0, 0.03);
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }

        .card-footer:last-child {
            border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
        }

        .card-header-tabs {
            margin-right: -0.625rem;
            margin-bottom: -0.75rem;
            margin-left: -0.625rem;
            border-bottom: 0;
        }

        .card-header-pills {
            margin-right: -0.625rem;
            margin-left: -0.625rem;
        }

        .card-img-overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1.25rem;
            border-radius: calc(0.25rem - 1px);
        }

        .card-img,
        .card-img-top,
        .card-img-bottom {
            -ms-flex-negative: 0;
            flex-shrink: 0;
            width: 100%;
        }

        .card-img,
        .card-img-top {
            border-top-left-radius: calc(0.25rem - 1px);
            border-top-right-radius: calc(0.25rem - 1px);
        }

        .card-img,
        .card-img-bottom {
            border-bottom-right-radius: calc(0.25rem - 1px);
            border-bottom-left-radius: calc(0.25rem - 1px);
        }

        .card-deck .card {
            margin-bottom: 15px;
        }

        @media (min-width: 576px) {
            .card-deck {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
                margin-right: -15px;
                margin-left: -15px;
            }

            .card-deck .card {
                -ms-flex: 1 0 0%;
                flex: 1 0 0%;
                margin-right: 15px;
                margin-bottom: 0;
                margin-left: 15px;
            }
        }

        .card-group>.card {
            margin-bottom: 15px;
        }

        @media (min-width: 576px) {
            .card-group {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-flow: row wrap;
                flex-flow: row wrap;
            }

            .card-group>.card {
                -ms-flex: 1 0 0%;
                flex: 1 0 0%;
                margin-bottom: 0;
            }

            .card-group>.card+.card {
                margin-left: 0;
                border-left: 0;
            }

            .card-group>.card:not(:last-child) {
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
            }

            .card-group>.card:not(:last-child) .card-img-top,
            .card-group>.card:not(:last-child) .card-header {
                border-top-right-radius: 0;
            }

            .card-group>.card:not(:last-child) .card-img-bottom,
            .card-group>.card:not(:last-child) .card-footer {
                border-bottom-right-radius: 0;
            }

            .card-group>.card:not(:first-child) {
                border-top-left-radius: 0;
                border-bottom-left-radius: 0;
            }

            .card-group>.card:not(:first-child) .card-img-top,
            .card-group>.card:not(:first-child) .card-header {
                border-top-left-radius: 0;
            }

            .card-group>.card:not(:first-child) .card-img-bottom,
            .card-group>.card:not(:first-child) .card-footer {
                border-bottom-left-radius: 0;
            }
        }

        .card-columns .card {
            margin-bottom: 0.75rem;
        }

        @media (min-width: 576px) {
            .card-columns {
                -webkit-column-count: 3;
                -moz-column-count: 3;
                column-count: 3;
                -webkit-column-gap: 1.25rem;
                -moz-column-gap: 1.25rem;
                column-gap: 1.25rem;
                orphans: 1;
                widows: 1;
            }

            .card-columns .card {
                display: inline-block;
                width: 100%;
            }
        }

        .accordion {
            overflow-anchor: none;
        }

        .accordion>.card {
            overflow: hidden;
        }

        .accordion>.card:not(:last-of-type) {
            border-bottom: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .accordion>.card:not(:first-of-type) {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .accordion>.card>.card-header {
            border-radius: 0;
            margin-bottom: -1px;
        }

        .form-check {
            position: relative;
            display: block;
            padding-left: 1.25rem;
        }

        .form-check-input {
            position: absolute;
            margin-top: 0.3rem;
            margin-left: -1.25rem !important;
        }

        .form-check-input-address {
            position: absolute;
            margin-top: 0.3rem;
            margin-left: -2.25rem !important;
        }

        .form-check-input[disabled]~.form-check-label,
        .form-check-input:disabled~.form-check-label {
            color: #6c757d;
        }

        .form-check-label {
            margin-bottom: 0;
        }

        .form-check-inline {
            display: -ms-inline-flexbox;
            display: inline-flex;
            -ms-flex-align: center;
            align-items: center;
            padding-left: 0;
            margin-right: 0.75rem;
        }

        .form-check-inline .form-check-input {
            position: static;
            margin-top: 0;
            margin-right: 0.3125rem;
            margin-left: 0;
        }

        .card-body .item .form-check-input: label {
            position: relative;
            padding-left: 35px;
            line-height: 25px;
            display: inline-block;
            color: #333333;
            cursor: pointer;
        }

        .card-body .item .address {
            width: 80%;
        }

        .card-body .item .address p {
            font-size: 100%;
            font-family: "SiyamRupali", sans-serif;
            color: #666666;
        }

        p+p {
            margin-top: 0;
        }

        .card .card-body .payment-item {
            background-color: #fafafa;
            width: 160px;
            height: 80px;
            padding: 20px;
        }

        .mr-3,
        .mx-3 {
            margin-right: 1rem !important;
        }

        .w-100 {
            width: 100% !important;
        }

        .card-body .item {
            padding: 19px 30px;
            border-bottom: 1px solid #e2e2e2;
        }

        .btn-warning {
            color: #ffffff;
            background-color: #f0ad4e;
            border-color: #eea236;
        }

        .scroll {
            max-height: 500px;
            overflow-y: auto;
        }

        .form-control {
            display: block;
            width: 100%;
            height: 35px;
            padding: 0.375rem 0.75rem;
            font-size: 1.5rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            -webkit-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            margin-bottom: -1px;
        }

        .b-calculator__label {
            margin-bottom: 3px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            color: #222;
        }

        .b-calculator__group {
            margin-bottom: 5px !important;
        }

    </style>
@endpush
@section('content')
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">Cart Checkout</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @if (session('cart'))
            <div class="row" style="margin-top: 4px">
                <form id="checkoutForm" action="#" method="post"> 
                <input type="hidden" id="user_country" value="{{ Auth::user()->country }}"/>
                <input type="hidden" id="user_port" value="{{ Auth::user()->port }}"/>                 
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="panel-title">Choose Your Final Destination</h3>
                            </div>
                            <div class="card-body scroll">
                                <div class="col-md-6">
                                    <div class="b-calculator__group">
                                        <select class='form-control' name="country" id="country" data-width="100%"
                                            required="required">
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
                                <div class="col-md-6">
                                    <div class="b-calculator__group">
                                        <select class='form-control' name="port" id="port" data-width="100%"
                                            required="required">
                                            <option value="">Destination Port</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="b-calculator__group">
                                        <input id="marine_insurance" onclick="priceCalculate()" type="checkbox"
                                            name="marine_insurance" style="width: 20px;
                                                    height: 14px;" disabled>
                                        <label for="marine_insurance">Marine Insurance</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="b-calculator__group">
                                        <input id="pre_export_inspection" onclick="priceCalculate()" type="checkbox"
                                            name="pre_export_inspection" style="width: 20px;
                                                    height: 14px;" disabled>
                                        <label for="pre_export_inspection">Pre Export Inspection</label>
                                    </div>
                                </div>


                                <div class="b-calculator__group" style=" margin-left: 15px;">
                                    <div class="b-calculator__label">Your name</div>
                                    <input class="b-calculator__input form-control" id="user-name" type="text"
                                        name="user-name" placeholder="Enter your name" required="required"
                                        value="{{ Auth::user()->name.' '. Auth::user()->last_name}}" />
                                </div>
                                <div class="b-calculator__group" style=" margin-left: 15px;">
                                    <div class="b-calculator__label">Email</div>
                                    <input class="b-calculator__input form-control" id="user-email" type="email"
                                        name="user-email" placeholder="Enter your email" required="required"
                                        value="{{ Auth::user()->email }}" />
                                </div>
                                <div class="b-calculator__group" style=" margin-left: 15px;">
                                    <div class="b-calculator__label">Address</div>
                                    <input class="b-calculator__input form-control" id="user-address" type="text"
                                        name="user-address" placeholder="Your address (Road, City, Country....)"
                                        required="required" value="{{ Auth::user()->name.' '. Auth::user()->address_line_1}}"/>
                                </div>
                                <div class="b-calculator__group" style=" margin-left: 15px;">
                                    <div class="b-calculator__label">Phone number</div>
                                    <input type="tel" id="phone" name="phone" placeholder="e.g. +1 702 123 4567"
                                        required="required">
                                </div>
                                <div class="b-calculator__group" style=" margin-left: 15px;">
                                    <div class="b-calculator__label">Your message</div>
                                    <textarea class="form-control" id="user-message" name="user-message" rows="1"
                                        placeholder="Your message  (Optional)"></textarea>
                                </div>
                                <input type="hidden" name="phone_country_name" id="phone_country_name">
                                <input type="hidden" name="phone_country_code" id="phone_country_code">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="panel-title">Payment method</h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="payment-item w-100 card form-check mr-3">
                                        <input type="radio" class="form-check-input" name="ptype" id="cod" value="0"
                                            style="width: 20px" required="">
                                        <label class="form-check-label" for="cod" style="margin-left: 20px">
                                            <img src="https://th.bing.com/th/id/OIP.9N-n0PqNsZk-4ngob-61zwHaHa?pid=ImgDet&rs=1"
                                                width="50px" alt="cod">
                                            <span class="ml-3">TT payment /Wire Transfer</span>
                                        </label>
                                    </div>


                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="payment-item w-100 card form-check">
                                        <input type="radio" class="form-check-input" name="ptype" id="ssl" value="8"
                                            style="width: 20px" required="">
                                        <label class="form-check-label" for="ssl" style="margin-left: 20px">
                                            <img src="https://franklintndental.com/wp-content/uploads/2015/06/accepted-credit-cards-horizontal.png"
                                                class="ssl-image" alt="ssl" width="280px">
                                        </label>
                                    </div>
                                </div>
                                <div class="justify-content-between align-items-center">
                                    <div style="font-size: 20px; margin-top: 20px; font-weight: bold">For L/C/ TT payment /Wire Transfer</div>
                                   
                                    <div>
                                        <label>Account Name / Receiver</label>
                                    </div>
                                    <div style="margin-top: -6px">
                                        {{$bank->account_name}}
                                    </div>
                                    <div>
                                        <label>Account Number</label>
                                    </div>
                                    <div style="margin-top: -6px">
                                        {{$bank->account_no}}
                                    </div>
                                    <div>
                                        <label>Bank Name</label>
                                    </div>
                                    <div style="margin-top: -6px">
                                        {{$bank->bank_name}}
                                    </div>
                                    <div>
                                        <label>Branch Name</label>
                                    </div>
                                    <div style="margin-top: -6px">
                                        {{$bank->branch_name}}
                                    </div>
                                    <div>
                                        <label>Bank Address</label>
                                    </div>
                                    <div style="margin-top: -6px">
                                        {{$bank->bank_address}}
                                    </div>
                                    <div>
                                        <label>Swift Code</label>
                                    </div>
                                    <div style="margin-top: -6px">
                                        {{$bank->swift_code}}
                                    </div>
                                    <div>
                                        <label>Reason for Remittance</label>
                                    </div>
                                    <div style="margin-top: -6px">
                                        {{$bank->reseason_for_remittance}}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-footer">Footer</div> --}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="panel-title">Checkout Summery</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Subtotal</td>
                                            @php $total = 0 @endphp
                                            @php $quantity = 0 @endphp
                                            @php $cubic_meter = 0 @endphp
                                            @if (session('cart'))
                                                @foreach (session('cart') as $id => $details)
                                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                                    @php $quantity += $details['quantity'] @endphp
                                                    @php $cubic_meter += $details['cubic_meter'] @endphp
                                                @endforeach
                                            @endif
                                            <input type="hidden" id="item_total_price" value="{{ $total }}" />
                                            <input type="hidden" id="total_quantity" value="{{ $quantity }}" />
                                            <input type="hidden" id="cubic_meter" value="{{ $cubic_meter }}" />
                                            <td class="text-right" id="subtotal">
                                                {{ config('constant.currencySymbool') }}{{ $total }}</td>
                                        </tr>


                                      <!--   {{-- <tr style="display: none" id="wrappertr2">
                                            <td id="wrappertext2">Gift Wrap</td>
                                            <td class="text-right" id="wrapper2">20
                                                TK.
                                            </td>
                                        </tr> --}} -->
                                        <tr>
                                            <td id="shippingText">Shipping</td>
                                            <td class="text-right" id="shipping"></td>
                                            <input type="hidden" id="delivery_charge" />
                                        </tr>
                                        <tr>
                                            <td id="marineText">Marine Insurance</td>
                                            <td class="text-right" id="marine"></td>
                                            <input type="hidden" id="marine_insurance_amount" name="marine_insurance_amount" value="0"/>
                    
                                        </tr>
                                        <tr>
                                            <td id="exportText">Pre Ex. Inspection</td>
                                            <td class="text-right" id="preExport"></td>
                                            <input type="hidden" id="pre_export_inspection_amount" name="pre_export_inspection_amount" value="0"/>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td class="text-right" id="total">
                                                {{ config('constant.currencySymbool') }}{{ $total }}</td>
                                        </tr>


                                        <tr id="payabletr">
                                            <td class="font-weight-bold">Payable Total</td>
                                            <td class="text-right font-weight-bold" id="payable">
                                                {{ config('constant.currencySymbool') }}{{ $total }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="card-footer btn btn-warning" id="orderConfirm">Confirm order</div> --}}
                            <button type="submit" id="submitBtn" class="card-footer btn btn-warning">Confirm order</button>
                        </div>
                    </div>
                </form>
            </div>
        @else
            @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="panel-group accordion accordion-1">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center">
                        <h3 class="panel-title"><a class="btn-collapse" href="{{ url('/') }}">Continue to
                                Shopping</a></h3>
                    </div>

                </div>

            </div>
        @endif
    </div>

@endsection
@push('js')
    <script src="https://www.jquery-az.com/jquery/js/intlTelInput/intlTelInput.js"></script>
    <script type="text/javascript">
         $(document).ready(function() {
            var user_country = $("#user_country").val();
        $('#country').val(user_country);
        if (user_country) {
            getPortByCountry(user_country);
        }

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
            $(".selected-flag").css("width", "150px");
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
                "padding-left": "150px",
                "width": "300px"
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

        $('#checkoutForm').on('submit', function(event) {
            event.preventDefault();
            //var addressId = $('input[name="accountAddressId"]:checked').val();
            var ptype = $('input[name="ptype"]:checked').val();
            if (!ptype) {
                alert("Please check payment type");
                return false;
            }

            var country_code = $("#country").val();
            var country_name = $("#country option:selected").text();
            var port = $("#port").val();
            var marine_insurance = 0;
            var pre_export_inspection = 0;
            if (document.getElementById('marine_insurance').checked) {
                marine_insurance = 1;
            }

            if (document.getElementById('pre_export_inspection').checked) {
                pre_export_inspection = 1;
            }
            var marine_insurance_amount = $("#marine_insurance_amount").val();
            var pre_export_inspection_amount = $("#pre_export_inspection_amount").val();
            var user_name = $("#user-name").val();
            var user_email = $("#user-email").val();
            var address = $("#user-address").val();
            var phone = $("#phone").val();
            var phone_country_name = $("#phone_country_name").val();
            var phone_country_code = $("#phone_country_code").val();
            var user_message = $("#user-message").val();
            var obj = {
                @foreach (session('cart') as $id => $details)
                    {{ $details['carId'] }}: {{ $details['quantity'] }},
                @endforeach
            };
            var item_total_price = $("#item_total_price").val();
            var total_quantity = $("#total_quantity").val();
            var delivery_charge = $("#delivery_charge").val();

            $.ajax({
                url: '{{ route('order-confirm') }}',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    _token: '{!! csrf_token() !!}',
                    carInfo: obj,
                    country_code: country_code,
                    country_name: country_name,
                    port: port,
                    marine_insurance: marine_insurance,
                    pre_export_inspection: pre_export_inspection,
                    marine_insurance_amount: marine_insurance_amount,
                    pre_export_inspection_amount: pre_export_inspection_amount,
                    user_name: user_name,
                    user_email: user_email,
                    address: address,
                    phone: phone,
                    phone_country_name: phone_country_name,
                    phone_country_code: phone_country_code,
                    user_message: user_message,
                    ptype: ptype,
                    item_total_price: item_total_price,
                    total_quantity: total_quantity,
                    delivery_charge: delivery_charge
                },
                success: function(response) {
                    console.log(response);
                    if (response.hasError == false) {
                        if (response.result.payment_type == 8) {
                            $("#order_id").val(response.result.id);
                            $("#order_number").val(response.result.order_number);
                            $("#totalpaymentAmount").val(response.result.total_price);
                            window.location.href = '{!! env('BASE_URL') !!}' +
                                '/order-confirmed?order=' + response.result.order_number + '&amount=' +
                                response.result.total_price;
                        } else {
                            window.location.href = '{!! env('BASE_URL') !!}' +
                                '/orderconfirmed?order=' + response.result.order_number;

                        }

                    } else {
                        alert(response.result.status);
                    }
                }
            });
        });

        function cardPaymentMethod() {
            var item_total_price = $("#item_total_price").val();
            $("#paymentBtn").html('Pay $' + item_total_price);
            $('#paymentModal').modal('show');
        }

        function testMethod() {
            window.location.reload();
        }

        $('#country').change(function() {
            var country = $(this).val();
            $("#marine_insurance").prop("disabled", true);
            $("#pre_export_inspection").prop("disabled", true);
            if (country) {
                /* $("#marine_insurance").prop("disabled", false);
                $("#pre_export_inspection").prop("disabled", false); */
                $("#subButton").prop("disabled", false);
                getPortByCountry(country);

            } else {
              
                $("#marine_insurance_amount").val(0);
                $("#pre_export_inspection_amount").val(0);
                $("#port").empty();
                $("#port").append('<option value="">Destination Port</option>');
                $("#shipping").text("");
                $("#marine").text("");
                $("#preExport").text("");
                $("#delivery_charge").val(0);
                var item_total_price = $("#item_total_price").val();
                $("#total").text('{!! config('constant.currencySymbool') !!}' + item_total_price);
                $("#payable").text('{!! config('constant.currencySymbool') !!}' + item_total_price);
            }

        });

        function getPortByCountry(country) {
            $.ajax({
                type: "get",
                url: "/port-list/" + country,
                success: function(res) {
                    if (res) {
                        $("#port").empty();
                        $("#port").append('<option value="">Destination Port</option>');
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

                        $("#shipping").text("");
                        $("#marine").text("");
                        $("#preExport").text("");
                        $("#delivery_charge").val(0);
                        var item_total_price = $("#item_total_price").val();
                        $("#total").text('{!! config('constant.currencySymbool') !!}' + item_total_price);
                        $("#payable").text('{!! config('constant.currencySymbool') !!}' + item_total_price);
                    }
                }
            });
        }

        $('#port').change(function() {
            var port = $("#port").val();
            if(!port){
                $("#marine_insurance").prop("disabled", true);
                $("#pre_export_inspection").prop("disabled", true);
                $("#marine_insurance_amount").val(0);
                $("#pre_export_inspection_amount").val(0);
            }else{
                $("#marine_insurance").prop("disabled", false);
                $("#pre_export_inspection").prop("disabled", false);
            }
            priceCalculate();
        });

        function priceCalculate() {
            var country = $("#country").val();
            var port = $("#port").val();
            var item_total_price = $("#item_total_price").val();
            if (country != "" && port != "") {
                $.ajax({
                    type: "get",
                    url: "/price-calculate/" + country + "/" + port,
                    success: function(res) {
                        if (res) {
                            var total_quantity = $("#total_quantity").val();
                            var cubic_meter = $("#cubic_meter").val();
                            var delivery_charge = res.data.delivery_charge;
                            
                            var marine_insurance = 0;
                            var pre_export_inspection = 0;
                            if (document.getElementById('marine_insurance').checked) {
                                marine_insurance = res.data.marine_insurance;
                                $("#marine").text('{!! config('constant.currencySymbool') !!}' + marine_insurance);
                            }else{
                                $("#marine").text("");
                            }

                            if (document.getElementById('pre_export_inspection').checked) {
                                pre_export_inspection = res.data.pre_export_inspection;
                                $("#preExport").text('{!! config('constant.currencySymbool') !!}' + pre_export_inspection);
                            }else{
                                $("#preExport").text("");
                            }

                            if(cubic_meter > 0){
                                delivery_charge = (parseFloat(delivery_charge) * total_quantity) * cubic_meter;                                
                            }
                           
                           var other_2 =  (parseFloat(marine_insurance) + parseFloat(pre_export_inspection)) * total_quantity;
                           
                           /*  var dcharge = parseFloat(delivery_charge) +
                                parseFloat(marine_insurance) + parseFloat(pre_export_inspection); */
                            var dcharge = parseFloat(delivery_charge);
                            var shipping = dcharge;
                            $("#shipping").text('{!! config('constant.currencySymbool') !!}' + shipping);
                            $("#delivery_charge").val(shipping);
                            $("#marine_insurance_amount").val(parseFloat(marine_insurance));
                            $("#pre_export_inspection_amount").val(parseFloat(pre_export_inspection));
                            var result = parseFloat(item_total_price) + shipping+ + other_2;
                            $("#total").text('{!! config('constant.currencySymbool') !!}' + result);
                            $("#payable").text('{!! config('constant.currencySymbool') !!}' + result);
                        }
                    }
                });
            } else {
                $("#shipping").text("");
                $("#marine").text("");
                $("#preExport").text("");
                $("#delivery_charge").val(0);
                $("#total").text('{!! config('constant.currencySymbool') !!}' + item_total_price);
                $("#payable").text('{!! config('constant.currencySymbool') !!}' + item_total_price);
            }
        }
    </script>
@endpush
