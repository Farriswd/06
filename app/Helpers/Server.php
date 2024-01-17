<?php

function checkServerStatus($ip, $port)
{
    try {
        $fp = fsockopen($ip, $port, $errno, $errstr, 1);

        if (!$fp) {
            return 'Offline';
        } else {
            fclose($fp);
            return 'Online';
        }
    } catch (Exception $e) {
        \Illuminate\Support\Facades\Log::error("Error checking game server status:" . $e->getMessage());
        return 'Error';
    }

}
