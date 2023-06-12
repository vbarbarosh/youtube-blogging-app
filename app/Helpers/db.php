<?php

use Xaevik\Cuid2\Cuid2;

function cuid2($length = 24)
{
    $tmp = '';
    $cuid = new Cuid2(32);
    while (strlen($tmp) < $length) {
        $tmp .= $cuid->toString();
    }
    return substr($tmp, 0, $length);
}

function uid_user()
{
    return 'usr_' . cuid2();
}

function uid_article()
{
    return 'art_' . cuid2();
}
