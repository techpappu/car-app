<table class="table table-striped table-bordered" cellspacing="0" width="100%">
    <tr>
        <th>S/N</th>
        <th>Payment Id</th>
        <th>Order number</th>
        <th>Received date</th>
        <th>Payment type</th>
        <th>Customer name</th>
        <th>Customer Email</th>
        <th>Phone</th>
        <th>Paid amount</th>
        <th>Due amount</th>
        <th>Payment Status</th>
        <th>Action</th>
    </tr>
    @foreach ($data as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $row->payment_id }}</td>
            <td>{{ $row->order_number }}</td>
            <td>{{ $row->created_at }}</td>
            <td>{{ $row->payment_type == 0 ? 'Bank' : 'Card' }}</td>
            <td>{{ $row->user_name }}</td>
            <td>{{ $row->user_email }}</td>
            <td style="white-space: nowrap">{{ $row->phone }}</td>
            <td>{{ config('constant.currencySymbool') }}{{ $row->payment_amount }}</td>
            <td>{{ config('constant.currencySymbool') }}{{$row->due_amount }}</td>
            <td>{{ $row->isPaid == 0 ? 'Paid' : 'Refunded' }}</td>
            <td>
                <button type="button" name="details" id="{{ $row->payment_id }}"
                    class="details btn btn-success btn-sm" style="background-color: #3c8dbc;">Details</button>&nbsp;&nbsp;
            </td>
        </tr>
    @endforeach
</table>

{{ $data->links('pagination::bootstrap-4') }}
