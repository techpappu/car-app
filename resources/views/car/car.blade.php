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
    <div class="modal fade" id="carModal" tabindex="-1" role="dialog" aria-labelledby="carModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class='col-12 modal-title text-center'>Add Car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
                <div class="alert alert-success" id="alertsuccess"></div>
                <form action="" id="car_form" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="text" id="id" name="id" style="display: none" />
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="brand_id">Select a brand</label>
                                <select class="form-control" name="brand_id" id="brand_id">
                                    @foreach ($brand as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="model_id">Select a model</label>
                                <select class="form-control" name="model_id" id="model_id">
                                    @foreach ($brand as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="body_style_id">Select a body style</label>
                                <select class="form-control" name="body_style_id" id="body_style_id">
                                    @foreach ($brand as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="color_id">Select a color</label>
                                <select class="form-control" name="color_id" id="color_id">
                                    @foreach ($brand as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="title">Title</label>
                                <input type="text" class="form-control is-invalid" id="title" placeholder="Car title"
                                    required>
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
                                    <input type="text" class="form-control pull-right datepicker" id="" name="model_year">
                                </div>
                                <span class="text-danger">
                                    <strong id="name-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="stock">Stock Number</label>
                                <input type="text" class="form-control is-invalid" id="" placeholder="Car title" required>
                                <span class="text-danger">
                                    <strong id="name-error"></strong>
                                </span>
                            </div>

                            <div class="col-sm-4">
                                <label for="model_year">Up date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" id="" name="model_year">
                                </div>
                                <span class="text-danger">
                                    <strong id="name-error"></strong>
                                </span>
                            </div>
                            <div class="col-sm-4">
                                <label for="stock">Location</label>
                                <input type="text" class="form-control is-invalid" id="" placeholder="Car title" required>
                                <span class="text-danger">
                                    <strong id="name-error"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="stock">Mileage</label>
                                <input type="text" class="form-control is-invalid" id="" placeholder="Car title" required>
                                <span class="text-danger">
                                    <strong id="name-error"></strong>
                                </span>
                            </div>
                            <div class="col-sm-4">
                                <label for="stock">Repaired</label>
                                <input type="text" class="form-control is-invalid" id="repaired" name="repaired"
                                    placeholder="Car title" required>
                                <span class="text-danger">
                                    <strong id="name-error"></strong>
                                </span>
                            </div>
                            <div class="col-sm-4">
                                <label for="steering">Select steering</label>
                                <select class="form-control" name="steering" id="steering">
                                    <option value="Left">Left</option>
                                    <option value="Right">Right</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="transmission">Select Transmission</label>
                                <select class="form-control" name="transmission" id="transmission">
                                    <option value="AT">AT</option>
                                    <option value="NT">NT</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="fuel">Select Fuel</label>
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
                                <label for="doors">Select Doors</label>
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


                        <h3>Specific Info</h3>
                        <div class="form-group">
                            <h4>Car Condition</h4>
                            @foreach ($carCondition as $row)

                                <label>
                                    <input type="checkbox">
                                    {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Standard Features</h4>
                            @foreach ($standardFeature as $row)
                                <label>
                                    <input type="checkbox">
                                    {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Equipment</h4>
                            @foreach ($equipment as $row)
                                <label>
                                    <input type="checkbox">
                                    {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Interior / Exterior</h4>
                            @foreach ($interiorExterior as $row)
                                <label>
                                    <input type="checkbox">
                                    {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Self-driving</h4>
                            @foreach ($selfDriving as $row)
                                <label>
                                    <input type="checkbox">
                                    {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <h4>Safety Equipement</h4>
                            @foreach ($safetyEquipment as $row)
                                <label>
                                    <input type="checkbox">
                                    {{ $row->name }}
                                </label>
                            @endforeach
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
        $('#car_add').click(function() {
            $("div#alertdanger").hide();
            $("div#alertsuccess").hide();
            $('#car_form')[0].reset();

        });

        $(document).ready(function() {
            $("div#alertdanger").hide();
            $("div#alertsuccess").hide();
            $(".ajax-load").hide();

            //Date picker
            $('.datepicker').datepicker({
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
            })
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });



        });

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

            $(".ajax-load").show();
            $('#submitBtn').attr('disabled', 'disabled');
            $.ajax({
                data: $('#body_style_form').serialize(),
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
                    $("#alertdanger").text(er.responseJSON.errors.name);
                }
            });
        });
    </script>
@endpush
