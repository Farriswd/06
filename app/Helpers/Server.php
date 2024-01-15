<?php

function checkServerStatus($ip, $port)
{
    $fp = @fsockopen($ip, $port, $errno, $errstr, 1);

    if (!$fp) {
        return 'Offline';
    } else {
        fclose($fp);
        return 'Online';
    }
}
