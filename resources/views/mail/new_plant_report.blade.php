@component('mail::message')
# New Season Plant Report

Incoming Season! You can now add your plant reports for the month!

@component('mail::button', ['url' => ''])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
