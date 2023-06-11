<table class="table table-striped table-bordered" cellspacing="0" width="100%">
    <tr>
        <th>S/N</th>   
        <th>Type</th>     
        <th>Comment</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    @foreach ($data as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>  
            <td>{{$row->type}}</td>    
            <td>{{$row->comment}}</td>    
            <td>{{config('constant.currencySymbool')}} {{$row->amount}}</td>
            @if ($row->created_at)
                <td>{{$row->created_at->format('Y-m-d')}}</td>
            @endif
            
            <td>               
                <button type="button" name="carExpenseDelete" id="{{ $row->id }}"
                    class="carExpenseDelete btn btn-danger btn-sm">Delete</button>
                    
            </td>
        </tr>
    @endforeach
</table>
<h3>total Expenses: {{config('constant.currencySymbool')}} {{$data->sum('amount')}}</h3>