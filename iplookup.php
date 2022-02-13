<?php

// IPLookup coded by Snickers for the Cayosin c2 - Place File in var/www/html

$ip = $_GET['host'];

if($ip != NULL && $filter_var($ip, FILTER_VALIDATE_IP) !== false)
{
    $resp = file_get_contents("http://ip-api.com/json/$ip?fields=520191&lang=en");
    $resp = str_replace('{', NULL, $resp);
    $resp = str_replace('}', NULL, $resp);
    $resp = str_replace('"', NULL, $resp);
    $resp = str_replace(':', ': ', $resp);
    $resp = str_replace(",", "\r\n", $resp);
    $resp = str_replace("\r\nstatus: success", NULL, $resp);
    echo $resp;
    //echo "IP -> $ip";
}
else
{
    echo "[IPLookup-API] Syntax Error, Example: http://1.1.1.1/iplookup.php?host=1.3.3.7";
}
