<?php

use App\Exceptions\NotAuthorized;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

function user(): User
{
    if (Auth::check()) {
        return User::cast(Auth::user());
    }
    throw new NotAuthorized('Authentication required');
}
