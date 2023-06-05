<?php

use Xaevik\Cuid2\Cuid2;

function cuid2()
{
    $cuid = new Cuid2();
    return $cuid->toString();
}

function uid_user()
{
    return 'usr_' . cuid2();
}

function uid_article()
{
    return 'art_' . cuid2();
}
