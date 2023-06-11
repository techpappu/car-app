@extends('layouts.backend.app')
@section('title', 'Car')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('assets/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

<style type="text/css">
    body .modal-dialog {
        max-width: 80%;
        width: auto !important;
    }

    .modal-body {
        height: 80vh;
        overflow-y: auto;
    }

    .imgPreview img {
        padding: 8px;
        max-width: 100px;
    }
</style>
@endpush
@section('content')
<h3>Car</h3>

<!-- Button trigger modal -->
<div class="modal-header">
    <button type="button" id="car_add" class="btn btn-primary mr-auto" style="float: right" data-toggle="modal" data-target="#carModal">Add New
    </button>
</div>
<div class="clearfix"></div>
<!-- Modal -->
<div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class='col-12 modal-title text-center'>Add Car</h5>
                <button type="button" class="close resetForm" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
            <div class="alert alert-success" id="alertsuccess"></div>
            <form action="" id="car_form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" style="display: none" />
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="brand_id">Brand</label>
                            <select class="form-control" name="brand_id" id="brand_id">
                                @foreach ($brand as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="model_id">Model</label>
                            <select class="form-control" name="model_id" id="model_id">

                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="body_style_id">Body style</label>
                            <select class="form-control" name="body_style_id" id="body_style_id">
                                @foreach ($bodyStyle as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="color_id">Color</label>
                            <select class="form-control" name="color_id" id="color_id">
                                @foreach ($colors as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="title">Title</label>
                            <input type="text" class="form-control is-invalid" id="title" name="title" placeholder="Car title" required>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="col-sm-4">
                            <label for="price">Price</label>
                            <input type="number" class="form-control is-invalid" id="price" name="price" placeholder="Car Price" required onkeypress="return isNumberKey(event)">
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="model_year">Model Year</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right datepicker" id="model_year" name="model_year">
                            </div>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="col-sm-4">
                            <label for="stock_no">Stock Number</label>
                            <input type="text" class="form-control is-invalid" id="stock_no" name="stock_no" placeholder="Stock no" required>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>

                        <div class="col-sm-4">
                            <label for="car_up_date">Up date</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right datepicker" id="car_up_date" name="car_up_date">
                            </div>

                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="car_location">Location</label>
                            <input type="text" class="form-control is-invalid" id="car_location" name="car_location" placeholder="Location">

                        </div>
                        <div class="col-sm-2">
                            <label for="mileage">Mileage</label>
                            <input type="number" class="form-control is-invalid" id="mileage" name="mileage" placeholder="Mileage" required onkeypress="return isNumberKey(event)">
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>

                        </div>
                        <div class="col-sm-2">
                            <label for="repaired">Mileage In</label>
                            <select class="form-control" name="mileage_type" id="mileage_type">
                                <option value="KM">KM</option>
                                <option value="HOUR">HOUR</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="repaired">Repaired</label>
                            <select class="form-control" name="repaired" id="repaired">
                                <option value="NONE">NONE</option>
                                <option value="YES">YES</option>
                            </select>

                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="steering">Steering</label>
                            <select class="form-control" name="steering" id="steering">
                                <option value="LEFT">LEFT</option>
                                <option value="RIGHT">RIGHT</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="transmission">Transmission</label>
                            <select class="form-control" name="transmission" id="transmission">
                                <option value="AT">AT</option>
                                <option value="MT">MT</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="fuel">Fuel</label>
                            <select class="form-control" name="fuel" id="fuel">
                                <option value="GASOLINE">GASOLINE</option>
                                <option value="PETROL">PETROL</option>
                                <option value="HYBRID">HYBRID</option>
                                <option value="ELECTRIC">ELECTRIC</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="drive_system">Select Drive System</label>
                            <select class="form-control" name="drive_system" id="drive_system">
                                <option value="2WD">2WD</option>
                                <option value="4WD">4WD</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="doors">Doors</label>
                            <select class="form-control" name="doors" id="doors">
                                <option value="5D">5D</option>
                                <option value="3D">3D</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="displacement">Displacement</label>
                            <input type="number" class="form-control" id="displacement" name="displacement" placeholder="Displacement" required  onkeypress="return isNumberKey(event)"/>

                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="chassis_no">Chassis No</label>
                            <input type="text" class="form-control" id="chassis_no" name="chassis_no" placeholder="Chassis No">
                        </div>
                        <div class="col-sm-2">
                            <label for="model_code">Model code</label>
                            <input type="text" class="form-control" id="model_code" name="model_code" placeholder="Model code">
                        </div>
                        <div class="col-sm-6">
                            <label for="model_code">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="doors">Seating capacity</label>
                            <select class="form-control" name="seating_capacity" id="seating_capacity">
                                @for ($i = 1; $i < 100; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="is_featured">Is Featured?</label>
                            <input type="checkbox" style="width: 5%;height:20px" name="is_featured" id="is_featured" />
                        </div>
                        <div class="col-sm-3">
                            <label for="is_3rd_party_seller">Is 3RD Party Seller?</label>
                            <input type="checkbox" style="width: 5%;height:20px" name="is_3rd_party_seller" id="is_3rd_party_seller" />
                        </div>
                        <div class="col-sm-3">
                            <label for="cubic_meter">Cubic Meter</label>
                            <input type="number" class="form-control is-invalid" id="cubic_meter" name="cubic_meter" placeholder="Cubic Meter" required onkeypress="return isNumberKey(event)">
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                    </div>

                    <div>&nbsp;</div>
                    <h3>Specific Info</h3>
                    <div class="form-group">
                        <h4>Car Condition</h4>
                        @foreach ($carCondition as $row)
                            <label>
                                <input type="checkbox" name="carCondition[]" id="carCondition_{{ $row->id }}" value="{{ $row->id }}">
                                {{ $row->name }}
                            </label>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <h4>Standard Features</h4>
                        @foreach ($standardFeature as $row)
                        <label>
                            <input type="checkbox" name="standardFeature[]" id="standardFeature_{{ $row->id }}" value="{{ $row->id }}">
                            {{ $row->name }}
                        </label>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <h4>Equipment</h4>
                        @foreach ($equipment as $row)
                        <label>
                            <input type="checkbox" name="equipment[]" id="equipment_{{ $row->id }}" value="{{ $row->id }}">
                            {{ $row->name }}
                        </label>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <h4>Interior / Exterior</h4>
                        @foreach ($interiorExterior as $row)
                        <label>
                            <input type="checkbox" name="interiorExterior[]" id="interiorExterior_{{ $row->id }}" value="{{ $row->id }}">
                            {{ $row->name }}
                        </label>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <h4>Self-driving</h4>
                        @foreach ($selfDriving as $row)
                        <label>
                            <input type="checkbox" name="selfDriving[]" id="selfDriving_{{ $row->id }}" value="{{ $row->id }}">
                            {{ $row->name }}
                        </label>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <h4>Safety Equipement</h4>
                        @foreach ($safetyEquipment as $row)
                        <label>
                            <input type="checkbox" name="safetyEquipment[]" id="safetyEquipment_{{ $row->id }}" value="{{ $row->id }}">
                            {{ $row->name }}
                        </label>
                        @endforeach
                    </div>
                    <div class="form-group">

                        <div class="user-image mb-3 text-center">
                            <div class="imgPreview"> </div>
                        </div>

                        <div class="custom-file">
                            <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                            <label class="custom-file-label" for="images">Choose image</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary resetForm" data-dismiss="modal">Close</button>
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
                <div style="display: none" class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
                <div style="display: none" class="alert alert-success" id="alertsuccess"></div>
                <div id="table_data">
                    @include('car.car_pagination_data')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="carImageModal" tabindex="-1" role="dialog" aria-labelledby="carImageModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class='col-12 modal-title text-center'>Car Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="car_image_form" method="post">
                <div class="modal-body">
                    <input type="hidden" id="carId" name="carId" />
                    <div id="image_table_data">
                        @include('car.car_image_list')
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="carExpenseModal" tabindex="-1" role="dialog" aria-labelledby="carExpenseModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class='col-12 modal-title text-center'>Car Expenses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
                <div class="alert alert-success" id="alertsuccess"></div>
                <form action="" id="car_expense_form" method="POST">
                    @csrf
                    <input type="hidden" id="expenseCarId" name="carId" />
                    <div class="form-group">
                        <label for="type">Select Expense Type</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="" selected disabled hidden>Select Expense Type</option>
                            <option value="Purchase Prices">Purchase Prices</option>
                            <option value="10% tax">10% tax</option>
                            <option value="Recycle">Recycle</option>
                            <option value="Auction Fee">Auction Fee</option>
                            <option value="Inland Transport">Inland Transport</option>
                            <option value="Inspection">Inspection</option>
                            <option value="Export Clearance">Export Clearance</option>
                            <option value="Port Parking fee">Port Parking fee</option>
                            <option value="Shipping Freight">Shipping Freight</option>
                            <option value="Others">Others</option>
                        </select>

                        <label for="expeseComment">Expese Comment</label>
                        <input type="text" id="expeseComment" class="form-control" name="comment">

                        <label for="expeseAmount">Expese Amount</label>
                        <input type="number" step="0.01" id="expeseAmount" class="form-control" name="amount" required>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary">SUBMIT</button>
                    </div>
                </form>
                <div id="car_expense_data">
                    @include('car.car_expense_data')
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>
<script src="{{ asset('assets/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
</script>
<script>
    $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                $(".imgPreview").empty();

                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                            imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("div#alertdanger").hide();
        $("div#alertsuccess").hide();
        $(".ajax-load").hide();
        var brandId = $("#brand_id").val();
        getModelsByBrand(brandId);
        //Date picker
        $('.datepicker').datepicker({
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            format: 'mm/dd/yyyy'
        })
        // $(document).on('click', '.pagination a', function(event) {
        //     event.preventDefault();
        //     var page = $(this).attr('href').split('page=')[1];
        //     fetch_data(page);
        // });

        
        $('ul.dropdown-menu li').click(function(e) {
            var id = $(this).attr("lead-id");
            var status = $(this).attr("status");
            var statusValue = $(this).text();
            carStatusUpdate(status,id,statusValue);
        });
    });
    $('#car_add').click(function() {
        $("div#alertdanger").hide();
        $("div#alertsuccess").hide();
        $('#car_form')[0].reset();

    });
    $('.resetForm').click(function() {
        resetForm();
    });

    $('#brand_id').change(function() {
        var brandId = $(this).val();
        getModelsByBrand(brandId);
    });

    function getModelsByBrand(brandId) {
        $.ajax({
            type: "get",
            url: "/admin/car/model/" + brandId,
            success: function(res) {
                if (res) {
                    $("#model_id").empty();
                    //$("#model_id").append('<option value="-1">Select model</option>');
                    res.data.forEach(function(model) {
                        $("#model_id").append('<option value="' + model.id + '">' + model.name +
                            '</option>');
                    });

                }
            }

        });

    }

    function fetch_data(page) {
        $.ajax({
            url: "/admin/car/fetchbyPage?page=" + page,
            success: function(data) {
                $('#table_data').html(data);
            }
        });
    }
    function carStatusUpdate(status, id,statusValue) {
        $.ajax({
            url: '{{ route('updateStatus') }}',
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: '{!! csrf_token() !!}',
                status: status,
                id: id
            },
            success: function(response) {
                if (response.hasError == false) {
                    $("div#alertdanger").hide();
                    $("div#alertsuccess").show();
                    $("div#alertsuccess").text(response.result.status);
                    $("td.status_"+id).html(statusValue);
                    //fetch_data(1);
                } else {
                    alert(response.result.status);
                }
            }
        });
    }
    $('#car_form').on('submit', function(event) {
        event.preventDefault();
        var id = $("#id").val();
        var url = "{{ route('add') }}";
        if (id) {
            url = "{{ route('update') }}";
        }
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
                $(".ajax-load").hide();
                $('#submitBtn').removeAttr('disabled');
                $("div#alertsuccess").hide();
                $("div#alertdanger").show();
                $("#alertdanger").text(er.responseJSON.errors.stock_no);
            }
        });
    });

    $(document).on('click', '.edit', function() {
        var id = $(this).attr('id');
        $.ajax({
            url: "/admin/car/show/" + id,
            dataType: "json",
            success: function(response) {
                console.log(response);
                $('#id').val(response.data.id);
                $("#brand_id").val(response.data.brand);
                getModelsByBrand(response.data.brand);
                $("#model_id").val(response.data.model);
                $("#body_style_id").val(response.data.bodyStyle);
                $("#color_id").val(response.data.color);
                $("#title").val(response.data.title);
                $("#price").val(response.data.price);
                $("#stock_no").val(response.data.stock_no);
                if (response.data.modelYear != null) {

                    var modelYear = response.data.modelYear.split("-");
                    $("#model_year").val(modelYear[1] + "/" + modelYear[2] + "/" + modelYear[0]);
                }

                if (response.data.carUpDate != null) {
                    var carUpDate = response.data.carUpDate.split("-");
                    $("#car_up_date").val(carUpDate[1] + "/" + carUpDate[2] + "/" + carUpDate[0]);
                }

                $("#car_location").val(response.data.location);
                $("#mileage").val(response.data.mileage);
                $("#mileage_type").val(response.data.mileage_type);
                $("#repaired").val(response.data.repaired);
                $("#steering").val(response.data.steering);
                $("#transmission").val(response.data.transmission);
                $("#fuel").val(response.data.fuel);
                $("#drive_system").val(response.data.drive_system);
                $("#doors").val(response.data.doors);
                $("#displacement").val(response.data.displacement);
                $("#chassis_no").val(response.data.chassisNo);
                $("#model_code").val(response.data.modelCode);
                $("#description").val(response.data.description);
                $("#seating_capacity").val(response.data.seating_capacity);
                $("#cubic_meter").val(response.data.cubic_meter);
                if (response.data.is_featured == 1) {
                    $("#is_featured").prop('checked',
                        true);
                } else {
                    $("#is_featured").prop('checked',
                        false);
                }
                if (response.data.is_3rd_party_seller == 1) {
                    $("#is_3rd_party_seller").prop('checked',
                        true);
                } else {
                    $("#is_3rd_party_seller").prop('checked',
                        false);
                }

                if (response.data.is_gallery == 1) {
                    $("#is_gallery").prop('checked',
                        true);
                } else {
                    $("#is_gallery").prop('checked',
                        false);
                }

                response.data.carCondition.forEach(function(carCondition) {
                    $("#carCondition_" + carCondition.id + "").prop('checked',
                        true);
                });
                response.data.carStandardFeature.forEach(function(carStandardFeature) {
                    $("#standardFeature_" + carStandardFeature.id + "")
                        .prop('checked', true);
                });
                response.data.carEquipment.forEach(function(carEquipment) {
                    $("#equipment_" + carEquipment.id + "").prop('checked', true);
                });
                response.data.carInteriorExterior.forEach(function(carInteriorExterior) {
                    $("#interiorExterior_" + carInteriorExterior.id + "")
                        .prop('checked', true);
                });
                response.data.carSelfDriving.forEach(function(carSelfDriving) {
                    $("#selfDriving_" + carSelfDriving.id + "").prop('checked',
                        true);
                });
                response.data.carSafetyEquipment.forEach(function(carSafetyEquipment) {
                    $("#safetyEquipment_" + carSafetyEquipment.id + "").prop('checked', true);
                });

                $("div#alertdanger").hide();
                $("div#alertsuccess").hide();
                $('.modal-title').text("Edit Car");
                $('#carModal').modal('show');
            }
        });
    });

    $(document).on('click', '.delete', function() {
        id = $(this).attr('id');
        swal({
            title: "Are you sure?",
            text: "To delete this Car!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
        }).then(
            function() {
                $.ajax({
                    type: 'get',
                    url: '/admin/car/delete/' + id,
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
    $(document).on('click', '.imgPreview', function() {
        var carId = $(this).attr('id');
        $("#carId").val(carId);

        carImageList(carId);
        $('#carImageModal').modal('show');

    });

    function carImageList(carId) {
        $.ajax({
            url: "/admin/car/carImageById/" + carId,
            success: function(data) {
                $('#image_table_data').html(data);

            }
        });
    }
    $(document).on('click', '.carImageDelete', function() {
        id = $(this).attr('id');
        swal({
            title: "Are you sure?",
            text: "To delete this Car Image!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
        }).then(
            function() {
                $.ajax({
                    type: 'get',
                    url: '/admin/car/deleteCarImage/' + id,
                    cache: false,
                    success: function(response) {
                        if (response.hasError == false) {
                            carImageList($("#carId").val());
                        }

                    }
                });
            },
            function() {
                return false;
            });
    });

    function resetForm() {
        $(":checkbox").prop("checked", false);
        $("#title").val("");
        $("#model_year").val("");
        $("#car_up_date").val("");
        $("#car_location").val("");
        $("#mileage").val("");
        $("#repaired").val("");
        $("#displacement").val("");
        $("#chassis_no").val("");
        $("#model_code").val("");
    }

    $(document).on('click', '.carImagePosition', function() {
        var id = $(this).attr('id');
        $("#position_" + id + "").prop('disabled', false);
        $(".carImagePositionId_" + id + "").hide();
        $(".carImagePositionUpdateId_" + id + "").show();
    });

    $(document).on('click', '.carImagePositionUpdate', function() {
        var id = $(this).attr('id');
        var positionValue = $("#position_" + id + "").val();
        $.ajax({
            url: "{{ route('updatePosition') }}",
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: '{!! csrf_token() !!}',
                carImageId: id,
                position: positionValue
            },
            success: function(response) {
                console.log(response);
                if (response.hasError == false) {
                    alert("updated");
                    $("#position_" + id + "").prop('disabled', true);
                    $(".carImagePositionUpdateId_" + id + "").hide();
                    $(".carImagePositionId_" + id + "").show();
                } else {
                    alert(response.result.status);
                }
            }
        });


    });
    
    //start Car Expense javascripts

    $(document).on('click', '.expensebtn', function() {
        $("#carExpenseModal div#alertsuccess").hide();
        $("#carExpenseModal div#alertdanger").hide();
        var carId = $(this).attr('id');
        $("#expenseCarId").val(carId);
        $('#carExpenseModal').modal('show');
        carExpenseList(carId);

    });
    $('#car_expense_form').on('submit', function(event) {
        event.preventDefault();
        var carId = $("#expenseCarId").val();
        var url = "{{ route('car.expense.create') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data:  $('#car_expense_form').serialize(),
            dataType: "json",

            success: function(response) {
                $('#car_expense_form')[0].reset();
                carExpenseList(carId);
                $("#carExpenseModal div#alertsuccess").show();
                $("#carExpenseModal div#alertdanger").hide();
                $("div#alertsuccess").text(response.result.status);

            },
        });
    });
    function carExpenseList(carId) {
        $.ajax({
            url: "/admin/car/expense/" + carId,
            success: function(data) {
                $('#car_expense_data').html(data);

            }
        });
    }
    $(document).on('click', '.carExpenseDelete', function() {
        id = $(this).attr('id');
        var carId=$("#expenseCarId").val();
        swal({
            title: "Are you sure?",
            text: "To delete this Car Image!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
        }).then(
            function() {
                $.ajax({
                    type: 'get',
                    url: '/admin/car/expense/delete/' + id,
                    cache: false,
                    success: function(response) {
                        carExpenseList(carId);
                        $("#carExpenseModal div#alertsuccess").show();
                        $("#carExpenseModal div#alertdanger").hide();
                        $("div#alertsuccess").text('Expense Has been Deleted!');

                    }
                });
            },
            function() {
                return false;
            });
    });

    //end Car Expense javascripts

    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
@endpush