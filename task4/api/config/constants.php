<?php
$apiKey = isset($_SERVER['HTTP_APIKEY']) ? $_SERVER['HTTP_APIKEY'] : null;
$expectedApiKey = 'gfsfsfssssttetetetryryrrgfvcbbcbcbcbcbcouurrrtrtr64646557';

$ipAddress = $_SERVER['REMOTE_ADDR']; //ip used
$systemName = gethostname(); //computer used

$documentStoragePath = "http://localhost/OIBSIP/task4/api/uploaded-files/picture/user-passport"; //desktop view
// $documentStoragePath = "http://10.191.234.35/OIBSIP/task4/api/uploaded-files/picture/user-passport"; //mobile view
