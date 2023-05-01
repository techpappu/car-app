@extends('layouts.backend.app')
@section('title', 'Payment list')
@push('css')
@endpush
@section('content')
    <h3>Payment List</h3>
    <div class="modal-header">
        <button type="button" id="car_add" class="btn btn-primary mr-auto" style="float: right" data-toggle="modal"
            data-target="#paymentModal">Add Pay
        </button>
    </div>
    <div class="clearfix"></div>
    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModal" aria-hidden="true"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class='col-12 modal-title text-center'>Add Pay</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
                <div class="alert alert-success" id="alertsuccess"></div>
                <form action="" id="pay_form" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="name">Order no</label>
                            <input type="text" name="order_id" class="form-control is-invalid" id="order_id"
                                placeholder="Order no" required>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="name">Payment amoount</label>
                            <input type="text" name="payment_amount" class="form-control is-invalid" id="payment_amount"
                                placeholder="Payment amount" required>
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
    <!-- Modal -->
    <div class="modal fade" id="paymentDetailsModal" tabindex="-1" role="dialog" aria-labelledby="paymentDetailsModal"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class='col-12 modal-title text-center'>Payment Details</h5>
                    <button type="button" class="close resetForm" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="order_form">
                    <div class="modal-body">
                        <div style="margin-left: 10px"><label>Balance Amount</label>
                            <span style="font-weight: bold;color: red" id="balanceAmount"></span>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Payment Id</label>
                                <p id="id"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>Order No</label>
                                <p id="order_number"></p>
                            </div>

                            <div class="col-sm-4">
                                <label>Received date</label>
                                <p id="created_at"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Payment Type</label>
                                <p id="payment_type"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>Customer name</label>
                                <p id="user_name"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>Customer email</label>
                                <p id="user_email"></p>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Phone</label>
                                <p id="phone"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>Payment amount</label>
                                <p id="payment_amount_"></p>
                            </div>
                            <div class="col-sm-4">
                                <label>isPaid?</label>
                                <p id="isPaid"></p>
                            </div>
                        </div>
                        <h3>Car Information</h3>
                        <div class="form-group">
                            <div class="carInfo"></div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary resetForm"
                                data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">

        </div>
        <div class="col-md-3">
            <div class="form-group">
                <input type="text" name="serach" id="serach" class="form-control" placeholder="Search by order no"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div id="table_data">
                        @include('car.payment_pagination_data')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
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
                url: "/admin/payment-list/fetchbyPage?page=" + page,
                success: function(data) {
                    $('#table_data').html(data);
                }
            });
        }

        $(document).on('click', '.details', function() {
            var id = $(this).attr('id');
            $.ajax({
                url: "/admin/payment/show/" + id,
                dataType: "json",
                success: function(response) {
                    //console.log(JSON.stringify(response['order'].order_items));
                    //console.log(JSON.stringify(response['balanceAmount']));
                    $("#balanceAmount").html("$" + response['balanceAmount']);
                    console.log(JSON.stringify(response['payment'].payment_amount));
                    $("#id").html(response['payment'].id);
                    $("#order_number").html(response.order.order_number);
                    var mydate = new Date(response['payment'].created_at);
                    $("#created_at").html(mydate.toDateString());
                    var payType = "Bank";
                    if (response.order.payment_type == 8) {
                        payType = "Card";
                    }
                    $("#payment_type").html(payType);
                    $("#user_name").html(response.order.user_name);
                    $("#user_email").html(response.order.user_email);
                    $("#phone").html(response.order.phone);
                    $("#payment_amount_").html(response['payment'].payment_amount);
                    var isPaid = "Refunded";
                    if (response['payment'].isPaid == 0) {
                        isPaid = "Paid";
                    }
                    $("#isPaid").html(isPaid);
                    $('.carInfo').empty();
                    response['order'].order_items.forEach(function(order_items) {
                        $('<div class="col-sm-6"> <label>Car Id</label><p>' + order_items.car
                            .id + '</p></div>').appendTo('.carInfo');
                        $('<div class="col-sm-6"> <label>Car Title</label><p>' + order_items.car
                            .title + '</p></div>').appendTo('.carInfo');
                    });
                    $('#paymentDetailsModal').modal('show');
                }
            });
        });

        $('#pay_form').on('submit', function(event) {
            event.preventDefault();

            var url = "{{ route('add-pay') }}";


            $(".ajax-load").show();
            $('#submitBtn').attr('disabled', 'disabled');
            $.ajax({
                data: $('#pay_form').serialize(),
                url: url,
                type: "POST",
                dataType: "json",

                success: function(response) {
                    console.log(JSON.stringify(response));
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
        $(document).on('keyup', '#serach', function() {
            var query = $('#serach').val();
            fetch_data_search(query);
        });

        function fetch_data_search(query) {
            $.ajax({
                url: "/admin/payment-list/fetch_data_search?query=" + query,
                success: function(data) {
                    $('#table_data').html(data);
                }
            })
        }
    </script>
@endpush
