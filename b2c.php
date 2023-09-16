<?php
include 'accessToken.php';
include 'securitycridential.php';
$b2c_url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

// $userBlance = 1000;
// $requestedWithdrwal = 5000;

// if ($userBlance < $requestedWithdrwal) {
//   echo "You have insufficient funds";
//   exit();
// }


// //30 - 1000 = 15 || 1001- 70000 = 22
// if ($requestedWithdrwal >= 30 && $requestedWithdrwal <= 1000) {
//   $withFee = $requestedWithdrwal + 15;
// } else if ($requestedWithdrwal >= 1001 && $requestedWithdrwal <= 70000) {
//   $withFee = $requestedWithdrwal + 22;
// }

// $sentAmount  = $requestedWithdrwal  + $withFee;

// if ($userBlance < $sentAmount) {
//   echo "You have insufficient funds";
//   exit();
// }




$InitiatorName = 'testapi';
$pass = "Safaricom999!*!";
$BusinessShortCode = "600983";
$phone = "254768168060";
$amountsend = '10';
//$SecurityCredential ='iOZoPBIc9xvaZviQ6TpN64Jh800cv7My9azP6CH98Jzo6od8uPN/7JP/3XjREd8QjZG9a7DgAdubNbonsc3IMI3xckZ/b+ARt75VSWY//t2xxyWgLa9KW4OUIC7Ge7so8H3GvhnfGP5nhPcxwSJzXhyX72ayqxHba4Ay0m7DFrbLguDqyIqCyG2rrmP1B9cQbMFMIWed3XTny/4RCnKVMtecieZ6IGXuLLxMSKzDWZ3D3K3rMjlR0kR16LbNjjqs32YUN9G1g75hz1h37apUY0kP4Maicvd0K2qNWDoqKo/YQwLrhGsmVh/gybQeaQuPs9ssZUQ6wNDVD4Eg+a8qAA==';
$CommandID = 'SalaryPayment'; // SalaryPayment, BusinessPayment, PromotionPayment
$Amount = $amountsend;
$PartyA = $BusinessShortCode;
$PartyB = $phone;
$Remarks = 'Umeskia Withdrawal';

$QueueTimeOutURL = 'https://db7d-105-160-59-182.ngrok-free.app/TUT/QueueTimeOutURL.php';

$ResultURL = 'https://db7d-105-160-59-182.ngrok-free.app/TUT/ResultURL.php';

$Occasion = 'Online Payment';
/* Main B2C Request to the API */
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $b2c_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token]);
$curl_post_data = array(
  'InitiatorName' => $InitiatorName,
  'SecurityCredential' => $SecurityCredential,
  'CommandID' => $CommandID,
  'Amount' => $Amount,
  'PartyA' => $PartyA,
  'PartyB' => $PartyB,
  'Remarks' => $Remarks,
  'QueueTimeOutURL' => $QueueTimeOutURL,
  'ResultURL' => $ResultURL,
  'Occasion' => $Occasion
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
$curl_response;
$data = json_decode($curl_response);
$OriginatorConversationID  =  $data->OriginatorConversationID;
echo $ConversationID =  $data->ConversationID;

