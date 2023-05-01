@extends('layouts.backend.app')
@section('title', 'Brand')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">
    <style>
        .imgPreview img {
            padding: 8px;
            max-width: 100px;
        }

    </style>
@endpush
@section('content')
    <h3>Car Brand new</h3>

    <!-- Button trigger modal -->
    <div class="modal-header">
        <button type="button" id="brand_add" class="btn btn-primary mr-auto" style="float: right" data-toggle="modal"
            data-target="#brandModal">Add New
        </button>
    </div>
    <div class="clearfix"></div>
    <!-- Modal -->
    <div class="modal fade" id="brandModal" tabindex="-1" role="dialog" aria-labelledby="brandModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class='col-12 modal-title text-center'>Add Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
                <div class="alert alert-success" id="alertsuccess"></div>
                <form action="" id="brand_form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="text" id="id" name="id" style="display: none" />
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control is-invalid" id="brandName"
                                placeholder="Brand Name" required>
                            <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="user-image mb-3 text-center">
                                <div class="imgPreview"> </div>
                            </div>
                            <label for="image">Image</label>
                            <input type="file" name="image"  id="image" />
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
                        @include('car.brand_pagination_data')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>
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

            $('#image').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>
    <script>
        function resetForm(){
            $("div#alertdanger").hide();
            $("div#alertsuccess").hide();
            $('#brand_form')[0].reset();
            $(".imgPreview").empty();
        }
        $('#brand_add').click(function() {
            resetForm();
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
                url: "/admin/car/brand/fetchbyPage?page=" + page,
                success: function(data) {
                    $('#table_data').html(data);
                }
            });
        }
        $('#brand_form').on('submit', function(event) {
            event.preventDefault();
            var id = $("#id").val();
            var url = "{{ route('brand.add') }}";
            if (id) {
                url = "{{ route('brand.update') }}";
            }
            var formdata = new FormData(this);
            $(".ajax-load").show();
            $('#submitBtn').attr('disabled', 'disabled');
            $.ajax({
                url: url,
                type: "POST",
                data: formdata,
                mimeTypes: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
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

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: "/admin/car/brand/show/" + id,
                dataType: "json",
                success: function(response) {
                    resetForm();
                    $('#id').val(response.data.id);
                    $('#brandName').val(response.data.name);     
                    $(".imgPreview").append('<img src="{{ URL::to('/') }}/upload/images/'+response.data.image+'">');
              
                    $('.modal-title').text("Edit Brand");
                    $('#brandModal').modal('show');
                }
            });
        });

        $(document).on('click', '.delete', function() {
            id = $(this).attr('id');
            swal({
                title: "Are you sure?",
                text: "To delete this Brand!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
            }).then(
                function() {
                    $.ajax({
                        type: 'get',
                        url: '/admin/car/brand/delete/' + id,
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
