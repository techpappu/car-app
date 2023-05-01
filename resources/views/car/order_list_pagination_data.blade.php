<table class="table table-striped table-bordered" cellspacing="0" style="min-height: 300px">
    <tr>
        <th>S/N</th>
        <th>Order no</th>
        <th>Sub Total</th>        
        <th style="white-space: normal">Delivery Charge</th>
        <th>Total</th>
        <th>User name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Status</th>
        <th>isPaid?</th>
        <th>Order date</th>
        <th colspan="4">Action</th>
    </tr>
    @foreach ($data as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $row->order_number }}</td>
            <td>{{config('constant.currencySymbool')}}{{ $row->item_total_price }}</td>
            <td>{{config('constant.currencySymbool')}}{{ $row->delivery_charge }}</td>
            <td>{{config('constant.currencySymbool')}}{{ $row->total_price }}</td>
            <td>{{ $row->user_name }}</td>
            <td>{{ $row->user_email }}</td>
            <td>{{ $row->phone }}</td>
            <td>{{ $row->address }}</td>
             @if ($row->status == 1)
             <td id="statusValue_{{$row->id}}">Processing</td>
            @elseif ($row->status == 2)
            <td id="statusValue_{{$row->id}}">Approved</td>
            @elseif ($row->status == 3)
            <td id="statusValue_{{$row->id}}">On shipping</td>
            @elseif ($row->status == 4)
            <td id="statusValue_{{$row->id}}">Shipped</td>
            @elseif ($row->status == 5)
            <td id="statusValue_{{$row->id}}">Completed</td>            
             @else
             <td id="statusValue_{{$row->id}}">Canceled</td>
        @endif
            
            <td>{{ $row->isPaid == 1 ? "Yes" : "No"}}</td>
            <td>{{ date('d-m-Y', strtotime($row->order_date)) }}</td>
         
            <td>
                <div class="dropdown">
                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status<span class="caret"></span></button>
                    <ul class="dropdown-menu" style="min-width: 100px">
                        <li lead-id="{{$row->id}}" status="1"> <a href="#" > Processing </a></li>
                        <li lead-id="{{$row->id}}" status="2"> <a href="#"> Approved </a></li>
                        <li lead-id="{{$row->id}}" status="3"> <a href="#"> On shipping </a></li>
                        <li lead-id="{{$row->id}}" status="4"> <a href="#"> Shipped </a></li>
                        <li lead-id="{{$row->id}}" status="5"> <a href="#"> Completed </a></li>
                        <li lead-id="{{$row->id}}" status="6"> <a href="#"> Canceled </a></li>
                    </ul>
                </div>
            </td>
               
            <td>
                <button type="button" name="details" id="{{ $row->id }}"
                    class="details btn btn-success btn-sm" style="background-color: #3c8dbc;">Details</button>&nbsp;&nbsp;
            </td>
            <td>
                <button type="button" name="update" id="{{ $row->id }}"
                    class="update btn btn-success btn-sm" style="background-color: #3c8dbc;">Update</button>&nbsp;&nbsp;
            </td>
            <td>
                <button type="button" name="attachCertificate" id="{{ $row->id }}"
                    class="attachCertificate btn btn-success btn-sm" style="background-color: #3c8dbc;">Attach Certificate</button>&nbsp;&nbsp;
            </td>
        </tr>
    @endforeach
</table>

{{ $data->links('pagination::bootstrap-4') }}
