@component('mail::message')
# New user notification
{{$user->name}}

{{$user->email}}

User Id: {{$user->id}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
