<x-mail::message>
# Hello {{ $contact->name }},

Thank you for reaching out to us! We have received your message and our team will get back to you shortly.

<x-mail::panel>
**Your Submitted Details:**
- **Email:** {{ $contact->email }}
- **Phone:** {{ $contact->phone ?? 'Not provided' }}
</x-mail::panel>

We look forward to speaking with you!

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
