@extends('frontend.home.layout')
@section('title', 'Registration')
@push('css')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        body {
            padding: 0;
            margin: 0
        }

        #container {
            background-image: url("{{ url('/') }}/wallpaper/1.jpeg");
            width: 100%;
            height: 650px
        }

        #formcontainer {
            width: 450px;
            height: 550px;
            background-color: white;
            position: relative;
            top: 50px;
            left: 35%;
            box-shadow: 0 0 20px black;
            border-radius: 8px
        }

        #img1 {
            width: 450px;
            height: 150px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px
        }

        #cross {
            width: 20px;
            height: 20px;
            position: relative;
            top: -145px;
            left: 94%
        }

        #text {
            font-size: 25px;
            font-family: 'Roboto Slab', serif;
            text-align: center;
            position: relative;
            top: -28px
        }

        #name,
        #last_name,
        #email,
        #password,
        #password-confirm {
            width: 350px;
            height: 1px;
            position: relative;
            top: -30px;
            left: 12%;
            border-radius: 5px;
            border-width: 1px;
            border-color: gray;
            padding: 20px;
            font-size: 20px;
            outline: none;
            margin-bottom: 15px
        }

        #name:hover,
        #email:hover,
        #password:hover,
        #password-confirm:hover {
            background-color: gainsboro
        }

        #name:focus,
        #email:focus,
        #password:focus,
        #password-confirm:focus {
            box-shadow: 0 0 10px green;
            border: none
        }

        #check {
            position: relative;
            top: 12px;
            left: -66%
        }

        #text1 {
            font-size: 17px;
            font-family: 'Roboto Slab', serif;
            position: relative;
            top: -40px;
            left: 17%;
            color: gray
        }


        #login {
            width: 350px;
            height: 40px;
            position: relative;
            left: 12%;
            top: -15px;
            cursor: pointer;
            font-size: 22px;
            font-family: 'Roboto Slab', serif;
            border-radius: 5px;
            border: none;
            background-color: rgb(0, 128, 0);
            color: white
        }

        #login:hover {
            background-color: rgb(0, 128, 0, 0.7)
        }


        #text2 {
            font-size: 16px;
            font-family: 'Roboto Slab', serif;
            position: relative;
            top: -70px;
            left: 40%;
            color: gray
        }


        #text3 {
            position: relative;
            top: -66px;
            left: 32%;
            font-size: 15px;
            font-family: 'Roboto Slab', serif;
            color: gray
        }
       
        .errorMsg{
            display: block;
    text-align: center;
    margin-bottom: 30px;
        }
        @media only screen and (max-width:830px) {
            #formcontainer {
                position: relative;
                left: 20%
            }
        }

        @media only screen and (max-width:620px) {
            #formcontainer {
                position: relative;
                left: 10%
            }
        }

        @media only screen and (max-width:530px) {
            #formcontainer {
                position: relative;
                left: 4%
            }
        }

    </style>
@endpush
@section('content')

    <div id="container">
        <div id="formcontainer">
            <img id="img1"
                src="{{ url('/') }}/wallpaper/1.jpeg">
            <a href="#"><img id="cross" src="https://image.flaticon.com/icons/svg/148/148766.svg"></a>
            <p id="text">Sign Up</p>
            <div class="alert alert-danger alert-dismissible errorMsg" id="alertdanger" role="alert"></div>
            <div class="alert alert-success errorMsg" id="alertsuccess"></div>
            <div class="card2 card border-0 px-4 py-5">
                <form action="" id="register_form" method="post">
                    @csrf
                    <input id="name" name="name" type="text" placeholder="Enter your first name" required>
                    <input id="last_name" name="last_name" type="text" placeholder="Enter your last name" required>
                    <input id="email" name="email" type="email" placeholder="Email" required>
                    <<input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password" placeholder="Enter password">
                        <input id="password-confirm" type="password" name="password_confirmation" required
                            autocomplete="new-password" placeholder="Enter confirm password">
                        <button id="login" type="submit">Submit</button>
                        <button type="button" class="ajax-load">
                            <center><img src={{ URL::to('/') }}/ajax-loader2.gif alt="Loading..." /></center>
                        </button>
                        
                </form>

            </div>
        </div>

    @endsection

    @push('js')
        <script>
            $(document).ready(function() {
                $("div#alertdanger").hide();
                $("div#alertsuccess").hide();
                $(".ajax-load").hide();
            });
            $('#register_form').on('submit', function(event) {
                event.preventDefault();
                var url = "{{ route('user.register') }}";
                $('#submitBtn').attr('disabled', 'disabled');
                $.ajax({
                    data: $('#register_form').serialize(),
                    url: url,
                    type: "POST",
                    dataType: "json",

                    success: function(response) {
                        if (response.hasError == false) {
                            $("div#alertdanger").hide();
                            $("div#alertsuccess").show();
                            $("#alertsuccess").text(response.result.status);
                            $('#submitBtn').removeAttr('disabled');
                            window.location.href = '{!! env('BASE_URL') !!}' + '/login';

                        } else {
                            $('#submitBtn').removeAttr('disabled');
                            $("div#alertsuccess").hide();
                            $("div#alertdanger").show();
                            $("#alertdanger").text(response.result.status);
                        }
                        $(".ajax-load").hide();
                    },
                    error: function(er) {
                        $(".ajax-load").hide();
                        $('#submitBtn').removeAttr('disabled');
                        $("div#alertsuccess").hide();
                        $("div#alertdanger").show();
                        if(er.responseJSON.errors.email != null){
                            $("#alertdanger").text(er.responseJSON.errors.email);
                        }else{
                            $("#alertdanger").text(er.responseJSON.errors.password);
                        }
                        
 
                    }
                });
            });
        </script>
    @endpush
