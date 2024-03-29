@extends('layouts.backend.app')
@section('title', 'Admin')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">

@endpush
@section('content')
    <h3>Admin User</h3>

    <!-- Button trigger modal -->
    <div class="modal-header">
        <button type="button" id="admin_add" class="btn btn-primary mr-auto" style="float: right" data-toggle="modal"
            data-target="#adminAddModal">Add New
        </button>
    </div>
    <div class="clearfix"></div>
    <!-- Modal -->
    <div class="modal fade" id="adminAddModal" tabindex="-1" role="dialog" aria-labelledby="adminAddModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class='col-12 modal-title text-center'>Add Admin</h5>
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
                        <input type="text" id="role" name="role" value="1" style="display: none" />
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control is-invalid" id="userName" placeholder="Name"
                                required>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control is-invalid" id="email" placeholder="Email"
                                required>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>

                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control is-invalid" id="userPassword"
                                placeholder="Password" required>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>

                        </div>
                        <div class="form-group" style="display: none" id="isActive">
                            <label for="is_enabled">Is Active?</label> &nbsp;
                            <input type="checkbox" name="is_enabled" id="is_enabled" />
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
                        @include('admin.pagination_data')
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
            $('#isActive').hide();

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
                url: "/admin/user/fetchbyPage?page=" + page,
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
                    $("div#alertdanger").hide();
                    $("div#alertsuccess").hide();
                    $('#id').val(response.data.id);
                    $('#userName').val(response.data.name);
                    $('#email').val(response.data.email);
                    $('#userPassword').prop('required',false);
                    if(response.data.isEnabled == 1){
                        $('#is_enabled').prop('checked', true);

                    }else{
                        $('#is_enabled').prop('checked', false);
                    }
                    $('#isActive').show();
                    $('.modal-title').text("Edit User");
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
