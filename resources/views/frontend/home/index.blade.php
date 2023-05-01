@extends('frontend.home.layout')
@section('title', 'Home')
@push('css')
<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@endpush

@section('content')
<!-- start .main-slider-->
@include('frontend.home.slider');
<!-- end .main-slider-->


<section class="section-filter">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="text-center">
                    <h2 class="ui-title-block">Find Your Dream Car</h2>
                    <div class="ui-decor"></div>
                </div>
            </div>
        </div>
    </div>
    <form class="b-filter">
        <div class="container">
            <div class="row">
                {{-- <input type="hidden" id="bodyStyleId" value="{{ $bodyStyle[count($bodyStyle) - 1]->id }}" /> --}}
                <input type="hidden" id="bodyStyleId" />
                <div class="col-xs-12">
                    <div class="b-filter-type">
                        @foreach ($bodyStyle as $row)
                        <div class="b-filter-type__item">
                            {{-- <input class="b-filter-type__input" id="typePickup_{{ $row->id }}" name="type-car"
                            type="radio" value="" checked='checked'
                            onclick="bodyStyleIdSet({{ $row->id }})" />
                            <label class="b-filter-type__label" style="margin-bottom: 10px; margin-right: 10px"
                                for="typePickup_{{ $row->id }}">
                                <img class="b-filter-type__icon flaticon-pick-up"
                                    src="{{ config('constant.image_base_url') . '/upload/images/' . $row->image }}"
                                    height="120px" width="140px" />
                                <span id="body_style_{{ $row->id }}" class="b-filter-type__title"
                                    style="{{ $bodyStyle[count($bodyStyle) - 1]->id == $row->id ? 'color: red' : '' }} ">{{ $row->name }}</span>
                            </label> --}}
                            <input class="b-filter-type__input" id="typePickup_{{ $row->id }}" name="type-car"
                                type="radio" value="" onclick="bodyStyleIdSet({{ $row->id }})" />
                            <label class="b-filter-type__label" style="margin-bottom: 10px; margin-right: 10px"
                                for="typePickup_{{ $row->id }}">
                                <img class="b-filter-type__icon flaticon-pick-up"
                                    src="{{ config('constant.image_base_url') . '/upload/images/' . $row->image }}"
                                    height="120px" width="140px" />
                                <span id="body_style_{{ $row->id }}"
                                    class="b-filter-type__title">{{ $row->name }}</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="b-filter__inner bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <select class="form-control" data-width="100%" name="brand_id" id="brand_id">
                            {{-- <option value="">Select Make</option>
                                @foreach ($brand as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach --}}
                        </select>
                        <select class="form-control" data-width="100%" name="color_id" id="color_id">
                            <option value="">Select Car Color</option>
                            @foreach ($colors as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <select name="model_id" id="model_id" class="form-control" data-width="100%">
                            <option value="">Select Model</option>

                        </select>
                        <div class="ui-filter-slider">
                            <div id="slider-price"></div>
                            <div class="ui-filter-slider__info">
                                <div class="ui-filter-slider__label">Price Range:</div><span
                                    class="ui-filter-slider__current" id="slider-snap-value-lower"></span>-<span
                                    class="ui-filter-slider__current" id="slider-snap-value-upper"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        {{-- <select class="form-control" data-width="100%" name="model_year" id="model_year">
                                <option value="">Select Year</option>
                            </select> --}}

                        <div class="ui-filter-slider">
                            <div id="slider-year"></div>
                            <div class="ui-filter-slider__info">
                                <div class="ui-filter-slider__label">Year:</div><span class=""
                                    id="year-slider-snap-value-lower"></span>-<span class=""
                                    id="year-slider-snap-value-upper"></span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="b-filter__btns">
                            <a class="btn btn-lg btn-primary" onclick="searchCars()">Search Car</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end .b-filter-->
</section>
<!-- end .section-filter-->
<div class="section-default makes">
    <div class="container">
        <div class="row">

            <div class="col-md-12" align="center">
                <section class="section-list-brands">
                    <div class="text-center">
                        <h2 class="ui-title-block">Top Car Makes</h2>
                        <div class="ui-decor text-center"></div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <ul class="b-list-brands list-unstyled">
                            @foreach ($carCountByBrands as $carCountByBrand)
                            <li>
                                <a class="b-list-brands__link" href="{{ url('car-list?id=' . $carCountByBrand->id) }}">
                                    <img src="{{ config('constant.image_base_url') . '/upload/images/' . $carCountByBrand->image }}"
                                        height="70px" width="70px" />
                                    <strong>{{ $carCountByBrand->name }}</strong>
                                    <p class="badge">({{ $carCountByBrand->count }})</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<section class="section-default" style="margin-bottom:30px">
    <div class="container">
        <div class="car-list-header">
            <h6 class="ui-title-block" style="font-size:30px;margin-bottom:20px">Recenly Added</h6>
            <p class="see-more"><a href="{{url('/car-list')}}"><i class="fa fa-eye"></i>  See More</a></p>
        </div>
        <x-frontend.car-list :rows="$carList['new']"></x-frontend.car-list>
    </div>
</section>
<section class="section-default" style="margin-bottom:30px">
    <div class="container">
        <div class="car-list-header">
            <h6 class="ui-title-block" style="font-size:30px;margin-bottom:20px">Low Mileage Cars</h6>
            <p class="see-more"><a href="{{url('/car/list-search?lowMileage=1&mileage_type=KM&highMileage=30000&directive=true')}}"><i class="fa fa-eye"></i>  See More</a></p>
        </div>
        <x-frontend.car-list :rows="$carList['mileage']"></x-frontend.car-list>
    </div>
</section>
<section class="section-default" style="margin-bottom:30px">
    <div class="container">
        <div class="car-list-header">
            <h6 class="ui-title-block" style="font-size:30px;margin-bottom:20px">Most Affordable</h6>
            <p class="see-more"><a href="{{url('/car-list?sortBy=low_high&directive=true')}}"><i class="fa fa-eye"></i>  See More</a></p>
        </div>
        <x-frontend.car-list :rows="$carList['lowPrice']"></x-frontend.car-list>
    </div>
</section>

<section class="section-default" style="margin-bottom:30px">
    <div class="container">
        <div class="car-list-header">
            <h6 class="ui-title-block" style="font-size:30px;margin-bottom:20px">Premium Cars</h6>
            <p class="see-more"><a href="{{url('/car-list?sortBy=high_low&directive=true')}}"><i class="fa fa-eye"></i>  See More</a></p>
        </div>
        <x-frontend.car-list :rows="$carList['highPrice']"></x-frontend.car-list>
    </div>
</section>

<!-- end .b-list-brands-->
<section class="section-default">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="text-center">
                    <h2 class="ui-title-block">Featured Vehicles</h2>
                    <div class="ui-decor"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-carousel owl-carousel owl-theme owl-theme_w-btn enable-owl-carousel" data-min768="2"
        data-min992="3" data-min1200="5" data-margin="30" data-pagination="false" data-navigation="true"
        data-auto-play="4000" data-stop-on-hover="true">
        @foreach ($fearturedCars as $fearturedCar)
        <div class="b-goods-feat">
            <div class="b-goods-feat__img" style=" position: relative;">
                <a class="" href="{{ url('car-details/' . $fearturedCar->id) }}">
                    <img class="img-responsive_1"
                        src="{{ $fearturedCar->images != '[]' ? config('constant.image_base_url') . '/upload/images/' . $fearturedCar->images[0]->file_name : '' }}"
                        alt="foto" style="object-fit: cover" />
                    @if ($fearturedCar->car_sold_status == 3)
                    <img id="img2" src="sold_img.png" style="height: 70px; width: 100px">
                    @endif
                    @if ($fearturedCar->car_sold_status == 2)
                    <img id="img2" src=" reserved_img.png" style="height: 70px; width: 100px">
                    @endif

                </a>
                <span
                    class="b-goods-feat__label_price">{{ config('constant.currencySymbool') }}{{ $fearturedCar->price }}</span>
                @if ($fearturedCar->car_sold_status == 1)
                @if($fearturedCar->price > 0)
                <span class="b-goods-feat__label" style="background-color: #f7bd29ed"
                    onclick="addToCart({{ $fearturedCar->id }})">Add to Cart</span>
                @else
                <span class="b-goods-feat__label" style="background-color: #f7bd29ed">
                    <a href="{{ url('inquiry_' . $fearturedCar->id) }}" style="color:white">Send Inquiry</a>
                </span>
                @endif


                @endif


            </div>
            <ul class="b-goods-feat__desc list-unstyled">
                <li class="b-goods-feat__desc-item">{{ $fearturedCar->mileage." ".$fearturedCar->mileage_type }}</li>
                <li class="b-goods-feat__desc-item">Model: {{ $fearturedCar->model }}</li>
                <!--  <li class="b-goods-feat__desc-item">Auto</li>
                        <li class="b-goods-feat__desc-item">320 hp</li>  -->
            </ul>
            <h3 class="b-goods-feat__name"><a
                    href="{{ url('car-details/' . $fearturedCar->id) }}">{{ $fearturedCar->title }}</a></h3>
            <!--   <div class="b-goods-feat__info">{{ $fearturedCar->description }}</div> -->
        </div>
        @endforeach

        <!-- end .b-goods-featured-->

        <!-- end .b-goods-featured-->
    </div>
    <!-- end .featured-carousel-->
</section>
<!-- end .section-default-->
<section class="section-default">
    <div class="">
        <h3 class="title-inner">Customer Feedback</h3>
    </div>
    <div class="panel panel-default">
        <div class="panel-body items">
            @foreach ($customerFeedback as $feedback)
            <div class="row" style="padding: 10px;
                                border-bottom: 1px solid #d8d8d8;
                                border-left: 1px solid #d8d8d8;
                                border-right: 1px solid #d8d8d8;
                                overflow: hidden;
                                border-top: 1px solid #d8d8d8;margin-left: -10px">
                <div class="col-md-2">
                    <a href="{{ url('car-details/' . $feedback->id) }}" class="removeTabIndex">
                        <img class="img-responsive"
                            src="{{ config('constant.image_base_url') . '/upload/images/' . $feedback->images->file_name }}"
                            alt="foto" width="200px" />
                        <h5 class="b-goods-feat">{{ $feedback->title }}</h5>
                    </a>
                </div>
                <div class="col-md-4">
                    <img src="{{ config('constant.profile_image_base_url') . '/images/' . ($feedback->userImage != null ? $feedback->userImage : 'avatar_2x.png') }}"
                        style="width: 100px;height: 100px;object-fit: cover;margin-left: -10px" />
                    <span>{{ $feedback->userName }}</span>
                    <div>
                        @if ($feedback->rating == 0.5)
                        <i class="fa fa-star-half-o" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 1)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 1.5)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star-half-o" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 2)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 2.5)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star-half-o" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 3)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 3.5)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star-half-o" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 4)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 4.5)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star-half-o" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 5)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        @endif
                    </div>
                    <p>{{ $feedback->description }}</p>
                </div>
                <div class="col-md-6">
                    <h5 style="text-align: right; margin-bottom: 8px">After Delivery Pictures</h5>
                    <div class="js-zoom-gallery">
                        @php $imagePath = $feedback->type ==1? config('constant.profile_image_base_url') :
                        config('constant.image_base_url') @endphp
                        @foreach ($feedback->feedbackFile as $file)
                        <div class="widget-gallery__item">
                            <a class="widget-gallery__img js-zoom-gallery__item"
                                href="{{ $imagePath . '/upload/review/' . $file->file_name }}">
                                <img class="img-responsive"
                                    src="{{ $imagePath . '/upload/review/' . $file->file_name }}" alt="foto" />
                            </a>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
