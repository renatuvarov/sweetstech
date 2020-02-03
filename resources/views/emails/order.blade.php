@component('mail::message')
# Новый заказ

Поступил заказа от {{ $data['name'] }} {{ $data['surname'] }} на {{ $data['product'] }}.

E-mail: {{ $data['email'] }}.

Телефон: {{ $data['phone'] }}.

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

@endcomponent
