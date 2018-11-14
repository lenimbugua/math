@component('mail::message')
{{-- # Welcome {{$user->name}} --}}
# Welcome and thanks for joining Pronto Labs

# Dear {{$user->name}},

You're on your way to finding the perfect assignment services.
We are excited to have you on board. If you would like to speak to one
of Pronto Labs experts please feel free to do so using the contacts below

Email: **info@prontolabs.io**

Phone: **+2547042414274**

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
