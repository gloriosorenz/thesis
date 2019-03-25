@component('mail::message')
# Plant Report

{{$user->first_name}} {{$user->last_name}} of {{$user->company}} created a plant report!


@component('mail::button', ['url' => ''])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
