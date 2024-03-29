@extends('frontend.home.layout')
@section('title', 'My Profile')
@push('css')
<link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />

<style>
    .form-control {
        display: block;
        width: 100%;
        background-color: #fff;
        background-image: none;
        border: 1px solid #eaeaeb;
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        margin-bottom: 20px;
        padding: 0px 16px 0px;
        color: #222;
        font-size: 14px;
        font-family: Hind;
    }
</style>
@endpush

@section('content')
<div class="section-title-page area-bg area-bg_dark area-bg_op_70">
    <div class="area-bg__inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="b-title-page bg-primary_a">My Profile</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" style="margin: 0 auto;">

        <div class="col-md-12" style="background: #F4F4F4;padding: 20px;">
            <div class="alert alert-danger alert-dismissible" id="alertdanger" role="alert"></div>
            <div class="alert alert-success" id="alertsuccess"></div>
            <form class="ui-form-3" action="#" method="post" id="profileForm" enctype="multipart/form-data" style="margin-top: 15px;">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" id="user_country" value="{{ Auth::user()->country }}"/>
                        <input type="hidden" id="user_port" value="{{ Auth::user()->port }}"/>
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" id="name" type="text" name="name" placeholder="Your first name" value="{{ Auth::user()->name }}" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" id="address_line_1" type="text" name="address_line_1" placeholder="Address" value="{{ Auth::user()->address_line_1 }}"/>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input class="form-control" id="city" type="text" name="city" placeholder="Your city" value="{{ Auth::user()->city }}"/>
                        </div>
                        <div class="form-group">
                            <label>Zipe code</label>
                            <input class="form-control" id="zipe_code" type="text" name="zipe_code" placeholder="Zipe code" value="{{ Auth::user()->zipe_code }}"/>
                        </div>
                        <div class="form-group">
                            <label>Port</label>
                            <select class='form-control' name="port" id="port" data-width="100%">
                                <option value="">Select port</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" id="last_name" type="text" name="last_name" placeholder="Your last name" value="{{ Auth::user()->last_name }}" />
                        </div>
                        <div class="form-group">
                            <label>Address (contd)</label>
                            <input class="form-control" id="address_line_2" type="text" name="address_line_2" placeholder="Address(contd)" value="{{ Auth::user()->address_line_2 }}"/>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input class="form-control" id="state" type="text" name="state" placeholder="Your state" value="{{ Auth::user()->state }}"/>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <select class='form-control' name="country" id="country" data-width="100%">
                                <option value="">Country</option>
                                <x-country></x-country>
                            </select>
                        </div>

                    </div>

                </div>

                <h3>Phone</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" style="margin-top: 25px;">
                            <input type="radio" id="choice1" name="choice" value="choice1"/>
                            <label for="choice1">Default</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact name</label>
                            <input class="form-control" id="name_1" type="text" name="name_1" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact number</label>
                            <input class="form-control" id="number_1" type="text" name="number_1" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact type</label>
                            <select class='form-control' name="type_1" id="type_1" data-width="100%">
                                <option value="comapny">Company</option>
                                <option value="mobile">Mobile</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" style="margin-top: 25px;">
                            <input type="radio" id="choice2" name="choice" value="choice2"/>
                            <label for="choice2">Default</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact name</label>
                            <input class="form-control" id="name_2" type="text" name="name_2" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact number</label>
                            <input class="form-control" id="number_2" type="text" name="number_2" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact type</label>
                            <select class='form-control' name="type_2" id="type_2" data-width="100%">
                                <option value="comapny">Company</option>
                                <option value="mobile">Mobile</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" style="margin-top: 25px;">
                            <input type="radio" id="choice3" name="choice" value="choice3"/>
                            <label for="choice3">Default</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact name</label>
                            <input class="form-control" id="name_3" type="text" name="name_3" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact number</label>
                            <input class="form-control" id="number_3" type="text" name="number_3" />
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Contact type</label>
                            <select class='form-control' name="type_3" id="type_3" data-width="100%">
                                <option value="comapny">Company</option>
                                <option value="mobile">Mobile</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <label>Change email</label> <button type="button" class="toggleEmailBtn span1" style="margin-left: 10px;background: #e9dede;"><i class="icon-plus"></i></button>
                        <div id="changeEmail" style="display: none">
                            <label for="currentEmail">
                                Current email
                            </label>
                            <input class="form-control" type="email" name="currentEmail" id="currentEmail" placeholder="Enter your email" value="{{ Auth::user()->email }}" readonly>
                            <label for="currentPasswordInEmail">
                                Password
                            </label>
                            <input class="form-control" type="password" name="currentPasswordInEmail" id="currentPasswordInEmail" placeholder="Enter your password">
                            <label for="newEmail">
                                New email
                            </label>
                            <input class="form-control" type="email" name="newEmail" id="newEmail" placeholder="Enter your new email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Change password</label> <button type="button" class="togglePasswordBtn span1" style="margin-left: 10px;background: #e9dede;"><i class="icon-plus"></i></button>
                        <div id="changePassword" style="display: none;">
                            <label for="currentPassword">
                                Current password
                            </label>
                            <input class="form-control" type="password" name="currentPassword" id="currentPassword" placeholder="Enter your current password">
                            <label for="currentPassword">
                                New password
                            </label>
                            <input class="form-control" type="password" name="newPassword" id="newPassword" placeholder="Enter new password">
                            <label for="confirmPassword">
                                Confirm password
                            </label>
                            <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm password">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label for="">
                            Profile picture
                        </label>

                        <div class="text-center">
                            <img src="{{ config('constant.profile_image_base_url') . '/images/' . Auth::user()->image }}" style="width: 180px;height: 180px; object-fit: cover" class="avatar img-circle img-thumbnail" alt="avatar">
                            <input type="file" class="text-center center-block file-upload" name="image" id="image">
                        </div>
                    </div>

                </div>
                <div class="col-md-12" style="text-align: center">
                    <br>
                    <button id="submitBtn" class="btn btn-lg btn-primary" type="submit" style="width: 100px; margin-bottom: 2px"><i class="glyphicon glyphicon-ok-sign"></i>
                        Update</button>
                    <button type="button" class="ajax-load">
                        <center><img src={{ URL::to('/') }}/ajax-loader2.gif alt="Loading..." /></center>
                    </button>
                </div>
            </form>
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
        $(".toggleEmailBtn").on('click', function() {

            $(this).children('.icon-minus, .icon-plus').toggleClass("icon-minus icon-plus");
            if ($(this).children().is('.icon-plus')) {
                $("#changeEmail").hide();
            } else {
                $("#changeEmail").show();
            }

        });

        $(".togglePasswordBtn").on('click', function() {

            $(this).children('.icon-minus, .icon-plus').toggleClass("icon-minus icon-plus");
            if ($(this).children().is('.icon-plus')) {
                $("#changePassword").hide();
            } else {
                $("#changePassword").show();
            }

        });


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function() {
            readURL(this);
        });
        getUserContacts();
        var user_country = $("#user_country").val();
        $('#country').val(user_country);
        if (user_country) {
            getPortByCountry(user_country);
        }
       
    });

    $('#profileForm').on('submit', function(event) {
        event.preventDefault();

        var url = "{{ route('profile-update') }}";

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
                //console.log(response);
                if (response.hasError == false) {
                    $("div#alertdanger").hide();
                    $("div#alertsuccess").show();
                    $("#alertsuccess").text(response.result.status);
                    $(".ajax-load").hide();
                    $('#submitBtn').removeAttr('disabled');
                    resetField();

                } else {
                    $(".ajax-load").hide();
                    $('#submitBtn').removeAttr('disabled');
                    $("div#alertsuccess").hide();
                    $("div#alertdanger").show();
                    $("#alertdanger").text(response.result.status);
                }
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            },
            error: function(er) {
                $(".ajax-load").hide();
                $('#submitBtn').removeAttr('disabled');
                $("div#alertsuccess").hide();
                $("div#alertdanger").show();
                $("#alertdanger").text(er.responseJSON.message);
                $('html, body').animate({
                    scrollTop: 0
                }, 'slow');
            }
        });
    });

    function resetField() {
        $("#currentPasswordInEmail").val("");
        $("#newEmail").val("");
        $("#currentPassword").val("");
        $("#newPassword").val("");
        $("#confirmPassword").val("");
    }


    $('#country').change(function() {
            var country = $(this).val();
            if (country) {
                getPortByCountry(country);
            } else {
              
               
                $("#port").empty();
                $("#port").append('<option value="">Select port</option>');             
              
            }

        });

        function getPortByCountry(country) {
            $.ajax({
                type: "get",
                url: "/port-list/" + country,
                success: function(res) {
                    if (res) {
                        $("#port").empty();
                        $("#port").append('<option value="">Select port</option>');
                        var user_port = $("#user_port").val();
                        res.data.forEach(function(ports) {
                            if(user_port && user_port == ports.port){
                                $("#port").append('<option value="' + ports.port + '" selected>' + ports.port +
                                '</option>');
                            }else{
                                $("#port").append('<option value="' + ports.port + '">' + ports.port +
                                '</option>');
                            }
                         
                        });
                        
                       
                    }
                }
            });
        }

        function getUserContacts() {
            $.ajax({
                type: "get",
                url: "/user/contacts",
                success: function(res) {
                    console.log(res);
                    if (res) {
                      
                       var i = 0;
                        res.forEach(function(contacts) {
                            i = i+1;
                            if(contacts.active == 1){
                                $("#choice"+i).prop("checked", true);
                            }
                            $("#name_"+i).val(contacts.name);
                            $("#number_"+i).val(contacts.number);
                            $("#type_"+i).val(contacts.type);
                        });
                        
                       
                    }
                }
            });
        }
</script>
@endpush