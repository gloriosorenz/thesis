@component('mail::message')
# Hello {{$data['first_name']}}!

<p>Thank you for Joining Samahan ng Magsasaka sa Sta. Rosa Laguna</p>
<p>This is your auto-generated password: </p>
<h1>{{$data['password']}}</h1>

@component('mail::button', ['url' => ''])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
