@component('mail::message')
# Order Edited
# Id: {{$order->id}}

{{-- By:**{{$user->name}}**
Email:**{{$user->email}}**
User Id:**{{$user->id}}** --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
