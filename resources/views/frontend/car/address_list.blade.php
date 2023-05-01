@foreach ($deliveryAddress as $key => $row)
<div class="item d-flex justify-content-between align-items-center">
    <div class="form-check">
        <input class="form-check-input-address" type="radio" name="accountAddressId" id="accountAddressId_{{$row->id}}"
            data-country="{{$row->id}}" value="{{$row->id}}" required="" {{$key == 0 ? "checked" : ""}}>
        <label class="form-check-label focus" for="{{$row->id}}">
            {{$row->address}}
            <span class="d-block js--address-type" data-type="OFFICE">({{$row->addressType == 1? "OFFICE" : "HOME"}})</span>
        </label>
    </div>
    <div class="address">
        <p class="text-dark">Name: <span class="js--acc-name">{{$row->name}}</span></p>
        <p class="text-dark">Phone: <span class="js--acc-phone">{{$row->mobile_no}}</span></p>
        <p class="js--acc-address mb-1">{{$row->address}}</p>
        <p>
            <span class="js--acc-id" data-acc-id=""></span>
            <span zone-id="3375" class="js--acc-zone">Budda</span>,
            <span area-id="355" class="js--acc-area">Dhaka north </span>,
            <span city-id="36" class="js--acc-city">Dhaka</span>,
            <span country-id="1" class="js--acc-country">Bangladesh</span>.
        </p>
    </div>
</div>
@endforeach

