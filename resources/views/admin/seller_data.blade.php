<table class="table table-striped table-bordered" cellspacing="0" width="100%">
    <tr>
        <th>S/N</th>
        <th>ID</th>
        <th>representative name</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>company name</th>
        <th>Cars</th> 
        <th>Sold Car Count</th>
        <th>Sold Car Amount (amount-commission %)</th> 
        <th>total Paid Amount</th>
        <th>Is Active?</th>
        <th>Action</th>
    </tr>
    @foreach ($data as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->seller->number }}</td>
            <td>{{ $row->seller->company_name }}</td>
            <td>{{ $row->cars()->count() }}</td>
            <td>{{$row->cars()->where('car_sold_status',3)->count()}}</td>
            <td>{{config('constant.currencySymbool')}} 
                {{$row->cars()->where('car_sold_status',3)->sum('price')-(($row->cars()->where('car_sold_status',3)->sum('price')/100)*$row->seller->sales_commission)}}
            </td>
            <td>{{config('constant.currencySymbool')}} {{ $row->seller->paid_amount }}</td>
            <td>{{ $row->is_enabled == 1 ? 'Yes' : 'No' }}</td>
            <td>
                <button type="button" name="edit" id="{{ $row->id }}" class="edit btn btn-primary btn-sm">Edit</button>
                <button type="button" name="delete" id="{{ $row->id }}"
                    class="delete btn btn-danger btn-sm">Delete</button>&nbsp;&nbsp;
            </td>
        </tr>
    @endforeach
</table>

{{ $data->links('pagination::bootstrap-4') }}
