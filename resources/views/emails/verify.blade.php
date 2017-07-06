@component('mail::message')
# {{ $user->name }},恭喜你注册成功！

请点击完成你的注册流程吧^_^

@component('mail::button', ['url' => route('email.verify',['token'=>$user->confirmation_token])])
    Click Here!!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
