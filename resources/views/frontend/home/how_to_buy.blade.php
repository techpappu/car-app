@extends('frontend.home.layout')
@section('title', 'How to buy')
@push('css')
    <style>
        .block-step {
            background: #F4F4F4;
            padding-bottom: 50px;
        }

        @media only screen and (min-width: 1024px) .wcm {
            width: 990px;
        }

        .wcm {
            margin: auto;
            padding: 0 25px;
        }


        .breadcrumb.none-padding {
            padding: 0;
            padding-top: 17px;
        }

        .breadcrumb {
            max-width: 990px;
            padding: 25px 25px 0;
            margin: 0 auto 30px;
            overflow: hidden;
            font-size: 13px;
            font-size: 1.3rem;
        }

        .list-step {
            display: flex;
            flex-wrap: wrap;
        }

        .list-step li {
            width: 23.4%;
            margin-right: 2.13%;
        }

        .main-container {
            overflow: hidden;
            padding-top: 15px;
        }

        .main-container .block {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .main-container .block01 .block-text {
            margin-top: 10%;
            width: 55.5%;
        }

        .howtobuy .main-container .block-text {
            position: relative;
        }

        .main-container .step {
            width: 64px;
            height: 64px;
            border: 1px solid #EE1C23;
            border-radius: 50%;
            text-align: center;
            position: absolute;
            top: -23px;
            left: 0;
            font-weight: bold;
            padding-top: 15px;
            color: #EE1C23;
            font-size: 14px;
            font-size: 1.4rem;
        }

        .main-container .title {
            font-weight: bold;
            padding-left: 84px;
            letter-spacing: 0.5px;
            font-size: 24px;
            font-size: 2.4rem;
        }

        .main-container .txt01 {
            margin-top: 41px;
        }

        .main-container .txt03 {
            line-height: 24px;
            letter-spacing: 0.3px;
            font-size: 16px;
            font-size: 1.6rem;
        }

        .main-container .block01 .photo {
            width: 75%;
            margin-right: -41%;
        }

        img {
            margin: 0;
            padding: 0;
            vertical-align: middle;
            border: 0;
            max-width: 100%;
            height: auto;
        }

        .main-container .block02 {
            flex-direction: row-reverse;
            margin-top: -4%;
        }

        .main-container .block {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .main-container .block02 .block-text {
            margin-top: 10%;
            width: 55.5%;
        }

        .main-container .block-text {
            position: relative;
        }

        h3 {
            margin-top: 0px;
            margin-bottom: 6px;
        }

        .main-container .block03 {
            display: block;
            margin-top: 55px;
            padding-top: 45px;
        }

        .main-container .block03 .txt01 {
            letter-spacing: 0.32px;
        }

        .main-container .txt01 {
            margin-top: 41px;
        }

    </style>
@endpush
@section('content')
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">How to buy</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}"><i class="icon fa fa-home"></i></a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <section class="main-container">
            <div class="wcm">
                <div class="block block01 clearfix" id="step01">
                    <div class="block-text">
                        <p class="step">
                            <span>STEP <br>01</span>
                        </p>
                        <h3 class="title">Find Cars and Order </h3>
                        <p class="txt01">
                            kmcjapan.co.jp is one of the largest information-share platforms in Japan. Most of the
                            dealers are able to sell to overseas customers but some of them sell at only domestic
                            market. We will check each car as per your inquiry and send you quotation.
                        </p>
                    </div>
                    <p class="photo">
                        <picture>
                            <source media="(max-width: 768px)" srcset="" {{ url('/') }}/wallpaper/1.jpeg">
                            <img src="{{ url('/') }}/wallpaper/1.jpeg" alt="image">
                        </picture>
                    </p>
                </div>

                <div class="block block02 clearfix" id="step02">
                    <div class="block-text">
                        <p class="step">
                            <span>STEP <br>02</span>
                        </p>
                        <h3 class="title">Agreement and Payment</h3>
                        <p class="txt01">
                            Find the one you like and “Send inquiry”. Please enter your information and click
                            confirmation button. You will receive an Auto-Reply email after you sent the inquiry, if you
                            entered the correct email address. (Avoid to use “gmx” domain please.) We will get back to
                            you with the total cost including FOB charges and Ocean freight.
                        </p>
                    </div>
                    <p class="photo">
                        <picture>
                            <source media="(max-width: 768px)" srcset="/common/assets/img/howtobuy/img02_sp.png">
                            <img src="{{ url('/') }}/wallpaper/1.jpeg" alt="image" height="250px">
                        </picture>
                    </p>
                </div>

                <div class="block block03" id="step03">
                    <div class="block-text">
                        <p class="step">
                            <span>STEP <br>03</span>
                        </p>
                        <h3 class="title">Shipment and Delivery</h3>
                        <p class="txt01">
                            Receive your vehicle at the Agreed Destination. You are required to clear vehicle(s) at the
                            customs, usually through a clearing agent.

                            We also provide a City Delivery Service, which does customs clearing and delivers your
                            vehicle(s) to a location near your address, saving you time and effort. To learn more about it,
                            go to the “Service Map” section of your country/region page under the “Local Services”
                            navigation menu or contact Local Offices or Agents near you.

                            Enjoy driving your new car!
                        </p>

                    </div>
                    <p class="photo">
                        <picture>
                            <source media="(max-width: 768px)" srcset="/common/assets/img/howtobuy/img02_sp.png">
                            <img src="{{ url('/') }}/wallpaper/1.jpeg" alt="image" height="250px">
                        </picture>
                    </p>

                </div>
            </div>


        </section>
    </div>


@endsection

@push('js')
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
