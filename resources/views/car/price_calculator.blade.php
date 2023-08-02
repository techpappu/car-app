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
                                <x-country></x-country>
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
