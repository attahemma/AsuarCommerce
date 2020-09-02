@component('mail::message')
#Successfully subscribed

Thank you for subscribing to our newsletter!

@component('mail::button', ['url' => 'http://asuarbooks.com'])
Continue Shopping
@endcomponent

Thanks,<br>
The {{ config('app.name') }} Team
@endcomponent
