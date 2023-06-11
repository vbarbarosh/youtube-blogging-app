<?php

namespace App\Helpers\Classes;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JavaScriptVars
{
    static private $values = [];

    static public function add($values)
    {
        JavaScriptVars::$values = array_merge(JavaScriptVars::$values, $values);
    }

    static public function all()
    {
        $out = JavaScriptVars::$values;
        $out['user'] = !Auth::check() ? null : User::frontend_fetch(User()->query()->where('id', user()->id))->first();
        return $out;
    }
}
