@extends('frontend.home.layout')
@section('title', 'Cart Details')
@push('css')

<style>
    .thumbnail {
    position: relative;
    padding: 0px;
    margin-bottom: 20px;
}
.thumbnail img {
    width: 80%;
}
.thumbnail .caption{
    margin: 7px;
}
.main-section{
    background-color: #F8F8F8;
}
.dropdown{
    float:right;
    padding-right: 30px;
}
.btn{
    border:0px;
    margin:10px 0px;
    box-shadow:none !important;
}
.dropdown .dropdown-menu{
  /*   padding:20px;
    top:30px !important;
    width:350px !important;
    left:-110px !important; */
    box-shadow:0px 5px 30px black;
}
.total-header-section{
    border-bottom:1px solid #d2d2d2;
}
.total-section p{
    margin-bottom:20px;
}
.cart-detail{
    padding:15px 0px;
}
.cart-detail-img img{
    width:100%;
    height:100%;
    padding-left:15px;
}
.cart-detail-product p{
    margin:0px;
    color:#000;
    font-weight:500;
}
.cart-detail .price{
    font-size:12px;
    margin-right:10px;
    font-weight:500;
}
.cart-detail .count{
    color:#C2C2DC;
}
.checkout{
    border-top:1px solid #d2d2d2;
    padding-top: 15px;
}
.checkout .btn-primary{
    border-radius:50px;
    height:50px;
}
.dropdown-menu:before{
    content: " ";
    position:absolute;
    top:-20px;
    right:50px;
    border:10px solid transparent;
    border-bottom-color:#fff;
}
.table > thead > tr > th {
    vertical-align: bottom;
    border-bottom: 2px solid #999;
    text-transform: uppercase;
    padding-bottom: 27px;
    color: #1d201c;
    font-size: 14px;
    padding-top: 33px;
}

.modal { /*Format the 'modal-window', which is the modal environment background containing the 'modal-box(es)'*/
	background: rgba(0,0,0,.8);
	position: absolute;
	width: 100%;
	height: 100vh;
	top: 0;
	left: 0;
	z-index: -1;
}
.btn-sm{
    padding: 2px 38px;
}
.btn {
    border: 0px;
    box-shadow: none !important;
    margin: 0px 0px !important;
}
</style>
@endpush
@section('content')
<div class="section-title-page area-bg area-bg_dark area-bg_op_70">
    <div class="area-bg__inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="b-title-page bg-primary_a">Cart details</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('cart'))
@include('frontend.car.cart_list');
@else
@include('frontend.car.empty_cart');
@endif

@endsection

@push('js')
<script type="text/javascript">
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "post",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "post",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
    $("#btnCheckout").click(function() {
        $.ajax({
                type: "get",
                url: "/checkOut",
                success: function(res) {
                    console.log(res);
                    if (res) {
                        if(res.result.status == 'login'){
                            window.location.href = "{{ route('frontend.login')}}";
                        }else{
                            window.location.href = '{!! env("BASE_URL") !!}'+'/checkout';
                        }

                    }
                }

            });
    });
</script>
@endpush
