<x-mail::message>
# Verify Your Email Address

Hello,

Thank you for joining our Hospital Management System. To complete your registration, please use the following one-time password (OTP) to verify your email address:

<x-mail::panel>
# {{ $otp_code }}
</x-mail::panel>

This code is valid for **15 minutes**. If you did not request this verification, please ignore this email.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
