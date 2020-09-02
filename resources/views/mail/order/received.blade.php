@component('mail::message')
# Shopping Invoice Paid

Here's Your Order Details

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
Order will be processed and shipped to You as soon as possible
@component('mail::button', ['url' => 'http://asuarbooks.com'])
Shop More Books
@endcomponent

Thank You,<br>
The ASB Team
@endcomponent
