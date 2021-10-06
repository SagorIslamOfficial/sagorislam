@component('mail::message')
# From: Website({{ config('app.name') }})

<strong>Name:</strong> {{ $data['name'] }} <br>
<strong>Email:</strong> {{ $data['email'] }} <br>
<strong>Subject:</strong> {{ $data['subject'] }} <br>
<strong>Message:</strong> {{ $data['message'] }} <br>

Thanks,<br>
<strong>{{ $data['name'] }}</strong>
@endcomponent
