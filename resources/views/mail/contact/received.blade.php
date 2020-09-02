@component('mail::message')
#  New Enquiry/Complaint Has been Submitted

<h4>Ticket ID: <strong>{{$ticketId}}</strong></h4>

From: {{$contactInfo->email}} <br>
Name: {{$contactInfo->name}} <br>
Subject: {{$contactInfo->subject}} <br>
Message: {{$contactInfo->message}}

@component('mail::button', ['url' => ''])
Login to Manage Enquiry/Complaints
@endcomponent

Thank You,<br>
The ASB Team
@endcomponent
