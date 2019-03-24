@component('mail::message')
# Good Day {{$order->orders->users->first_name}}!

# {{$order->users->company}} cancelled your order! <br>

<hr>
Contact Details: <br>
Seller: {{$order->users->company}} <br>
Location: {{ $order->users->street }}, {{ $order->users->barangays->name }}, {{ $order->users->cities->name }}, {{ $order->users->provinces->name }} <br>
Contact Number: {{$order->users->phone}} <br>
Email: {{$order->users->email}}


@component('mail::button', ['url' => ''])
View message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
