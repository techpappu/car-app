@extends('frontend.home.layout')
@section('title', 'My Orders')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.css">

    <style>
        .main-content section {
            margin-top: 20px;
            background: #FFFFFF;
            box-shadow: 0px 4px 6px -3px #9c9c9c;
            border-radius: 3px;
            padding: 8px;
            border-top: 2px solid #33c24d;
            margin-top: 20px;
            padding-top: 0;
        }

        .my-orders .my-orders__heading:first-child {
            border-bottom: 0;
        }

        .my-orders .my-orders__heading {
            border-bottom: 1px dotted #cdcdcd;
            /*   padding: 20px 0; */
            border-bottom: 0;
            padding-bottom: 0;
        }

        .align-items-center {
            -webkit-align-items: center !important;
            -moz-box-align: center !important;
            align-items: center !important;
        }

        .justify-content-between {
            -webkit-justify-content: space-between !important;
            -moz-box-pack: justify !important;
            justify-content: space-between !important;
        }

        .d-flex {
            display: -webkit-flex !important;
            display: -moz-box !important;
            display: flex !important;
        }

        .my-orders .my-orders__heading .my-orders__heading--sort .order-id-btn .btn {
            background-color: #ff9900;
            color: #FFFFFF;
        }

        .my-orders .my-orders__heading .my-orders__heading--sort p {
            margin-right: 10px;
        }

        .my-orders .my-orders__heading p {
            font-size: 120%;
            color: #666666;
        }

        /* .btn {
                                    display: inline-block;
                                    font-weight: 400;
                                    text-align: center;
                                    white-space: nowrap;
                                    vertical-align: middle;
                                    -webkit-user-select: none;
                                    -moz-user-select: none;
                                    -ms-user-select: none;
                                    user-select: none;
                                    border: 1px solid transparent;
                                    padding: 0.375rem 0.75rem;
                                    font-size: 1rem;
                                    line-height: 1.5;
                                    border-radius: 1.25rem;
                                    -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                                    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                                } */
        .my-order-card .my-order-card-wrapper {
            border-bottom: 1px dotted #cdcdcd;
        }

        .pt-3,
        .py-3 {
            padding-top: 1rem !important;
        }

        .pb-2,
        .py-2 {
            padding-bottom: 0.5rem !important;
        }

        .border {
            border: 1px solid #dee2e6 !important;
        }

        .my-order-card .my-order-card__content {
            margin-top: 20px;
        }

        .my-account-book .my-account-book__img {
            position: relative;
            width: 120px;
            margin: 0 auto;
        }

        /* .my-orders .my-orders__heading .my-orders__heading--sort select {
                                    width: 30%;
                                } */
        .mr-2,
        .mx-2 {
            margin-right: 0.5rem !important;
        }

        .custom-select {
            display: inline-block;

            height: -webkit-calc(2.25rem + 5px) !important;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 1.75rem 0.375rem 0.75rem;
            line-height: 1.5;
            color: #495057;
            vertical-align: middle;
            background: #fff url(data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E) no-repeat right 0.75rem center;
            background-size: 8px 10px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .my-orders .my-orders__heading .my-orders__heading--sort .order-id-btn .btn {
            background-color: #ff9900;
            color: #FFFFFF;
        }

        .w-75 {
            width: 75% !important;
        }

        .my-order-card .my-order-card__meta p {
            font-size: 120%;
        }

        .my-order-card .my-order-card__meta em {
            color: #33c24d;
            font-style: normal;
        }

        .my-order-card .status .cancel_order_button {
            /*   margin-top: -6px; */
            padding: 6px 12px;
            border: 1px solid #ff7979;
            background-color: #fff;
            color: #ff7979;
        }

        .my-order-card .status .review_button {
            /*   margin-top: -6px; */
            padding: 6px 12px;
            border: 1px solid #33c24d;
            background-color: #fff;
            color: #33c24d;
        }

        .ml-3,
        .mx-3 {
            margin-left: 1rem !important;
        }

        .btn-group-sm>.btn,
        .btn-sm {
            padding: 0.25rem 0.5rem;

            line-height: 1.5;
            border-radius: 0.2rem;
        }

        .p-2 {
            padding: 0.5rem !important;
        }

        .my-order-card .my-order-card__meta .btn-pay {
            background-color: #ff9900;
            color: #FFFFFF;
            height: 35px;
            margin-left: 20px !important;
        }

        .top-left {
            position: absolute;
            top: 5px;
            font-size: 16px;
        }

        h4 {
            font-size: 20px;
        }

        .lightGray {
            background-color: lightgray;
            margin-right: 10px;

            margin-top: 2px;
        }

        .ex_certificate {
            margin-left: 200px;
        }

        .bl_details {
            margin-left: 500px;
        }

        @media (min-width: 992px) {
            .margin_top {
                margin-top: -140px;
            }
        }

        @media (max-width: 573px) {

            .imageResize {
                width: 100%;
                height: auto;
                min-width: 100%;
                max-width: 100%;
            }

            .ex_certificate {
                margin-left: 0;
            }

            .bl_details {
                margin-left: 0;
            }
        }


        pre {
            white-space: pre-wrap;
            /* css-3 */
            white-space: -moz-pre-wrap;
            /* Mozilla, since 1999 */
            white-space: -pre-wrap;
            /* Opera 4-6 */
            white-space: -o-pre-wrap;
            /* Opera 7 */
            word-wrap: break-word;
            /* Internet Explorer 5.5+ */
            max-width: 180px;
        }
    </style>
@endpush

@section('content')
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">My Order List</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <main class="main-content">


                <section class="my-orders">
                    <div class="my-orders__heading d-flex justify-content-between align-items-center">
                        <div class="my-order__description">
                            <h4>My Orders</h4>
                            <p>Your Total Order: {{ $orderList->total() }}</p>
                            <p class="msg"></p>
                        </div>

                        <div class="my-orders__heading--sort">

                            <form action="{{ route('order-list') }}" method="get"
                                class="d-flex align-items-center justify-content-end w-75 ml-auto">
                                <p>Status:</p>
                                <select name="orderStatus" class="custom-select mr-2">
                                    <option value="" {{ Request::get('orderStatus') == '' ? 'selected' : '' }}>Select
                                        Any
                                    </option>
                                    <option value="1" {{ Request::get('orderStatus') == '1' ? 'selected' : '' }}>
                                        Processing
                                    </option>
                                    <option value="2" {{ Request::get('orderStatus') == '2' ? 'selected' : '' }}>
                                        Approved
                                    </option>
                                    <option value="3" {{ Request::get('orderStatus') == '3' ? 'selected' : '' }}>On
                                        Shipping</option>
                                    <option value="4" {{ Request::get('orderStatus') == '4' ? 'selected' : '' }}>
                                        Shipped
                                    </option>
                                    <option value="5" {{ Request::get('orderStatus') == '5' ? 'selected' : '' }}>
                                        Completed
                                    </option>
                                    <option value="6" {{ Request::get('orderStatus') == '6' ? 'selected' : '' }}>
                                        Canceled
                                    </option>
                                </select>

                                <div class="order-id-btn">
                                    <input type="submit" class="btn" style="height: 38px; border-radius: 2.25rem"
                                        value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </section>

                <section class="my-order-card">

                    @foreach ($orderList as $row)
                        <div class="my-order-card-wrapper pt-3 pb-2">

                            <div class="my-order-card__meta">
                                <p>

                                    Your Order no:
                                    <em>{{ $row->order_number }}</em>
                                    @if ($row->status != 6 && $row->isPaid == 0 && $row->payment_type == 8)
                                        <a href="{{ url('order-confirmed?order=' . $row->order_number . '&amount=' . $row->total_price) }}"
                                            class="btn btn-sm btn-pay ml-auto" style="line-height: 2.5">Pay by Card</a>
                                    @endif
                                </p>

                            </div>

                            <div class="status">
                                @if ($row->status == 1)
                                    <span class="border border-success text-success p-2"
                                        style="color: #33c24d;font-size: 18px">Processing</span>
                                    <button name="cancelOrder" class="btn-sm cancel_order_button ml-3 delete" type="button"
                                        id="{{ $row->id }}">Cancel Order</button>
                                @elseif ($row->status == 2)
                                    <span class="border border-success text-success p-2"
                                        style="color: #33c24d;font-size: 18px">Approved</span>
                                @elseif ($row->status == 6)
                                    <span class="border border-success text-success p-2"
                                        style="color: #33c24d;font-size: 18px">Canceled</span>
                                @endif



                            </div>

                            <div class="my-order-card__content">

                                @foreach ($row->orderItems as $carItems)
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a href="{{ url('car-details/' . $carItems->car_id) }}" class="text-dark">
                                                <div class="my-account-book">
                                                    <figure class="my-account-book__img">
                                                        <img src="{{ config('constant.image_base_url') . '/upload/images/' . $carItems->images->file_name }}"
                                                            alt="{{ $carItems->car->title }}" width="80px" height="200px"
                                                            class="imageResize" style="object-fit: contain" />
                                                        <div class="top-left">
                                                            <a name="review" class="btn-sm review_button ml-3 review"
                                                                href="{{ url('car-review?id=' . $carItems->car_id) }}"
                                                                style=" background-color: #ff9900; color: #FFFFFF;">Review</a>
                                                        </div>


                                                    </figure>
                                                    {{-- <p class="my-account-book__title text-center">
                                                        {{ $carItems->car->title }}</p>

                                                    <div class="my-account-book__price mb-4">
                                                        <p class="text-center">
                                                            {{config('constant.currencySymbool')}}{{ $carItems->unit_price }}

                                                        </p>
                                                       
                                                    </div> --}}

                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-2 lightGray">
                                            <h4>Car Details</h4>
                                            <p style="color: #33c24d">{{ $carItems->car->title }}</p>
                                            Stock Id: <span style="color: #33c24d"> {{ $carItems->car->stock_no }}</span>
                                            <br>

                                            Chasis no: <span style="color: #33c24d">{{ $carItems->car->chassis_no }}</span>
                                            <br>
                                            CC: <span style="color: #33c24d">{{ $carItems->car->displacement }}</span>
                                        </div>
                                        <div class="col-md-3 lightGray">
                                            <h4>Pricing Details</h4>
                                            <p>FOB amount: <span style="color: #33c24d">
                                                    {{ config('constant.currencySymbool') }}{{ $carItems->unit_price }}
                                                </span></p>
                                            Delivery charge: <span style="color: #33c24d">
                                                {{ config('constant.currencySymbool') }}{{ $row->delivery_charge }}</span>
                                            <br>
                                            Marine Insurance: <span style="color: #33c24d">
                                                {{ config('constant.currencySymbool') }}{{ $row->marine_insurance_amount }}</span>
                                            <br>
                                            Pre Export Inspection: <span style="color: #33c24d">
                                                {{ config('constant.currencySymbool') }}{{ $row->pre_export_inspection_amount }}</span>
                                            <br>
                                            Discount: <span style="color: #33c24d">
                                                -{{ config('constant.currencySymbool') }}{{ $row->discount }}</span>

                                            <br>
                                            Total amount: <span style="color: #33c24d">
                                                {{ config('constant.currencySymbool') }}{{ $row->total_price - $row->discount }}</span>
                                        </div>
                                        <div class="col-md-2 lightGray">
                                            <h4>Shipping Details</h4>
                                            Destination country: <span
                                                style="color: #33c24d">{{ $row->country_name }}</span>
                                            <br>
                                            Destination port: <span style="color: #33c24d">{{ $row->port }}</span>
                                            <br>
                                            Ship name: <span style="color: #33c24d">{{ $row->ship_name }}</span>
                                            <br>
                                            Voyage no: <span style="color: #33c24d">{{ $row->voyage_no }}</span>
                                            <br>
                                            Ship date: <span style="color: #33c24d">{{ $row->ship_date }}</span>
                                            <br>
                                            Est. arrival date: <span
                                                style="color: #33c24d">{{ $row->est_arrival_date }}</span>
                                        </div>
                                        <div class="col-md-3 lightGray">
                                            <h4>Invoice Details</h4>
                                            Invoice no: <span style="color: #33c24d">{{ $row->invoice_no }}</span>
                                            <br>
                                            Invoice date: <span style="color: #33c24d">{{ $row->invoice_date }}</span>
                                            <br>
                                            <h4>Inspection Details</h4>
                                            Request date: <span
                                                style="color: #33c24d">{{ $row->inspec_request_date }}</span>
                                        </div>
                                        <div class="col-md-3 lightGray" style="margin-top: 2px">
                                            <h4>Consignee</h4>
                                            Name: <span style="color: #33c24d">{{ $row->cons_name }}</span>
                                            <br>
                                            Address: <span style="color: #33c24d">{{ $row->cons_address }}</span>
                                            <br>
                                            Phone: <span style="color: #33c24d">{{ $row->cons_phone }}</span>
                                            <br>
                                            Country: <span style="color: #33c24d">{{ $row->cons_country }}</span>
                                            <br>
                                            City: <span style="color: #33c24d">{{ $row->cons_city }}</span>
                                            <br>
                                            Shipper: <span style="color: #33c24d">{{ $row->cons_shipper }}</span>
                                            <br>
                                            Email: <span style="color: #33c24d">{{ $row->cons_email }}</span>
                                        </div>

                                        <div class="col-md-2 lightGray margin_top">
                                            <h4>Documents</h4>
                                            @foreach ($row->documents as $doc)
                                                <pre> <a href="{{ route('download', $doc->id) }}">{{ $doc->original_file_name }}</a></pre>
                                            @endforeach

                                        </div>
                                        <div class="col-md-3 lightGray margin_top ex_certificate">
                                            <h4>Export Cancelation Certificate</h4>
                                            @foreach ($row->certificate as $cert)
                                           <label> {{$cert->certificate_type == 1 ? "English": "Japanese"}}</label>
                                                <pre> <a href="{{ route('download-certficate', $cert->id) }}">{{ $cert->original_file_name }}</a></pre>
                                            @endforeach
                                        </div>
                                        <div class="col-md-3 lightGray margin_top bl_details">
                                            <h4>BL Details</h4>
                                            Tracking no: <span style="color: #33c24d">{{ $row->tracking_no }}</span>
                                            <br>
                                            Shipping date: <span style="color: #33c24d">{{ $row->shipping_date }}</span>
                                        </div>


                                    </div>
                                @endforeach



                            </div>
                        </div>
                    @endforeach
                </section>
                <ul class="pagination text-center">

                    {{ $orderList->withQueryString()->links() }}

                </ul>
            </main>

        </div>

    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/sweetalert2/5.3.5/sweetalert2.min.js"></script>
    <script>
        $(document).on('click', '.delete', function() {
            id = $(this).attr('id');
            swal({
                title: "Are you sure?",
                text: "To cancel this Order!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, cancel!",
            }).then(
                function() {
                    $.ajax({
                        type: 'get',
                        url: '/order/cancel-order/' + id,
                        cache: false,
                        success: function(response) {
                            if (response.hasError == false) {
                                window.location.reload();
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
