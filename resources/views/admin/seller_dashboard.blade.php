@extends('layouts.backend.app')
@section('title','Dashboard')
@push('css')
<style>
    .card {
    border-radius:5px;
    box-shadow: 1px 1px 9px 0px #484646;
    margin-top: 10px;
}
.card-header{
    font-size: 20px;
    border-radius:5px 5px 0px 0px;
    padding:10px;
    font-weight:bold;
    text-align:center;
    background: #2265a08c;
    border-bottom: 1px solid #205583;
}
.card-body{
    text-align: center;
    padding-bottom: 10px;
}
</style>
@endpush
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>SELLER DASHBOARD</h2>
        <h3>Hi!, {{auth()->user()->name}}</h3>
    </div>
    @php
        $user_sold_car=auth()->user()->cars()->where('car_sold_status',3);
        $total_sold_credit=$user_sold_car->sum('price')-(($user_sold_car->sum('price')/100)*auth()->user()->seller->sales_commission);
    @endphp
    <div class="row">
        <div class="col-md-3">
            <div class="bg-primary card">
                <div class="card-header">Total Car</div>
                <div class="card-body">
                  <h5 class="card-title">Total Added Car count</h5>
                  <h1 >{{auth()->user()->cars()->count()}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-primary card">
                <div class="card-header">Total Worth</div>
                <div class="card-body">
                  <h5 class="card-title">Total worth of car you addded</h5>
                  <h1 >{{config('constant.currencySymbool')}} {{auth()->user()->cars()->sum('price')}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="bg-primary card">
                <div class="card-header">Total Sold</div>
                <div class="card-body">
                  <h5>Total sold from your car</h5>
                  <h5>Count: {{$user_sold_car->count()}} </h5>
                  <h1 >{{config('constant.currencySymbool')}} {{$user_sold_car->sum('price')}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background: rgb(17, 119, 17);color:white">
                <div class="card-header">Total Sold Credit</div>
                <div class="card-body">
                  <h5>Total Sold amount after deduct commission which is: {{auth()->user()->seller->sales_commission}} % </h5>
                  <h1 >{{config('constant.currencySymbool')}} {{$total_sold_credit}}</h1>
                </div>
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="background: rgb(17, 119, 17);color:white">
                <div class="card-header">Total paid Amount</div>
                <div class="card-body">
                  <h5>Total paid Amount</h5>
                  <h1 >{{config('constant.currencySymbool')}} {{auth()->user()->seller->paid_amount}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background: rgb(17, 119, 17);color:white">
                <div class="card-header">Available Credit</div>
                <div class="card-body">
                  <h5>Available credit after deduct paid amount</h5>
                  <h1 >{{config('constant.currencySymbool')}} {{$total_sold_credit-(auth()->user()->seller->paid_amount)}}</h1>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')

@endpush