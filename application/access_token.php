<?php
    $consumerKey ='qvAGTb7BLEKe3GYZDywHyHGr7fA3vJ3W';
    $consumerSecret ='aouAieLaYWiStnGr';

    $headers = ['Content-Type:application/json; charset=utf8'];

    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HEADER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
    
    $result = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $result = json_decode($result);
   
	$access_token = $result->access_token;
	echo $access_token;
	
    curl_close($curl);




//     $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

//     $credentials = base64_encode('qvAGTb7BLEKe3GYZDywHyHGr7fA3vJ3W:aouAieLaYWiStnGr');
//     $header = ['Authorization: Basic '.$credentials];

//     $curl = curl_init();
//     curl_setopt($curl, CURLOPT_URL, $url);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
//     curl_setopt($curl, CURLOPT_HTTPHEADER,$header); //setting a custom header
//     curl_setopt($curl, CURLOPT_HEADER,FALSE);
//     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

//     $curl_response = curl_exec($curl);
   
//     $result =json_decode($curl_response);
   
//     // $access_token = $curl_response->access_token;
//     echo ($result);
//     die(); -->
    


// 
   