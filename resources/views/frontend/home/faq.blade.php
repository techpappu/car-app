@extends('frontend.home.layout')
@section('title', 'FAQ')
@push('css')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

@endpush
@section('content')
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">FAQ</h1>
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

   
                @foreach ($data as $row)
                <div class="panel-group" id="accordion">
                  
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#panel{{$row->id}}"><i class="glyphicon glyphicon-plus"></i>{{$row->question}}</a>
                            </h4>
                
                        </div>
                        <div id="panel{{$row->id}}" class="panel-collapse collapse">
                            <div class="panel-body">{{$row->answer}}</div>
                        </div>
                    </div>
                  
                </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection

@push('js')
<script>
$(document).ready(function () {
    var selectIds = $('#panel1,#panel2,#panel3');
    $(function ($) {
        selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
            $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
        })
    });
});

</script>
@endpush
