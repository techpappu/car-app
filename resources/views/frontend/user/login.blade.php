@extends('frontend.home.layout')
@section('title', 'Login')
@push('css')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        body {
            padding: 0;
            margin: 0
        }

        #container {
            background-image: url("upload/images/sujanmahmudfeniasdfg.gif");
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

        #email,
        #password {
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

        #email:hover,
        #password:hover {
            background-color: gainsboro
        }

        #email:focus,
        #password:focus {
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

        #forget {
            position: relative;
            top: -62px;
            left: 67%;
            color: darkblue;
            font-size: 14px;
            font-family: 'Roboto Slab', serif
        }

        #login {
            width: 350px;
            height: 40px;
            position: relative;
            left: 12%;
            top: -50px;
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

        #hrline1 {
            line-height: 1em;
            position: relative;
            top: -40px;
            left: -30%;
            width: 38%
        }

        #text2 {
            font-size: 16px;
            font-family: 'Roboto Slab', serif;
            position: relative;
            top: -70px;
            left: 40%;
            color: gray
        }

        #hrline2 {
            position: relative;
            top: -95px;
            left: 31%;
            width: 37%
        }

        #facebook1,
        #google1 {
            width: 15px;
            height: 15px;
            position: relative;
            left: -10%;
            top: 1px
        }

        #facebook,
        #google {
            width: 140px;
            height: 40px;
            position: relative;
            top: -80px;
            left: 12%;
            border-radius: 5px;
            border-width: 1px;
            border-color: black;
            font-size: 17px;
            background-color: white
        }

        #facebook:hover {
            background-color: #2c27bc;
            color: white;
            transition: 0.5s
        }

        #google {
            position: relative;
            left: 26.5%
        }

        #google:hover {
            background-color: #ce6c46;
            color: white;
            transition: 0.5s
        }

        #text3 {
            position: relative;
            top: -66px;
            left: 32%;
            font-size: 15px;
            font-family: 'Roboto Slab', serif;
            color: gray
        }

        #signup {
            position: relative;
            top: -92px;
            left: 55%;
            color: black;
            font-size: 15px;
            font-family: 'Roboto Slab', serif
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
                src="{{ url('/') }}/upload/images/sujanmahmudfeniasdfg.gif">
            <a href="#"><img id="cross" src="https://image.flaticon.com/icons/svg/148/148766.svg"></a>
            <p id="text">Sign In</p>
            <form method="POST" action="{{ route('postLogin') }}" name="login_form">
                @csrf
            <input id="email" name="email" type="email" placeholder="Email">
            <input id="password" name="password" type="password" placeholder="Password">
            <input id="check" type="checkbox">
            <p id="text1">Remember Me</p>
            <a id="forget" href="#">Forget Password ?</a> 
            <button id="login" type="submit">Log In</button>
        </form>
            <hr id="hrline1">
            <p id="text2">or login with</p>
            <hr id="hrline2"> <button id="facebook" onclick="window.location='{{url('auth/facebook')}}'"><i class="fa fa-facebook-square"></i> Facebook</button>
                     <button id="google" onclick="window.location='{{url('auth/google')}}'"><i class="fa fa-google"></i> Google</button>
            <p id="text3">Not a Member?</p> <a id="signup" href="{{route('frontend.register')}}">Signup Now</a>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            document.getElementById("cross").onclick = function() {
                document.getElementById("formcontainer").style.display = "none";
            };
        });
    </script>
@endpush
