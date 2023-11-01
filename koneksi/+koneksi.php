<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "jsn_pelayanan";

// $user = "jasanetc_pelayanan";
// $pass = "jasanet@123";
// $database = "jasanetc_pelayanan";

$http_host  = $_SERVER['HTTP_HOST'];
if (
    isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
) {
    $protocol = 'https://';
} else {
    $protocol = 'http://';
}
$base_url = $protocol . $http_host . '/services';
