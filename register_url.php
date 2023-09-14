<?php
//INCLUDE ACCESS TOKEN FILE 
include 'accessToken.php';
$registerurl = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
$BusinessShortCode = '174379';

$confirmationUrl = 'https://35a5-105-160-103-124.ngrok-free.app/TUT/confirmation_url.php';
$validationUrl = 'https://35a5-105-160-103-124.ngrok-free.app/TUT/validation_url.php';


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $registerurl);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
  'Content-Type:application/json',
  'Authorization:Bearer ' . $access_token
));
$data = array(
  'ShortCode' => $BusinessShortCode,
  'ResponseType' => 'Completed',
  'ConfirmationURL' => $confirmationUrl,
  'ValidationURL' => $validationUrl
);
$data_string = json_encode($data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
echo $curl_response = curl_exec($curl);