<!-- end .section-default-->


@endsection

@push('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function () {
        $('.items').slick({
            rows: 2,
            autoPlay: false,
            dots: true,
            arrows: false,
            vertical: true,
            verticalSwiping: true,
            infinite: false,
            prevArrow: false,
            nextArrow: false,
            slidesPerRow: 1,
            slidesToScroll: 1,
            speed: 50,
            touchThreshold: 15,
            edgeFriction: 0.0,
        });
        $(".b-filter-type__title").css("color", "");
        $.ajax({
            type: "get",
            url: "/car/brand/" + 1,
            success: function (res) {
                if (res) {
                    $("#brand_id").empty();
                    $("#brand_id").append('<option value="">Select Make</option>');
                    res.data.forEach(function (brand) {
                        $("#brand_id").append('<option value="' + brand.id + '">' + brand
                            .name +
                            '</option>');
                    });
                    $("#model_id").empty();
                    $("#model_id").append('<option value="">Select Model</option>');
                }
            }

        });

        $(".removeTabIndex").eq(0).removeAttr("tabindex");
    });
    /*  var chatbox = document.getElementById('fb-customer-chat');
     chatbox.setAttribute("page_id", "100679225936785");
     chatbox.setAttribute("attribution", "biz_inbox"); */

</script>

