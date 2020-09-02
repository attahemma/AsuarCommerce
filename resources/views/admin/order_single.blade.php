@extends('layouts.back')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Order Information') }}</div>

                <div class="card-body">
                    <h3>Shipping Information</h3>
                    <table class="table table-striped table-dark">
                        <tbody>
                          <tr>
                            <th scope="row">Order Number</th>
                            <td>{{$order->order_number}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Shipping Status</th>
                            <td>{{$order->shipping_status}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Item Count</th>
                            <td>{{$order->item_count}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Grand Total</th>
                            <td>&pound;{{$order->grand_total}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Payment Status</th>
                            <td>{{$order->status}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Shipping Full Name</th>
                            <td>{{$order->shipping_fullname}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Shipping Address</th>
                            <td>{{$order->shipping_apartment.', '.$order->shipping_street.', '.$order->shipping_city.', '.$order->shipping_state.', '.$order->shipping_country}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Postal Code/Zip Code</th>
                            <td>{{$order->shipping_postcode}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Shipping Email</th>
                            <td>{{$order->shipping_email}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Shipping Phone</th>
                            <td>{{$order->shipping_phone}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Date of Order</th>
                            <td>{{ date('d M Y', strtotime($order->created_at)) }}</td>
                          </tr>
                        </tbody>
                      </table>
                      <br>
                      <hr>
                      <h3>Ordered Items</h3>
                      <table class="table table-striped table-dark">
                            <thead>
                              <tr>
                                  <th>Book cover</th>
                                  <th>Book Name</th>
                                  <th>Book Author</th>
                                  <th>Book Quantity</th>
                                  <th>Book Price</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if ($orderItems->isNotEmpty())
                                @foreach ($orderItems as $orderItem)
                                <tr>
                                    <td><img src="{{ asset('booksimg').'/'.$orderItem->book_image }}" alt="" width="50"></td>
                                    <td>{{ $orderItem->name }}</td>
                                    <td>{{ $orderItem->authors }}</td>
                                    <td>{{ $orderItem->pivot->quantity }}</td>
                                    <td>&pound; {{ $orderItem->pivot->price }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                      </table>
                </div>
                <div class="card-footer">
                    @can('isadmin')
                    <a href="{{route('orders.index')}}" class="btn btn-primary">Go Back</a>

                    <form action="{{route('orders.update', $order->id)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}

                        <input type="hidden" name="shipped" value="1">
                        <button class="btn btn-success mt-2" type="submit">Mark as Shipped</button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
