@extends('frontend.home.layout')
@section('title', 'Car Details')
@section('content')
<div class="section-title-page area-bg area-bg_dark area-bg_op_70">
    <div class="area-bg__inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="b-title-page bg-primary_a">cars details</h1>
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
                    <li><a href="{{ route('car-list') }}">Stock List</a>
                    </li>
                    <li class="active">Car Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb-->
<main class="l-main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="b-car-details">
                    <div class="b-car-details__header" style="padding-bottom: 14px">
                        @if ($carDetails->is_3rd_party_seller)
                            <span class="third-party-seller_carDetails">3RD Party Seller</span>
                        @endif
                        <h4 class="b-car-details__title" style="font-size: 22px;">{{ $carDetails->title }}</h4>
                        <!--   {{-- <div class="b-car-details__subtitle">AWD 430i xSmart Drive Coupe</div> --}} -->
                        <div class="b-car-details__address"><i
                                class="icon fa fa-map-marker text-primary"></i>{{ $carDetails->car_location }}</div>
                        {{-- <div class="b-car-details__links"><a class="b-car-details__link" href="car-details.html"><i
                                        class="icon fa fa-exchange text-primary"></i> Add to Compare</a><a
                                    class="b-car-details__link" href="car-details.html"><i
                                        class="icon fa fa-car text-primary"></i> Car Brochure</a>
                                <a class="b-car-details__link" href="car-details.html"><i
                                        class="icon fa fa-share-alt text-primary"></i> Share</a>
                            </div> --}}
                    </div>
                    <x-frontend.car-details-slider :carDetails="$carDetails"></x-frontend.car-details-slider>
                    <a style="margin-top: 10px;display:block;border-bottom: 2px solid #F4F4F4;" href="{{route('car.image.download',$carDetails->id)}}"><i class="fa fa-download"></i> download all Images</a>
                    <!-- end .b-thumb-slider-->
                    <div class="b-car-details__section ">
                        <h3 class="b-car-details__section-title ui-title-inner">Car Overview</h3>
                        <x-frontend.car-overview :carDetails="$carDetails"></x-frontend.car-overview>
                    </div>

                </section>
            </div>
            <div class="col-md-4">
                <aside class="l-sidebar-2">
                    <div class="b-car-info">
                        <div class="b-car-info__price">FOB: US{{ config('constant.currencySymbool') }} <span
                                id="carPrice">{{ $carDetails->price }}</span>

                        </div>
                        <!--   {{-- <a href="{{ url('inquiry_' . $carDetails->id) }}" class="btn btn-primary btn-lg">Send
                                Inquiry</a> --}} -->

                        <!--  {{-- <dl class="b-car-info__desc dl-horizontal bg-grey">
                                <dt class="b-car-info__desc-dt">body</dt>
                                <dd class="b-car-info__desc-dd">{{ $carDetails->bodyStyle }}</dd>
                                <dt class="b-car-info__desc-dt">year</dt>
                                <dd class="b-car-info__desc-dd">{{ date('Y', strtotime($carDetails->model_year)) }}</dd>
                                <dt class="b-car-info__desc-dt">MILEAGe</dt>
                                <dd class="b-car-info__desc-dd">{{ $carDetails->mileage }}</dd>
                                <dt class="b-car-info__desc-dt">ENGINE</dt>
                                <dd class="b-car-info__desc-dd">5.7L V8</dd>
                                <dt class="b-car-info__desc-dt">TRANSMISSION</dt>
                                <dd class="b-car-info__desc-dd">{{ $carDetails->transmission }}</dd>
                                <dt class="b-car-info__desc-dt">FUEL</dt>
                                <dd class="b-car-info__desc-dd">{{ $carDetails->fuel }}</dd>
                                <dt class="b-car-info__desc-dt">colors</dt>
                                <dd class="b-car-info__desc-dd">{{ $carDetails->colorName }}</dd>
                                <dt class="b-car-info__desc-dt">DRIVE SYSTEM</dt>
                                <dd class="b-car-info__desc-dd">{{ $carDetails->drive_system }}</dd>
                                <dt class="b-car-info__desc-dt">STOCK #</dt>
                                <dd class="b-car-info__desc-dd">{{ $carDetails->stock_no }}</dd>
                            </dl> --}} -->
                        <!-- {{-- <div class="b-car-info__item"><span class="b-car-info__item-name"><i
                                        class="icon flaticon-fuel"></i> Economy</span>
                                <div class="b-car-info__item-inner"><span class="b-car-info__item-info"><span
                                            class="b-car-info__item-info_lg">16</span><span
                                            class="b-car-info__item-info_sm"> CITY</span></span><span
                                        class="b-car-info__item-info"><span class="b-car-info__item-info_lg">24</span>
                                        <span class="b-car-info__item-info_sm">HWY</span>
                                    </span>
                                </div>
                            </div> --}} -->
                        <!--  {{-- <div class="b-car-info__item"><span class="b-car-info__item-name"><i
                                        class="icon flaticon-car"></i> Vehicle Demand</span>
                                <div class="b-car-info__item-inner"><span class="b-car-info__item-info">HIGH</span>
                                </div>
                            </div> --}} -->
                        <!--    <div class="b-bnr-2">
                                <div class="b-bnr-2__icon flaticon-smartphone"></div>
                                <div class="b-bnr-2__inner">
                                    <div class="b-bnr-2__title">Call Dealer</div>
                                    <div class="b-bnr-2__info">1-820-431-5815</div>
                                </div>
                            </div>  -->
                        <!-- end .b-banner-->
                        <form class="b-calculator">
                            <div id="selectDestinationId">
                                <div class="b-calculator__header"><i class="icon flaticon-calculator text-primary"></i>
                                    <div class="b-calculator__header-inner">
                                        <div class="b-calculator__name">Finance Calculator</div>
                                        <div class="b-calculator__info">Calculate The Car Financing</div>
                                    </div>
                                </div>
                                <div class="b-calculator__group">
                                    <select class='form-control' name="country" id="country" data-width="100%">
                                        <option value="">Country</option>
                                        <x-country></x-country>
                                    </select>
                                </div>
                                <div class="b-calculator__group">
                                    <select class='form-control' name="port" id="port" data-width="100%">
                                        <option value="">Destination Port</option>
                                    </select>
                                </div>
                                <div class="b-calculator__group">
                                    <input id="marine_insurance" type="checkbox" name="marine_insurance" disabled>
                                    <label for="marine_insurance">Marine Insurance</label>
                                </div>
                                <div class="b-calculator__group">
                                    <input id="pre_export_inspection" type="checkbox" name="pre_export_inspection"
                                        disabled>
                                    <label for="pre_export_inspection">Pre Export Inspection</label>
                                </div>
                                <button type="button" id="subButton" class="btn btn-dark" disabled>Cauculate</button>
                            </div>
                            @if ($carDetails->car_sold_status == 2)
                            <div class="b-calculator__group">
                                <img id="img2" src="{{URL::to('/')}}/reserved_img.png"
                                    style="height: 70px; width: 100px">
                            </div>
                            @endif
                            @if ($carDetails->car_sold_status == 3)
                            <div class="b-calculator__group">
                                <img id="img2" src="{{URL::to('/')}}/sold_img.png" style="height: 70px; width: 100px">
                            </div>
                            @endif
                            <div id="inquiryAndAddToCart" style="text-align: center; margin-top: 15px">
                                <a href="{{ url('inquiry_' . $carDetails->id) }}" class="btn btn-primary"
                                    style="width: 200px">Send
                                    Inquiry</a>
                                @if ($carDetails->car_sold_status == 1 && $carDetails->price >0)
                                <span class="btn btn-primary"
                                    style="background-color: #28af0f;width: 200px; margin-top: 5px; border: none;"
                                    onclick="addToCart({{ $carDetails->id }})">Add to Cart</span>
                                @endif
                            </div>

                            <div id="calculatedPrice" style="display: none">
                                <div class="b-calculator__group">
                                    <label for="countryName">Country &nbsp;&nbsp;<span id="countryName"></span></label>
                                </div>
                                <div class="b-calculator__group">
                                    <label for="portName">Destination Port &nbsp;&nbsp;<span
                                            id="portName"></span></label>
                                </div>
                                <hr style="border-top: 1px solid #320d0d;">
                                <div class="b-calculator__group">
                                    <label for="totalPrice">Estimated Total Price &nbsp;&nbsp;<span
                                            id="totalPrice"></span></label>
                                </div>

                                <button type="button" id="changeDestinationBtn" class="btn btn-dark">Change
                                    Destination</button>
                                <div id="inquiryAndAddToCart2" style="text-align: center; margin-top: 15px">
                                    <a href="{{ url('inquiry_' . $carDetails->id) }}" class="btn btn-primary"
                                        style="width: 200px">Send
                                        Inquiry</a>
                                    @if ($carDetails->car_sold_status == 1 && $carDetails->price >0)
                                    <span class="btn btn-primary"
                                        style="background-color: #28af0f;width: 200px; margin-top: 5px"
                                        onclick="addToCart({{ $carDetails->id }})">Add to Cart</span>
                                    @endif
                                </div>

                            </div>
                        </form>
                        <!-- end .b-calculator-->
                    </div>
                </aside>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="b-car-details__section-title ui-title-inner">Specific Info</h3>
                @if ($data['carCondition'])
                    <h5>Car Condition</h5>
                    <x-frontend.car-specific-info :rows="$data['carCondition']"></x-frontend.car-specific-info>
                @endif
            </div>
        </div>
             
        @if ($data['standardFeature'])
            <div class="row">
                <div class="col-md-12">
                    <h5>Standard Features</h5>
                    <x-frontend.car-specific-info :rows="$data['standardFeature']"></x-frontend.car-specific-info>
                </div>
            </div>
        @endif

        @if ($data['equipment'])
            <div class="row">
                <div class="col-md-12">
                    <h5>Equipment</h5>
                    <x-frontend.car-specific-info :rows="$data['equipment']"></x-frontend.car-specific-info>
                </div>
            </div>
        @endif

        @if ($data['interiorExterior'])
            <div class="row">
                <div class="col-md-12">
                    <h5>Interior / Exterior</h5>
                    <x-frontend.car-specific-info :rows="$data['interiorExterior']"></x-frontend.car-specific-info>
                </div>
            </div>
        @endif

        @if ($data['selfDriving'])
            <div class="row">
                <div class="col-md-12">
                    <h5>Self-driving</h5>
                    <x-frontend.car-specific-info :rows="$data['selfDriving']"></x-frontend.car-specific-info>
                </div>
            </div>
        @endif
        @if ($data['safetyEquipment'])
            <div class="row">
                <div class="col-md-12">
                    <h5>Safety Equipement</h5>
                    <x-frontend.car-specific-info :rows="$data['safetyEquipment']"></x-frontend.car-specific-info>
                </div>
            </div>
        @endif

        @if ($carDetails->description)
            <div class="row">
                <div class="col-md-12">
                    <h5>Description</h5>
                    <div class="b-goods-feat__info">{!! $carDetails->description !!}</div>
                </div>
            </div>
        @endif
        
        <!-- end .b-car-details-->
        <section class="section-default_top">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="title-inner">Related Cars</h2>


                        <div class="related-carousel owl-carousel owl-theme enable-owl-carousel" data-min768="2"
                            data-min992="3" data-min1200="3" data-margin="30" data-pagination="false"
                            data-navigation="true" data-auto-play="4000" data-stop-on-hover="true">
                            @foreach ($relatedCars as $row)
                            <div class="b-goods-feat">
                                <div class="b-goods-feat__img">
                                    <a class="" href="{{ url('car-details/' . $row->id) }}">
                                        <img class="img-responsive"
                                            src="{{ config('constant.image_base_url') . '/upload/images/' . $row->images[0]->file_name }}"
                                            alt="foto" />
                                    </a>
                                    @if($row->price > 0)
                                    <span
                                        class="b-goods-feat__label_price">{{ config('constant.currencySymbool') }}{{ $row->price }}</span>
                                    <span class="b-goods-feat__label" style="background-color: #f7bd29ed"
                                        onclick="addToCart({{ $row->id }})">Add to Cart</span>
                                    @else
                                    <span class="b-goods-feat__label" style="background-color: #f7bd29ed">
                                        <a href="{{ url('inquiry_' . $row->id) }}" style="color:white">Send Inquiry</a>
                                    </span>
                                    @endif
                                </div>
                                <ul class="b-goods-feat__desc list-unstyled">
                                    <li class="b-goods-feat__desc-item">{{ $row->mileage." ".$row->mileage_type }}</li>
                                    <li class="b-goods-feat__desc-item">Model: {{ $row->model }}</li>
                                    <!--   <li class="b-goods-feat__desc-item">Auto</li>
                                            <li class="b-goods-feat__desc-item">320 hp</li> -->
                                </ul>
                                <h3 class="b-goods-feat__name"><a
                                        href="{{ url('car-details/' . $row->id) }}">{{ $row->title }}</a>
                                </h3>
                                <div class="b-goods-feat__info">{{$row->description}}</div>
                            </div>
                            @endforeach



                        </div>
                        <!-- end .related-carousel-->
                    </div>
                </div>
            </div>
        </section>
        <!-- end .section-default_top-->
