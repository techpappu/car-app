<div class="filter-goods">
    <div class="filter-goods__info">Total cars <strong>
            {{ $carList->total() }}</strong>
    </div>   
</div>
<div class="goods-group-2 list-goods">
    @foreach ($carList as $row)
        <section class="b-goods-1 b-goods-1_mod-a">
            <div class="row">
                <div class="b-goods-1__img">
                    <a class="" href="{{ url('car-details/' . $row->id) }}">
                        @if ($row->images )
                            <img class="img-responsive
                                {{$row->car_sold_status == 3 ? 'sold' : ''}}   {{$row->car_sold_status == 2 ? 'reserve' : ''}}
                            "
                            src="{{ config('constant.image_base_url') . '/upload/images/' . $row->images->file_name }}"
                            alt="foto" style="object-fit: cover; width: 200px; height: 150px;"/>
                        @else
                            <img class="img-responsive"
                                src="{{ config('constant.image_base_url') . '/default-car.jpg'}}"
                                alt="foto" style="object-fit: cover; width: 200px; height: 150px;"/>
                        @endif
                        @if ($row->car_sold_status == 3)
                            <img id="img2" src="sold_img.png" style="height: 70px; width: 100px">
                        @endif
                        @if ($row->car_sold_status == 2)
                            <img id="img2" src="reserved_img.png" style="height: 70px; width: 100px">
                        @endif
                    </a>
                    <span class="b-goods-1__price hidden-th" style="width: 200px; margin-right: 62px">
                        @if ($row->price > 0)
                            {{config('constant.currencySymbool')}}{{ $row->price }}
                        @else
                            Ask
                        @endif
                        
                    </span>
                    @if ($row->car_sold_status == 1)
                        @if($row->price > 0)
                            <span class="b-goods-feat__label" style="background-color: #f7bd29ed; margin-right: 48px"
                                onclick="addToCart({{ $row->id }})">Add to Cart</span>
                        @else
                            <span class="b-goods-feat__label" style="background-color: #f7bd29ed">
                                <a href="{{ url('inquiry_' . $row->id) }}" style="color:white">Send Inquiry</a>
                            </span>
                        @endif
                    @endif
                   {{--  @if ($row->car_sold_status == 2)
                        <span class="b-goods-feat__label" style="background-color: #f7bd29ed; margin-right: 48px"
                        >This car is Reserved</span>
                     @endif
                     @if ($row->car_sold_status == 3)
                     <span class="b-goods-feat__label" style="background-color: #f7bd29ed; margin-right: 48px"
                     >This car is Sold</span>
                  @endif --}}
                </div>
                <div class="b-goods-1__inner">
                    <div class="b-goods-1__header">
                        <h2 class="b-goods-1__name"><a
                                href="{{ url('car-details/' . $row->id) }}">{{ $row->title }}</a>
                        </h2>
                    </div>
                    <div class="b-goods-1__info">
                        <i class="fa fa-map-marker"></i> {{ $row->car_location }}
                    </div>

                    <div class="b-goods-1__section">
                        <h3 class="b-goods-1__title" data-toggle="collapse" data-target="#desc-{{ $row->id }}">
                            Highlights
                        </h3>
                        <div class="collapse in" id="desc-{{ $row->id }}">
                            <ul class="b-goods-1__desc list-unstyled">
                                <li class="b-goods-1__desc-item" style="float: left; width:90px">Model Year</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:120px">Color</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:90px">Mileage</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:90px">Steering</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:120px">Displacement</li>
                               {{--  <li class="b-goods-1__desc-item" style="float: left; width:90px">Transmission</li> --}}
                            </ul>
                            <ul class="b-goods-1__desc list-unstyled">
                                <li class="b-goods-1__desc-item" style="float: left; width:90px;align:center">{{ date('Y-m', strtotime($row->model_year)) }}</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:120px">{{ $row->color }}</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:90px">{{ $row->mileage." ".$row->mileage_type }}</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:90px">{{ $row->steering }}</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:120px">{{ $row->displacement }}cc</li>
                                {{-- <li class="b-goods-1__desc-item" style="float: left; width:90px">{{ $row->transmission }}</li> --}}
                            </ul>
                        <!--     {{-- <ul class="b-goods-1__desc list-unstyled">
                                <li class="b-goods-1__desc-item" style="float: left; width:90px">Steering</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:120px">Displacement</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:90px">Transmission</li>
                            </ul>
                            <ul class="b-goods-1__desc list-unstyled">
                                <li class="b-goods-1__desc-item" style="float: left; width:90px">{{ $row->steering }}</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:120px">{{ $row->displacement }}cc</li>
                                <li class="b-goods-1__desc-item" style="float: left; width:90px">{{ $row->transmission }}</li>
                            </ul> --}} -->
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endforeach


</div>
<!-- end .goods-group-2-->
<ul class="pagination text-center">
    {{ $carList->links('pagination::bootstrap-4') }}
    {{-- {{ $carList->withQueryString()->links() }} --}}

</ul>
