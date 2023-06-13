<link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">

<style>
    .printExpense{
        display: none;
    }
</style>


<button type="button" name="" class="btn btn-info btn" 
style="float: right;margin-bottom:5px;" onclick="printJS('printexpense', 'html')"><i class="fa fa-print" aria-hidden="true"></i> Print</button>

<table class="table table-striped table-bordered" cellspacing="0" width="100%">
    <tr>
        <th>S/N</th>   
        <th>Type</th>     
        <th>Comment</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    @foreach ($data['expense'] as $key => $row)
        <tr>
            <td>{{ $key + 1 }}</td>  
            <td>{{$row->type}}  
            @if (!empty($row->car->name))
            {{$row->car->name}}
            @endif 
            </td>    
            <td>{{$row->comment}}</td>    
            <td>JPY {{$row->amount}}</td>
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
<h3>total Expenses: JPY {{$data['expense']->sum('amount')}}</h3>

<div class="printExpense" id="printexpense">
    <style>
        @media print {
            .printExpense h1{
                text-align: center;
            }
            .printExpense table{
                width: 100%;
            }
            .printExpense{
                
            }
            .date{
                float: right;
            }
            .customtable td, .customtable th {
            border: 1px solid #ddd;
            padding: 8px;
            }

            .customtable tr:nth-child(odd){background-color: #f4f4f4;}
            .customtable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #f4f4f4;
            color: rgb(35, 35, 35);
            }
            .carData{
                margin-bottom: 20px;
            }
        }
    </style>
    <h1 class="text-center"><img class="scroll-logo hidden-xs img-responsive"
        src="{{ url('/') }}/assets/media/general/app_logo.png" alt="logo"
        style="object-fit: cover;height: 80px;" />
    </h1>
    <h1 class="print-title" style="text-align: center">Car Expenses</h1>
    <h4 class="date">Data: {{ now()->format('Y-m-d') }}</h4>
    <table class="customtable carData" cellspacing="0">
        <tr>
            <th colspan="4"><h4>Name of Car: {{$data['carData']->title}}</h4> </th>
        </tr>
        <tr>
            <th>First Registration: {{$data['carData']->model_year}}</th>
            <th>Chassis No: {{$data['carData']->chassis_no}}</th>
            <th>Mileage: {{$data['carData']->mileage}} {{$data['carData']->mileage_type}}</th>
            <th>Color: {{$data['carData']->color->name}}</th>
        </tr>
        
    </table>
    <table class="customtable" cellspacing="0" width="100%">
        <tr>
            <th>S/N</th>   
            <th>Type</th>     
            <th>Comment</th>
            <th>Cost Amount</th>
            <th>Date</th>
        </tr>
        @foreach ($data['expense'] as $key => $row)
            <tr>
                <td>{{ $key + 1 }}</td>  
                <td>{{$row->type}}</td>    
                <td>{{$row->comment}}</td>    
                <td>JPY {{$row->amount}}</td>
                @if ($row->created_at)
                    <td>{{$row->created_at->format('Y-m-d')}}</td>
                @endif
            </tr>
        @endforeach
            <tr>
                <td colspan="3"><h3>Total</h3></td>
                <td colspan="2"><h3>JPY {{$data['expense']->sum('amount')}}</h3></td>
            </tr>
        
    </table>
</div>
<script src="  https://printjs-4de6.kxcdn.com/print.min.js"></script>
