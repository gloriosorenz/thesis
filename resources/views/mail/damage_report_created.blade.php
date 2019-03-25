@component('mail::message')
# Damage Report

{{$user->first_name}} {{$user->last_name}} of {{$user->company}} created a damage report!


@component('mail::button', ['url' => ''])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
