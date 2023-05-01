<div class="table-container">
    <table class="table table_primary table-type-1">
        <thead>
            <tr>
                <th style="text-align: left">Car Details</th>
                <th style="text-align: left">Price</th>
                <th style="text-align: left">Dimension</th>
              {{--   <th style="width: 10%;text-align: left">Quantity</th> --}}
                <th style="text-align: left">Sub Total</th>
                <th style="text-align: left">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product" style="text-align: left">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><a href="{{ url('car-details/' . $id) }}"><img src="{{ config('constant.image_base_url') . '/upload/images/' .$details['image'] }}" width="100" height="100" style="object-fit: cover" class="img-responsive"/> </a></div>
                            <div class="col-sm-9">
                                <h5 class="nomargin">{{ $details['name'] }}</h5>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price" style="text-align: left">{{config('constant.currencySymbool')}}{{ $details['price'] }}</td>
                    <td data-th="Price" style="text-align: left">{{ $details['cubic_meter'] }}m3</td>
                   {{--  <td data-th="Quantity" style="text-align: left">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" style="padding: 6px 9px 4px;"/>
                    </td> --}}
                    <td data-th="Subtotal" class="text-center">{{config('constant.currencySymbool')}}{{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="" style="text-align: left">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><h3><strong>Total {{config('constant.currencySymbool')}}{{ $total }}</strong></h3></td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                    <button class="btn btn-success" id="btnCheckout">Checkout</button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>