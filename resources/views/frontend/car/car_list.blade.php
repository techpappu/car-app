@extends('frontend.home.layout')
@section('title', 'Car Details')
@push('css')
<style>
    .b-filter-2__group {
        padding-bottom: 15px;
    }

    input[type="radio"] {
        margin-right: 5px;
    }

    ul {
        list-style-type: none;
        padding: 0px
    }

    li {
        display: inline-block;
    }

    input[type="checkbox"][id^="cb"] {
        display: none;
    }

    .colorLabel {
        border: 1px solid #fff;
        padding: 2px;
        display: block;
        position: relative;
        margin: 4px;
        cursor: pointer;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .colorLabel::before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    label img {
        height: 30px;
        width: 30px;
        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }

    :checked+label {
        border-color: rgb(224, 26, 26);
    }

    /* .abctest::before {
                          content: "✓";
                          background-color: grey;
                          transform: scale(1);
                        } */

    :checked+label img {
        transform: scale(0.9);
        box-shadow: 0 0 5px #333;
        z-index: -1;
    }

    .b-goods-1 {
        padding-top: 0px;
        padding-bottom: 26px;
        border-bottom: 1px solid #eee;
    }

    .b-goods-1__desc {
        display: table;
        width: 512px;
        margin-top: 0;
        margin-bottom: 0;
        font: 500 12px Poppins;
        color: #888;
        border: 1px solid #eee;
    }

    .b-goods-1__section {
        padding-top: 0px !important;
    }

    .b-goods-1_mod-a .b-goods-1__inner {
        padding-left: 0px;
    }

    .b-goods-1__inner {
        float: left;
        width: 66.66666667%;
        padding-right: 35px;
        padding-left: 0px;
    }

    .b-goods-1__img {
        float: left;
        width: 33.33333%;
        padding-right: 15px;
        padding-left: 15px;
        margin-top: 10px;
    }

    #img2 {
        position: absolute;
        top: 50px;
        left: 60px;
    }
    .b-filter-2 .form-control {
    margin-top: 10px;
    margin-bottom: 0;
    padding: 4px 13px 10px;
    font-size: 13px;
}
</style>
<style>
    .accordion {
    background-color: #F4F4F4;
    color: #444;
    cursor: pointer;
    padding: 5px;
    width: 100%;
    border: 2px solid #dad9d9;
    text-align: center;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
    }
    
    .active, .accordion:hover {
      background-color: #ccc;
    }
    
    .accordion:after {
      content: "\f107";
      font-family: 'FontAwesome';
      color: #777;
      font-weight: bold;
      float: right;
      margin-left: 5px;
    }
    
    .accordion.active:after {
      content: "\f106";
    }
    
    .panel {
      background-color: white;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.2s ease-out;
    }
    @media (max-width:767px){
        aside.l-sidebar {
        margin-bottom:0px;
        margin-top: 10px;
        }
        
        main.l-main-content {
            padding-top: 0px;
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
                    <h1 class="b-title-page bg-primary_a">Car list</h1>
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
                    <li><a href="{{ route('car-list') }}">Car List</a>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb-->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <aside class="l-sidebar">
                <button class="accordion"><i class="fa fa-filter"></i> Filter</button>
                <div class="panel">
                    <form class="b-filter-2 bg-grey">
                        <h3 class="b-filter-2__title">search options</h3>
                        <div class="b-filter-2__inner">
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">keyword</div>
                                <input name="carTitle" id="carTitle" class="form-control" type="text" placeholder="Keyword..." />
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Make</div>
                                <select class="form-control" data-width="100%" name="brand_id" id="brand_id">
                                    <option value="">All Makes</option>
                                    @foreach ($brand as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Model</div>
                                <select name="model_id" id="model_id" class="form-control" data-width="100%">
                                    <option value="">All Models</option>
                                </select>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Model Year</div>
                                <select class="form-control" data-width="100%" name="min_model_year" id="min_model_year">
                                    <option value="">Min Year</option>
                                </select>
                                <select class="form-control" data-width="100%" name="max_model_year" id="max_model_year">
                                    <option value="">Max Year</option>
                                </select>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Filter Price</div>
                                <div class="ui-filter-slider">
                                    <div id="slider-price"></div>
                                    <div class="ui-filter-slider__info">
                                        <div class="ui-filter-slider__label">Price Range:</div><span class="ui-filter-slider__current" id="slider-snap-value-lower"></span>-<span class="ui-filter-slider__current" id="slider-snap-value-upper"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Mileage</div>
                                <div class="ui-filter-slider">
                                    <div id="slider-mileage"></div>
                                    <div class="ui-filter-slider__info">
                                        <div class="ui-filter-slider__label">Mileage Range:</div><span class="mileage-ui-filter-slider__current" id="mileage-slider-snap-value-lower"></span>-<span class="mileage-ui-filter-slider__current" id="mileage-slider-snap-value-upper"></span>
                                    </div>
                                </div>
                                <div class="b-filter-2__group-title">Mileage In</div>
                                <select class="form-control" name="mileage_type" id="mileage_type">
                                        <option value="">Select Mileage type</option>
                                        <option value="KM">KM</option>
                                        <option value="HOUR">HOUR</option>
                                    </select>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Displacement</div>
                                <div class="ui-filter-slider">
                                    <div id="slider-displacement"></div>
                                    <div class="ui-filter-slider__info">
                                        <div class="ui-filter-slider__label">Displacement Range:</div><span class="displacement-ui-filter-slider__current" id="displacement-slider-snap-value-lower"></span>-<span class="displacement-ui-filter-slider__current" id="displacement-slider-snap-value-upper"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="b-filter-2__group">
                                <fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
                                    <legend class="b-filter-2__group-title">TRANSMISSION</legend>
                                    <input type="radio" name="trasmission" id="any_trasmission" value="" checked="checked" />
                                    <label for="any_trasmission">ANY</label>
                                    <input type="radio" name="trasmission" id="trasmissionAt" value="AT" />
                                    <label for="trasmissionAt">AT</label>
                                    <input type="radio" name="trasmission" id="trasmissionNt" value="NT" />
                                    <label for="trasmissionNt">MT</label>
                                </fieldset>
                            </div>
                            <div class="b-filter-2__group">
                                <fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
                                    <legend class="b-filter-2__group-title">Drive</legend>
                                    <input type="radio" name="drive" id="any_drive" value="" checked="checked" />
                                    <label for="any_drive">ANY</label>
                                    <input type="radio" name="drive" id="drive_2_d" value="2WD" />
                                    <label for="drive_2_d">2WD</label>
                                    <input type="radio" name="drive" id="drive_4_d" value="4WD" />
                                    <label for="drive_4_d">4WD</label>
                                </fieldset>
                            </div>
                            <div class="b-filter-2__group">
                                <fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
                                    <legend class="b-filter-2__group-title">fuel type</legend>
                                    <input type="radio" name="fuel" id="any_fuel" value="" checked="checked" />
                                    <label for="any_fuel">ANY</label>
                                    <input type="radio" name="fuel" id="gasline" value="GASOLINE" />
                                    <label for="gasline">GASOLINE</label>
                                    <input type="radio" name="fuel" id="petrol" value="PETROL" />
                                    <label for="petrol">PETROL</label>
                                </fieldset>
                            </div>
                            <div class="b-filter-2__group">
                                <fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
                                    <legend class="b-filter-2__group-title">Repaired</legend>
                                    <input type="radio" name="repaired" id="any_repaired" value="" checked="checked" />
                                    <label for="any_repaired">ANY</label>
                                    <input type="radio" name="repaired" id="none" value="NONE" />
                                    <label for="none">NONE</label>
                                    <input type="radio" name="repaired" id="yes" value="YES" />
                                    <label for="yes">YES</label>
                                </fieldset>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Color</div>
                                <ul>
                                    @foreach ($colors as $row)
                                    <li><input type="checkbox" id="cb_{{ $row->id }}" value="{{ $row->id }}" />
                                        <label for="cb_{{ $row->id }}" class="colorLabel"><img src="{{url('/')}}/colorImage/{{ $row->name }}.png" /></label>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="b-filter-2__group">
                                <fieldset data-role="controlgroup" data-type="horizontal" data-role="fieldcontain">
                                    <legend class="b-filter-2__group-title">Stearing</legend>
                                    <input type="radio" name="stearing" id="any_stearing" value="" checked="checked" />
                                    <label for="any_stearing">ANY</label>
                                    <input type="radio" name="stearing" id="right" value="RIGHT" />
                                    <label for="right">RIGHT</label>
                                    <input type="radio" name="stearing" id="left" value="LEFT" />
                                    <label for="left">LEFT</label>
                                </fieldset>
                            </div>
                            <div class="b-filter-2__group">
                                <div class="b-filter-2__group-title">Seating Capacity</div>
                                <div class="ui-filter-slider">
                                    <div id="slider-seating"></div>
                                    <div class="ui-filter-slider__info">
                                        <div class="ui-filter-slider__label">Seating Range:</div><span class="displacement-ui-filter-slider" id="seating-slider-snap-value-lower"></span>-<span class="displacement-ui-filter-slider" id="seating-slider-snap-value-upper"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="b-filter-2__title">
                            <a class="btn btn-lg" id="searchButton">Search</a>
                        </div>
                    </form>
                </div>
                <!-- end .b-filter-->
            </aside>
            <!-- end .l-sidebar-->
        </div>
        <div class="col-md-9">
            <main class="l-main-content">
                <input type="hidden" name="sort_by_brand_id"  id="sort_by_brand_id" value="{{ Request::get('id')}}"/> 
                <div class="filter-goods__select"><span class="hidden-xs">Sort</span>
                    <select data-width="172" id="sortByPrice">
                        <option value="best_match">Best match</option>
                        <option value="az">A-Z</option>
                        <option value="za">Z-A</option>
                        <option value="low_high">Price low to high</option>
                        <option value="high_low">Price high to low</option>
                    </select>
                </div>
                <!-- end .filter-goods-->
                <div id="table_data">
                    @include('frontend.car.car_list_data')
                </div>

            </main>
            <!-- end .l-main-content-->

        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">
    window.onload = function() {
        //Reference the DropDownList.
        var min_ddlYears = document.getElementById("min_model_year");
        var max_ddlYears = document.getElementById("max_model_year");
        //Determine the Current Year.
        var currentYear = (new Date()).getFullYear();
        //Loop and add the Year values to DropDownList.
        for (var i = currentYear; i >= 1980; i--) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            min_ddlYears.appendChild(option);
        }
        for (var i = currentYear; i >= 1980; i--) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            max_ddlYears.appendChild(option);
        }
    };
    $(document).ready(function() {

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
           var sortvalue = $("#sortByPrice").val();
            $.ajax({
                url: "/car/list/fetchbyPage?page=" + page+"&sortBy="+sortvalue,
                success: function(data) {
                    $('#table_data').html(data);
                }
            });
        }

    });

    $('#brand_id').change(function() {
        var brandId = $(this).val();
        getModelsByBrand(brandId);
    });

    function getModelsByBrand(brandId) {
        if (!brandId) {
            $("#model_id").empty();
            $("#model_id").append('<option value="">All Models</option>');
            return false;
        }
        $.ajax({
            type: "get",
            url: "/car/model/" + brandId,
            success: function(res) {
                if (res) {
                    $("#model_id").empty();
                    $("#model_id").append('<option value="">All Models</option>');
                    res.data.forEach(function(model) {
                        console.log(model.name);
                        $("#model_id").append('<option value="' + model.id + '">' + model.name +
                            '</option>');
                    });

                }
            }

        });

    }
    $("#searchButton").click(function() {

        var carTitle = $("#carTitle").val();
        var brand_id = $("#brand_id").val();
        var model_id = $("#model_id").val();
        var mileage_type = $("#mileage_type").val();
        var min_model_year = $("#min_model_year").val();
        if (min_model_year) {
            min_model_year = min_model_year + "-12-31";
        }
        var max_model_year = $("#max_model_year").val();

        if (max_model_year) {
            max_model_year = max_model_year + "-12-31";
        }
        var lowPrice = $("#slider-snap-value-lower").text();
        var highPrice = $("#slider-snap-value-upper").text();
        var lowMileage = $("#mileage-slider-snap-value-lower").text();
        var highMileage = $("#mileage-slider-snap-value-upper").text();
        var lowDisplacement = $("#displacement-slider-snap-value-lower").text();
        var highDisplacement = $("#displacement-slider-snap-value-upper").text();
        var transmission = $("input[name='trasmission']:checked").val();
        var drive = $("input[name='drive']:checked").val();
        var fuel = $("input[name='fuel']:checked").val();
        var repaired = $("input[name='repaired']:checked").val();

        var colors = [];
        $(':checkbox:checked').each(function(i) {
            colors[i] = $(this).val();
        });

        var stearing = $("input[name='stearing']:checked").val();
        var lowSeating = $("#seating-slider-snap-value-lower").text();
        var highSeating = $("#seating-slider-snap-value-upper").text();
        $.ajax({
            url: "/car/list-search?carTitle=" + carTitle + "&id=" + brand_id + "&model_id=" + model_id +
                "&min_model_year=" + min_model_year +
                "&max_model_year=" + max_model_year + "&lowPrice=" + lowPrice + "&highPrice=" +
                highPrice + "&lowMileage=" + lowMileage +
                "&highMileage=" + highMileage + "&lowDisplacement=" + lowDisplacement +
                "&highDisplacement=" + highDisplacement + "&transmission=" + transmission +
                "&drive=" + drive + "&fuel=" + fuel + "&repaired=" + repaired + "&colors=" + colors +
                "&stearing=" + stearing + "&lowSeating=" + lowSeating + "&highSeating=" + highSeating+"&mileage_type="+mileage_type,
            success: function(data) {
                $('#table_data').html(data);
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            }
        });

    });

    $('#sortByPrice').change(function() {
        var sortvalue = $(this).val();
       var sort_by_brand_id = $("#sort_by_brand_id").val();
       var url = "";
       if(sort_by_brand_id){
        url = "car-list?sortBy=" + sortvalue+"&id="+sort_by_brand_id;
       }else{
        url = "car-list?sortBy=" + sortvalue;
       }
        $.ajax({
            url: url,
            success: function(data) {
                $('#table_data').html(data);
                $("#sortByPrice").val(sortvalue);
            }
        });
    });
</script>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    if(screen.width>767){
        acc[0].classList.toggle("active");
        var panel = acc[0].nextElementSibling;
        panel.style.maxHeight = panel.scrollHeight + 40 + "px";
    }
    
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }
</script>
@endpush