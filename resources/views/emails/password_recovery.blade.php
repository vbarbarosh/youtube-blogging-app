@php
/** @var \App\Models\User $user */
@endphp

Password Recovery Email

Your token is: {{ $user->password_recovery_token }}

{{ url('/password-recovery/' . $user->password_recovery_token) }}
