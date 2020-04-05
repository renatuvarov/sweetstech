@component('mail::message')

Dear <b>{{ $name }}</b>,

Thank You for contacting to our company.

{{ $text }}

Best regards,
<b>Sweets Technologies team</b>

<img src="{{ asset('assets/img/logo.png') }}" alt="{{ config('site.user.app.name') }} logo"><br><br><br>
We offer more details about the machines of our production:

@component('mail::button', ['url' => 'https://youtu.be/wnyeSNFc4PA'])
Forming machine for cereals bars MMC-400
@endcomponent

@component('mail::button', ['url' => 'https://youtu.be/XwlpGS1u4LE'])
Forming machine for paste based (fruit) mass RFM-200
@endcomponent

@endcomponent
