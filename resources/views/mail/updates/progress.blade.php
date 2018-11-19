@component('mail::message')

@if($order->progress == 100)
# Order Complete

Congratulations!! Your order has been successfully completed
You an now download **non-editable** version
Please approve your the files to download **editable** version 
@else
We are working on your order. Progress is at {{$order->progress}}%
We'll keep updating you on the progress.
@endif


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Its fun working with you,
Thanks,<br>
{{ config('app.name') }}
@endcomponent