</main>
<!-- end .l-main-content-->

@endsection

@push('js')
<script>
    // $(window).load(function () {

    //     var id = $("#carId").val();
    //     $.ajax({
    //         url: "/car-show/" + id,
    //         dataType: "json",
    //         success: function (response) {
    //             response.data.carCondition.forEach(function (carCondition) {
    //                 $('#carCondition_' + carCondition.car_condition_id).addClass(
    //                     'activeInfo');

    //             });
    //             response.data.carStandardFeature.forEach(function (carStandardFeature) {
    //                 $('#standardFeature_' + carStandardFeature.standard_feature_id)
    //                     .addClass('activeInfo');
    //             });
    //             response.data.carEquipment.forEach(function (carEquipment) {
    //                 $('#equipment_' + carEquipment.equipment_id).addClass('activeInfo');
    //             });
    //             response.data.carInteriorExterior.forEach(function (carInteriorExterior) {
    //                 $('#interiorExterior_' + carInteriorExterior.interior_exterior_id)
    //                     .addClass('activeInfo');
    //             });
    //             response.data.carSelfDriving.forEach(function (carSelfDriving) {
    //                 $('#selfDriving_' + carSelfDriving.self_driving_id).addClass(
    //                     'activeInfo');
    //             });
    //             response.data.carSafetyEquipment.forEach(function (carSafetyEquipment) {

    //                 $('#safetyEquipment_' + carSafetyEquipment.safety_equipment_id)
    //                     .addClass('activeInfo');
    //             });

    //         }
    //     });
    // })

    $("#country").change(function () {
        var country = $(this).val();


        if (country) {
            $("#marine_insurance").prop("disabled", false);
            $("#pre_export_inspection").prop("disabled", false);
            $("#subButton").prop("disabled", false);
            getPortByCountry(country);

        } else {
            $("#marine_insurance").prop("disabled", true);
            $("#pre_export_inspection").prop("disabled", true);
            $("#subButton").prop("disabled", true);
            $("#port").empty();
            $("#port").append('<option value="">Destination Port</option>');
        }

    });

    function getPortByCountry(country) {
        $.ajax({
            type: "get",
            url: "/port-list/" + country,
            success: function (res) {
                if (res) {
                    $("#port").empty();
                    $("#port").append('<option value="">Destination Port</option>');
                    res.data.forEach(function (ports) {
                        $("#port").append('<option value="' + ports.port + '">' + ports.port +
                            '</option>');
                    });
                }
            }
        });
    }

    $("#subButton").click(function () {
        var country = $("#country").val();
        var port = $("#port").val();
        if (country != "" && port != "") {
            $.ajax({
                type: "get",
                url: "/price-calculate/" + country + "/" + port,
                success: function (res) {
                    if (res) {

                        $("#selectDestinationId").hide();
                        $("#calculatedPrice").show();
                        $("#changeDestinationBtn").show();
                        $("#inquiryAndAddToCart").hide();
                        //var a= $('#country').val(res.data.country);
                        var countryName = $("#country option:selected").text();
                        $("#countryName").html(countryName);
                        $("#portName").html(res.data.port);
                        var carPrice = document.getElementById("carPrice");
                        var delivery_charge = res.data.delivery_charge;
                        var cubic_meter = document.getElementById("cubic_meter");
                        var m_3 = cubic_meter.innerHTML;
                        if (m_3 > 0) {
                            delivery_charge = parseFloat(delivery_charge) * parseFloat(m_3);
                        }
                        var marine_insurance = 0;
                        var pre_export_inspection = 0;
                        if (document.getElementById('marine_insurance').checked) {
                            marine_insurance = res.data.marine_insurance;
                        }

                        if (document.getElementById('pre_export_inspection').checked) {
                            pre_export_inspection = res.data.pre_export_inspection;
                        }

                        var result = 0;
                        if (carPrice.innerHTML > 0) {
                            result = parseFloat(carPrice.innerHTML) + parseFloat(delivery_charge) +
                                parseFloat(marine_insurance) + parseFloat(pre_export_inspection);
                        }

                        $("#totalPrice").html("{{ config('constant.currencySymbool' ) }} " + result);

                    }
                }
            });
        } else {
            $("#selectDestinationId").hide();
            $("#totalPrice").html("Ask Price");

            $("#calculatedPrice").show();
            $("#changeDestinationBtn").show();
        }

    });

    $("#changeDestinationBtn").click(function () {
        $("#changeDestinationBtn").hide();
        $("#selectDestinationId").show();
    });

