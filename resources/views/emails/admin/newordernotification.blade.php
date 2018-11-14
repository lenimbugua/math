@component('mail::message')
# New Order Notification
# Id: {{$order->id}}

{{-- By:**{{$user->name}}**
Email:**{{$user->email}}**
User Id:**{{$user->id}}** --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
