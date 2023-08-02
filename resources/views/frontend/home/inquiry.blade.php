@extends('frontend.home.layout')
@section('title', 'Send Inquiry')
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
        .ttl-head {
            font-weight: bold;
            text-align: center;
            margin-bottom: 39px;
            font-size: 24px;
            font-size: 2.4rem;
        }
        .contact-cart {
            padding: 0;
        }
        .product-list {
    margin-top: 10px;
    text-align: left;
    letter-spacing: 0.8px;
}
a:link, a:visited, a:active {
    color: #383838;
    text-decoration: none;
}
a {
    outline: none;
    transition: 0.3s;
}
.img1 img {
    border-radius: 4px;
}
img {
    margin: 0;
    padding: 0;
    vertical-align: middle;
    border: 0;
    max-width: 100%;
    height: auto;
}
.ttl2 {
    line-height: 18px;
    font-weight: bold;
    margin-top: 12px;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
}
.sub {
    margin-top: 10px;
}
.price {
    color: #EE1C23;
    line-height: 26px;
    font-weight: bold;
    letter-spacing: 0px;
    font-size: 20px;
    font-size: 2rem;
}
.box-details {
    margin-top: 13px;
}
dl {
    display: flex;
    flex-wrap: wrap;
    line-height: 18px;
    padding-bottom: 5px;
    margin-bottom: 7px;    
}
dt {
    font-weight: bold;
    width: 10%;
}
p + p {
     margin-top: 5px; 
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
                        <h1 class="b-title-page bg-primary_a">Send Inquiry</h1>
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
                        <li>Send Inquiry</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    @if ($car)
        <div class="container contact-step">
            <section class="main-contact">
                <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
                <div class="alert alert-success" id="alertsuccess"></div>
                <div class="wcm">
                    <div class="block-main">
                        <h3 class="ttl-head">Enter Your Information</h3>
                        <form class="ui-form-3" id="inquiryForm" action="#" method="post">
                            @csrf
                            <input type="hidden" name="carId" id="carId" value="{{ $car->id }}" />
                            <input type="hidden" name="contactType" id="contactType" value="1" />
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
                                        <select class='form-control' name="country_code" id="country_code" data-width="100%" required>
                                            <option value="">Please choose your country</option>
                                            <x-country></x-country>
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
                                        <label for="is_received_news" class="agree00">Receive news, coupons and
                                            special
                                            deals</label>
                                    </div>
                                    <div class="cmn-checkbox agree">
                                        <input id="is_agreed" type="checkbox" name="is_agreed" value="1"
                                            class="validate[required] agree_active">
                                        <label for="is_agreed" class="mask" style="margin-top: 7px">I agree to </label> <a href="/policy/"
                                            target="_blank">Privacy Policy</a>
                                    </div>
                                    <input type="hidden" name="phone_country_name" id="phone_country_name">
                                    <input type="hidden" name="phone_country_code" id="phone_country_code">
                                    <button type="submit" id="submitBtn" class="btn btn-primary sbnButton"
                                        style="min-width: 300px">Send</button>
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
        <section class="contact-cart contact-step">
            <div class="wcm">
                <h2 class="title">The car you are choosing.</h2>
                <div class="product-list">
                    <ul>
                        <li>

                            <div class="box-sp">
                                <p class="img1">
                                    <a href="{{ url('car-details/' . $car->id) }}" target="_blank">
                                        <img width="40%"
                                            src="{{ config('constant.image_base_url') . '/upload/images/' . $car->images[0]->file_name }}"
                                            alt="GS F&nbsp;BASE GRADE">
                                    </a>
                                </p>
                                <h5 class="ttl2">
                                    <a class="link_hover" href="{{ url('car-details/' . $car->id) }}" target="_blank">
                                        {{ $car->title }}
                                    </a>
                                </h5>
                            </div>
                            <p class="sub">
                                Price
                            </p>
                            <p class="price">
                                {{config('constant.currencySymbool')}}{{ $car->price }} </p>
                            <div class="box-details">
                                <dl>
                                    <dt>Month/Year</dt>
                                    <dd>{{ date('m/Y', strtotime($car->model_year)) }}</dd>
                                </dl>
                                <dl>
                                    <dt>Mileage</dt>
                                    <dd>
                                        {{ $car->mileage." ".$car->mileage_type }}
                                    </dd>
                                </dl>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </section>
    @endif
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
                //"padding-left": "150px",
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
        $('#inquiryForm').on('submit', function(event) {
            event.preventDefault();
            var url = "{{ route('add-inquiry') }}";
            var country = $("#country_code :selected").text();
            var data = $('#inquiryForm').serialize();
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
