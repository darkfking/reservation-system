@component('mail::message')
# Rezerwacja potwierdzona

Twoja rezerwacja została potwierdzona!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
