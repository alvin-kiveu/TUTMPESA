<?php
header("Content-Type: application/json");
$QueueTimeOutURLCallbackResponse = file_get_contents('php://input');
$logFile = "ResultURL.json";
$log = fopen($logFile, "a");
fwrite($log, $QueueTimeOutURLCallbackResponse);
fclose($log);

$data = json_decode($QueueTimeOutURLCallbackResponse);

$ResultCode = $data->Result->ResultCode;
$ConversationID  = $data->Result->ConversationID;

if($ResultCode == 0){
  echo "Success";
}