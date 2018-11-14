@component('mail::message')
# Order edited notification

"Dear Customer"

Thank you for entrusting us with your assignment. At pronto Labs, 
we take pride in providing prime-quality academic assistance. As such, we
allow you to edit your order for smooth experience. Please note that this may affect
the cost of your order because of factors like deaadline, number of pages, type of paper
and academic level.

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
