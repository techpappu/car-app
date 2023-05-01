@extends('frontend.home.layout')
@section('title', 'Order Confirmed')
@push('css')
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 75%;
        }

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
            font-size: 24px;width: 95%">Your order has been accepted. Please pay here. For any assistannce, please contact
            with kmcjapan.co.jp</h3>
        <h3 style="text-align: center">Your order ID: {{ Request::get('order')? Request::get('order') : Session::get('order_number') }} </h3>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <div class="row display-tr">
                            <h3 class="panel-title display-td">Payment Details</h3>
                        </div>
                    </div>
                    <div class="panel-body">
                       
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                        <form role="form" id="paymentForm" action="{{route('stripe-post')}}" method="post"
                            class="require-validation" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
                            @csrf

                            <input type="hidden" id="order_number" name="order_number"
                                value="{{ Request::get('order') }}" />
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> <input class='form-control' size='4'
                                        type='text'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label> <input autocomplete='off'
                                        class='form-control card-number' size='20' type='text' value="4242424242424242">
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                        class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                </div>
                            </div>
                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button id="submitBtn" class="btn btn-primary btn-lg btn-block" type="submit">Pay Now
                                        ({{config('constant.currencySymbool')}}{{ Request::get('amount') }})</button>
                                        <button type="button" class="ajax-load" style="margin: auto;display: block">
                                            <center><img src={{ URL::to('/') }}/ajax-loader2.gif alt="Loading..." /></center>
                                        </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
    <script type="text/javascript">
      $(document).ready(function() {     
        $(".ajax-load").hide();
    });
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey(
                        "pk_test_51K1Z77AQlnpAAuiUAFI1ikVtcEelcpyqEStAX4wLku4O0eRjtz0fQNeKVCfV55gTHgVNO2U5bqXPGa3tv4tapujV00vg0eMOyi"
                        );
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });       
    </script>
@endpush
