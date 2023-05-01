@extends('layouts.backend.app')
@section('title', 'Gallery Image')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">
    <style>
        .imgPreview img {
            padding: 8px;
            max-width: 300px;
        }

    </style>
@endpush
@section('content')
    <h3>Gallery Image</h3>

    <!-- Button trigger modal -->
    <div class="modal-header">
        <button type="button" id="car_add" class="btn btn-primary mr-auto" style="float: right" data-toggle="modal"
            data-target="#galleryModal">Add New
        </button>
    </div>
    <div class="clearfix"></div>
    <!-- Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class='col-12 modal-title text-center'>Add Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
                <div class="alert alert-success" id="alertsuccess"></div>
                <form action="" id="gallery_form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="text" id="id" name="id" style="display: none" />
                        <div class="form-group">
                            <div class="user-image mb-3 text-center">
                                <div class="imgPreview"> </div>
                            </div>
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" />
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" class="form-control is-invalid" id="url" name="url" placeholder="Url">
                        </div>
                        <div class="form-group">
                            <label for="is_gallery">Is Active?</label>
                            <input type="checkbox"  name="is_active" id="is_active" />
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
                        @include('car.gallery_pagination_data')
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
            $('#gallery_form')[0].reset();
            $(".imgPreview").empty();
        }
        $('#car_add').click(function() {
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
                url: "/admin/car/gallery/fetchbyPage?page=" + page,
                success: function(data) {
                    $('#table_data').html(data);
                }
            });
        }
        $('#gallery_form').on('submit', function(event) {
            event.preventDefault();
            var id = $("#id").val();
            var url = "{{ route('gallery.add') }}";
            if (id) {
                url = "{{ route('gallery.update') }}";
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
                }
            });
        });

        $(document).on('click', '.edit', function() {
            var id = $(this).attr('id');

            $.ajax({
                url: "/admin/car/gallery/show/" + id,
                dataType: "json",
                success: function(response) {
                    resetForm();
                    $("div#alertdanger").hide();
                    $("div#alertsuccess").hide();
                    $('#id').val(response.id);
                    $(".imgPreview").append('<img src="{{ URL::to('/') }}/upload/images/'+response.image+'">');
                    $('#url').val(response.url);

                    if (response.is_active == 1) {
                        $('#is_active').prop('checked', true);

                    } else {
                        $('#is_active').prop('checked', false);
                    }
                   
                    $('.modal-title').text("Edit Gallery");
                    $('#galleryModal').modal('show');
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
                        url: '/admin/car/gallery/delete/' + id,
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
