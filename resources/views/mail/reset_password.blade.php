<h1>Hi {{ $name }} Please Reset your password</h1>

<p>
    we received a request to change your password.
    If you are not initiator of this request, please let us know for the security of your account.
    <br>If you are initiator click rhe link below to reset your password.<br>
or by clicking the following link : <br>
<a href="{{route('app_changepassword', ['token' => $activation_token])}}" target="_blank">Reset password<a>
    UET_UCAO security team.
</p>
