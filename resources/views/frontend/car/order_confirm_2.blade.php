@extends('frontend.home.layout')
@section('title', 'Order Confirmed')
@push('css')
    <style type="text/css">
        

    </style>
@endpush
@section('content')
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">Order Confirmed</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h3 style="text-align: center;color: #33c24d;
            font-size: 24px;width: 95%">Your order has been accepted.For any assistannce, please contact
            with kmcjapan.co.jp</h3>
        <h3 style="text-align: center">Your order ID: {{ Request::get('order') }} </h3>
        <div class="row">
           
        </div>
    </div>
@endsection
@push('js')
  

@endpush
