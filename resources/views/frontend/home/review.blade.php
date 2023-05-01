@extends('frontend.home.layout')
@section('title', 'Review')
@push('css')
<style>
    .widget-gallery__item {
        float: right;
        overflow: hidden;
        width: 33.333%;
        padding-right: 0px !important;
        padding-bottom: 0px !important;
    }

    .img-responsive_1 {
        max-width: 100%;
        height: 190px;
    }

</style>
@endpush
@section('content')
<div class="section-title-page area-bg area-bg_dark area-bg_op_70">
    <div class="area-bg__inner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="b-title-page bg-primary_a">Customer Feedback</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}"><i class="icon fa fa-home"></i></a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            @foreach ($customerFeedback as $feedback)
            <div class="row" style="padding: 10px;
                    border-bottom: 1px solid #d8d8d8;
                    border-left: 1px solid #d8d8d8;
                    border-right: 1px solid #d8d8d8;
                    overflow: hidden;
                    border-top: 1px solid #d8d8d8;margin-left: -10px">
                <div class="col-md-2">
                    <a class="" href="{{ url('car-details/' . $feedback->id) }}">
                        <img class="img-responsive"
                            src="{{ config('constant.image_base_url') . '/upload/images/' . $feedback->images->file_name }}"
                            alt="foto" width="200px" />
                        <h5 class="b-goods-feat">{{ $feedback->title }}</h5>
                    </a>

                </div>
                <div class="col-md-4">
                    <img src="{{ config('constant.profile_image_base_url') . '/images/' . ($feedback->userImage !=  null ? $feedback->userImage : 'avatar_2x.png') }}"
                        style="width: 100px;height: 100px;object-fit: cover;margin-left: -10px" />
                    <span>{{ $feedback->userName }}</span>
                    <div>
                        @if($feedback->rating == 0.5)
                        <i class="fa fa-star-half-o" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 1)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 1.5)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star-half-o" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 2)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 2.5)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star-half-o" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 3)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 3.5)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star-half-o" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 4)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 4.5)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star-half-o" style="font-size:20px;color:red"></i>
                        @elseif ($feedback->rating == 5)
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        <i class="fa fa-star" style="font-size:20px;color:red"></i>
                        @endif
                    </div>
                    <p>{{ $feedback->description }}</p>
                </div>
                <div class="col-md-6">
                    <h5 style="text-align: right; margin-bottom: 8px">After Delivery Pictures</h5>
                    <div class="js-zoom-gallery">
                        @php $imagePath = $feedback->type ==1? config('constant.profile_image_base_url') :
                        config('constant.image_base_url') @endphp
                        @foreach ($feedback->feedbackFile as $file)
                        <div class="widget-gallery__item">
                            <a class="widget-gallery__img js-zoom-gallery__item"
                                href="{{ $imagePath . '/upload/review/' . $file->file_name }}">
                                <img class="img-responsive" src="{{$imagePath . '/upload/review/' . $file->file_name }}"
                                    alt="foto" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection

@push('js')
@endpush
