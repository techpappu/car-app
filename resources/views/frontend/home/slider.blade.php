    <div class="main-slider main-slider-2">
        <div class="slider-pro" id="main-slider" data-slider-width="100%" data-slider-height="700px"
            data-slider-arrows="true" data-slider-buttons="false">
            <div class="sp-slides">
                <!-- Slide 1-->
                @foreach ($galleryImageCars as $row)
                <div class="sp-slide">
                    {{--  <img class="sp-image" style="" src="{{ $row->images != '[]' ? config('constant.image_base_url') . '/upload/images/' . $row->images[0]->file_name : '' }}"
                    alt="slider" />
                    <div class="main-slider__wrap sp-layer" data-width="40%" data-position="centerLeft"
                        data-horizontal="0" data-show-transition="left" data-hide-transition="left"
                        data-show-duration="2000" data-show-delay="1200" data-hide-delay="400">
                        <div class="main-slider__title">{{ $row->title }}<span
                                class="main-slider__label">{{ $row->model }}</span>
                        </div>
                        <div class="main-slider__price"><span class="main-slider__price-currency">$</span><span
                                class="main-slider__price-number">{{ $row->price }}</span><span
                                class="main-slider__price-inner"></span>
                        </div><a class="main-slider__btn btn btn-lg btn-primary"
                            href="{{ url('car-details/' . $row->id) }}">learn more</a>
                    </div> --}}
                    <img class="sp-image" style=""
                        src="{{  config('constant.image_base_url') . '/upload/images/' . $row->image }}" alt="slider" />
                    <!--  <div class="main-slider__wrap sp-layer" data-width="40%" data-position="centerLeft" data-horizontal="0" data-show-transition="left" data-hide-transition="left" data-show-duration="2000" data-show-delay="1200" data-hide-delay="400">
                               
                                
                                <a class="main-slider__btn btn btn-lg btn-primary" target="_blank" href="{{ $row->url }}">learn more</a>
                            </div> -->
                </div>
                @endforeach

                <!-- Slide 2-->
                {{-- <div class="sp-slide">
                            <img class="sp-image" src="assets/media/components/b-main-slider/1.jpg" alt="slider" />
                            <div class="main-slider__wrap sp-layer" data-width="40%" data-position="centerLeft" data-horizontal="0" data-show-transition="left" data-hide-transition="left" data-show-duration="2000" data-show-delay="1200" data-hide-delay="400">
                                <div class="main-slider__title">BMW<span class="main-slider__title-number text-primary">7</span>series<span class="main-slider__label">model 2018</span>
                                </div>
                                <div class="main-slider__price"><span class="main-slider__price-currency">$</span><span class="main-slider__price-number">375</span><span class="main-slider__price-inner"><span class="main-slider__price-title">Monthly</span><span class="main-slider__price-subtitle">Lowest Markup</span></span>
                                </div><a class="main-slider__btn btn btn-lg btn-primary" href="services.html">learn more</a>
                            </div>
                        </div> --}}
            </div>
        </div>
    </div>
