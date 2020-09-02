@extends('layouts.back')

@section('content')
<div class="container mt-5">
    <div class="row">
        <h3>Dashboard</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All My Orders') }}</div>

                <div class="card-body">
                    <table id="example" class="display table table-hover" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Order Number</th>
                                <th>Status</th>
                                <th>Item Count</th>
                                <th>Total</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($myOrders->isNotEmpty())
                            @foreach ($myOrders as $myOrder)
                            <tr>
                                <td>{{ $myOrder->order_number }}</td>
                                <td>{{$myOrder->status}}</td>
                                <td>{{$myOrder->item_count}}</td>
                                <td>&pound; {{$myOrder->grand_total}}</td>
                                <td>
                                    <a href="{{route('orders.show', $myOrder->id)}}" class="btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                    @can('isadmin')
                                    <a href="" class="btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <form action="">
                                        @csrf

                                        <button class="btn-sm btn-danger mt-1"><i class="fa fa-times"></i></button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
