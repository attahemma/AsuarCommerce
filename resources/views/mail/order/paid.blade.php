@component('mail::message')
# Order Invoice Paid

Here's a New Order Details

<table class="table" border="1">
    <thead>
        <tr>
            <th>Book Name</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Order Number</td>
            <td colspan="2">
                {{$order->order_number}}
            </td>
        </tr>
        @foreach ($order->items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->pivot->quantity}}</td>
            <td>&pound; {{$item->pivot->price}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td>Total:</td>
            <td colspan="2">&pound; {{$order->grand_total}}</td>
        </tr>
    </tfoot>
</table>

@component('mail::button', ['url' => 'http://asuarbooks.com/home'])
Login to Process Order
@endcomponent

Thank You,<br>
The ASB Team
@endcomponent
