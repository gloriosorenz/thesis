@component('mail::message')
# Your order has been processed!

Please wait for the seller to confirm your order. <br>
An email will be sent to you within 3 days.

@component('mail::button', ['url' => ''])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
