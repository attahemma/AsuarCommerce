@extends('layouts.back')

@section('content')
<div class="container mt-5">
    <div class="row">
        <h3>Dashboard</h3>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Orders') }}</div>

                <div class="card-body">
                    <table id="example" class="display table table-hover" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Order Number</th>
                                <th>Shipping Status</th>
                                <th>Item Count</th>
                                <th>Total</th>
                                <th>Date Ordered</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($Orders->isNotEmpty())
                            @foreach ($Orders as $Order)
                            <tr>
                                <td>{{ $Order->order_number }}</td>
                                <td class="@if($Order->shipping_status == 'Processed') table-success @endif">{{$Order->shipping_status}}</td>
                                <td>{{$Order->item_count}}</td>
                                <td>&pound; {{$Order->grand_total}}</td>
                                <td>{{ date('d M Y', strtotime($Order->created_at)) }}</td>
                                <td>
                                    <a href="{{route('orders.show', $Order->id)}}" class="btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                                    @can('isadmin')

                                    <form action="{{route('orders.update', $Order->id)}}" method="POST">
                                        @csrf
                                        {{method_field('PUT')}}

                                        <input type="hidden" name="shipped" value="1">
                                        <button type="submit" class="btn-sm btn-primary mt-1">Mark as Shipped <i class="fa fa-edit"></i></button>
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
