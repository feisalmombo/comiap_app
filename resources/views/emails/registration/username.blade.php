@component('mail::message')
# Dear {{ $name }}

<p>Thank you for taking measure to protect yourself and others against Coronavirus. Your account is successfully registered. For reference purposes here is your user name <mark>{{ $email }}</mark>. You can access your account securely at <a href="https://www.comiap.com">https://www.comiap.com</a> and use our contactless check-in for your COVID-19 testing as well as on your next visit to your healthcare provider. We look forward to serve you in a healthy way possible.</p>

@component('mail::button', ['url' => route("login")])
Login
@endcomponent

Sincerely,<br>
{{ config('app.name') }} Team
@endcomponent
