@component('mail::message')
#HR Notification

You have been Added in the {{ config('app.name') }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