<!-- Your SDK code -->
{{-- <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v13.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script> --}}
<script type="text/javascript">
    /*   window.onload = function() {
                                                //Reference the DropDownList.
                                                var ddlYears = document.getElementById("model_year");

                                                //Determine the Current Year.
                                                var currentYear = (new Date()).getFullYear();

                                                //Loop and add the Year values to DropDownList.
                                                for (var i = currentYear; i >= 1980; i--) {
                                                    var option = document.createElement("OPTION");
                                                    option.innerHTML = i;
                                                    option.value = i;
                                                    ddlYears.appendChild(option);
                                                }
                                            }; */


    $('#brand_id').change(function () {
        var brandId = $(this).val();
        getModelsByBrand(brandId);
    });

    function getModelsByBrand(brandId) {
        $.ajax({
            type: "get",
            url: "/car/model/" + brandId,
            success: function (res) {
                if (res) {
                    $("#model_id").empty();
                    $("#model_id").append('<option value="-1">Select Model</option>');
                    res.data.forEach(function (model) {
                        console.log(model.name);
                        $("#model_id").append('<option value="' + model.id + '">' + model.name +
                            '</option>');
                    });

                }
            }

        });

    }


    function bodyStyleIdSet(id) {
        $(".b-filter-type__title").css("color", "");
        $("#bodyStyleId").val(id);
        var col = document.getElementById("body_style_" + id + "");
        col.style.color = "red";
    }

    function searchCars() {
        var bodyStyleId = $("#bodyStyleId").val();
        var brand_id = $("#brand_id").val();
        var model_id = $("#model_id").val();
        var color_id = $("#color_id").val();
        // var model_year = $("#model_year").val();
        var lowYear = jQuery("#year-slider-snap-value-lower").text();
        var highYear = jQuery("#year-slider-snap-value-upper").text();
        var lowPrice = jQuery("#slider-snap-value-lower").text();
        var highPrice = jQuery("#slider-snap-value-upper").text();
        var urlParams = 'bodyStyleId=' + bodyStyleId;
        if (brand_id) {
            urlParams = urlParams + '&id=' + brand_id;
        }
        if (model_id && model_id > 0) {
            urlParams = urlParams + '&model_id=' + model_id;
        }
        if (color_id) {
            urlParams = urlParams + '&color_id=' + color_id;
        }

        urlParams = urlParams + '&lowYear=' + lowYear + "-12-31";
        urlParams = urlParams + '&highYear=' + highYear + "-12-31";

        if (lowPrice) {
            urlParams = urlParams + '&lowPrice=' + lowPrice;
        }
        if (highPrice) {
            urlParams = urlParams + '&highPrice=' + highPrice;
        }
        window.location.href = '{!! env('
        BASE_URL ') !!}' + '/car-list?' + urlParams;
    }

    /*   function addToCart(id) {
          $.ajax({
              url: "/add-to-cart/" + id,
              dataType: "json",
              success: function(response) {
                  console.log(response);
                  var count = $("#cartItemCount").text();


                  $("#cartItemCount").text(parseInt(count) + 1);

                  if (response.hasError == false) {

                  } else {

                  }
              }
          });
      } */

</script>
@endpush
