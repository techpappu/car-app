@extends('frontend.home.layout')
@section('title', 'My Payments')
@push('css')
    <style>

    </style>
@endpush

@section('content')
    <div class="section-title-page area-bg area-bg_dark area-bg_op_70">
        <div class="area-bg__inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="b-title-page bg-primary_a">My Payment List</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div style="margin-left: 10px"><label>Balance Amount</label>
            <span style="font-weight: bold;color: red"
                id="balanceAmount">{{ config('constant.currencySymbool') }}{{ $balanceAmount }}</span>
        </div>
        <div class="table-container">
            <table class="table table_secondary table-type-2 table-striped typography-last-elem">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Order number</th>
                        <th>Payment date</th>
                        <th>Payment type</th>
                        <th>Paid amount</th>
                        <th>Due amount</th>
                        <th>Payment status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paymentList as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->order_number }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>{{ $row->payment_type == 0 ? 'Bank' : 'Card' }}</td>
                            <td>{{ config('constant.currencySymbool') }}{{ $row->payment_amount }}</td>
                            <td>{{ config('constant.currencySymbool') }}{{ $row->due_amount }}
                            </td>
                            <td>{{ $row->isPaid == 0 ? 'Paid' : 'Refunded' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $paymentList->links('pagination::bootstrap-4') }}
        </div>

    </div>
@endsection

@push('js')
@endpush
