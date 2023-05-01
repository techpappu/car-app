@extends('layouts.backend.app')
@section('title', 'Order List')
@push('css')
    <link rel="stylesheet"
        href="{{ asset('assets/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <style>
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        th {
            text-align: center;
        }

        body .orderUpdate {
            max-width: 70%;
            width: auto !important;
        }

        .modal-body {
            height: 80vh;
            overflow-y: auto;
        }
    </style>
@endpush
@section('content')
    <h3>User Order List</h3>

    <div class="clearfix"></div>
    <!-- Modal -->
    <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="orderDetailsModal"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class='col-12 modal-title text-center'>Order Details</h5>
                    <button type="button" class="close resetForm" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="order_form">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Order No</label>
                                <p id="order_no"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>Sub Total</label>
                                <p id="item_total_price"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>Total quantity</label>
                                <p id="total_quantity"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Delivery charge</label>
                                <p id="delivery_charge"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>Total price</label>
                                <p id="total_price"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>Payment Type</label>
                                <p id="payment_type"></p>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Order date</label>
                                <p id="order_date"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>isPaid?</label>
                                <p id="isPaid"></p>
                            </div>

                            <div class="col-sm-4">
                                <label>Status</label>
                                <p id="status"></p>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>User name</label>
                                <p id="user_name"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>Email</label>
                                <p id="user_email"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>Phone</label>
                                <p id="phone"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>User message</label>
                                <p id="user_message"></p>
                            </div>
                        </div>
                        <h3>Car Information</h3>
                        <div class="form-group">
                            <div class="carInfo"></div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary resetForm" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <!-- Modal -->
    <div class="modal fade" id="orderUpdateModal" tabindex="-1" role="dialog" aria-labelledby="orderUpdateModal"
        aria-hidden="true">
        <div class="modal-dialog orderUpdate" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class='col-12 modal-title text-center'>Update Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-danger alert-dismissible" id="alertdanger_order" role="alert"></div>
                <div class="alert alert-success" id="alertsuccess_order"></div>
                <form action="" id="order_update_form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="text" id="id" name="id" style="display:none" />
                        <h4>Ship details</h4>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="ship_name">Ship name</label>
                                    <input type="text" name="ship_name" class="form-control" id="ship_name"
                                        placeholder="Ship name">
                                </div>
                                <div class="col-md-3">
                                    <label for="voyage_no">Voyage no</label>
                                    <input type="text" name="voyage_no" class="form-control" id="voyage_no"
                                        placeholder="Voyage no">
                                </div>
                                <div class="col-md-3">
                                    <label for="ship_date">Ship date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="ship_date" class="form-control pull-right datepicker"
                                            id="ship_date" placeholder="Ship date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="est_arrival_date">Est. arrival date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="est_arrival_date"
                                            class="form-control pull-right datepicker" id="est_arrival_date"
                                            placeholder="Est. arrival date">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <h4>Pricing and Invoice details</h4>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="discount">Discount</label>
                                    <input type="number" name="discount" class="form-control" id="discount"
                                        placeholder="Discount amount">
                                </div>
                                <div class="col-md-3">
                                    <label for="invoice_no">Invoice no</label>
                                    <input type="text" name="invoice_no" class="form-control" id="invoice_no"
                                        placeholder="Invoice no">
                                </div>
                                <div class="col-md-3">
                                    <label for="invoice_date">Invoice date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="invoice_date"
                                            class="form-control pull-right datepicker" id="invoice_date"
                                            placeholder="Invoice date">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <h4>Inspection and BL details</h4>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="inspec_request_date">Request date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="inspec_request_date"
                                            class="form-control pull-right datepicker" id="inspec_request_date"
                                            placeholder="Request date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="tracking_no">Tracking no</label>
                                    <input type="text" name="tracking_no" class="form-control" id="tracking_no"
                                        placeholder="Tracking no">
                                </div>
                                <div class="col-md-3">
                                    <label for="shipping_date">Shipping date</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="shipping_date"
                                            class="form-control pull-right datepicker" id="shipping_date"
                                            placeholder="Shipping date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Consignee</h4>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="cons_name">Name</label>
                                    <input type="text" name="cons_name" class="form-control" id="cons_name"
                                        placeholder="Name">
                                </div>
                                <div class="col-md-3">
                                    <label for="cons_address">Address</label>
                                    <input type="text" name="cons_address" class="form-control" id="cons_address"
                                        placeholder="Address">
                                </div>
                                <div class="col-md-3">
                                    <label for="cons_phone">Phone</label>
                                    <input type="text" name="cons_phone" class="form-control" id="cons_phone"
                                        placeholder="Phone">
                                </div>
                                <div class="col-md-3">
                                    <label for="cons_country">Country</label>
                                    <input type="text" name="cons_country" class="form-control" id="cons_country"
                                        placeholder="Country">
                                </div>
                                <div class="col-md-3">
                                    <label for="cons_city">City</label>
                                    <input type="text" name="cons_city" class="form-control" id="cons_city"
                                        placeholder="City">
                                </div>
                                <div class="col-md-3">
                                    <label for="cons_shipper">Shipper</label>
                                    <input type="text" name="cons_shipper" class="form-control" id="cons_shipper"
                                        placeholder="Shipper">
                                </div>
                                <div class="col-md-3">
                                    <label for="cons_email">Email</label>
                                    <input type="email" name="cons_email" class="form-control" id="cons_email"
                                        placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="document">Documents</label>
                            <input type="file" name="images[]" class="multi with-preview" multiple />
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
     <div class="modal fade" id="attachCertificateModal" tabindex="-1" role="dialog" aria-labelledby="attachCertificateModal"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class='col-12 modal-title text-center'>Attach Certificate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger alert-dismissible" id="alertdanger_attach_certificate" role="alert"></div>
                <div class="alert alert-success" id="alertsuccess__attach_certificate"></div>
                <form action="" id="order_attach_certificate_form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="text" id="order_id" name="order_id" style="display:none" />
                  
                        <div class="form-group">                            
                            <label for="english_file">English</label>
                            <input type="file" name="english_file"  id="english_file" />
                        </div>
                        <div class="form-group">                            
                            <label for="japanese_file">Japanese</label>
                            <input type="file" name="japanese_file"  id="japanese_file" />
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submitAttachCertificateBtn" class="btn btn-primary">SUBMIT</button>
                            <button type="button" class="ajax-load">
                                <center><img src={{ URL::to('/') }}/ajax-loader2.gif alt="Loading..." /></center>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div style="display: none" class="alert alert-danger alert-dismissible" id="alertdanger"
                        role="alert">
                    </div>
                    <div style="display: none" class="alert alert-success" id="alertsuccess"></div>
                    <div id="table_data">
                        @include('car.order_list_pagination_data')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <script src="{{ asset('js/jquery.MultiFile.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("div#alertdanger").hide();
            $("div#alertsuccess").hide();
            $("div#alertdanger_order").hide();
            $("div#alertsuccess_order").hide();
            $("div#alertdanger_attach_certificate").hide();
            $("div#alertsuccess__attach_certificate").hide();
            
            $(".ajax-load").hide();
            // $('.input-images').imageUploader();
            //Date picker
            $('.datepicker').datepicker({
                todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                format: 'mm/dd/yyyy'
            });
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            $('ul.dropdown-menu li').click(function(e) {
                var statusValue = $(this).text();
                var id = $(this).attr("lead-id");
                var status = $(this).attr("status");
                orderStatusUpdate(status, id, statusValue);

            });
        });

        function fetch_data(page) {
            $.ajax({
                url: "/admin/order-list/fetchbyPage?page=" + page,
                success: function(data) {
                    $('#table_data').html(data);
                }
            });
        }

        function orderStatusUpdate(status, id, statusValue) {
            $.ajax({
                url: '{{ route('order-status') }}',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    _token: '{!! csrf_token() !!}',
                    status: status,
                    id: id
                },
                success: function(response) {
                    console.log(response);
                    if (response.hasError == false) {
                        $("div#alertdanger").hide();
                        $("div#alertsuccess").show();
                        $("#alertsuccess").text(response.result.status);
                        $('#statusValue_' + id).replaceWith('<td id="statusValue_' + id + '">' + statusValue +
                            '</td>');
                        //fetch_data(1);

                    } else {
                        alert(response.result.status);
                    }
                }
            });
        }

        $(document).on('click', '.details', function() {
            var id = $(this).attr('id');
            $.ajax({
                url: "/admin/order/show/" + id,
                dataType: "json",
                success: function(response) {
                    $("#order_no").html(response.order_number);
                    $("#item_total_price").html("$" + response.item_total_price);
                    $("#total_quantity").html(response.total_quantity);
                    $("#delivery_charge").html("$" + response.delivery_charge);
                    $("#total_price").html("$" + response.total_price);
                    var payType = "Cash";
                    if (response.payment_type == 8) {
                        payType = "Card";
                    }
                    $("#payment_type").html(payType);

                    $("#order_date").html(response.order_date);
                    var isPaid = "No";
                    if (response.isPaid == 1) {
                        isPaid = "Yes";
                    }
                    $("#isPaid").html(isPaid);
                    var status = "Processing";
                    if (response.status == 2) {
                        status = "Approved";
                    } else if (response.status == 3) {
                        status = "On shipping";
                    } else if (response.status == 4) {
                        status = "Shipped";
                    } else if (response.status == 5) {
                        status = "Completed";
                    } else if (response.status == 6) {
                        status = "Canceled";
                    }
                    $("#status").html(status);
                    $("#user_name").html(response.user_name);
                    $("#user_email").html(response.user_email);
                    $("#phone").html(response.phone);
                    $("#user_message").html(response.user_message);
                    $('.carInfo').empty();
                    response.order_items.forEach(function(order_items) {
                        $('<div class="col-sm-4"> <label>Car Id</label><p>' + order_items
                            .car_id + '</p></div>').appendTo('.carInfo');
                        $('<div class="col-sm-4"> <label>Qunatity</label><p>' + order_items
                            .quantity + '</p></div>').appendTo('.carInfo');
                        $('<div class="col-sm-4"> <label>Unit Price</label><p>$' + order_items
                            .unit_price + '</p></div>').appendTo('.carInfo');

                    });

                    $('#orderDetailsModal').modal('show');
                }
            });
        });

        $(document).on('click', '.update', function() {
            var id = $(this).attr('id');
            $("#id").val(id);
            $.ajax({
                url: "/admin/order-admin-info/show/" + id,
                dataType: "json",
                success: function(response) {
                    $("#ship_name").val(response.ship_name);
                    $("#voyage_no").val(response.voyage_no);
                    if (response.ship_date != null) {
                        var ship_date = response.ship_date.split("-");
                        $("#ship_date").val(ship_date[1] + "/" + ship_date[2] + "/" + ship_date[0]);
                    }

                    if (response.est_arrival_date != null) {
                        var est_arrival_date = response.est_arrival_date.split("-");
                        $("#est_arrival_date").val(est_arrival_date[1] + "/" + est_arrival_date[2] + "/" + est_arrival_date[0]);
                    }

                    $("#discount").val(response.discount);
                    $("#invoice_no").val(response.invoice_no);

                    if (response.invoice_date != null) {
                        var invoice_date = response.invoice_date.split("-");
                        $("#invoice_date").val(invoice_date[1] + "/" + invoice_date[2] + "/" + invoice_date[0]);
                    }

                    if (response.inspec_request_date != null) {
                        var inspec_request_date = response.inspec_request_date.split("-");
                        $("#inspec_request_date").val(inspec_request_date[1] + "/" + inspec_request_date[2] + "/" + inspec_request_date[0]);
                    }

                    $("#tracking_no").val(response.tracking_no);
                    if (response.shipping_date != null) {
                        var shipping_date = response.shipping_date.split("-");
                        $("#shipping_date").val(shipping_date[1] + "/" + shipping_date[2] + "/" + shipping_date[0]);
                    }

                    $("#cons_name").val(response.cons_name);
                    $("#cons_address").val(response.cons_address);
                    $("#cons_phone").val(response.cons_phone);
                    $("#cons_country").val(response.cons_country);
                    $("#cons_city").val(response.cons_city);
                    $("#cons_shipper").val(response.cons_shipper);
                    $("#cons_email").val(response.cons_email);

                    $('#orderUpdateModal').modal('show');
                }
            });


        });

        $('#order_update_form').on('submit', function(event) {
            event.preventDefault();

            var url = "{{ route('order-update') }}";

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
                        $("div#alertdanger_order").hide();
                        $("div#alertsuccess_order").show();
                        $("#alertsuccess_order").text(response.result.status);
                        $(".ajax-load").hide();
                        $('#submitBtn').removeAttr('disabled');
                    } else {
                        $(".ajax-load").hide();
                        $('#submitBtn').removeAttr('disabled');
                        $("div#alertsuccess_order").hide();
                        $("div#alertdanger_order").show();
                        $("#alertdanger_order").text(response.result.status);
                    }
                },
                error: function(er) {
                    $(".ajax-load").hide();
                    $('#submitBtn').removeAttr('disabled');
                    $("div#alertsuccess_order").hide();
                    $("div#alertdanger_order").show();
                    $("#alertdanger_order").text(er.responseJSON.message);
                }
            });
        });
        $(document).on('click', '.attachCertificate', function() {
            var id = $(this).attr('id');
            $("#order_id").val(id);
            $('#attachCertificateModal').modal('show');
        });

        $('#order_attach_certificate_form').on('submit', function(event) {
            event.preventDefault();

            var url = "{{ route('order-attached-certificate') }}";

            var formdata = new FormData(this);
            $(".ajax-load").show();
            $('#submitAttachCertificateBtn').attr('disabled', 'disabled');
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
                        $("div#alertdanger_attach_certificate").hide();
                        $("div#alertsuccess__attach_certificate").show();
                        $("#alertsuccess__attach_certificate").text(response.result.status);
                        $(".ajax-load").hide();
                        $('#submitAttachCertificateBtn').removeAttr('disabled');
                    } else {
                        $(".ajax-load").hide();
                        $('#submitAttachCertificateBtn').removeAttr('disabled');
                        $("div#alertsuccess__attach_certificate").hide();
                        $("div#alertdanger_attach_certificate").show();
                        $("#alertdanger_attach_certificate").text(response.result.status);
                    }
                },
                error: function(er) {
                    $(".ajax-load").hide();
                    $('#submitAttachCertificateBtn').removeAttr('disabled');
                    $("div#alertsuccess__attach_certificate").hide();
                    $("div#alertdanger_attach_certificate").show();
                    $("#alertdanger_attach_certificate").text(er.responseJSON.message);
                }
            });
        });
    </script>
@endpush
