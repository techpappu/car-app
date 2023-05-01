@extends('frontend.home.layout')
@section('title', 'Car Review')
@push('css')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

   <style>
    .rate2
        {
            font-size: 35px;
        }
        .rate2 .rate-hover-layer
        {
            color: pink;
        }
        .rate2 .rate-select-layer
        {
            color: red;
        }
    .MultiFile-list{
        margin-top: 10px;
    }
    img{
        margin-left: 5px;
    }
    </style>
@endpush

@section('content')
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">Review</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row" style="margin: 0 auto; max-width:832px">



            <div class="col-sm-12" style="background: #F4F4F4;">
                <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert" style="margin-top: 5px"></div>
                <div class="alert alert-success" id="alertsuccess" style="margin-top: 5px"></div>
                <form class="form" action="#" method="post" id="reviewForm" enctype="multipart/form-data" style="margin-top: -10px">
                    @csrf
                    <input type="hidden" name="car_id" id="car_id" value="{{ Request::get('id')}}" />
                    <div class="form-group">
                        <div class="col-xs-12">
                         
                                <label for="description">
                                    <h4>Description</h4>
                                </label>
                                <textarea class="form-control" id="description" name="description" rows="2" placeholder="Description"></textarea>
                           
                                <label for="rating">
                                    <h4>Rating</h4>
                                </label>
                                <div class="rate2"></div>
                                    <input type="hidden" name="rating" id="rating" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-field">
                                <label class="active">Photos</label> 
                                <input type="file" name="images[]" class="multi with-preview" multiple />
                            </div>
                            
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="col-xs-12" style="text-align: center">
                            <br>
                            <button id="submitBtn" class="btn btn-primary btn-success" type="submit"
                                style="width: 100px; margin-bottom: 2px"><i class="glyphicon glyphicon-ok-sign"></i>
                                Submit</button>
                            <button type="button" class="ajax-load">
                                <center><img src={{ URL::to('/') }}/ajax-loader2.gif alt="Loading..." /></center>
                            </button>
                        </div>
                    </div>

                </form>


            </div>


        @endsection

        @push('js')
        <script src="{{ asset('js/rater.js') }}"></script>
         <script src="{{ asset('js/jquery.MultiFile.js') }}"></script>
        
        <script>
            $(document).ready(function(){
                $("div#alertdanger").hide();
                $("div#alertsuccess").hide();
                $(".ajax-load").hide();

                var options = {
                    max_value: 5,
                    step_size: 0.5,
                    initial_value: 0,
                    update_input_field_name: $("#rating"),
                }
              
    
                $(".rate2").rate(options);
    
                $(".rate2").on("change", function(ev, data){
                    console.log(data.from, data.to);
                });
    
                $(".rate2").on("updateError", function(ev, jxhr, msg, err){
                    console.log("This is a custom error event");
                });
    
                $(".rate2").rate("setAdditionalData", {id: 42});
                $(".rate2").on("updateSuccess", function(ev, data){
                    console.log(data);
                });
                $('.input-images').imageUploader();

            });

            $('#reviewForm').on('submit', function(event) {
                    event.preventDefault();

                    var url = "{{ route('review-post') }}";

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
                            $("#alertdanger").text(er.responseJSON.message);
                        }
                    });
                });
        </script>
        @endpush
