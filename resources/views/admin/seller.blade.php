@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">
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
    <h3>Seller User</h3>

    <!-- Button trigger modal -->
    <div class="modal-header">
        <button type="button" id="admin_add" class="btn btn-primary mr-auto" style="float: right" data-toggle="modal"
            data-target="#adminAddModal">Add New
        </button>
    </div>
    <div class="clearfix"></div>
    <!-- Modal -->
    <div class="modal fade" id="adminAddModal" tabindex="-1" role="dialog" aria-labelledby="adminAddModal"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class='col-12 modal-title text-center'>Add Seller</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
                <div class="alert alert-success" id="alertsuccess"></div>
                <form action="" id="admin_form" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="text" id="id" name="id" style="display: none" />
                        <input type="text" id="role" name="role" value="2" style="display: none" />

                        <div class="form-group"  id="isActive">
                            <label for="is_enabled">Is Active?</label> &nbsp;
                            <input type="checkbox" name="is_enabled" id="is_enabled" />
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="userPassword"
                                placeholder="Password" required>
                        </div>
                        <div class="row">
                            <h2 class="text-center">Owner Details</h2>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="userName" placeholder="Name"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="number">Number</label>
                                    <input type="number" name="number" class="form-control" id="number" placeholder="Phone Number"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h2 class="text-center">Company Details</h2>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Enter Company Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company_fax">Company Fax Number</label>
                                    <input type="text" name="company_fax" class="form-control" id="company_fax" placeholder="Enter Company Fax Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="license_number">Company License Number</label>
                                    <input type="text" name="license_number" class="form-control" id="license_number" placeholder="Enter Company License Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company_address">Company Address</label>
                                    <input type="text" name="company_address" class="form-control" id="company_address" placeholder="Enter Company Address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company_number">Company Phone Number</label>
                                    <input type="number" name="company_number" class="form-control" id="company_number" placeholder="Enter Company Phone number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company_email">Company Email</label>
                                    <input type="email" name="company_email" class="form-control" id="company_email" placeholder="Enter Company Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h2 class="text-center">Bank Details</h2>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="account_name">Bank AC Holder Name</label>
                                    <input type="text" name="account_name" class="form-control" id="account_name" placeholder="Enter Account Holder Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="account_number">Bank AC Number</label>
                                    <input type="number" name="account_number" class="form-control" id="account_number" placeholder="Enter Account Number">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Enter Bank Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bank_code">Bank Code</label>
                                    <input type="text" name="bank_code" class="form-control" id="bank_code" placeholder="Enter Bank Code">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="branch_name">Branch name</label>
                                    <input type="text" name="branch_name" class="form-control" id="branch_name" placeholder="Enter Branch Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="branch_code">Branch Code</label>
                                    <input type="text" name="branch_code" class="form-control" id="branch_code" placeholder="Enter Branch Code">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="bank_address">Bank Address</label>
                                    <input type="text" name="bank_address" class="form-control" id="bank_address" placeholder="Enter Bank Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sales_commission">Sales Commission (must be in %)</label><br>
                                    <small>Enter only percent number without %</small>
                                    <input type="number" step="0.01" name="sales_commission" class="form-control" id="sales_commission" placeholder="Enter only percent number without %">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="paid_amount">Paid Amount</label><br>
                                    <small>if already has paid amount sum the amount with this amount and enter the new paid amount</small>
                                    <input type="number" step="0.01" name="paid_amount" class="form-control" id="paid_amount" placeholder="Enter Paid Amount">
                                </div>
                            </div>
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
                        @include('admin.seller_data')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>
    <script>
        $('#admin_add').click(function() {
            $("div#alertdanger").hide();
            $("div#alertsuccess").hide();
            $('#admin_form')[0].reset();
            $('#userPassword').prop('required',true);
           // $('#isActive').hide();

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
                url: "/admin/user/sellerFetchbyPage?page=" + page,
                success: function(data) {
                    $('#table_data').html(data);
                }
            });
        }
        $('#admin_form').on('submit', function(event) {
            event.preventDefault();
            var id = $("#id").val();
            var url = "{{ route('user.add') }}";
            if (id) {
                url = "{{ route('user.update') }}";
            }
            $(".ajax-load").show();
            $('#submitBtn').attr('disabled', 'disabled');
            $.ajax({
                data: $('#admin_form').serialize(),
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
                    $("#alertdanger").text(er.responseJSON.errors.email);
                }
            });
        });

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: "/admin/user/show/" + id,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("div#alertdanger").hide();
                    $("div#alertsuccess").hide();
                    $('#id').val(response.data.id);
                    $('#userName').val(response.data.name);
                    $('#email').val(response.data.email);
                    $('#number').val(response.data.number);
                    $('#address').val(response.data.address);
                    $('#company_name').val(response.data.company_name);
                    $('#company_fax').val(response.data.company_fax);
                    $('#license_number').val(response.data.license_number);
                    $('#company_address').val(response.data.company_address);
                    $('#company_number').val(response.data.company_number);
                    $('#company_email').val(response.data.company_email);
                    $('#account_name').val(response.data.account_name);
                    $('#account_number').val(response.data.account_number);
                    $('#bank_name').val(response.data.bank_name);
                    $('#bank_code').val(response.data.bank_code);
                    $('#branch_name').val(response.data.branch_name);
                    $('#branch_code').val(response.data.branch_code);
                    $('#bank_address').val(response.data.bank_address);
                    $('#sales_commission').val(response.data.sales_commission);
                    $('#paid_amount').val(response.data.paid_amount);
                    $('#userPassword').prop('required',false);
                    if(response.data.isEnabled == 1){
                        $('#is_enabled').prop('checked', true);

                    }else{
                        $('#is_enabled').prop('checked', false);
                    }
                    $('#isActive').show();
                    $('.modal-title').text("Edit Seller");
                    $('#adminAddModal').modal('show');
                }
            });
        });

        $(document).on('click', '.delete', function(){
        id = $(this).attr('id');
        swal({
                title: "Are you sure?",
                text: "To delete this User!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                }).then(
                    function () {
                        $.ajax({
                            type: 'get',
                            url: '/admin/user/delete/' + id,
                            cache: false,
                            success: function (response) {
                                if (response.hasError == false) {
                                    fetch_data(1);
                                }
                               
                            }
                        });
                    },
            function () {
            return false;
        });
    });
    </script>
@endpush
