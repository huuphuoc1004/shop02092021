@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'https://translate.google.com/?hl=vi&sl=en&tl=vi&text=has%20already%20been%20taken&op=translate'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
