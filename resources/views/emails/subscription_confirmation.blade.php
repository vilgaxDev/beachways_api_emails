@component('mail::message')
# Thank You for Subscribing!

Hi {{ $subscriber->email }},

Thank you for subscribing to our newsletter. You are now part of our community!

We will keep you updated with the latest properties and news.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
