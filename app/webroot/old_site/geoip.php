<?php
include("./geoip.inc");
$gi = geoip_open("./geoip.dat",GEOIP_STANDARD);
$ip = getIP();
$cc = geoip_country_code_by_addr($gi, $ip);
geoip_close($gi);

$ok=1;
if ($ip == "0.0.0.0") $ok=0;
if ($cc == "PK") $ok=0;
if ($cc == "CN") $ok=0;
if ($cc == "HK") $ok=0;
if ($cc == "BD") $ok=0;

if (!$ok) header("Location: /coming_soon.html"); /* Redirect browser */

function getIP() {
 if (getenv("HTTP_CLIENT_IP"))
   $ip = getenv("HTTP_CLIENT_IP");
 else if(getenv("HTTP_X_FORWARDED_FOR"))
   $ip = getenv("HTTP_X_FORWARDED_FOR");
 else if(getenv("REMOTE_ADDR"))
   $ip = getenv("REMOTE_ADDR");
 else
   $ip = "0.0.0.0";
 return $ip;
} 