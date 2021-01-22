@component('mail::message')
    # Reset Password

    Reset or change your password.

    @component('mail::button', ['url' =>  "$app_url" . '/user/recover-password?token='.$token])
        Change Password
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
