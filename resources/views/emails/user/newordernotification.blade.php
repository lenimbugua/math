@component('mail::message')
{{-- # New Order Id: {{$order->id}} --}}
# New Order 
# Order Id: {{$order->id}}
"Dear Customer, 

Thank you for placing an order with our service. We have reviewed the paper details provided and would like to let you know that we would be glad to help you with this assignment. It will be completed by one of our proficient writers within the specified deadline.
In case you have any questions or concerns, do not hesitate to contact us in Live Chat.

Regards"

Please check your order page to get more information.

Thank you.

Best regards, 

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

<br>
{{ config('app.name') }} Team
@endcomponent
