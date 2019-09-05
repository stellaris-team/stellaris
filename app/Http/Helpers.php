<?php

if (!function_exists('faKitID'))
{
    function faKitID ()
    {
        return env('FA_PRO') ? env('FA_KIT_ID', 'd3e0e1cdd7') : 'd3e0e1cdd7';
    }
}

if (!function_exists('faStyle'))
{
    function faStyle ()
    {
        return env('FA_PRO', false) ? 'fad' : 'fas';
    }
}

// https://stackoverflow.com/a/54173207
if (!function_exists('setEnvValue'))
{
    function setEnvValue($envKey, $envValue)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        $str .= "\n"; // In case the searched variable is in the last line without \n
        $keyPosition = strpos($str, "{$envKey}=");
        $endOfLinePosition = strpos($str, PHP_EOL, $keyPosition);
        $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
        $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
        $str = substr($str, 0, -1);

        $fp = fopen($envFile, 'w');
        fwrite($fp, $str);
        fclose($fp);
    }
}