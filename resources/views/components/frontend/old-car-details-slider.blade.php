<div class="slider-car-details slider-pro" id="slider-car-details">
    <div class="sp-slides">
        @foreach ($carDetails->images as $image)
        <div class="sp-slide">
            <img class="sp-image" src="{{ config('constant.image_base_url') . '/upload/images/' . $image->file_name }}"
                alt="img" style="object-fit: cover" />
        </div>
        @endforeach
    </div>
    <div class="sp-thumbnails">
        @foreach ($carDetails->images as $image)
        <div class="sp-thumbnail">
            <img class="img-responsive"
                src="{{ config('constant.image_base_url') . '/upload/images/' . $image->file_name }}" alt="img"
                style="object-fit: cover" />
        </div>
        @endforeach
    </div>

    @if ($carDetails->car_sold_status == 3)
    <img id="soldimg" src="{{asset('sold_img.png')}}" style="height: 70px; width: 100px">
    @endif
    @if ($carDetails->car_sold_status == 2)
    <img id="reserveimg" src="{{asset('reserved_img.png')}}" style="height: 70px; width: 100px">
    @endif
</div>
