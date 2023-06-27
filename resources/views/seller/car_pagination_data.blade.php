<style>
    ul.car-sortedby{
        padding-left:0px;
        padding-bottom: 20px; 
    }
    ul.car-sortedby li{
        list-style-type: none;
        float: left;
        font-size: 18px;
    }
    ul.car-sortedby li a{
        margin: 0px 10px;
    }
    ul.car-sortedby li.active a{
        color: #151515;
        font-weight: bold;
    }
</style>
<ul class="car-sortedby">
    <li class="{{ Request::is('admin/seller/car') ? 'active' : '' }}"><a href="{{route('seller.car')}}">All ({{$allDataCount}})</a>|</li>
    <li class="{{ Request::is('admin/seller/car/available') ? 'active' : '' }}"><a href="{{route('seller.car.available')}}">Available ({{$available->total()}})</a>|</li>
    <li class="{{ Request::is('admin/seller/car/sold') ? 'active' : '' }}"><a href="{{route('seller.car.sold')}}">Sold ({{$sold->total()}})</a>|</li>
    <li class="{{ Request::is('admin/seller/car/reserved') ? 'active' : '' }}"><a href="{{route('seller.car.reserved')}}">Reserved ({{$reserved->total()}})</a></li>
</ul>
<table class="table table-striped table-bordered" cellspacing="0" width="100%">
    <tr>
        <th>S/N</th>
        <th>Car Id</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Title</th>
        <th>Stock No</th>
        <th>Model year</th>
        <th>Location</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    @php
        $status=[];
        $status[1]='Available';
        $status[2]='Reserved';
        $status[3]='Sold';
    @endphp
    @foreach ($data as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $row->id }}</td>
            <td>{{ $row->brand->name }}</td>
            <td>{{ $row->model->name }}</td>
            <td>{{ $row->title }}</td>
            <td>{{ $row->stock_no }}</td>
            <td>{{ $row->model_year }}</td>
            <td>{{ $row->car_location }}</td>
            <td class="status_{{$row->id}}">{{ $status[$row->car_sold_status] }}</td>
            <td colspan="3">
                <button type="button" name="edit" id="{{ $row->id }}"
                    class="edit btn btn-primary btn-sm">Edit
                </button>
                <button type="button" name="expense" id="{{ $row->id }}" class="expensebtn btn btn-info btn-sm">
                    <i class="fa fa-money" aria-hidden="true"></i> Expense
                </button>
                <button type="button" name="delete" id="{{ $row->id }}"
                    class="delete btn btn-danger btn-sm">Delete</button>&nbsp;&nbsp;
                <button type="button" name="imgPreview" id="{{ $row->id }}" class="imgPreview btn btn-primary btn-sm">
                    Image Preview
                </button>
            </td>
        </tr>
    @endforeach
</table>

{{ $data->links('pagination::bootstrap-4') }}