</script>




<script>
    let leftArrow = document.querySelector("#img_slide_left");
    let rightArrow = document.querySelector("#img_slide_right");
    let slidesContainer = document.querySelector("#img_slides");

    let applyThumbnail = function (dataIdx) {
        document.querySelector("#img_thumbnails > img.active").classList.remove("active");
        document.querySelector(`#img_thumbnails > [data-index='${parseInt(dataIdx)}']`).classList.add(
            "active");
    };

    let thumbnailClick = function (dataIdx) {
        document.querySelector("#img_thumbnails > img.active").classList.remove("active");
        document.querySelector(`#img_thumbnails > [data-index='${parseInt(dataIdx)}']`).classList.add(
            "active");
        document.querySelector(`#img_slides > img.active`).classList.remove("active");
        document.querySelector(`#img_slides > [data-index='${parseInt(dataIdx)}']`).classList.add("active");
    };

    leftArrow.addEventListener("click", function () {
        const currentActive = document.querySelector("#img_slides > img.active");
        const prevSibling = currentActive.previousElementSibling;

        currentActive.classList.remove("active");

        if (prevSibling) {
            // Select Prev Image
            prevSibling.classList.add("active");
            applyThumbnail(prevSibling.getAttribute("data-index"));
        } else {
            // Select Last Image
            const last = document.querySelector("#img_slides > :last-child");
            last.classList.add("active");
            applyThumbnail(last.getAttribute("data-index"));
        }
    });

    rightArrow.addEventListener("click", function () {
        const currentActive = document.querySelector("#img_slides > img.active");
        const nextSibling = currentActive.nextElementSibling;

        currentActive.classList.remove("active");

        if (nextSibling) {
            // Select Next Image
            nextSibling.classList.add("active");
            applyThumbnail(nextSibling.getAttribute("data-index"));
        } else {
            // Select First Image
            const first = document.querySelector("#img_slides > :first-child");
            first.classList.add("active");
            applyThumbnail(first.getAttribute("data-index"));
        }
    });

    document.querySelectorAll(".imgThumbnail").forEach(function (elem) {
        elem.addEventListener("click", function () {
            thumbnailClick(this.getAttribute("data-index"));
        });
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    $(document).ready(function () {
        $("#img_slides img:nth-child(1)").addClass('active');
        $("#img_thumbnails img:nth-child(1)").addClass('active');
    });

    // $(document).ready(function(){
    //   Fancybox.bind('[data-fancybox]', {
    //       //
    //     }); 
    // });

    $('#img_slides').click(function () {
        var data = $('img.imgSlide.active').attr('src');
        Fancybox.show([{
            src: data,
        }, ]);

    });

</script>

@endpush
