@component('mail::message')
# Order Shipping Confirmation

<p>Your Order <strong>{{$order->order_number}}</strong> has been shipped!</p>

<h3>Order Information</h3>


        @foreach ($order->items as $item)

            Book Name: {{$item->name}}
            Quantity: {{$item->pivot->quantity}}
            Price: £{{$item->pivot->price}}

        @endforeach

        Total: £{{$order->grand_total}}


Thanks for your patronage,<br>
The ASB Team
@endcomponent
