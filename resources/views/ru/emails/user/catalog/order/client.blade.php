@component('mail::message')

Уважаемый(ая) <b>{{ $name }}</b>,

Спасибо за обращение в нашу компанию.

{{ $text }}

С наилучшими пожеланиями,
<b>Команда Sweets Technologies</b>

<img src="{{ asset('assets/img/logo.png') }}" alt="{{ config('site.user.app.name') }} logo"><br><br><br>
Мы предлагаем более подробную информацию о машинах нашего производства:

@component('mail::button', ['url' => 'https://youtu.be/wnyeSNFc4PA'])
Формовочная машина для зерновых батончиков MMC-400
@endcomponent

@component('mail::button', ['url' => 'https://youtu.be/XwlpGS1u4LE'])
Формовочная машина для пастообразной (фруктовой) массы RFM-200
@endcomponent

@endcomponent

