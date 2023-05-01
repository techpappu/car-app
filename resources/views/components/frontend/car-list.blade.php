<div class="row">
    <style>
        

    </style>
    @foreach ($rows as $row )
        
    
    <div class="col-md-3">
        <div class="car-list">
            <div style=" position: relative;">
                <a class="" href="{{ url('car-details/' . $row->id) }}">
                    <img class="car-list-image"
                        src="{{ config('constant.image_base_url') . '/upload/images/' . $row->files()->first()->file_name }}"
                        alt="foto" style="object-fit: cover">
                    
                    @if ($row->car_sold_status == 3)
                    <img id="img2" src="sold_img.png" style="height: 70px; width: 100px">
                    @endif
                    @if ($row->car_sold_status == 2)
                    <img id="img2" src=" reserved_img.png" style="height: 70px; width: 100px">
                    @endif

                </a>
                <span class="car-list-price">{{ config('constant.currencySymbool') }}{{ $row->price }}</span>
                @if ($row->car_sold_status == 1)
                    @if($row->price > 0)
                    <span class="car-list-addToCart" style="background-color: #f7bd29ed" onclick="addToCart({{ $row->id }})">Add
                        to Cart
                    </span>
                    @else
                    <span class="car-list-addToCart" style="background-color: #f7bd29ed">
                        <a href="{{ url('inquiry_' . $row->id) }}" style="color:white">Send Inquiry</a>
                    </span>
                @endif


                @endif
            </div>
            <div class="car-list-info">
                <h3 class="car-list-name">
                    <a href="{{ url('car-details/' . $row->id) }}">{{$row->title }}</a>
                </h3>
                <ul class="car-list-desc">
                    <li class="car-desc-item">{{ $row->mileage." ".$row->mileage_type }}</li>
                    @if ($row->model)
                        <li class="car-desc-item">Model: {{ $row->model->name}}</li>
                    @endif
                   
                </ul>
            </div>

        </div>
    </div>
    @endforeach
</div>
