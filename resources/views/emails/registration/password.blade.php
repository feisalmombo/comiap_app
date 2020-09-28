@component('mail::message')
# Dear {{ $name }}

<p>Congratulations! Your account is successfully registered. For reference purposes, here is your password <mark>{{ $password }}</mark>. You can access your account securely at <a href="https://www.comiap.com">https://www.comiap.com</a> where you can change your password and use our contactless checking for your COVID-19 testing as well as on your next visit to your healthcare provider. We look forward to serve you in a healthy way possible.</p>

@component('mail::button', ['url' => route("login")])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
