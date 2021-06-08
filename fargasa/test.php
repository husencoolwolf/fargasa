<?php

function Send_SMS( $to, $text ) {
#example $to=”628xxxx,628xxxx”;

$to = str_replace(' ', '',$to);
$from = "xxxx"; //Sender ID or SMS Masking Name, if leave blank, it will use default from telco
$username = "xxxx"; //your username
$password = "xxxx"; //your password
$getUrl = "https://[server]:[port]/sendsms?";
$ch = curl_init();
$apiUrl = $getUrl.'account='.$username.'&password='.$password.'&numbers='.$to.'&content='.rawurlencode($text);

curl_setopt( $ch, CURLOPT_URL, $apiUrl);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
'Accept:application/json'
)
);

$response = curl_exec( $ch );
$httpCode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
$responseBody = json_decode( $response, true );

if ($response) {
print_r($response);
}
curl_close($ch);
}

$to = "087771236822";//masukkan nomor tujuan
$message = "testtttt";//masukkan isi pesan
Send_SMS( $to, $message );

?>