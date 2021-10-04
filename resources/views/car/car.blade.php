@extends('layouts.backend.app')
@section('title', 'Car')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

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
        <button type="button" id="car_add" class="btn btn-primary mr-auto" style="float: right" data-toggle="modal"
            data-target="#carModal">Add New
        </button>
    </div>
    <div class="clearfix"></div>
    <!-- Modal -->
    <div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModal" aria-hidden="true"
        data-backdrop="static" data-keyboard="false">
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
                                <input type="text" class="form-control is-invalid" id="title" name="title"
                                    placeholder="Car title" required>
                                <span class="text-danger">
                                    <strong id="name-error"></strong>
                                </span>
                            </div>
                            <div class="col-sm-4">
                                <label for="model_year">Model Year</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" id="model_year"
                                        name="model_year">
                                </div>
                                <span class="text-danger">
                                    <strong id="name-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="stock_no">Stock Number</label>
                                <input type="text" class="form-control is-invalid" id="stock_no" name="stock_no"
                                    placeholder="Stock no" required>
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
                                    <input type="text" class="form-control pull-right datepicker" id="car_up_date"
                                        name="car_up_date">
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <label for="car_location">Location</label>
                                <input type="text" class="form-control is-invalid" id="car_location" name="car_location"
                                    placeholder="Location">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="mileage">Mileage</label>
                                <input type="text" class="form-control is-invalid" id="mileage" name="mileage"
                                    placeholder="Mileage">

                            </div>
                            <div class="col-sm-4">
                                <label for="repaired">Repaired</label>
                                <input type="text" class="form-control is-invalid" id="repaired" name="repaired"
                                    placeholder="Repaired">

                            </div>
                            <div class="col-sm-4">
                                <label for="steering">Steering</label>
                                <select class="form-control" name="steering" id="steering">
                                    <option value="Left">Left</option>
                                    <option value="Right">Right</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="transmission">Transmission</label>
                                <select class="form-control" name="transmission" id="transmission">
                                    <option value="AT">AT</option>
                                    <option value="NT">NT</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="fuel">Fuel</label>
                                <select class="form-control" name="fuel" id="fuel">
                                    <option value="GASOLINE">GASOLINE</option>
                                    <option value="PETROL">PETROL</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="drive_system">Select Drive System</label>
                                <select class="form-control" name="drive_system" id="drive_system">
                                    <option value="2WD">2WD</option>
                                    <option value="3WD">3WD</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="doors">Doors</label>
                                <select class="form-control" name="doors" id="doors">
                                    <option value="5D">5D</option>
                                    <option value="3D">3D</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="displacement">Displacement</label>
                                <input type="text" class="form-control" id="displacement" name="displacement"
                                    placeholder="Displacement">
                            </div>
                            <div class="col-sm-4">
                                <label for="chassis_no">Chassis No</label>
                                <input type="text" class="form-control" id="chassis_no" name="chassis_no"
                                    placeholder="Chassis No">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="model_code">Model code</label>
                                <input type="text" class="form-control" id="model_code" name="model_code"
                                    placeholder="Model code">
                            </div>

                        </div>

                        <div>&nbsp;</div>
                        <h3>Specific Info</h3>
                        <div class="form-group">
                            <h4>Car Condition</h4>
                            @foreach ($carCondition as $row)

                                <label>
                                    <input type="checkbox" name="carCondition[]" id="carCondition_{{ $row->id }}"
                                        value="{{ $row->id }}">
                                    {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Standard Features</h4>
                            @foreach ($standardFeature as $row)
                                <label>
                                    <input type="checkbox" name="standardFeature[]"
                                        id="standardFeature_{{ $row->id }}" value="{{ $row->id }}">
                                    {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Equipment</h4>
                            @foreach ($equipment as $row)
                                <label>
                                    <input type="checkbox" name="equipment[]" id="equipment_{{ $row->id }}"
                                        value="{{ $row->id }}">
                                    {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Interior / Exterior</h4>
                            @foreach ($interiorExterior as $row)
                                <label>
                                    <input type="checkbox" name="interiorExterior[]"
                                        id="interiorExterior_{{ $row->id }}" value="{{ $row->id }}">
                                    {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Self-driving</h4>
                            @foreach ($selfDriving as $row)
                                <label>
                                    <input type="checkbox" name="selfDriving[]" id="selfDriving_{{ $row->id }}"
                                        value="{{ $row->id }}">
                                    {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Safety Equipement</h4>
                            @foreach ($safetyEquipment as $row)
                                <label>
                                    <input type="checkbox" name="safetyEquipment[]"
                                        id="safetyEquipment_{{ $row->id }}" value="{{ $row->id }}">
                                    {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">

                            <div class="user-image mb-3 text-center">
                                <div class="imgPreview"> </div>
                            </div>

                            <div class="custom-file">
                                <input type="file" name="imageFile[]" class="custom-file-input" id="images"
                                    multiple="multiple">
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
                    <div id="table_data">
                        @include('car.car_pagination_data')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>
    <script
        src="{{ asset('assets/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
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
        $('#car_add').click(function() {
            $("div#alertdanger").hide();
            $("div#alertsuccess").hide();
            $('#car_form')[0].reset();

        });
        $('.resetForm').click(function() {
            resetForm();
        });
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
                format: 'dd/mm/yyyy'
            })
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });



        });

        $('#brand_id').change(function() {
            var brandId = $(this).val();
            getModelsByBrand(brandId);
        });

        function getModelsByBrand(brandId) {
            $.ajax({
                type: "get",
                url: "/car/model/" + brandId,
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
                url: "/car/fetchbyPage?page=" + page,
                success: function(data) {
                    $('#table_data').html(data);
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
                url: "/car/show/" + id,
                dataType: "json",
                success: function(response) {
                    $('#id').val(response.data.id);
                    $("#brand_id").val(response.data.brand);
                    getModelsByBrand(response.data.brand);
                    $("#model_id").val(response.data.model);
                    $("#body_style_id").val(response.data.color);
                    $("#color_id").val(response.data.bodyStyle);
                    $("#title").val(response.data.title);
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
                    $("#repaired").val(response.data.repaired);
                    $("#steering").val(response.data.steering);
                    $("#transmission").val(response.data.transmission);
                    $("#fuel").val(response.data.fuel);
                    $("#drive_system").val(response.data.drive_system);
                    $("#doors").val(response.data.doors);
                    $("#displacement").val(response.data.displacement);
                    $("#chassis_no").val(response.data.chassisNo);
                    $("#model_code").val(response.data.modelCode);

                    response.data.carCondition.forEach(function(carCondition) {
                        $("#carCondition_" + carCondition.car_condition_id + "").prop('checked',
                            true);
                    });
                    response.data.carStandardFeature.forEach(function(carStandardFeature) {
                        $("#standardFeature_" + carStandardFeature.standard_feature_id + "")
                            .prop('checked', true);
                    });
                    response.data.carEquipment.forEach(function(carEquipment) {
                        $("#equipment_" + carEquipment.equipment_id + "").prop('checked', true);
                    });
                    response.data.carInteriorExterior.forEach(function(carInteriorExterior) {
                        $("#interiorExterior_" + carInteriorExterior.interior_exterior_id + "")
                            .prop('checked', true);
                    });
                    response.data.carSelfDriving.forEach(function(carSelfDriving) {
                        $("#selfDriving_" + carSelfDriving.self_driving_id + "").prop('checked',
                            true);
                    });
                    response.data.carSafetyEquipment.forEach(function(carSafetyEquipment) {
                        $("#safetyEquipment_" + carSafetyEquipment.safety_equipment_id + "")
                            .prop('checked', true);
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
                        url: '/car/delete/' + id,
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
    </script>
@endpush
