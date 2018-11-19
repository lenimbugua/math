@component('mail::message')
# Payment Received
Dear {{$user->name}}

Please note that payment has been received for following services:

# Order Id: {{$order->id}}.
# Order Title: {{$order->title}}.

Order Price: **Ksh {{$order->amount_paid}}.00**

Amount Paid:** Ksh {{$order->amount_paid}}.00**

Available Balance: Ksh 00.00.


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
