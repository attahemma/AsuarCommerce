@component('mail::message')
# Your Enquiry/Complaint Has been Submitted

<h4>Ticket ID: <strong>{{$ticketId}}</strong></h4>

<p>
    We will attend to your Enquiry/Complaint in the <strong>Shortest time</strong>
</p>

@component('mail::button', ['url' => ''])
Continue Shopping
@endcomponent

Thank You,<br>
The ASB Team
@endcomponent
